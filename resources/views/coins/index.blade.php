<x-app-layout>
    <div class="container-fluid feature bg-light py-5">
        <div class="container py-5">
            <div class="text-center mx-auto pb-5 wow fadeInUp" data-wow-delay="0.2s" style="max-width: 800px;">
                <h1 class="display-4 mb-4">Cryptocurrency List</h1>
                <p class="mb-0">Discover the latest information on various cryptocurrencies, including their names, asset IDs, and current prices in USD.</p>
            </div>

            @if(isset($error))
                <div class="alert alert-danger">{{ $error }}</div>
            @endif

            @if(isset($coins) && count($coins) > 0)
                <table class="table table-bordered mt-4">
                    <thead>
                        <tr>
                            <th>Name</th>
                            <th>Asset ID</th>
                            <th>Price ($)</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($coins as $coin)
                            <tr>
                                <td>{{ $coin['name'] }}</td>
                                <td>{{ $coin['asset_id'] }}</td>
                                <td>${{ number_format($coin['price_usd'] ?? 0, 2) }}</td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>

                <div class="d-flex justify-content-center">
                    {{ $coins->links() }}
                </div>
            @else
                <p class="text-center mt-4">No coin data available at the moment. Please try again later.</p>
            @endif
        </div>
    </div>
</x-app-layout>
