@extends('layouts.app')

@section('page-title', 'New Technology')

@section('main-content')
<h1>
    Add your new Technology!
</h1>

<div class="row">
    <div class="col py-4">
        <form action="{{ route('admin.technologies.store') }}" method="POST">
            @csrf

            <div class="mb-3">
                <label for="title" class="form-label fw-bolder">Title <span class="text-danger">*</span></label>
                <input value="{{ old('title') }}" type="text" class="form-control" @error('title') is-invalid @enderror id="title" name="title" placeholder="Add your Technology Title..." maxlength="255" required>
                @error('title')
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