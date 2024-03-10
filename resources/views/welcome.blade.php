@extends('layouts.guest')

@section('page-title', 'Welcome')

@section('main-content')
    <div class="row">
        <div class="col">
            <div class="card my-badge">
                <div class="card-body text-center">
                    <h1 class="text-white mb-5">
                        Welcome to the site!
                    </h1>
                    <h3 class="text-white">
                        Log in or Register to access to your personal <span class="text-danger">Projects</span>!
                    </h3>
                </div>
            </div>
        </div>
    </div>
@endsection
