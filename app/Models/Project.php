<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Project extends Model
{

    protected $fillable = ['team_id',
                            'project_call_number',
                            'project_title',
                            'project_abstract',
                            'project_professor',
                            'project_subject',
                            'project_file'
                             ];
}
