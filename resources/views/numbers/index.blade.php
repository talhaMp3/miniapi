<x-app-layout>
    <div class="container-fluid feature bg-light py-5">
        <div class="text-center mx-auto pb-5 wow fadeInUp" data-wow-delay="0.2s" style="max-width: 800px;">
            <h1 class="text-center">Get a Number Fact</h1>
            <p><strong>API Information:</strong> This application uses a number fact API that provides interesting facts about numbers, including random facts, date-related facts, and mathematical facts.</p>

            <form action="/number-fact" method="GET" class="text-center mb-4">
                <input type="number" name="number" placeholder="Enter a number" required>
                <select name="type" required>
                    <option value="random">Random Fact</option>
                    <option value="date">Date Fact</option>
                    <option value="math">Math Fact</option>
                </select>
                <button type="submit" class="btn btn-primary">Get Fact</button>
            </form>

            @if (isset($fact))
                <div class="card mb-4">
                    <div class="card-body">
                        <h2 class="card-title">Fact about {{ $number }}:</h2>
                        <p class="card-text">{{ $fact }}</p>
                    </div>
                </div>
            @elseif (session('error'))
                <h2 class="text-center text-danger">{{ session('error') }}</h2>
            @endif
        </div>
    </div>
</x-app-layout>
