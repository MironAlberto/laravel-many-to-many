@extends('layouts.app')

@section('page-title', $project->title)

@section('main-content')
    <div class="d-flex justify-content-end pt-3 mb-3">
        <button type="button" class="btn my-badge text-white fw-bolder" data-bs-toggle="modal" data-bs-target="#exampleModal">
            Delete the Project
        </button>
        
        <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content my-modal">
                    <div class="modal-header">
                        <h1 class="modal-title fs-5 text-white" id="exampleModalLabel"><span class="text-danger">Deleting</span> the Project {{ $project->title }}</h1>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body text-white">
                        Are you sure you want to delete {{ $project->title }}?
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-outline-light fw-bolder" data-bs-dismiss="modal">Cancel</button>
                        <form 
                            action="{{ route('admin.projects.destroy', ['project' => $project->id]) }}"
                            method="POST"
                            {{-- metodo per richiedere conferma direttamente da backend ↓ --}}
                            {{-- onsubmit="return confirm('Are you sure you want to delete {{ $project->title }}?')" --}}>
                            @csrf

                            {{-- aggiungo tramite blade il method DELETE così da non reindirizzarmi a SHOW --}}
                            @method('DELETE')

                            <button type="submit" class="btn btn-danger fw-bolder">
                                Delete
                            </button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col">
            <div class="card my-badge">
                <div class="card-body text-secondary text-center">
                    <h1 class="text-light mb-5">
                        {{ $project->title }}
                    </h1>

                    @if ($project->cover_image != null)
                        <div class="img-box mx-auto mb-4">
                            <img src="{{ asset('storage/'. $project->cover_image) }}" alt="{{ $project->title }}">
                        </div>
                    @endif

                    <h2 class="mb-5">
                        <div>
                            USED TYPE:
                        </div>
                        @if ($project->type != null)
                            <a href="{{ route('admin.types.show', ['type' => $project->type->id]) }}" class="link-light fw-bolder">
                                {{ $project->type->title }}
                            </a>
                        @endif
                    </h2>

                    <h2 class="mb-5">
                        <div>
                            TECHNOLOGIES:
                        </div>
                        @forelse ($project->technologies as $technology)
                        <a href="{{ route('admin.technologies.show', ['technology' => $technology->id]) }}" class="badge m-1 text-bg-light text-decoration-none">
                            {{ $technology->title }}
                        </a>
                        @empty
                            Not Specified
                        @endforelse
                    </h2>

                    <h3 class="mb-5">
                        <div>
                            CONTENT:
                        </div>
                        <span class="text-light">
                            {{ $project->content }}
                        </span>
                    </h3>

                    <h3 class="mb-5">
                        <div>
                            URL:
                        </div>
                        <span class="text-light">
                            {{ $project->url }}
                        </span>
                    </h3>
                </div>
            </div>
        </div>
    </div>
@endsection