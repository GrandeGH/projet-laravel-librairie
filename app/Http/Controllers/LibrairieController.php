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
    {
        $livres = Librairie::all();
        return view('indexLivre', compact('livres'));
    }
    }

    public function create()
    {
        return view('createLivre');
    }

    public function store(Request $request)
    {
        $livre = new Librairie;
        $livre->titre = $request->titre;
        $livre->auteur = $request->auteur;
        $livre->genre = $request->genre;
        $livre->save();

        return redirect('/indexEdit');
    }

    public function show($id)
    {
        $livre = Librairie::find($id); 
        return view('showLivre', compact('livre'));
    }

    public function edit($id)
    {
        $livre = Librairie::find($id); 
        return view('editLivre', compact('livre'));
    }

    public function update(UpdateLibrairieRequest $request, Librairie $librairie)
    {
        // Trouve le livre
        $livre = Librairie::find($id);

        // Valider
        $request->validate([
            'titre' => 'required|string',
            'genre' => 'required|string',
            'auteur' => 'required|string',
        ]);
        // Mettre à jour les données
        $livre->titre = $request->titre;
        $livre->genre = $request->genre;
        $livre->auteur = $request->auteur;

        // Sauvegarder dans la base de données
        $livre->save();

        return redirect('/indexLivre');
    }

    public function destroy($id)
    {
        $livre = ExoEdit::find($id); 
        $livre->delete();
        return redirect('/indexLivre');
    }
}
