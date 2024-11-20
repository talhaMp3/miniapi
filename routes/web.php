<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ApiController;
use App\Http\Controllers\IpController;
use App\Http\Controllers\CoinController;
use App\Http\Controllers\NasaController;
use App\Http\Controllers\NewsController;
use App\Http\Controllers\OmdbController;
use App\Http\Controllers\QRCodeController;
use App\Http\Controllers\RecipeController;
use App\Http\Controllers\CountryController;
use App\Http\Controllers\DogFactController;
use App\Http\Controllers\NumbersController;
use App\Http\Controllers\WeatherController;
use App\Http\Controllers\ZipCodeController;
use App\Http\Controllers\CatFactsController;
use App\Http\Controllers\CelebrityController;
use App\Http\Controllers\GenderizeController;
use App\Http\Controllers\DictionaryController;
use App\Http\Controllers\PhotoSearchController;
use App\Http\Controllers\ExchangeRateController;



Route::get('/', [ApiController::class, 'index']);
Route::get('/about', function () {    return view('about');});
Route::get('/contact', function () {    return view('contact');});
Route::get('/weather', [WeatherController::class, 'getWeather']);
Route::match(['get', 'post'], '/dictionary', [DictionaryController::class, 'index']);
Route::get('/news', [NewsController::class, 'getNews']);
Route::get('/photos', [PhotoSearchController::class, 'index']);
Route::get('/photos/search', [PhotoSearchController::class, 'search'])->name('photos.search');
Route::get('/zipcode', [ZipCodeController::class, 'index']);
Route::get('/zipcode/search', [ZipCodeController::class, 'lookup'])->name('zipcode.search');
Route::get('/generate-qr', [QRCodeController::class, 'generate']);
Route::get('/get-ip', [IpController::class, 'getIp']);
Route::get('/number-fact', [NumbersController::class, 'getFact']);
Route::get('/recipes', [RecipeController::class, 'search'])->name('recipes.search');
Route::get('/exchange-rates', [ExchangeRateController::class, 'getExchangeRate']);
Route::get('/genderize', [GenderizeController::class, 'getGender']);
Route::get('/cat-fact', [CatFactsController::class, 'getCatFact']);
Route::get('/celebrities', [CelebrityController::class, 'getCelebrity']);
Route::get('/dog-fact', [DogFactController::class, 'getDogFact']);
Route::get('/coins', [CoinController::class, 'getCoins']);
Route::get('/nasa/apod', [NasaController::class, 'getApod']);
Route::get('/nasa/mars-rover-photos', [NasaController::class, 'getMarsRoverPhotos']);
Route::get('/omdb', [OmdbController::class, 'searchMovie']);
Route::get('/countries', [CountryController::class, 'getCountry'])->name('country.search');
