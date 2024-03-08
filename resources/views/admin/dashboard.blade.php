@extends('layouts.app')

@section('page-title', 'Dashboard')

@section('main-content')
    <div class="row">
        <div class="col">
            <div class="card bg-dark">
                <div class="card-body text-center">
                    <h1 class="text-white mb-5">
                        You are logged in!
                    </h1>
                    <h3 class="text-white">
                        This is a private page protected by <span class="text-danger">Middleware</span>
                    </h3>
                </div>
            </div>
        </div>
    </div>
@endsection
