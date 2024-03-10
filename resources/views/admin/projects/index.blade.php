@extends('layouts.app')

@section('page-title', 'My Projects')

@section('main-content')
    <div class="row">
        <div class="col">
            <div class="card my-background border-0">
                <div class="card-body my-background">
                    <h1 class="text-center text-light pb-4">
                        My Projects
                    </h1>

                    <div>
                        <table class="my-background-table table-bordered">
                            <thead>
                                <tr class="text-center p-3">
                                    <th scope="col">#</th>
                                    <th scope="col" class="p-3">URL</th>
                                    <th scope="col" class="p-3">Title</th>
                                    <th scope="col" class="p-3">Type</th>
                                    <th scope="col" class="p-3">Technologies</th>
                                    <th scope="col" colspan="2" class="text-center p-3">Actions</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($projects as $project)
                                    <tr>
                                        <th scope="row" class="p-3">{{ $project->id }}</th>
                                        <td class="p-3">{{ $project->url }}</td>
                                        <td>{{ $project->title }}</td>
                                        <td class="p-3">
                                            @if ($project->type != null)
                                                <a href="{{ route('admin.types.show', ['type' => $project->type->id]) }}" class="link-light fw-bolder">
                                                    {{ $project->type->title }}
                                                </a>
                                            @else
                                                Not Specified
                                            @endif
                                        </td>
                                        <td class="text-center">
                                            @forelse ($project->technologies as $technology)
                                                <a href="{{ route('admin.technologies.show', ['technology' => $technology->id]) }}" class="badge m-1 my-badge text-decoration-none">
                                                    {{ $technology->title }}
                                                </a>
                                            @empty
                                                Not Specified
                                            @endforelse
                                        </td>
                                        <td class="p-3">
                                            <a href="{{ route('admin.projects.show', ['project' => $project->id]) }}" class="btn btn-xs my-badge text-white fw-bolder">
                                                Show
                                            </a>
                                        </td>
                                        <td class="p-3">
                                            <a href="{{ route('admin.projects.edit', ['project' => $project->id]) }}" class="btn my-badge text-white fw-bolder w-100">
                                                Update
                                            </a>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection