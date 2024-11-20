<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use GuzzleHttp\Client;

class PhotoSearchController extends Controller
{
    public function search(Request $request)
    {
        $client = new Client();
        $query = $request->input('query');
        $accessKey = 'ecihocdWk8jzekX0JqWctwuo9Eox3Agdt3EHWDm1scY';

        try {
            $response = $client->get('https://api.unsplash.com/search/photos', [
                'query' => [
                    'query' => $query,
                    'client_id' => $accessKey,
                ],
            ]);

            $photos = json_decode($response->getBody()->getContents(), true);

            return view('photos.index', ['photos' => $photos['results']]);
        } catch (\Exception $e) {
            return view('photos.index')->with(['error' => 'Error fetching photos: ' . $e->getMessage()]);
        }
    }

    public function index()
    {
        return view('photos.index');
    }
}
