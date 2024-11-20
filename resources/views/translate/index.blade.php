<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Translate</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
</head>
<body class="container mt-5">
    <h1>Translation Service</h1>
    
<form action="/translate" method="POST">
    @csrf
    <div class="form-group">
        <label for="text">Text to Translate</label>
        <textarea class="form-control" id="text" name="text" required>If you follow these steps and ensure that your API key has the right permissions and that the Cloud Translation API is enabled with an active billing account, you should be able to resolve</textarea>
    </div>
    <div class="form-group">
        <label for="target_language">Target Language (e.g., 'es' for Spanish)</label>
        <input type="text" class="form-control" value="es" id="target_language" name="target_language" required>
    </div>
    <button type="submit" class="btn btn-primary">Translate</button>
</form>

    @if (isset($translatedText))
        <div class="mt-4">
            <h5>Translation:</h5>
            <p>{{ $translatedText }}</p>
        </div>
    @endif

    @if ($errors->any())
        <div class="alert alert-danger mt-4">
            {{ $errors->first() }}
        </div>
    @endif
</body>
</html>
