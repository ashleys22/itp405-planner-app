@extends('layouts.main')

@section('title', 'Login')

@section('content')

<div class="d-flex justify-content-center container">
    <div class="col-md-8">        
        <div class="card">
            @if (session('error'))
                <div class="alert alert-danger message" role="alert">
                    {{ session('error') }}
                </div>
            @endif 
            <div class="card-header">
                <div class="font-size-lg font-weight-normal"><i class="fa fa-tasks"></i>&nbsp;&nbsp;Login</div>
            </div>
            <div class="scroll-area-sm">
                <div class="w-75 pt-4 mx-auto">
                    <p>Don't have an account? Please <a href="{{ route('registration.index') }}">register</a>.</p>
                    <form method="post" action="{{ route('auth.login') }}">
                        @csrf
                        <div class="mb-3">
                            <label class="form-label" for="username">Username</label>
                            <input type="text" id="username" name="username" class="form-control">
                        </div>
                        <div class="mb-3">
                            <label class="form-label" for="password">Password</label>
                            <input type="password" id="password" name="password" class="form-control">
                        </div>
                        <input type="submit" value="Login" class="btn btn-primary">
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection