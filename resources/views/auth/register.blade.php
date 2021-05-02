@extends('layouts.main')

@section('title', 'Register')

@section('content')

<div class="d-flex justify-content-center container">
    <div class="col-md-8">          
        <div class="card">
            <div class="card-header">
                <div class="font-size-lg font-weight-normal"><i class="fa fa-tasks"></i>&nbsp;&nbsp;Register</div>
            </div>
            <div class="scroll-area-sm">
                <div class="w-75 pt-4 mx-auto">
                    <p>Already have an account? Please <a href="{{ route('auth.loginForm') }}">login</a>.</p>
                    <form method="post" action="{{ route('registration.create') }}">
                        @csrf
                        <div class="mb-2">
                            <label class="form-label" for="username">Username</label>
                            <input type="text" id="username" name="username" class="form-control" value="{{ old('username') }}">
                            @error('username')
                                <small class="text-danger"> {{ $message }} </small> 
                            @enderror
                        </div>
                        <div class="mb-2">
                            <label class="form-label" for="password">Password</label>
                            <input type="password" id="password" name="password" class="form-control">
                            @error('password')
                                <small class="text-danger"> {{ $message }} </small> 
                            @enderror
                        </div>
                        <div class="mb-2">
                            <label class="form-label" for="confirm-password">Confirm Password</label>
                            <input type="password" id="confirm-password" name="confirm-password" class="form-control">
                            @error('confirm-password')
                                <small class="text-danger"> {{ $message }} </small> 
                            @enderror
                        </div>
                        <input type="submit" value="Register" class="btn btn-primary">
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
    
@endsection