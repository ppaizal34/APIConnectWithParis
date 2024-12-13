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

    public function docs_national_hero()
    {
        $data = [
            'url_index' => !Auth::check() ? 'http://127.0.0.1:8000/api/public/heroes' : 'http://127.0.0.1:8000/api/private/heroes',
            'url_spesifik' => !Auth::check() ? 'http://127.0.0.1:8000/api/public/heroes/Soekarno' : 'http://127.0.0.1:8000/api/private/heroes/Soekarno',
            'url_random' => !Auth::check() ? 'http://127.0.0.1:8000/api/public/heroes/random' : 'http://127.0.0.1:8000/api/private/heroes/random',
            'url_index_endpoint' => !Auth::check() ? '/api/public/heroes/' : '/api/private/heroes/',
            'url_spesifik_endpoint' => !Auth::check() ? '/api/public/heroes/{name}' : '/api/private/heroes/{name}',
            'url_random_endpoint' => !Auth::check() ? '/api/public/heroes/random' : '/api/private/heroes/random',
        ];

        return view('docs_api.national_hero', $data);
    }
}
