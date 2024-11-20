<?php

namespace App\Http\Controllers;

use App\Services\DictionaryService;
use Illuminate\Http\Request;

class DictionaryController extends Controller
{
    protected $dictionaryService;

    public function __construct(DictionaryService $dictionaryService)
    {
        $this->dictionaryService = $dictionaryService;
    }

    public function index(Request $request)
    {
        $wordData = null;

        if ($request->isMethod('post')) {
            $request->validate([
                'word' => 'required|string',
            ]);

            $word = $request->input('word');
            $wordData = $this->dictionaryService->fetchWordData($word);
        }

        return view('dictionary.index', compact('wordData'));
    }
}
