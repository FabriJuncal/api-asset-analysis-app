<?php

namespace App\Http\Controllers;

use App\Models\CryptosPairs;
use Illuminate\Http\Request;
use Illuminate\Database\Eloquent\ModelNotFoundException;

class CryptosPairsController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index($crypto)
    {
        // FALTA RETORNAR LA PLATAFORMA DE INVERSION DONDE SE ENCUENTRA LA CRIPTOMONEDA
        try {
            $cryptoPair = CryptosPairs::with('crypto1', 'crypto2', 'investmentPlatform')->where(function ($query) use ($crypto) {
              $query->whereHas('crypto1', function ($query) use ($crypto) {
                $query->where('name', 'like', "%{$crypto}%")
                  ->orWhere('symbol', 'like', "%{$crypto}%");
              })
              ->orWhereHas('crypto2', function ($query) use ($crypto) {
                $query->where('name', 'like', "%{$crypto}%")
                  ->orWhere('symbol', 'like', "%{$crypto}%");
              });
            })->get();

            if ($cryptoPair->isEmpty()) {
              throw new ModelNotFoundException("NO SE ENCONTRÓ NINGÚN PAR CON LA CRIPTOMONEDA: $crypto");
            }

            // Procesar los resultados obtenidos en $cryptoPair

            return response()->json([
              "total" => $cryptoPair->count(),
              "cryptosPairs" => $cryptoPair->map(function ($pair) {
                $symbols = $pair->crypto1->symbol . "/" . $pair->crypto2->symbol;
                $names = $pair->crypto1->name . " / " . $pair->crypto2->name;
                $logos = [
                  "asset1" => $pair->crypto1->logo,
                  "asset2" => $pair->crypto2->logo,
                ];
                $investmentPlatform = [
                    "name" => $pair->investmentPlatform->name,
                    "logo" => $pair->investmentPlatform->logo
                ];
                return [
                  "symbols" => $symbols,
                  "names" => $names,
                  "logos" => $logos,
                  "investmentPlatform" => $investmentPlatform

                ];
              })->toArray(),
            ]);
          } catch (ModelNotFoundException $e) {
            return response()->json([
              "total" => 0,
              "cryptosPairs" => [],
              "error" => $e->getMessage(),
            ]);
          }
    }


    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
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
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
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
