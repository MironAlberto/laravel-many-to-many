@extends('layouts.guest')

@section('page-title', 'Our Projects')

@section('main-content')
    <div class="row">
        <div class="col-12 mb-4">
            <h1 class="text-center text-white">
                Our Projects
            </h1>
        </div>
        
        @foreach ($projects as $project)
            <div class="col-4">
                <div class="card my-card mb-4 my-badge text-center">
                    <div class="card-body text-light">
                        <h4>
                            {{ $project->title }}
                        </h4>

                        <a href="{{ route('projects.show', ['project' => $project->id]) }}" class="btn btn-outline-light fw-bolder mt-3">
                            More
                        </a>
                    </div>
                </div>
            </div>
        @endforeach
    </div>
@endsection