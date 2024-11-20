<x-app-layout>
    <div class="container-fluid feature bg-light py-5">
        <div class="text-center mx-auto pb-5 wow fadeInUp" data-wow-delay="0.2s" style="max-width: 800px;">
            <h1 class="text-center">Astronomy Picture of the Day</h1>
            <p><strong>API Information:</strong> This application uses NASA's Astronomy Picture of the Day API to display a different astronomical image or video each day, along with a brief explanation.</p>

            @if(isset($error))
                <div class="alert alert-danger">{{ $error }}</div>
            @endif

            @if(isset($apod))
                <div class="card mb-4">
                    <img src="{{ $apod['url'] }}" class="card-img-top" alt="{{ $apod['title'] }}">
                    <div class="card-body">
                        <h5 class="card-title">{{ $apod['title'] }}</h5>
                        <p class="card-text">{{ $apod['explanation'] }}</p>
                        <p class="card-text"><small class="text-muted">Date: {{ $apod['date'] }}</small></p>
                    </div>
                </div>
            @else
                <p>No data available at the moment. Please try again later.</p>
            @endif
        </div>
    </div>
</x-app-layout>
