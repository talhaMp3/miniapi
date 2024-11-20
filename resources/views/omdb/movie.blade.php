<x-app-layout>
    <div class="container-fluid feature bg-light py-5">
        <div class="text-center mx-auto pb-5 wow fadeInUp" data-wow-delay="0.2s" style="max-width: 800px;">
            <h1 class="text-center">Movie Search</h1>
            <p><strong>API Information:</strong> This application uses the OMDb API to retrieve movie details based on the title you provide.</p>

            <form action="/omdb" method="GET" class="mb-4">
                <div class="input-group">
                    <input type="text" name="title" class="form-control" placeholder="Enter movie title" required>
                    <div class="input-group-append">
                        <button class="btn btn-primary" type="submit">Search</button>
                    </div>
                </div>
            </form>

            @if(isset($error))
                <div class="alert alert-danger">{{ $error }}</div>
            @elseif(isset($movie))
                <center>
                    @isset($movie['Poster'])
                        <img src="{{ $movie['Poster'] }}" alt="Poster" width="350px">
                    @endisset
                </center>
                <div class="card mb-4">
                    <div class="card-body">
                        <h2 class="card-title">{{ $movie['Title'] }}</h2>
                        <p class="card-text"><strong>Year:</strong> {{ $movie['Year'] }}</p>
                        <p class="card-text"><strong>Rated:</strong> {{ $movie['Rated'] }}</p>
                        <p class="card-text"><strong>Released:</strong> {{ $movie['Released'] }}</p>
                        <p class="card-text"><strong>Runtime:</strong> {{ $movie['Runtime'] }}</p>
                        <p class="card-text"><strong>Genre:</strong> {{ $movie['Genre'] }}</p>
                        <p class="card-text"><strong>Director:</strong> {{ $movie['Director'] }}</p>
                        <p class="card-text"><strong>Writer:</strong> {{ $movie['Writer'] }}</p>
                        <p class="card-text"><strong>Actors:</strong> {{ $movie['Actors'] }}</p>
                        <p class="card-text"><strong>Language:</strong> {{ $movie['Language'] }}</p>
                        <p class="card-text"><strong>Country:</strong> {{ $movie['Country'] }}</p>
                        <p class="card-text"><strong>Awards:</strong> {{ $movie['Awards'] }}</p>
                        <p class="card-text"><strong>Plot:</strong> {{ $movie['Plot'] }}</p>
                        <p class="card-text"><strong>IMDb Rating:</strong> {{ $movie['imdbRating'] }} ({{ $movie['imdbVotes'] }} votes)</p>
                        <p class="card-text"><strong>Box Office:</strong> {{ $movie['BoxOffice'] }}</p>
                    </div>
                    <div class="card-footer">
                        <small class="text-muted">Source: OMDb API</small>
                    </div>
                </div>
            @else
                <p>No movie data available. Please try again.</p>
            @endif
        </div>
    </div>
</x-app-layout>
