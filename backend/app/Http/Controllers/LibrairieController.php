<?php

namespace App\Http\Controllers;

use App\Models\Librairie;
use App\Http\Requests\StoreLibrairieRequest;
use App\Http\Requests\UpdateLibrairieRequest;
use Illuminate\Http\Request;

class LibrairieController extends Controller
{
    public function index()
    {
        return response()->json(Librairie::all(), 200);
    }

    public function create()
    {

    }

    public function store(Request $request)
    {
       $validated = $request->validate([
            'titre' => 'required|string',
            'auteur' => 'required|string',
            'genre' => 'required|string',
       ]);

        $livre = Librairie::create($validated);

        return response()->json($livre, 201);
    }

    public function show($id)
    {
        $livre = Librairie::find($id);
        return response()->json($livre);
    }

    public function edit($id)
    {
 
    }

    public function update(Request $request, $id)
    {
        // Trouve le livre
        $livre = Librairie::find($id);

        $request->validate([
            'titre' => 'required|string',
            'auteur' => 'required|string',
            'genre' => 'required|string',
        ]);

        $livre->update($validated);

        return response()->json($livre, 200);
    }

    public function destroy(Librairie $livre)
    {
        Librairie::find($id)->delete();
        return response()->json(null, 204);
    }
}
