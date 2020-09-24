@extends('layouts.log')

@section('content')
<div class="container">
    <div class="row justify-content-center mt-5">
        <div class="col-md-5">
            <div class="card mx-auto mt-5">
                <div class="card-body">
                    <form method="POST" action="{{ route('password.update') }}" class="user">
                        @csrf
                        <input type="hidden" name="token" value="{{ $token }}">
                        <div class="form-group">
                            <input id="email" type="email" class="form-control @error('email') is-invalid @enderror form-control-user" name="email" value="{{ $email ?? old('email') }}" required autocomplete="email" autofocus>
                                @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                        </div>

                        <div class="form-group">
                            <input id="password" type="password" class="form-control @error('password') is-invalid @enderror form-control-user" name="password" required autocomplete="new-password" placeholder="Password">
                            @error('password')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                        <div class="form-group">
                            <input id="password-confirm" type="password" class="form-control form-control-user" name="password_confirmation" required autocomplete="new-password" placeholder="Confirm Password">
                        </div>

                        <div class="form-group mb-0">
                            <div class="col-md-6 mx-auto">
                                <button type="submit" class="btn btn-success btn-user">
                                    {{ __('Reset Password') }}
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
