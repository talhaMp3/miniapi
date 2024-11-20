<x-app-layout>
    <div class="container-fluid feature bg-light py-5">
        <div class="text-center mx-auto pb-5 wow fadeInUp" data-wow-delay="0.2s" style="max-width: 800px;">
            <h1 class="text-center">Postal Code Lookup</h1>
            <p><strong>API Information:</strong> This application uses a postal code lookup API to retrieve location data based on the provided postal code and country code.</p>

            <form action="{{ route('zipcode.search') }}" method="GET">
                <div class="form-group">
                    <input type="text" name="country" class="form-control" placeholder="Country Code (e.g., IN for India)" required>
                    <input type="text" name="postalcode" class="form-control mt-2" placeholder="Postal Code (e.g., 394601)" required>
                </div>
                <button type="submit" class="btn btn-primary">Lookup</button>
            </form>

            @if(isset($location))
                <div class="mt-4">
                    <div class="card">
                        <div class="card-body">
                            <h3 class="card-title">Location Data</h3>
                            <p class="card-text"><strong>Country:</strong> {{ $location['countryCode'] }}</p>
                            <p class="card-text"><strong>State:</strong> {{ $location['adminName1'] }}</p>
                            <p class="card-text"><strong>City:</strong> {{ $location['placeName'] }}</p>
                            <p class="card-text"><strong>Latitude:</strong> {{ $location['lat'] }}</p>
                            <p class="card-text"><strong>Longitude:</strong> {{ $location['lng'] }}</p>
                        </div>
                    </div>
                </div>
            @elseif(isset($error))
                <div class="alert alert-danger mt-4">{{ $error }}</div>
            @endif
        </div>
    </div>
</x-app-layout>
