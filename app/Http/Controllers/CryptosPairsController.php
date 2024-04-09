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
      try {
        $cryptoPair = CryptosPairs::where(function ($query) use ($crypto) {
          $query->whereHas('crypto1', function ($query) use ($crypto) {
            $query->where('name', 'like', "%{$crypto}%")
              ->orWhere('symbol', 'like', "%{$crypto}%");
          })
          ->orWhereHas('crypto2', function ($query) use ($crypto) {
            $query->where('name', 'like', "%{$crypto}%")
              ->orWhere('symbol', 'like', "%{$crypto}%");
          });
        })->firstOrFail(); // Devuelve un modelo o lanza una excepción si no se encuentra

        $symbol = $cryptoPair->crypto1->symbol . "/" . $cryptoPair->crypto2->symbol;
        $logos = [
          "Crypto1" => $cryptoPair->crypto1->logo,
          "Crypto2" => $cryptoPair->crypto2->logo,
        ];

        return response()->json([
          "total" => 1,
          "cryptosPairs" => [
            "symbol" => $symbol,
            "logos" => $logos,
          ],
        ]);
      } catch (ModelNotFoundException $e) {
        return response()->json([
          "total" => 0,
          "cryptosPairs" => [],
          "error" => "PAR DE CRIPTOMONEDAS NO ENCONTRADO",
        ], 404); // Código de respuesta 404 (Not Found)
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
