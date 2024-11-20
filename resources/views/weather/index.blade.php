<x-app-layout>




<div class="container-fluid contact bg-light py-5">
    <div class="container py-5">
        <div class="text-center mx-auto pb-5 wow fadeInUp" data-wow-delay="0.2s">
            <h4 class="text-primary">Weather Information</h4>
        </div>
        <div class="row g-5">

            <div class="col-xl-12 wow fadeInLeft" data-wow-delay="0.4s">
                <div>
                    <form action="/weather" method="GET">
                        <div class="row g-3">
                            <div class="col-lg-12 col-xl-12">
                                <div class="form-floating">
                                    <input type="text" class="form-control border-0"
                                        placeholder="Enter city name" id="word" name="city" required>
                                    <label for="word">Enter city name</label>
                                </div>
                            </div>

                            <div class="col-12">
                                <button class="btn btn-primary w-100 py-3">Submit</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>

            @if (isset($weatherData))
                <div class="col-xl-12 wow card fadeInRight" data-wow-delay="0.2s">
                    <div class="card-header bg-white">
                        <h4 class="mt-2">Weather in {{ $weatherData['name'] }}, {{ $weatherData['sys']['country'] }}</h4>
                    </div>
                    <div class="card-body">
                        <h5 class="card-title">Temperature: {{ $weatherData['main']['temp'] }} °C</h5>
                        <p class="card-text">Feels Like: {{ $weatherData['main']['feels_like'] }} °C</p>
                        <p class="card-text">Weather: {{ $weatherData['weather'][0]['description'] }}</p>
                        <p class="card-text">Humidity: {{ $weatherData['main']['humidity'] }}%</p>
                        <p class="card-text">Wind Speed: {{ $weatherData['wind']['speed'] }} m/s</p>
                        <p class="card-text">Visibility: {{ $weatherData['visibility'] }} meters</p>
                        <p class="card-text">Pressure: {{ $weatherData['main']['pressure'] }} hPa</p>
                    </div>
                </div>
            @else
                <p class="text-center text-danger">No data available. Please enter a valid city.</p>
            @endif
        </div>
    </div>
</div>








</x-app-layout>
