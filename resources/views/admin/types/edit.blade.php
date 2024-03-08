@extends('layouts.app')

@section('page-title', 'Edit '.$type->title)

@section('main-content')
<div class="d-flex justify-content-end pt-3">
    <a href="{{ route('admin.types.index') }}" class="btn btn-dark fw-bolder">
        <- Return to your types
    </a>
</div>
<h1>
    Edit {{ $type->title }}
</h1>

<div class="row">
    <div class="col py-4">
        {{-- reindirizzamento ad update, ricordarsi di usare method PUT --}}
        <form action="{{ route('admin.types.update', ['type' => $type->id]) }}" method="POST"> 
            @csrf

            {{-- grazie a blade, utilizzo il method PUT - altrimenti ritornerei a store --}}
            @method('PUT')

            <div class="mb-3">
                <label for="title" class="form-label fw-bolder">Title <span class="text-danger">*</span></label>
                <input value="{{ old('title', $type->title) }}" type="text" class="form-control" @error('title') is-invalid @enderror id="title" name="title" placeholder="Add your updated Type Title..." maxlength="255" required>
                @error('title')
                    <div class="alert alert-danger">
                        {{ $message }}
                    </div>
                @enderror
            </div>

            <div>
                <button type="submit" class="btn btn-dark w-100 fw-bolder">
                    Update
                </button>
            </div>
        </form>
    </div>
</div>
@endsection