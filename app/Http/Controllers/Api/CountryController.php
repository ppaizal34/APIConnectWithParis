<?php

namespace App\Http\Controllers\Api;

use App\Models\Country;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Statistic;
use PHPUnit\Framework\Constraint\Count;
/**
 * @OA\Tag(
 *     name="Country",
 *     description="API Endpoints for Product"
 * )
 */
class CountryController extends Controller
{
    /**
     * @OA\Get(
     *     path="/api/countries",
     *     summary="Get list of all countries",
     *     tags={"Berita"},
     *     description="Retrieve a list of all countries along with their statistics",
     *     @OA\Response(
     *         response=200,
     *         description="Countries data retrieved successfully"
     *     ),
     *     @OA\Response(
     *         response=500,
     *         description="Failed to retrieve data"
     *     )
     * )
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

    /**
     * @OA\Get(
     *     path="/api/countries/random",
     *     summary="Get a random country",
     *     description="Retrieve a random country along with its statistics",
     *     @OA\Response(
     *         response=200,
     *         description="Random country data retrieved successfully"
     *     )
     * )
     */
    public function random()
    {
        $country = Country::with('statistic')->inRandomOrder()->first();

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

     /**
     * @OA\Get(
     *     path="/api/countries/{country_name}",
     *     summary="Get a specific country",
     *     description="Retrieve details of a specific country by its name",
     *     @OA\Parameter(
     *         name="country_name",
     *         in="path",
     *         description="Name of the country",
     *         required=true,
     *         @OA\Schema(type="string")
     *     ),
     *     @OA\Response(
     *         response=200,
     *         description="Country data retrieved successfully"
     *     ),
     *     @OA\Response(
     *         response=404,
     *         description="Country not found"
     *     )
     * )
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
            ], 404);
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
