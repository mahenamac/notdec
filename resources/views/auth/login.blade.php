@extends('layouts.log')

@section('content')
<div class="container">
    <div class="col-md-6 mx-auto">
        <div class="card o-hidden border-0 shadow my-5">
            <div class="card-body p-0">
                <div class="row justify-content-center">
                    <div class="col-lg-12">
                        <div class="p-5">
                            <form method="POST" action="{{ route('login') }}" autocomplete="off" class="user">
                                @csrf
                                <div class="form-group">
                                    <input name="email" type="email" class="form-control @error('email') is-invalid @enderror form-control-user" id="exampleInputEmail" aria-describedby="emailHelp" placeholder="Enter Email Address..." value="{{ old('email') }}">
                                    @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                                <div class="form-group">
                                    <input id="password" type="password" class="form-control @error('password') is-invalid @enderror form-control-user" name="password">
                                    @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                                <div class="form-group">
                                    <div class="custom-control custom-checkbox small">
                                        <input type="checkbox" class="custom-control-input" id="customCheck">
                                        <label class="custom-control-label" for="customCheck">Remember Me</label>
                                    </div>
                                </div>
                                <button type="submit" class="btn btn-success btn-user btn-block">Login</button>
                            </form>
                            <hr>
                            <div class="text-center">
                                @if (Route::has('password.request'))
                                <a class="d-block small" href="{{ route('password.request') }}"> {{ __('Forgot Password?') }}</a>
                                @endif
                              </div>
                        </div>
                  </div>

        </div>
      </div>
@endsection
