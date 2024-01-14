<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ $project->project_title }}
        </h2>
    </x-slot>
 
    <div class="py-6">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg">
                <div class="relative overflow-x-auto shadow-md sm:rounded-lg px-4 py-4">
                    <x-validation-errors class="mb-4" />
 

                        @csrf
                        <div class="flex mb-4 justify-end">
                            <x-link-button href="{{ route('projects.edit', $project)}}">
                                {{ __('Edit Project') }}
                            </x-link-button>
                        </div>
                        <div class="flex flex-wrap -mx-3 mb-6">
                            <div class="w-1/2">
                                <x-label for="project_title" value="{{ __('Title') }}" />
                                <x-input id="project_title" class="block mt-1 w-full" type="text" name="project_title" :value="$project->project_title" disabled/>
                            </div>
                            @foreach($teams as $team)
                            <div class="w-1/2">
                                <x-label for="team_name" value="{{ __('Team') }}" />
                                <x-input id="team_name" class="block mt-1 w-full" type="text" name="team_name" :value="$team['name']"   disabled/>
                            </div>
                            @endforeach
                            </div>
                        <div>
                            <x-label for="project_abstract" value="{{ __('Abstract') }}" />
                            <x-input id="project_abstract" class="block mt-1 w-full" type="text" name="project_abstract" :value="$project->project_abstract" disabled/>
                        </div>
                        <div class="flex flex-wrap -mx-3 mb-6">
                            <div class="w-1/2">
                                <x-label for="project_professor" value="{{ __('Professor') }}" />
                                <x-input id="project_professor" class="block mt-1 w-full" type="text" name="project_professor" :value="$project->project_professor" disabled/>
                            </div>
                            <div class="w-1/2">
                                <x-label for="project_subject" value="{{ __('Subject') }}" />
                                <x-input id="project_subject" class="block mt-1 w-full" type="text" name="project_subject" :value="$project->project_subject" disabled/>
                            </div>
                        </div>
                        <div>
                            <x-label for="project_file" value="{{ __('File') }}" />
                            <x-input id="project_file" class="block mt-1 w-full" type="text" name="project_file" :value="$project->project_file" disabled/>
                        </div>

                </div>
            </div>
        </div>
    </div>
</x-app-layout>