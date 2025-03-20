<!DOCTYPE html>
<html lang="it">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Report Test Connessioni</title>
</head>

<body>
    <h2>🖧 Report Test Connessioni</h2>
    <ul>
        @foreach ($results as $result)
            <li><strong>{{ $result['status'] }}</strong> - {!! $result['message'] !!}</li>
        @endforeach
    </ul>
    <p>📅 Data e ora: {{ now() }}</p>
</body>

</html>
