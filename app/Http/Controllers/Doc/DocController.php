<?php

namespace App\Http\Controllers\Doc;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class DocController extends Controller
{
    public function docs_nations()
    {
        $data = [
            'url_index' => !Auth::check() ? 'http://127.0.0.1:8000/api/public/countries' : 'http://127.0.0.1:8000/api/private/countries',
            'url_show' => !Auth::check() ? 'http://127.0.0.1:8000/api/public/countries/indonesia' : 'http://127.0.0.1:8000/api/private/countries/indonesia',
            'url_random' => !Auth::check() ? 'http://127.0.0.1:8000/api/public/countries/random' : 'http://127.0.0.1:8000/api/private/countries/random',
        ];
        return view('docs_api.nations', $data);
    }

    public function docs_emojis()
    {
        $data = [
            'url_index' => !Auth::check() ? 'http://127.0.0.1:8000/api/public/emojis' : 'http://127.0.0.1:8000/api/private/emojis',
        ];
        return view('docs_api.emoji', $data);
    }
}
