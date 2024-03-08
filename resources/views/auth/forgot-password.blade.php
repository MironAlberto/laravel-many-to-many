@extends('layouts.guest')

@section('main-content')
    <div class="text-center">
        <div class="fw-bolder mb-4">
            {{ __('Forgot your password? No problem. Just let us know your email address and we will email you a password reset link that will allow you to choose a new one.') }}
        </div>
    
        <form method="POST" action="{{ route('password.email') }}">
            @csrf
    
            <!-- Email Address -->
            <div class="mb-4">
                <label for="email" class="fw-bolder">
                    Email
                </label>
                <div>
                    <input type="email" id="email" name="email">
                </div>
            </div>
    
            <div>
                <button type="submit" class="btn btn-outline-light fw-bolder">
                    Email Password Reset Link
                </button>
            </div>
        </form>
    </div>
@endsection
