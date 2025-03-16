@extends('layouts.app')

@section('content')
    <div class="d-flex justify-content-center align-items-center container" style="height: 100vh;">
        <!-- Background Image -->
        <img id="background" class="absolute left-0 top-2 h-full w-full object-cover"
            src="{{ Storage::disk('s3')->url('img/background.svg') }}" alt="SS3Laravel background" />

        <div class="row w-100 justify-content-center position-relative" style="z-index: 1;">
            <div class="col-md-8">
                <h2 class="mb-4 text-center text-white">📜 Log Accessi</h2>

                <!-- Messaggi di Successo / Errore -->
                @if (session('success'))
                    <div class="alert alert-success text-center">{{ session('success') }}</div>
                @endif
                @if (session('error'))
                    <div class="alert alert-danger text-center">{{ session('error') }}</div>
                @endif

                <!-- Pulsante Reset con Spaziatura -->
                <div class="mb-3 text-center">
                    <form action="{{ url('reset.log') }}" method="POST">
                        @csrf
                        <button type="submit" class="btn btn-danger btn-lg px-4 py-2">🔄 Reset Log Accessi</button>
                    </form>
                </div>

                <!-- Tabella Log Accessi -->
                <div class="card opacity-75 shadow-lg">
                    <div class="card-body">
                        <table class="table-bordered bg-light table text-center">
                            <thead class="table-dark">
                                <tr>
                                    <th>ID</th>
                                    <th>Orario di accesso</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($logs as $log)
                                    <tr>
                                        <td>{{ $log->id }}</td>
                                        <td>{{ $log->timestamp }}</td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>

            </div>
        </div>
    </div>
@endsection
