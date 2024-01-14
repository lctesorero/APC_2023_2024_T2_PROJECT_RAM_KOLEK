<?php

namespace App\Http\Controllers;

use App\Models\Team;
use App\Models\Project;

use App\Http\Requests\StoreProjectRequest;
use App\Http\Requests\UpdateProjectRequest;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Laravel\Jetstream\Jetstream;

class ProjectController extends Controller
{
    public $project_title, $project_abstract;
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $user = Auth::user()->id;
        $left_projects = DB::table('projects')
        ->select('projects.*','teams.name as team_name')
        ->leftJoin('teams','projects.team_id','=','teams.id')
        ->leftJoin('team_user','team_user.team_id','=','teams.id')
        ->where('team_user.user_id','=',$user)
        ->orWhere('teams.user_id','=',$user);

        $projects = DB::table('projects')
        ->select('projects.*','teams.name as team_name')
        ->rightJoin('teams','projects.team_id','=','teams.id')
        ->rightJoin('team_user','team_user.team_id','=','teams.id')
        ->where('team_user.user_id','=',$user)
        ->orWhere('teams.user_id','=',$user)
        ->union($left_projects)
        ->get();
        
        return view('projects.index', compact('projects'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $user = Auth::user()->id;
        $left_teams = DB::table('teams')
        ->select('teams.*','team_user.user_id as user_member_id')
        ->leftJoin('team_user','team_user.team_id','=','teams.id')
        ->where('team_user.user_id','=',$user)
        ->orWhere('teams.user_id','=',$user);

        $teams = DB::table('teams')
        ->select('teams.*','team_user.user_id as user_member_id')
        ->rightJoin('team_user','team_user.team_id','=','teams.id')
        ->where('team_user.user_id','=',$user)
        ->orWhere('teams.user_id','=',$user)
        ->union($left_teams)
        ->get();

        return view('projects.create', compact('teams'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreProjectRequest $request)
    {
        if($request->has('project_file')){
            $file = $request->file('project_file');
            $extension = $file->getClientOriginalExtension();

            $filename = time().'.'.$extension;

            $path = 'uploads/project/';
            $file->move('uploads/project/',$filename);
        }
        else{
            $filename='';
            $path ='';
        }
        Project::updateOrCreate(['team_id' => $request->team_id,
                         'project_title' => $request->project_title,
                         'project_abstract' => $request->project_abstract,
                         'project_professor' => $request->project_professor,
                         'project_subject' => $request->project_subject,
                         'project_file' => $path.$filename
                        ]);
 
        return redirect()->route('projects.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(Project $project, Team $team)
    {
        $teams = Team::where('id',$project->id)->get();
        return view('projects.show', compact('project','teams'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Project $project)
    {
        $teams = Team::where('id',$project->id)->get();
        return view('projects.edit', compact('project','teams'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateProjectRequest $request, Project $project)
    {
        $id = $project->id;
        $team_id = $project->id;
        $created_at = $project->created_at;
        Project::where('id',$id)->update(['team_id' => $team_id,
                         'project_title' => $request->project_title,
                         'project_abstract' => $request->project_abstract,
                         'project_professor' => $request->project_professor,
                         'project_subject'=>$request->project_subject,
                         'created_at' => $created_at
                        ]);
 
        return redirect()->route('projects.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Project $project)
    {
        $project->delete();
 
        return redirect()->route('projects.index');
    }

    public function fileDownload($filename)
    {
        return response()->download($filename);
    }
}