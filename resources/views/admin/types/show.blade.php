@extends('layouts.app')

@section('page-title', $type->title)

@section('main-content')
    <div class="d-flex justify-content-end pt-3 mb-3">
        <button type="button" class="btn my-badge text-white fw-bolder" data-bs-toggle="modal" data-bs-target="#exampleModal">
            Delete the Type
        </button>
        
        <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content my-modal">
                    <div class="modal-header">
                        <h1 class="modal-title fs-5 text-white" id="exampleModalLabel"><span class="text-danger">Deleting</span> the Type {{ $type->title }}</h1>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body text-white">
                        Are you sure you want to delete {{ $type->title }}?
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-outline-light fw-bolder" data-bs-dismiss="modal">Cancel</button>
                        <form 
                            action="{{ route('admin.types.destroy', ['type' => $type->id]) }}"
                            method="POST"
                            {{-- metodo per richiedere conferma direttamente da backend ↓ --}}
                            {{-- onsubmit="return confirm('Are you sure you want to delete {{ $type->title }}?')" --}}>
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
                    <h1 class="text-light mb-5 text-uppercase">
                        {{ $type->title }}
                    </h1>

                    <h2>
                        Related Projects:
                    </h2>

                    <div>
                        @foreach ($type->projects as $project)
                            <div class="mb-2">
                                <a href="{{ route('admin.projects.show', ['project' => $project->id]) }}" class="link-light fw-bolder">
                                    {{ $project->title }}
                                </a>
                            </div>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection