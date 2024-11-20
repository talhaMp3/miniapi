<x-app-layout>
    <div class="container-fluid feature bg-light py-5">
        <div class="container py-5">
            <div class="text-center mx-auto pb-5 wow fadeInUp" data-wow-delay="0.2s" style="max-width: 800px;">
                <h1 class="display-4 mb-4">Celebrity Search</h1>
                <p class="mb-0">Find detailed information about your favorite celebrities, including net worth, gender, nationality, occupation, and more!</p>
            </div>

            @if(isset($error))
                <div class="alert alert-danger">{{ $error }}</div>
            @endif

            <form action="/celebrities" method="GET" class="mb-4">
                <div class="input-group">
                    <input type="text" name="name" class="form-control" placeholder="Enter celebrity name" required>
                    <div class="input-group-append">
                        <button class="btn btn-primary" type="submit">Search</button>
                    </div>
                </div>
            </form>

            @if(isset($celebrities) && count($celebrities) > 0)
                <h2 class="text-center">Celebrity Results</h2>
                <div class="card mt-4">
                    <div class="card-body">
                        <h5 class="card-title">{{ $celebrities[0]['name'] }}</h5>
                        <p><strong>Net Worth:</strong> ${{ number_format($celebrities[0]['net_worth']) }}</p>
                        <p><strong>Gender:</strong> {{ ucfirst($celebrities[0]['gender']) }}</p>
                        <p><strong>Nationality:</strong> {{ strtoupper($celebrities[0]['nationality']) }}</p>
                        <p><strong>Occupation:</strong> {{ implode(', ', $celebrities[0]['occupation']) }}</p>
                        <p><strong>Height:</strong> {{ $celebrities[0]['height'] }} m</p>
                        <p><strong>Birthday:</strong> {{ $celebrities[0]['birthday'] }}</p>
                        <p><strong>Age:</strong> {{ $celebrities[0]['age'] }} years</p>
                        <p><strong>Status:</strong> {{ $celebrities[0]['is_alive'] ? 'Alive' : 'Deceased' }}</p>
                    </div>
                </div>
            @else
                <p class="text-center mt-4">No celebrities found. Please try again with a different name.</p>
            @endif
        </div>
    </div>
</x-app-layout>
