<?php

namespace App\Http\Controllers\Api;

use App\Models\Country;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Statistic;
use PHPUnit\Framework\Constraint\Count;

class CountryController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $countries = Country::with('statistic')->get();

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
        $country = Country::with('statistic')->inRandomOrder()->first();

        return response()->json([
            'status' => 'success',
            'message' => 'Countries data retrieved successfully',
            'data' => $country
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(string $value)
    {
        $country = Country::with('statistic')
        ->where('country_name', 'like', $value . '%')
        ->get();

        if($country->isEmpty()){
            return response()->json([
                'status' => 'failed',
                'message' => 'Failed to retrieve data',
            ]);
        }

        return response()->json([
            'status' => 'success',
            'message' => 'Countries data retrieved successfully',
            'data' => $country
        ], 200);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
