@extends('layouts.app')

@section('page-title', 'Edit '.$project->title)

@section('main-content')
<div class="d-flex justify-content-end pt-3">
    <a href="{{ route('admin.projects.index') }}" class="btn my-badge text-white fw-bolder">
        <- Return to your projects
    </a>
</div>
<h1 class="text-white">
    Edit {{ $project->title }}
</h1>

<div class="row">
    <div class="col py-4 text-white">
        {{-- reindirizzamento ad update, ricordarsi di usare method PUT --}}
        <form action="{{ route('admin.projects.update', ['project' => $project->id]) }}" method="POST" enctype="multipart/form-data"> 
            @csrf

            {{-- grazie a blade, utilizzo il method PUT - altrimenti ritornerei a store --}}
            @method('PUT')

            <div class="mb-3">
                <label for="url" class="form-label fw-bolder">URL</label>
                <input value="{{ old('url', $project->url) }}" type="text" class="form-control text-white" @error('url') is-invalid @enderror id="url" name="url" placeholder="Add your updated Project URL..." maxlength="1024">
                @error('url')
                    <div class="alert alert-danger">
                        {{ $message }}
                    </div>
                @enderror
            </div>

            <div class="mb-3">
                <label for="title" class="form-label fw-bolder">Title <span class="text-danger">*</span></label>
                <input value="{{ old('title', $project->title) }}" type="text" class="form-control text-white" @error('title') is-invalid @enderror id="title" name="title" placeholder="Add your updated Project Title..." maxlength="255" required>
                @error('title')
                    <div class="alert alert-danger">
                        {{ $message }}
                    </div>
                @enderror
            </div>

            <div class="mb-3">
                <label for="content" class="form-label fw-bolder">Content</label>
                <textarea class="form-control text-white" @error('content') is-invalid @enderror id="content" name="content" rows="3" maxlength="4000" placeholder="Add your updated Project Content...">{{ old('content', $project->content) }}</textarea>
                @error('content')
                    <div class="alert alert-danger">
                        {{ $message }}
                    </div>
                @enderror
            </div>

            <div class="mb-3">
                <label for="cover_image" class="form-label">
                    Cover Image
                </label>
                <input value="{{ old('cover_image') }}" type="file" class="form-control text-white" @error('cover_image') is-invalid @enderror id="cover_image" name="cover_image" placeholder="Add your Cover Image..." maxlength="2048">
                @error('cover_image')
                    <div class="alert alert-danger">
                        {{ $message }}
                    </div>
                @enderror

                @if ($project->cover_image != null)
                    <div>
                        <h3>
                            Current Cover Image:
                        </h3>
                        <div class="img-box">
                            <img src="{{ asset( 'storage/'. $project->cover_image) }}" alt="{{ $project->title }}">
                        </div>
                        <div class="form-check">
                            <input class="form-check-input" type="checkbox" value="1" id="delete_cover_image" name="delete_cover_image">
                            <label class="form-check-label" for="delete_cover_image">
                                Delete Current Cover Image
                            </label>
                        </div>
                    </div>
                @endif
            </div>

            <div class="mb-3">
                <label for="type_id" class="form-label fw-bolder">Type</label>
                <select name="type_id" id="type_id" class="form-select text-white" @error('type_id') is-invalid @enderror>
                    <option value="" {{ old('type_id', $project->type_id) == null ? 'selected' : '' }}>
                        Select your Programming Type...
                    </option>
                    @foreach ($types as $type)
                        <option value="{{ $type->id }}" {{ old('type_id', $project->type_id) == $type->id ? 'selected' : '' }}>
                            {{ $type->title }}
                        </option>
                    @endforeach
                </select>
                @error('type_id')
                    <div class="alert alert-danger">
                        {{ $message }}
                    </div>
                @enderror
            </div>

            <div class="mb-3">
                <label for="technologies" class="form-label fw-bolder">Technology</label>
                <div>
                    @foreach ($technologies as $technology)

                        <div class="form-check form-check-inline">
                            <input 
                            @error('technology') is-invalid @enderror 
                            {{-- controllo se c'è stato un errore, in questo caso la checkbox avrà l'old --}}
                            @if ($errors->any()) 
                                {{ in_array($technology->id, old('technologies', [])) ? 'checked' : '' }}
                            @else
                                {{-- se non c'è l'errore, verifico solo la sua collezione iniziale --}}
                                {{ $project->technologies->contains($technology->id) ? 'checked' : '' }}
                            @endif
                            type="checkbox" 
                            name="technologies[]" 
                            id="technology-{{ $technology->id }}" 
                            class="form-check-input" 
                            value="{{ $technology->id }}">
                            <label for="technology-{{ $technology->id }}" class="form-check-label">
                                {{ $technology->title }}
                            </label>
                        </div>
                    @endforeach
                </div>
                @error('technology')
                    <div class="alert alert-danger">
                        {{ $message }}
                    </div>
                @enderror
            </div>

            <div>
                <button type="submit" class="btn my-badge text-white w-100 fw-bolder">
                    Update
                </button>
            </div>
        </form>
    </div>
</div>
@endsection