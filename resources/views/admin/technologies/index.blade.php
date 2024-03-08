@extends('layouts.app')

@section('page-title', 'My Technologies')

@section('main-content')
    <div class="row">
        <div class="col">
            <div class="card text-bg-dark">
                <div class="card-body">
                    <h1 class="text-center text-light">
                        My Technologies
                    </h1>

                    <div>
                        <table class="table table-dark">
                            <thead>
                                <tr>
                                    <th scope="col">#</th>
                                    <th scope="col">Title</th>
                                    <th scope="col" colspan="2" class="text-center">Actions</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($technologies as $technology)
                                    <tr>
                                        <th scope="row">{{ $technology->id }}</th>
                                        <td>{{ $technology->title }}</td>
                                        <td>
                                            <a href="{{ route('admin.technologies.show', ['technology' => $technology->id]) }}" class="btn btn-xs btn-light text-dark fw-bolder w-100">
                                                Show
                                            </a>
                                        </td>
                                        <td>
                                            <a href="{{ route('admin.technologies.edit', ['technology' => $technology->id]) }}" class="btn btn-secondary fw-bolder text-white w-100">
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