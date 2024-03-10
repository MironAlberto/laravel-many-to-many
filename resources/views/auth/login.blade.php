@extends('layouts.guest')

@section('page-title', 'Login')

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
        <form method="POST" action="{{ route('login') }}">
            @csrf

            <!-- Email Address -->
            <div>
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

            <!-- Remember Me -->
            <div class="mt-4">
                <label for="remember_me">
                    <input id="remember_me" type="checkbox" name="remember">
                    <span class="fw-bolder">Remember me</span>
                </label>
            </div>

            <div class="mt-4">
                <button class="btn btn-outline-light fw-bolder" type="submit">
                    Log in
                </button>

                <div class="mt-3 pb-3">
                    @if (Route::has('password.request'))
                        <a href="{{ route('password.request') }}" class="link-light">
                            {{ __('Forgot your password?') }}
                        </a>
                    @endif
                </div>
            </div>
        </form>
    </div>
@endsection
