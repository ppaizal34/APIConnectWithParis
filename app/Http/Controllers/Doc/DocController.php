<?php

namespace App\Http\Controllers\Doc;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class DocController extends Controller
{
    public function docs_nations()
    {
        return view('docs_api.nations');
    }

    public function docs_emojis()
    {
        return view('docs_api.emoji');
    }
}
