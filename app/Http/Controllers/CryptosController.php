<?php

namespace App\Http\Controllers;

use App\Models\Cryptos;
use Illuminate\Http\Request;

class CryptosController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {

        $search = $request->search;
        $cryptos = Cryptos::where('name', 'like', '%'.$search.'%')->paginate(20);

        return response()->json([
            "total" => $cryptos->total(),
            "cryptos" => $cryptos,
        ]);
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
        // Crear la Crypto con los datos de la solicitud
        $crypto = Cryptos::create($request->all());

        return response()->json([
            'status' => true,
            'message' => 'CRIPTOMONEDA REGISTRADA CORRECTAMENTE',
            'crypto' => $crypto
        ], 200);
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
        // Busca el Crypto por el ID
        $crypto = Cryptos::findOrFail($id);
        // Actualiza el Crypto con los datos de la solicitud
        $crypto->update($request->all());

        return response()->json([
            'status' => true,
            'message' => 'CRIPTOMONEDA ACTUALIZADA CORRECTAMENTE',
            'crypto' => $crypto
        ], 200);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        // Busca el Crypto por el ID
        $crypto = Cryptos::findOrFail($id);

        // Elimina el Crypto
        $crypto->delete();

        return response()->json([
            'status' => true,
            'message' => 'CRIPTOMONEDA ELIMINADO CORRECTAMENTE',
            'crypto' => $crypto
        ], 200);
    }
}
