<x-app-layout>
    <div class="container-fluid feature bg-light py-5">
        <div class="text-center mx-auto pb-5 wow fadeInUp" data-wow-delay="0.2s" style="max-width: 800px;">
        <h1 class="text-center">Gender Prediction</h1>
<p><strong>API Information:</strong> This application uses a gender prediction API that analyzes the name you provide and returns the predicted gender along with the probability of accuracy.</p>
        @if (isset($error))
            <div class="alert alert-danger">{{ $error }}</div>
        @endif

        <form action="/genderize" method="GET" class="mb-4">
            <div class="input-group">
                <input type="text" name="name" class="form-control" placeholder="Enter a name" required>
                <div class="input-group-append">
                    <button class="btn btn-primary" type="submit">Get Gender</button>
                </div>
            </div>
        </form>

        @if (isset($gender))
            <div class="card mb-4">
                <div class="card-body">
                    <h2 class="card-title">Results for "{{ $name }}"</h2>
                    <p class="card-text"><strong>Gender:</strong> {{ $gender }}</p>
                    <p class="card-text"><strong>Probability:</strong> {{ number_format($probability * 100, 2) }}%</p>
                </div>
            </div>
        @endif

       
    </div>
    </div>
</x-app-layout>
