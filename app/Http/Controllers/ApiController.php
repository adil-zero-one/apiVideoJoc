<?php

namespace App\Http\Controllers;

use App\Models\VideoJoc;
use Illuminate\Http\Request;

class ApiController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $videojocs = VideoJoc::all();
        return response()->json($videojocs);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
        try {
            $validator = $request->validate([
                'titol' => 'required|string|max:100',
                'any_llancament' => 'required|integer|min:1950|max:2027',
                'compatibilitat' => 'required|string',
                'duracioJoc' => 'required|integer|min:1|max:365',
                'disponibilitat' => 'required|boolean',
                // no pongo 10 en la valoracion porque no existe la perfeccion en nuestro mundo
                // porque siempre se puede mejorar y siempre hay algo para mejorar
                // para perfeccionar algo necesitas dedicarle tu vida entera para que.. bueno
                // lo dejo aqui sino me tindre que haber ido a estudiar filosofia
                // en fin, lo pondremos hasta 9.9
                'valoracion' => 'required|numeric|min:0|max:9.9',
                'tipus' => 'required|string|max:255',
                'preu' => 'required|numeric|min:0|max:99.99',
            ]);
            VideoJoc::create($validator);
            // uso el numero 201 porque es mas especifico => "creado" en vez de 200 "Ok" iria bien con Get y Delete
            return response()->json($validator, 201);
        } catch (\Exception $exception) {
            // bbloque de catch 500
            return response()->json(['error' => 'Error al crear el video joc'], 500);
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        // no uso fin or fail por la condicion de abajo !videoJoc
        // with titulo no tendra sentido, todos tendras titulo al final por la validacion de arriba
        $videoJoc = VideoJoc::find($id);
        if (!$videoJoc) {
            return response()->json(['noTrobat' => 'Videojoc no trobat'], 404);
        }

        // si trobat
        return response()->json($videoJoc);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
        $videoJoc = VideoJoc::find($id);
        if (!$videoJoc) {
            return response()->json(['noTrobat' => 'Videojoc no trobat'], 404);
        }
        // sin else aqui si lo encuentra php bajara directamente a ejecutar el delete
        $videoJoc->delete();
        return response()->json(['success' => 'Videojoc eliminat correctament'], 200);
    }

    // filtro disponibilitat joc
    public function filtroDisponibles()
    {
        // tenia puesto true en vez de 1, pero no funcionaba porque tenia regitrado true como 1
        $videojocs = VideoJoc::where('disponibilitat', 1)->get();

        if ($videojocs->isEmpty()) {
            return response()->json(['message' => 'Cap videojoc disponible'], 404);
        }

        return response()->json($videojocs);
    }
}
