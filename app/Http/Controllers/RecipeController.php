<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use GuzzleHttp\Client;

class RecipeController extends Controller
{
    public function search(Request $request)
    {
        $client = new Client();
        $ingredients = $request->input('ingredients'); // Get ingredients from the form

        try {
            $response = $client->get('https://api.spoonacular.com/recipes/findByIngredients', [
                'query' => [
                    'ingredients' => $ingredients,
                    'apiKey' => '753e348bd4324256a78aa890a7868c11',
                ],
            ]);

            $data = json_decode($response->getBody(), true);
            $recipes = $data; // Get the list of recipes
// dd($recipes);
            return view('recipes.index', ['recipes' => $recipes, 'ingredients' => $ingredients]);
        } catch (\Exception $e) {
            return view('recipes.index')->with('error', 'Could not retrieve recipes: ' . $e->getMessage());
        }
    }
}
