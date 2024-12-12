<?php

namespace App\Http\Controllers\Api;

use App\Models\Country;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Statistic;
use PHPUnit\Framework\Constraint\Count;

class CountryController extends Controller
{
    public function index()
    {
        $countries = Country::all();

        try{
            return response()->json([
                'status' => 'success',
                'message' => 'Countries data retrieved successfully',
                'data' => $countries
            ], 200);
        }catch(\Exception $e){
            return response()->json([
                'status' => 'error',
                'message' => 'Failed to retrieve data',
                'error' => $e->getMessage()
            ], 500);
        }      
    }

    public function random()
    {
        $country = Country::inRandomOrder()->first();

        return response()->json([
            'status' => 'success',
            'message' => 'Countries data retrieved successfully',
            'data' => $country
        ]);
    }

    public function store(Request $request)
    {
        //
    }

    public function show(string $value)
    {
        $country = Country::where('country_name', 'like', $value . '%') ->get();

        if($country->isEmpty()){
            return response()->json([
                'status' => 'failed',
                'message' => 'Failed to retrieve data',
            ], 404);
        }

        return response()->json([
            'status' => 'success',
            'message' => 'Countries data retrieved successfully',
            'data' => $country
        ], 200);
    }

    public function update(Request $request, string $id)
    {
        //
    }

  
    public function destroy(string $id)
    {
        //
    }
}
