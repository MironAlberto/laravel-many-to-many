@extends('layouts.guest')

@section('page-title', $project->title)

@section('main-content')
    <div class="row">
        <div class="col">
            <div class="card my-badge">
                <div class="card-body text-secondary text-center">
                    <h1 class="text-light mb-5">
                        {{ $project->title }}
                    </h1>

                    <h3 class="mb-5">
                        <div>
                            CONTENT:
                        </div>
                        <span class="text-light">
                            {{ $project->content }}
                        </span>
                    </h3>
                </div>
            </div>
        </div>
    </div>
@endsection