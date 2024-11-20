<x-app-layout>
    <div class="container-fluid feature bg-light py-5">
        <div class="text-center mx-auto pb-5 wow fadeInUp" data-wow-delay="0.2s" style="max-width: 800px;">
            <h1 class="display-4 mb-4">Exchange Rates</h1>
            <p class="mb-4">Retrieve real-time exchange rates for various currencies. This API provides accurate and up-to-date information, allowing you to convert between different currencies with ease.</p>
            
            @if (isset($error))
                <div class="alert alert-danger">{{ $error }}</div>
            @endif

            <form action="/exchange-rates" method="GET" class="mb-4">
                <div class="input-group">
                    <input type="text" name="base" class="form-control" placeholder="Enter base currency (e.g., USD)" required>
                    <div class="input-group-append">
                        <button class="btn btn-primary" type="submit">Get Rates</button>
                    </div>
                </div>
            </form>

            @if (isset($exchangeRates))
                <h2>Exchange Rates for {{ $baseCurrency }}</h2>
                <div class="row">
                    @foreach ($exchangeRates as $currency => $rate)
                        <div class="card col-sm-2 m-1">
                            <div class="card-body">
                                <strong>{{ $currency }}</strong>: {{ number_format($rate, 4) }}
                            </div>
                        </div>
                    @endforeach
                </div>
            @endif
        </div>
    </div>
</x-app-layout>
