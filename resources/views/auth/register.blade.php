@extends('layouts.guest')

@section('page-title', 'Register')

@section('main-content')
    <div class="text-center my-background-table">
        @if ($errors->any())
            <div class="alert alert-danger">
                <div class="mb-0">
                    @foreach ($errors->all() as $error)
                        <div>
                            {{ $error }}
                        </div>
                    @endforeach
                </div>
            </div>
        @endif
        <form method="POST" action="{{ route('register') }}">
            @csrf
    
            <!-- Name -->
            <div>
                <label for="name" class="fw-bolder">
                    Name
                </label>
                <div>
                    <input type="text" id="name" name="name">
                </div>
            </div>
    
            <!-- Email Address -->
            <div class="mt-4">
                <label for="email" class="fw-bolder">
                    Email
                </label>
                <div>
                    <input type="email" id="email" name="email">
                </div>
            </div>
    
            <!-- Password -->
            <div class="mt-4">
                <label for="password" class="fw-bolder">
                    Password
                </label>
                <div>
                    <input type="password" id="password" name="password">
                </div>
            </div>
    
            <!-- Confirm Password -->
            <div class="mt-4">
                <label for="password_confirmation" class="fw-bolder">
                    Conferma Password
                </label>
                <div>
                    <input type="password" id="password_confirmation" name="password_confirmation">
                </div>
            </div>
    
            <div class="mt-4">
                <button type="submit" class="btn btn-outline-light fw-bolder">
                    Register
                </button>

                <div class="mt-3 pb-3">
                    <a href="{{ route('login') }}" class="link-light">
                        {{ __('Already registered?') }}
                    </a>
                </div>
            </div>
        </form>
    </div>
@endsection
