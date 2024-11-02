<?php

namespace App\Http\Controllers\GetApi;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class GetApiController extends Controller
{
    public function doc_nation()
    {
        return view('get_api.nation');
    }
}
