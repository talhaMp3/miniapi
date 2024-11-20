<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use GuzzleHttp\Client;
use GuzzleHttp\Exception\RequestException;
use Illuminate\Support\Facades\Log;

class TranslationController extends Controller
{
    public function translate(Request $request)
    {
        // Validate the input
  
        $client = new Client();
        $text = $request->input('text'); // Text to translate
        $targetLang = $request->input('target_language'); // Target language from input

        // Google Translate API Key
        $apiKey = 'AIzaSyCOXto6BBCruKNUiLvsB1BRcFUm9ZMn_HI';

        try {
            // Send the POST request to the Google Translate API
            $response = $client->post("https://translation.googleapis.com/language/translate/v2", [
                'json' => [
                    'q' => $text,
                    'target' => $targetLang,
                    'key' => $apiKey,
                ],
            ]);
            // https://translation.googleapis.com/language/translate/v2?key=AIzaSyCOXto6BBCruKNUiLvsB1BRcFUm9ZMn_HI
            // Get the response body
            $responseBody = json_decode($response->getBody(), true);
            Log::info('Translation API response', ['response' => $responseBody]);

            // Check if translation output exists
            if (isset($responseBody['data']['translations'][0]['translatedText'])) {
                $translatedText = $responseBody['data']['translations'][0]['translatedText'];
                Log::info('Translation successful', ['translatedText' => $translatedText]);
                return view('translate.index', ['translatedText' => $translatedText]);
            } else {
                Log::warning('Translation output not found');
                return view('translate.index')->with(['error' => 'Translation output not found.']);
            }
        } catch (RequestException $e) {
            Log::error('Translation failed', ['error' => $e->getMessage()]);
            return view('translate.index')->with(['error' => 'Translation failed: ' . $e->getMessage()]);
        }
    }
}