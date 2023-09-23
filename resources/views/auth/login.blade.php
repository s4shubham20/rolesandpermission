@extends('layouts.app')

@section('content')
@php
    // $setting = DB::table('settings')->first();
@endphp
<div class="auth-wrapper authentication-signin bg-primary ">
    <div class="auth-content">
        <div class="row align-items-center justify-content-center text-start">
            <div class="col-xl-4 col-lg-8 col-md-10">
                <div class="card mb-0">
                    <div class="card-body">
                        <div class="border p-4 rounded">
                            <div class="text-center">
                                <img src="{{ $setting->logo ?? "" }}" alt="{{ $setting->logo_alt ?? ""}}"  width="200"/>
                                <h3>{{ __('Login') }}</h3>
                            </div>
                            <form method="POST" action="{{ route('login') }}">
                                @csrf
                                <div class="row mt-4 justify-content-center">
                                    <div class="col-lg-10">
                                        <div class="form-group mb-3">
                                            <label class="form-label">Enter Email address</label>
                                            <input type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" autocomplete="email" autofocus placeholder="Email Address"/>
                                            @error('email')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                        </div>
                                        <div class="form-group mb-3">
                                            <label class="form-label">Enter Password</label>
                                            <input type="password" class="form-control @error('password') is-invalid @enderror" name="password" autocomplete="current-password" placeholder="Password"/>
                                            @error('password')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                        </div>
                                        <div class="d-grid">
                                            <button class="btn btn-primary btn-block mt-2">
                                                Log In
                                            </button>
                                        </div>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
