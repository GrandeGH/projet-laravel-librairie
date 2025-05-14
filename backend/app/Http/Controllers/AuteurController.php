<?php

namespace App\Http\Controllers;

// par Georges

use App\Models\Auteur;
use App\Http\Requests\StoreAuteurRequest;
use App\Http\Requests\UpdateAuteurRequest;
use Illuminate\Http\Request;

class AuteurController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return response()->json(Auteur::all(), 200);

    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'auteur' => 'required|string',
        ]);

        $auteur = Auteur::create($validated);

        return response()->json($auteur, 201);
    }

    public function show(Auteur $auteur)
    {
        return response()->json($auteur);
    }

    public function edit(Auteur $auteur)
    {
        //
    }

    public function destroy($id)
    {
        $auteur = Auteur::find($id); 
        $auteur->delete();
        return redirect('/indexAuteur');
    }
}
