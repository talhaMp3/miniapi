<!DOCTYPE html>
<html>
<head>
    <title>Dictionary Word Data</title>
</head>
<body>
    <h1>Word: {{ $wordData[0]['word'] }}</h1>
    @foreach ($wordData[0]['meanings'] as $meaning)
        <h2>Part of Speech: {{ $meaning['partOfSpeech'] }}</h2>
        @foreach ($meaning['definitions'] as $definition)
            <p>Definition: {{ $definition['definition'] }}</p>
            @if (isset($definition['example']))
                <p>Example: {{ $definition['example'] }}</p>
            @endif
        @endforeach
    @endforeach
    <a href="{{ url('/dictionary') }}">Search another word</a>
</body>
</html>
