<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Edit ') }}{{ $project->project_title }}
        </h2>
    </x-slot>
 
    <div class="py-6">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg">
                <div class="relative overflow-x-auto shadow-md sm:rounded-lg px-4 py-4">
                    <x-validation-errors class="mb-4" />
 
                    <form method="POST" action="{{ route('projects.update', $project) }}">
                        @csrf
                        @method('PUT')

                        <div class="flex flex-wrap -mx-3 mb-6">
                            <div class="w-1/2">
                                <x-label for="project_title" value="{{ __('Title') }}" />
                                <x-input id="project_title" class="block mt-1 w-full" type="text" name="project_title" :value="$project->project_title" required autofocus autocomplete="project_title" />
                            </div>
                            @foreach ($teams as $team)
                            <div class="w-1/2">
                                <x-label for="team_id" value="{{ __('Team') }}" />
                                <x-input id="team_id" class="block mt-1 w-full" type="text" name="team_id" :value="$team->name" required autofocus autocomplete="project_title" /> 
                            </div>
                            @endforeach
                        </div>
                            <x-label for="project_abstract" value="{{ __('Abstract') }}" />
                            <textarea rows="4" id="project_abstract" class="block mt-1 w-full border-gray-300 focus:border-indigo-500 focus:ring-indigo-500 rounded-md shadow-sm" name="project_abstract" :value="$project->project_abstract" required autofocus autocomplete="project_abstract">{{$project->project_abstract}} </textarea>


                            
                        <div class="flex flex-wrap -mx-3 mb-6">
                            <div class="w-1/2">
                                <x-label for="project_professor" value="{{ __('Professor') }}" />
                                <x-input id="project_professor" class="block mt-1 w-full" type="text" name="project_professor" :value="$project->project_professor" required autofocus autocomplete="project_professor" />
                            </div>
                            <div class="w-1/2">
                            <x-label for="project_subject" value="{{ __('Subject') }}" />
                            <x-input id="project_subject" class="block mt-1 w-full" type="text" name="project_subject" :value="$project->project_subject" required autofocus autocomplete="project_subject" />

                            </div>

                        </div>
                            <div class="col-span-6 sm:col-span-4">
                            <x-label for="project_file" value="{{ __('File:')}}"/>
                            <input type="file" id="project_file" name="project_file" />
                        </div>

                        <div class="flex mt-4">
                            <x-button>
                                {{ __('Save Project') }}
                            </x-button>
                        </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>