<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Providers;

class ProvidersController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $providers = Providers::all();

        return $providers;
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
        $provider = new Providers();
        //Declarem el provider amb el request
        $provider->provider = $request->provider;
        $provider->created_at=now();
        $provider->updated_at=now();
        //Desem els canvis
        $provider->save();
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $provider = Providers::where('id', $id)->get();

        if (count($provider) == 0) {
            return response()->json([
                'success' => false,
                'message' => 'Proveedor con id ' . $id . ' no existe'
            ], 200);
        }

        return $provider;
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
        $provider = Providers::find($id);
        $provider->provider = $request->provider;
        $provider->save();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $provider = Providers::where('id', $id)->delete();

        if (!$provider) {
            return response()->json([
                'success' => false,
                'message' => 'Proveedor con id ' . $id . ' no se ha encontrado'
            ], 200);
        }

        return response()->json([
            'success' => true,
            'data' => 'Proveedor borrado'
        ], 200);
    }
}
