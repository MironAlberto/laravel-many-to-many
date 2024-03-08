@extends('layouts.app')

@section('page-title', 'My Projects')

@section('main-content')
    <div class="row">
        <div class="col">
            <div class="card text-bg-dark">
                <div class="card-body">
                    <h1 class="text-center text-light">
                        My Projects
                    </h1>

                    <div>
                        <table class="table table-dark">
                            <thead>
                                <tr class="text-center">
                                    <th scope="col">#</th>
                                    <th scope="col">URL</th>
                                    <th scope="col">Title</th>
                                    <th scope="col">Used Type</th>
                                    <th scope="col">Technologies</th>
                                    <th scope="col" colspan="2" class="text-center">Actions</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($projects as $project)
                                    <tr>
                                        <th scope="row">{{ $project->id }}</th>
                                        <td>{{ $project->url }}</td>
                                        <td>{{ $project->title }}</td>
                                        <td>
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
                                                <a href="{{ route('admin.technologies.show', ['technology' => $technology->id]) }}" class="badge m-1 text-bg-light text-decoration-none">
                                                    {{ $technology->title }}
                                                </a>
                                            @empty
                                                Not Specified
                                            @endforelse
                                        </td>
                                        <td>
                                            <a href="{{ route('admin.projects.show', ['project' => $project->id]) }}" class="btn btn-xs btn-light text-dark fw-bolder">
                                                Show
                                            </a>
                                        </td>
                                        <td>
                                            <a href="{{ route('admin.projects.edit', ['project' => $project->id]) }}" class="btn btn-secondary fw-bolder text-white w-100">
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