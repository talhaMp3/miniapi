<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use GuzzleHttp\Client;
use GuzzleHttp\Exception\RequestException;
use Illuminate\Support\Facades\Log;
use Illuminate\Pagination\LengthAwarePaginator;

class NewsController extends Controller
{
    public function getNews(Request $request)
    {
        $client = new Client();
        $apiKey = '20b2dc62cda3462cbd10b2493967b57b'; // Replace with your NewsAPI key
        $query = $request->input('query', 'latest'); // Default to 'latest' if no query provided
        $page = $request->input('page', 1); // Get the current page or default to 1
        $pageSize = 10; // Number of articles per page

        try {
            $response = $client->get('https://newsapi.org/v2/everything', [
                'query' => [
                    'q' => $query,
                    'apiKey' => $apiKey,
                    'page' => $page,
                    'pageSize' => $pageSize,
                ],
            ]);

            $newsData = json_decode($response->getBody(), true);
            Log::info('NewsAPI response', ['response' => $newsData]);

            // Get total results and articles
            $totalResults = $newsData['totalResults'];
            $articles = $newsData['articles'];

            // Create a LengthAwarePaginator instance
            $paginator = new LengthAwarePaginator($articles, $totalResults, $pageSize, $page, [
                'path' => $request->url(),
                'query' => $request->query(),
            ]);

            return view('news.index', ['articles' => $paginator]);
        } catch (RequestException $e) {
            Log::error('NewsAPI request failed', ['error' => $e->getMessage()]);
            return view('news.index')->with(['error' => 'Failed to fetch news: ' . $e->getMessage()]);
        }
    }
}


