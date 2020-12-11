@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-5">
                <div class="card my-5 py-3">
                    <div class="card-title">
                        <h1 class="text-center text-dark">Login Here</h1 class="text-center text-dark">
                            <hr>
                    </div>
                    <div class="card-body">
                        <form class="mt-3 review-form-box" id="formLogin" method="POST" action="{{ route('login') }}">
                            @csrf
                            <div class="form">
                                <div class="form-group">
                                    <label for="InputEmail" class="mb-0">Email Address</label>
                                    <input type="email" class="form-control @error('email') is-invalid @enderror" id="InputEmail" placeholder="Enter Email" required autocomplete="email" autofocus name="email" value="{{ old('email') }}">
                                    @error('email')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                 </div>
                                <div class="form-group">
                                    <label for="InputPassword" class="mb-0">Password</label>
                                    <input type="password" class="form-control @error('password') is-invalid @enderror" id="InputPassword" placeholder="Password" name="password" required autocomplete="current-password">
                                    @error('password')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                                <div class="custom-control custom-checkbox">
                                    <input type="checkbox" class="custom-control-input" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}>
                                    <label class="custom-control-label" for="remember">Remember Me</label>
                                </div>
                            </div>
                            <br>
                            <button type="submit" class="btn hvr-hover">Login</button>
                        </form>
                        <br>
                    <p><a href="{{route('password.request')}}">Forget Password??</a></p>
                    <br>
                    {{-- <div class="py-2 px-5 bg-info text-center">
                        <a href="" class="text-white ">Login With Facebook</a>
                    </div>
                    <div class="mt-3 py-2 px-5 bg-success text-center">
                        <a href="" class="text-white ">Login With Google</a>
                    </div> --}}

                    <p class="text-center">You Have'nt an Account? Please <a href="{{route('register')}}">Register Here</a></p>
                    </div>
                </div>
        </div>
    </div>
</div>
@endsection
