<?php

namespace App\Http\Controllers;

use App\Models\Cryptos;
use Illuminate\Http\Request;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Illuminate\Support\Facades\DB;

class CryptosController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        // 1. Extraer términos de búsqueda
        $search = $request->search;

        // 2. Crear consulta base
        $query = Cryptos::query();

        // 3. Aplicar filtro de búsqueda (si se proporciona)
        if ($search) {
            $query->where('name', 'like', "%{$search}%")
                ->orWhere('symbol', 'like', "%{$search}%");
        }

        // 4. Excluir cryptomonedas con tag "stablecoin"
        $query->whereDoesntHave('cryptoTags', function ($subQuery) {
            $subQuery->where('tags', 'stablecoin');
        });

        // 5. Incluir relación con CryptosTags (eager loading)
        // $query->with('cryptoTags');

        try {
            // 6. Paginar resultados
            $cryptos = $query->paginate(20);

            // 7. Verificar si hay resultados
            if ($cryptos->isEmpty()) {
                throw new ModelNotFoundException("NO SE ENCONTRARON RESULTADOS PARA LA CRIPTOMONEDA: $search");
            }

            // 8. Devolver respuesta JSON
            return response()->json($cryptos);

        } catch (ModelNotFoundException $e) {
            return response()->json([
              "total" => 0,
              "cryptos" => [],
              "error" => $e->getMessage(),
            ]);
          }
    }

    public function getCryptos(Request $request)
    {

        // 1. Extraer términos de búsqueda
        $search = $request->search;

        try {
            // 2. Construcción de la consulta Eloquent:
            $cryptos = Cryptos::select('cryptos.*')
            // Se excluye las Stablecoins
            ->leftJoin('cryptos_tags as ct', function ($join) {
                $join->on('cryptos.id', '=', 'ct.crypto_id')
                    //  Se ha utilizado \DB::raw() para especificar la cadena 'stablecoin'
                    //  como una expresión SQL directa, ya que es un valor constante y no necesita ser parametrizado.
                    ->on('ct.tags', '=', DB::raw("'stablecoin'"));
            })
            ->where(function ($query) use ($search) {
                $query->where('cryptos.name', 'like', '%' . $search . '%')
                    ->orWhere('cryptos.symbol', 'like', '%' . $search . '%');
            })
            ->whereNull('ct.crypto_id')
            ->paginate(20);

            // 3. Manejo de resultados vacíos:
            if ($cryptos->isEmpty()) {
                throw new ModelNotFoundException("NO SE ENCONTRARON RESULTADOS PARA LA CRIPTOMONEDA: $search");
            }


            // 4. Devolución de la respuesta JSON:
            return response()->json([
                "total" => $cryptos->count(),
                "cryptos" => $cryptos,
            ]);

        } catch (ModelNotFoundException $e) {
            return response()->json([
              "total" => 0,
              "cryptos" => [],
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
