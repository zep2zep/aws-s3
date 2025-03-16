@extends('layouts.app')

@section('content')
    <div class="d-flex justify-content-center align-items-center container" style="height: 100vh;">
        <!-- Background Image -->
        <img id="background" class="absolute left-0 top-2 h-full w-full object-cover"
            src="{{ Storage::disk('s3')->url('img/background.svg') }}" alt="SS3Laravel background" />

        <div class="row w-100 justify-content-center position-relative" style="z-index: 1;">
            <div class="col-md-6">
                <h2 class="mb-4 text-center text-white">🔍 Test Connessione ai Database</h2>

                <!-- Messaggi di Successo / Errore -->
                @if (session('success'))
                    <div class="alert alert-success text-center">{{ session('success') }}</div>
                @endif
                @if (session('error'))
                    <div class="alert alert-danger text-center">{{ session('error') }}</div>
                @endif

                <!-- Card per Database PRIMARIO -->
                <div class="card mb-3 opacity-75 shadow-lg">
                    <div class="card-body text-center">
                        <h4 class="mb-3">Database PRIMARIO</h4>
                        @foreach ($results as $result)
                            @if (str_contains($result['message'], 'PRIMARIO'))
                                <p
                                    class="{{ $result['status'] === '✅ Connessione riuscita' ? 'text-success fw-bold' : 'text-danger fw-bold' }}">
                                    {!! $result['message'] !!}
                                </p>
                            @endif
                        @endforeach
                    </div>
                </div>

                <!-- Card per Database SECONDARIO -->
                <div class="card opacity-75 shadow-lg">
                    <div class="card-body text-center">
                        <h4 class="mb-3">Database SECONDARIO</h4>
                        @foreach ($results as $result)
                            @if (str_contains($result['message'], 'SECONDARIO'))
                                <p
                                    class="{{ $result['status'] === '✅ Connessione riuscita' ? 'text-success fw-bold' : 'text-danger fw-bold' }}">
                                    {!! $result['message'] !!}
                                </p>
                            @endif
                        @endforeach
                    </div>
                </div>

            </div>
        </div>
    </div>
@endsection
