<!DOCTYPE html>
<html>

<head>
    <title>Test Connessione Database</title>
</head>

<body>
    <h2>📡 Risultati Test Connessione</h2>

    <ul>
        @foreach ($results as $result)
            <li>{!! $result['status'] !!} - {!! $result['message'] !!}</li>
        @endforeach
    </ul>

    <hr>
    <p>📅 Data e ora: {{ now() }}</p>
    <p><strong>📍 IP Address:</strong> {{ $ipAddress }}</p>
    <p><strong>🖥️ Browser:</strong> {{ $browser }}</p>

    <p>🔍 Questo test è stato eseguito automaticamente per verificare la connessione ai database.</p>
</body>

</html>
