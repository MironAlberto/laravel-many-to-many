@extends('layouts.app')

@section('page-title', 'New Project')

@section('main-content')
<h1>
    Create your new Project!
</h1>

<div class="row">
    <div class="col py-4">
        <form action="{{ route('admin.projects.store') }}" method="POST">
            @csrf

            <div class="mb-3">
                <label for="url" class="form-label fw-bolder">URL</label>
                <input value="{{ old('url') }}" type="text" class="form-control" @error('url') is-invalid @enderror id="url" name="url" placeholder="Add your Project URL..." maxlength="1024">
                @error('url')
                    <div class="alert alert-danger">
                        {{ $message }}
                    </div>
                @enderror
            </div>

            <div class="mb-3">
                <label for="title" class="form-label fw-bolder">Title <span class="text-danger">*</span></label>
                <input value="{{ old('title') }}" type="text" class="form-control" @error('title') is-invalid @enderror id="title" name="title" placeholder="Add your Project Title..." maxlength="255" required>
                @error('title')
                    <div class="alert alert-danger">
                        {{ $message }}
                    </div>
                @enderror
            </div>

            <div class="mb-3">
                <label for="content" class="form-label fw-bolder">Content</label>
                <textarea class="form-control" @error('content') is-invalid @enderror id="content" name="content" rows="3" maxlength="4000" placeholder="Add your Project Content...">{{ old('content') }}</textarea>
                @error('content')
                    <div class="alert alert-danger">
                        {{ $message }}
                    </div>
                @enderror
            </div>

            <div class="mb-3">
                <label for="type_id" class="form-label fw-bolder">Type</label>
                <select name="type_id" id="type_id" class="form-select" @error('type_id') is-invalid @enderror>
                    <option value="" {{ old('type_id') == null ? 'selected' : '' }}>
                        Select your Programming Type...
                    </option>
                    @foreach ($types as $type)
                        <option value="{{ $type->id }}" {{ old('type_id') == $type->id ? 'selected' : '' }}>
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
                            <input @error('technology') is-invalid @enderror {{ in_array($technology->id, old('technologies', [])) ? 'checked' : '' }} type="checkbox" name="technologies[]" id="technology-{{ $technology->id }}" class="form-check-input" value="{{ $technology->id }}">
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
                <button type="submit" class="btn btn-dark w-100 fw-bolder">
                    + ADD
                </button>
            </div>
        </form>
    </div>
</div>
@endsection