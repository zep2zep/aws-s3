@extends('layouts.app')

@section('content')
    <div class="d-flex justify-content-center align-items-center container" style="height: 100vh;">
        <!-- Background Image -->
        <img id="background" class="absolute left-0 top-2 h-full w-full object-cover"
            src="{{ Storage::disk('s3')->url('img/background.svg') }}" alt="SS3Laravel background" />

        <div class="row w-100 justify-content-center position-relative" style="z-index: 1;">
            <div class="col-md-8">
                <h2 class="mb-4 text-center text-white">📜 Log Accessi</h2>

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
                        <div style="max-height: 400px; overflow-y: auto;"> <!-- ✅ Aggiunto il contenitore scrollabile -->
                            <table class="table-bordered bg-light table text-center">
                                <thead class="table-dark">
                                    <tr>
                                        <th>ID</th>
                                        <th>Ora di accesso</th>
                                        <th>Indirizzo IP</th>
                                        <th>Browser</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($logs as $log)
                                        <tr>
                                            <td>{{ $log->id }}</td>
                                            <td>{{ $log->timestamp }}</td>
                                            <td>{{ $log->ip_address }}</td>
                                            <td>{{ Str::before($log->browser, '/') }}</td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </div>
@endsection
