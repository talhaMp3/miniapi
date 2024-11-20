<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ApiController extends Controller
{
    public function index()
    {
        $apis = [
            [
                'title' => 'Weather API',
                'description' => 'Access current and forecasted weather data.',
                'link' => url('/weather')
            ],
            [
                'title' => 'Dictionary API',
                'description' => 'Get definitions and synonyms for words.',
                'link' => url('/dictionary')
            ],
            // [
            //     'title' => 'News API',
            //     'description' => 'Fetch news articles from various sources and blogs.',
            //     'link' => url('/news')
            // ],
            // [
            //     'title' => 'Photo Search API',
            //     'description' => 'Search for photos using the Unsplash API.',
            //     'link' => url('/photos')
            // ],
            // [
            //     'title' => 'Zip Code Lookup API',
            //     'description' => 'Find location details based on zip code.',
            //     'link' => url('/zipcode')
            // ],
            [
                'title' => 'QR Code Generator API',
                'description' => 'Generate QR codes for any text.',
                'link' => url('/generate-qr')
            ],
            // [
            //     'title' => 'IP Information API',
            //     'description' => 'Get information about your current IP address.',
            //     'link' => url('/get-ip')
            // ],
            // [
            //     'title' => 'Number Facts API',
            //     'description' => 'Retrieve interesting facts about numbers.',
            //     'link' => url('/number-fact')
            // ],
            // [
            //     'title' => 'Recipe Search API',
            //     'description' => 'Search for recipes using the Recipe Puppy API.',
            //     'link' => url('/recipes')
            // ],
            // [
            //     'title' => 'Exchange Rate API',
            //     'description' => 'Get the latest exchange rates for various currencies.',
            //     'link' => url('/exchange-rates')
            // ],
            // [
            //     'title' => 'Genderize API',
            //     'description' => 'Predict the gender of a name.',
            //     'link' => url('/genderize')
            // ],
            // [
            //     'title' => 'Cat Facts API',
            //     'description' => 'Get random facts about cats.',
            //     'link' => url('/cat-fact')
            // ],
            // [
            //     'title' => 'Celebrity Information API',
            //     'description' => 'Get information about famous celebrities.',
            //     'link' => url('/celebrities')
            // ],
            // [
            //     'title' => 'Dog Facts API',
            //     'description' => 'Get random facts about dogs.',
            //     'link' => url('/dog-fact')
            // ],
            // [
            //     'title' => 'Coin API',
            //     'description' => 'Get cryptocurrency information.',
            //     'link' => url('/coins')
            // ],
            // [
            //     'title' => 'NASA API',
            //     'description' => 'Access various data from NASA including astronomy pictures of the day and Mars rover photos.',
            //     'link' => url('/nasa/apod')
            // ],
            // [
            //     'title' => 'OMDb API',
            //     'description' => 'Search for movies and get detailed information.',
            //     'link' => url('/omdb')
            // ],
            // [
            //     'title' => 'REST Countries API',
            //     'description' => 'Get information about countries.',
            //     'link' => url('/countries')
            // ],
        ];

        return view('index', compact('apis'));
    }
}