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
                    {{ __('Register-Auth') }}
                </div>
                <div class="card-body text-white">

                    @if (session('success'))
                        <div class="alert alert-success text-center">
                            {{ session('success') }}
                        </div>
                    @endif

                    @if ($errors->any())
                        <div class="alert alert-danger">
                            <ul>
                                @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                            <button class="btn btn-danger btn-sm mt-2" onclick="clearErrors()">Clear Errors</button>
                        </div>
                    @endif

                    <form action="{{ route('registerUser') }}" method="POST">
                        @csrf
                        <div class="mb-3">
                            <label class="text-white" for="name">Nome</label>
                            <input type="text" class="form-control bg-dark border-light text-white" id="name"
                                name="name" value="{{ old('name') }}">
                        </div>
                        <div class="mb-3">
                            <label class="text-white" for="email">Email</label>
                            <input type="email" class="form-control bg-dark border-light text-white" id="email"
                                name="email" value="{{ old('email') }}">
                        </div>
                        <div class="mb-3">
                            <label class="text-white" for="password">Password</label>
                            <input type="password" class="form-control bg-dark border-light text-white" id="password"
                                name="password">
                        </div>
                        <div class="mb-3">
                            <label class="text-white" for="password_confirmation">Conferma Password</label>
                            <input type="password" class="form-control bg-dark border-light text-white"
                                id="password_confirmation" name="password_confirmation">
                        </div>

                        <div class="d-flex justify-content-between">
                            <button class="btn btn-primary" type="submit">Registrati</button>
                            <a href="{{ url('/') }}" class="btn btn-secondary">Home</a>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <script>
        function clearErrors() {
            location.reload(); // Ricarica la pagina per pulire gli errori
        }
    </script>

@endsection
