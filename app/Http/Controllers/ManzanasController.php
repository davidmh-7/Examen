<?php

namespace App\Http\Controllers;

use App\Models\manzanas;
use Illuminate\Http\Request;

class ManzanasController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
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
        manzanas::create([
            'id' => $request->input('id'),
            'tipoManzana' => $request->input('tipoManzana'),
            'precioKilo' => $request->input('precioKilo')
            
        ]);

        return redirect('mostrar');
    }

    /**
     * Display the specified resource.
     */
    public function show(manzanas $manzanas)
    {
        $manzanas = manzanas::all(); 

        return view('mostrar', ['manzanas' => $manzanas]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(manzanas $manzanas)
    {
        //
        return view('editar', compact('manzanas'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, manzanas $manzanas)
    {
        //
        $request->validate([
            'tipoManzana' => 'required|string',
            'precioKilo' => 'required|int'
        ]);

        $mensaje = manzanas::where('id', $request->input('id'))->first();

        $manzanas->update([
            
            'tipoManzana' => $request->input('tipoManzana'),
            'precioKilo' => $request->input('precioKilo')
        ]);
    
        return redirect('mostrar');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(manzanas $manzanas)
    {
        //
        $manzanas->delete();

        return redirect('mostrar');
    }
}
