<?php

namespace App\Http\Controllers\Api;

use App\Models\volcano;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class VolcanoController extends Controller
{
    public function index()
    {
        $volcanoes = volcano::all()->makeHidden(['id', 'created_at', 'updated_at']);

        return response()->json([
            'status' => 'success',
            'message' => 'Volcanoes data retrieved successfully',
            'data' => $volcanoes,
        ]);
    }

    public function spesifik_name(string $name)
    {
        $volcanoes =volcano::where('name', 'like', $name . '%')->get()->makeHidden(['id', 'created_at', 'updated_at']);

        if($volcanoes->isEmpty()){
            return response()->json([
                'status' => 'failed',
                'message' => 'Failed to retrieve data',
            ], 404);
        }

        return response()->json([
            'status' => 'success',
            'message' => 'Volcanoes data retrieved successfully',
            'data' => $volcanoes,
        ]);
    }

    public function random()
    {
        $volcanoes = volcano::inRandomOrder()->first()->makeHidden(['id', 'created_at', 'updated_at']);

        return response()->json([
            'status' => 'success',
            'message' => 'Volcanoes data retrieved successfully',
            'data' => $volcanoes,
        ]);
    }
}
