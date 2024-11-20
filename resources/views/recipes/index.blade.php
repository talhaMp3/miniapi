<x-app-layout>
    <div class="container-fluid feature bg-light py-5">
        <div class="text-center mx-auto pb-5 wow fadeInUp" data-wow-delay="0.2s" style="max-width: 800px;">
            <h1 class="text-center">Recipe Search</h1>
            <p><strong>API Information:</strong> This application uses a recipe search API to find recipes based on the ingredients you provide.</p>

            @if(isset($error))
                <div class="alert alert-danger">{{ $error }}</div>
            @endif

            <form action="/recipes" method="GET" class="mb-4">
                <div class="input-group">
                    <input type="text" name="ingredients" class="form-control" placeholder="Enter ingredients (comma-separated)" required>
                    <div class="input-group-append">
                        <button class="btn btn-primary" type="submit">Search</button>
                    </div>
                </div>
            </form>

            @if(isset($recipes) && count($recipes) > 0)
                <h2>Recipes with "{{ $ingredients }}"</h2>
                <div class="row">
                    @foreach($recipes as $recipe)
                        <div class="col-md-4 mb-4">
                            <div class="card">
                                <img src="{{ $recipe['image'] }}" class="card-img-top" alt="{{ $recipe['title'] }}">
                                <div class="card-body">
                                    <h5 class="card-title">{{ $recipe['title'] }}</h5>
                                    <p class="card-text"><strong>Used Ingredients:</strong></p>
                                    <ul>
                                        @foreach($recipe['usedIngredients'] as $ingredient)
                                            <li>{{ $ingredient['amount'] }} {{ $ingredient['unit'] }} {{ $ingredient['name'] }}</li>
                                        @endforeach
                                    </ul>

                                    <p class="card-text"><strong>Missed Ingredients:</strong></p>
                                    <ul>
                                        @foreach($recipe['missedIngredients'] as $ingredient)
                                            <li>{{ $ingredient['amount'] }} {{ $ingredient['unit'] }} {{ $ingredient['name'] }}</li>
                                        @endforeach
                                    </ul>

                                    <p class="card-text"><strong>Likes:</strong> {{ $recipe['likes'] }}</p>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>
            @else
                <p>No recipes found. Please try again with different ingredients.</p>
            @endif
        </div>
    </div>
</x-app-layout>
