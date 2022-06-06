<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Productes;

class ProductesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
        public function index()
    {
        $productes = Productes::all();

        return $productes;
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $producto = new Productes();
        //Declarem el nom amb el request
        $producto->nom = $request->nom;
        $producto->created_at=now();
        $producto->updated_at=now();
        //Desem els canvis
        $producto->save();
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $productes = Productes::where('id', $id)->get();

        if (count($productes) == 0) {
            return response()->json([
                'success' => false,
                'message' => 'Producto con id ' . $id . ' no existe'
            ], 200);
        }

        return $productes;
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $producte = Productes::find($id);
        $producte->nom = $request->nom;
        $producte->save();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $producto = Productes::where('id', $id)->delete();

        if (!$producto) {
            return response()->json([
                'success' => false,
                'message' => 'Producto con id ' . $id . ' no se ha encontrado'
            ], 200);
        }

        return response()->json([
            'success' => true,
            'data' => 'Producto borrado'
        ], 200);
    }
}
