<?php

namespace App\Http\Controllers\Api;

use Illuminate\Http\Request;
use App\Models\IslamicPrayer;
use App\Http\Controllers\Controller;

class IslamicPrayerController extends Controller
{
   public function index()
   {
    $IslamicPrayer = IslamicPrayer::all()->makeHidden(['id', 'created_at', 'updated_at']);

    return response()->json([
        'status' => 'success',
        'message' => 'IslamicPrayer data retrieved successfully',
        'data' => $IslamicPrayer
    ], 200);

   }

    public function random()
    {
        $IslamicPrayer = IslamicPrayer::inRandomOrder()->first()->makeHidden(['id', 'created_at', 'updated_at']);

        return response()->json([
            'status' => 'success',
            'message' => 'IslamicPrayer data retrieved successfully',
            'data' => $IslamicPrayer,
        ]);
    }
}
