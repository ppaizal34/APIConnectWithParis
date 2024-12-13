<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\NationalHero;
use Illuminate\Http\Request;

class NationalHeroController extends Controller
{
    public function index()
    {
        $heroes = NationalHero::all()->makeHidden(['id', 'created_at', 'updated_at']);

        return response()->json([
            'status' => 'success',
            'message' => 'Heroes data retrieved successfully',
            'data' => $heroes,
        ]);
    }

    public function spesifik_name(string $name)
    {
        $hero = NationalHero::where('name', 'like', $name . '%')->get()->makeHidden(['id', 'created_at', 'updated_at']);

        if($hero->isEmpty()){
            return response()->json([
                'status' => 'failed',
                'message' => 'Failed to retrieve data',
            ], 404);
        }

        return response()->json([
            'status' => 'success',
            'message' => 'Heroes data retrieved successfully',
            'data' => $hero,
        ]);
    }

    public function random()
    {
        $hero = NationalHero::inRandomOrder()->first()->makeHidden(['id', 'created_at', 'updated_at']);

        return response()->json([
            'status' => 'success',
            'message' => 'Heroes data retrieved successfully',
            'data' => $hero,
        ]);
    }
}
