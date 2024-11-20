<x-app-layout>
    <div class="container-fluid feature bg-light py-5">
        <div class="text-center mx-auto pb-5 wow fadeInUp" data-wow-delay="0.2s" style="max-width: 800px;">
            <h1 class="text-center">Search Unsplash Photos</h1>
            <p><strong>API Information:</strong> This application uses the Unsplash API to search for photos based on your query.</p>

            <form action="{{ route('photos.search') }}" method="GET">
                <div class="form-group">
                    <input type="text" name="query" class="form-control" placeholder="Search for photos" required>
                </div>
                <button type="submit" class="btn btn-primary">Search</button>
            </form>

            @if(isset($photos))
                <div class="row mt-4">
                    @foreach($photos as $photo)
                        <div class="col-md-3 mb-4">
                            <div class="card">
                                <img src="{{ $photo['urls']['small'] }}" class="card-img-top" alt="{{ $photo['alt_description'] }}">
                                <div class="card-body">
                                    <p class="card-text">By: {{ $photo['user']['name'] }}</p>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>
            @elseif(isset($error))
                <div class="alert alert-danger mt-4">{{ $error }}</div>
            @endif
        </div>
    </div>
</x-app-layout>
