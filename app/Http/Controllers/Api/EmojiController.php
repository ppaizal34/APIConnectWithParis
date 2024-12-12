<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Emoji;
use Illuminate\Http\Request;

class EmojiController extends Controller
{
    public function index()
    {
        $emoji = Emoji::all();

        return response()->json([
            'status' => 'success',
            'message' => 'Emoji data retrieved successfully',
            'data' => $emoji
        ], 200);
    }

    public function paginate()
    {
        $emoji = Emoji::paginate(5);

        return response()->json([
            'status' => 'success',
            'message' => 'Emoji data retrieved successfully',
            'data' => $emoji
        ], 200);
    }
}
