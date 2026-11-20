<?php

namespace App\Http\Controllers\Api\Public;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Http;

class RajaOngkirController extends Controller
{
    /**
     * searchDestination
     *
     * @param mixed $request
     * @return void
     */
    public function searchDestination(Request $request)
    {
        $response = Http::withHeaders([
            'key' => config('rajaongkir.api_key')
        ])->timeout(90)->get('https://rajaongkir.komerce.id/api/v1/destination/domestic-destination', [
            'search' => $request->search,
            'limit' => 20,
            'offset' => 0
        ]);

        return response()->json([
            'status' => $response->status(),
            'body' => $response->json(),
            'api_key_terbaca' => config('rajaongkir.api_key') ? 'ADA' : 'KOSONG',
        ]);
    }

    /**
     * checkOngkir
     *
     * @param mixed $request
     * @return void
     */
    public function checkOngkir(Request $request)
    {
        $response = Http::withHeaders([
            'key' => config('rajaongkir.api_key')
        ])->timeout(90)->asForm()->post(
            'https://rajaongkir.komerce.id/api/v1/calculate/domestic-cost',
            [
                'origin' => 46174,
                'destination' => $request->destination,
                'weight' => $request->weight,
                'courier' => $request->courier
            ]
        );

        return response()->json([
            'status' => $response->status(),
            'response' => $response->json(),
            'api_key' => config('rajaongkir.api_key') ? 'ADA' : 'KOSONG',
        ]);
    }
}