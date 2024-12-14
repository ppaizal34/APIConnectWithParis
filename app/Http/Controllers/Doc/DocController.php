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
            'url_index_endpoint' => !Auth::check() ? '/api/public/countries/' : '/api/private/countries/',
            'url_spesifik_endpoint' => !Auth::check() ? '/api/public/countries/{name}' : '/api/private/countries/{name}',
            'url_random_endpoint' => !Auth::check() ? '/api/public/countries/random' : '/api/private/countries/random',
            'title_index' => 'GET /api/countries',
            'title_spesifik' => 'GET /api/countries/{name}',
            'title_random' => 'GET /api/countries/random',
            
        ];
        return view('docs_api.nations', $data);
    }

    public function docs_emojis()
    {
        $data = [
            'url_index' => !Auth::check() ? 'http://127.0.0.1:8000/api/public/emojis' : 'http://127.0.0.1:8000/api/private/emojis',
            'title_index' => 'GET /api/emojis',
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
            'title_index' => 'GET /api/heroes',
            'title_spesifik' => 'GET /api/heroes/{name}',
            'title_random' => 'GET /api/heroes/random',
        ];

        return view('docs_api.national_hero', $data);
    }

    public function docs_volcano()
    {
        $data = [
            'url_index' => !Auth::check() ? 'http://127.0.0.1:8000/api/public/volcanoes' : 'http://127.0.0.1:8000/api/private/volcanoes',
            'url_spesifik' => !Auth::check() ? 'http://127.0.0.1:8000/api/public/volcanoes/{name}' : 'http://127.0.0.1:8000/api/private/volcanoes/{name}',
            'url_random' => !Auth::check() ? 'http://127.0.0.1:8000/api/public/volcanoes/random' : 'http://127.0.0.1:8000/api/private/volcanoes/random',
            'url_index_endpoint' => !Auth::check() ? '/api/public/volcanoes/' : '/api/private/volcanoes/',
            'url_spesifik_endpoint' => !Auth::check() ? '/api/public/volcanoes/{name}' : '/api/private/volcanoes/{name}',
            'url_random_endpoint' => !Auth::check() ? '/api/public/volcanoes/random' : '/api/private/volcanoes/random',
            'title_index' => 'GET /api/volcanoes',
            'title_spesifik' => 'GET /api/volcanoes/{name}',
            'title_random' => 'GET /api/volcanoes/random',
        ];

        return view('docs_api.volcano', $data);
    }
}
