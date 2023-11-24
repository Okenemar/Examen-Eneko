<?php

namespace App\Http\Controllers;

use App\Models\Manzanas;
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
        Manzanas::create([
            'tipoManzana' => $request->input('tipoManzana'),
            'precioKilo' => $request->input('precioKilo')
        ]);
        return redirect()->route('manzanas');
    }

    /**
     * Display the specified resource.
     */
    public function show(Manzanas $manzanas)
    {
        $manzanas = Manzanas::all();

        return view('manzanas', ['manzanas' => $manzanas]);
        //tipoManzana
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Manzanas $manzana)
    {
        return view('edit', compact('manzana'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request)
    {
        $request->validate([
            'tipoManzana' => 'required|string',
            'precioKilo' => 'required|integer'
        ]);
    
        $manzana = Manzanas::where('id', $request->input('manzana_id'))->first();
    
        $manzana->update([
            'tipoManzana' => $request->input('tipoManzana'),
            'precioKilo' => $request->input('precioKilo')
        ]);
    
        return redirect()->route('manzanas');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Request $request)
    {
      
        $manzana = Manzanas::where('id', $request->input('manzana_id'))->first();

        $manzana->delete();

        return redirect()->route('manzanas');
    }
}
