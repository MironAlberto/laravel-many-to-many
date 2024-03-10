@extends('layouts.app')

@section('page-title', 'My Types')

@section('main-content')
    <div class="row">
        <div class="col">
            <div class="card my-background border-0">
                <div class="card-body my-background">
                    <h1 class="text-center text-light pb-4">
                        My Types
                    </h1>

                    <div>
                        <table class="table">
                            <thead>
                                <tr>
                                    <th scope="col">#</th>
                                    <th scope="col">Title</th>
                                    <th scope="col" colspan="2" class="text-center">Actions</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($types as $type)
                                    <tr>
                                        <th scope="row">{{ $type->id }}</th>
                                        <td>{{ $type->title }}</td>
                                        <td>
                                            <a href="{{ route('admin.types.show', ['type' => $type->id]) }}" class="btn btn-xs my-badge text-white fw-bolder w-100">
                                                Show
                                            </a>
                                        </td>
                                        <td>
                                            <a href="{{ route('admin.types.edit', ['type' => $type->id]) }}" class="btn my-badge text-white fw-bolder w-100">
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