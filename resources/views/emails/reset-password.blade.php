<!DOCTYPE html>
<html lang="it">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Reimposta la tua password</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            line-height: 1.6;
            background-color: #f4f4f4;
            padding: 20px;
        }

        .container {
            max-width: 600px;
            margin: 0 auto;
            background: #fff;
            padding: 20px;
            border-radius: 10px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }

        .button {
            display: inline-block;
            background: #3498db;
            color: white;
            padding: 10px 20px;
            text-decoration: none;
            border-radius: 5px;
            margin-top: 20px;
        }

        .footer {
            margin-top: 20px;
            font-size: 12px;
            color: #555;
        }
    </style>
</head>

<body>
    <div class="container">
        <h2>Ciao {{ $name }}!</h2>
        <p>Hai richiesto di reimpostare la tua password su <strong>aws-s3-six.vercel.app</strong>.</p>
        <p>Clicca sul pulsante qui sotto per scegliere una nuova password:</p>
        <p>
            <a href="{{ $actionUrl }}" class="button">Resetta la Password</a>
        </p>
        <p>Se non hai richiesto questa email, puoi ignorarla.</p>
        <p class="footer">A presto,<br> <strong>Il Team di Sestapertica</strong></p>
        <p>Se hai problemi a cliccare il pulsante "Resetta la Password", copia e incolla il seguente URL nel tuo
            browser:</p>
        <p><a href="{{ $actionUrl }}">{{ $actionUrl }}</a></p>
    </div>
</body>

</html>
