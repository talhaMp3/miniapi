<x-app-layout>
    <div class="container-fluid feature bg-light py-5">
        <div class="container py-5">
            <div class="text-center mx-auto pb-5 wow fadeInUp" data-wow-delay="0.2s" style="max-width: 800px;">
                <h1 class="display-4 mb-4">Country Information</h1>
                <p class="mb-0">Enter a country name to retrieve its details, including capital, population, area, and more!</p>
            </div>

            @if(session('error'))
                <div class="alert alert-danger">{{ session('error') }}</div>
            @endif

            <form action="{{ route('country.search') }}" method="GET" class="mb-4">
                <div class="input-group">
                    <input type="text" name="country" class="form-control" placeholder="Enter country name" required>
                    <div class="input-group-append">
                        <button class="btn btn-primary" type="submit">Search</button>
                    </div>
                </div>
            </form>

            <div class="row">
                @if(isset($countries) && count($countries) > 0)
                    @foreach($countries as $country)
                        <div class="col-md-4 mb-4">
                            <div class="card">
                                <img src="{{ $country['flags']['svg'] ?? '' }}" class="card-img-top" alt="{{ $country['name']['common'] }} flag">
                                <div class="card-body">
                                    <h5 class="card-title">{{ $country['name']['common'] }}</h5>
                                    <p class="card-text"><strong>Capital:</strong> {{ $country['capital'][0] ?? 'N/A' }}</p>
                                    <p class="card-text"><strong>Population:</strong> {{ number_format($country['population']) }}</p>
                                    <p class="card-text"><strong>Area:</strong> {{ number_format($country['area']) }} km²</p>
                                    <p class="card-text"><strong>Region:</strong> {{ $country['region'] ?? 'N/A' }}</p>
                                    <p class="card-text"><strong>Subregion:</strong> {{ $country['subregion'] ?? 'N/A' }}</p>
                                    <p class="card-text"><strong>Languages:</strong>
                                        @isset($country['languages'])
                                            @foreach($country['languages'] as $language)
                                                {{ $language }}{{ !$loop->last ? ', ' : '' }}
                                            @endforeach
                                        @endisset 
                                    </p>
                                    @isset($country['currencies'])
                                        <p class="card-text"><strong>Currencies:</strong> 
                                            @foreach($country['currencies'] as $currency)
                                                {{ $currency['name'] }} ({{ $currency['symbol'] }}){{ !$loop->last ? ', ' : '' }}
                                            @endforeach
                                        </p>
                                    @endisset
                                    <p class="card-text"><strong>Timezones:</strong> 
                                        @foreach($country['timezones'] as $timezone)
                                            {{ $timezone }}{{ !$loop->last ? ', ' : '' }}
                                        @endforeach
                                    </p>
                                </div>
                            </div>
                        </div>
                    @endforeach
                @else
                    <p>No country data available at the moment. Please try again later.</p>
                @endif
            </div>
        </div>
    </div>
</x-app-layout>
