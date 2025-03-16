@extends('layouts.app')

@section('content')
    <style>
        html,
        body {
            height: 100%;
            margin: 0;
            padding: 0;
            overflow: hidden;
            /* Evita lo scroll non voluto */
        }

        #background {
            position: fixed;
            top: 0;
            left: 0;
            width: 100vw;
            height: 100vh;
            object-fit: cover;
            z-index: -1;
            /* Manda l'immagine dietro i contenuti */
        }

        .btn-link.text-white {
            color: white !important;
            text-decoration: none;
        }

        .btn-link.text-white:hover {
            color: red !important;
            text-decoration: underline;
        }
    </style>


    <!-- Sfondo -->
    <img id="background" src="{{ Storage::disk('s3')->url('img/background.svg') }}" alt="SS3Laravel background">

    <!-- Contenitore centrato -->
    <div class="h-100 d-flex align-items-center justify-content-center container">
        <div class="col-md-6">
            <div class="card border-primary mt-4 border-2 bg-transparent">
                <div class="card-header mt-4 border-0 text-center text-white">
                    {{ __('Login-Auth') }}
                </div>
                <div class="card-body text-white">
                    <form method="POST" action="{{ route('login') }}">
                        @csrf

                        <div class="row mb-3">
                            <label for="email" class="col-md-4 col-form-label text-md-end text-white">
                                {{ __('Email Address') }}
                            </label>
                            <div class="col-md-6">
                                <input id="email" type="email"
                                    class="form-control bg-dark border-light @error('email') is-invalid @enderror text-white"
                                    name="email" value="{{ old('email') }}" required autocomplete="email" autofocus>
                                @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="row mb-3">
                            <label for="password" class="col-md-4 col-form-label text-md-end text-white">
                                {{ __('Password') }}
                            </label>
                            <div class="col-md-6">
                                <input id="password" type="password"
                                    class="form-control bg-dark border-light @error('password') is-invalid @enderror text-white"
                                    name="password" required autocomplete="current-password">
                                @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="row mb-3">
                            <div class="col-md-6 offset-md-4">
                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox" name="remember" id="remember"
                                        {{ old('remember') ? 'checked' : '' }}>
                                    <label class="form-check-label text-white" for="remember">
                                        {{ __('Remember Me') }}
                                    </label>
                                </div>

                            </div>
                        </div>

                        <div class="row mb-0">
                            <div class="col-md-6">
                                <button type="submit" class="btn btn-primary w-50">
                                    {{ __('Login') }}
                                </button>
                            </div>
                            <div class="col-md-6 text-end">
                                @if (Route::has('password.request'))
                                    <a class="btn btn-link text-white" href="{{ route('password.request') }}">
                                        {{ __('Forgot Your Password?') }}
                                    </a>
                                @endif
                            </div>
                        </div>

                    </form>
                </div>
            </div>

        </div>
    </div>
    </div>
@endsection
