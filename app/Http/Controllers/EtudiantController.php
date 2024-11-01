<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\etudiant;

class EtudiantController extends Controller
{
    public function listeEtudiant() {
        $etudiants = etudiant::all();
        return view("listeEtudiant", compact('etudiants'));
    }

    public function ajouterEtudiant() {
        return view("ajouterEtudiant");
    }

    public function ajouterEtudiantTraitement(Request $request)  {
        // dd($request);
        $request -> validate([
            'nom' =>'required',
            'prenom' =>'required',
            'classe' =>'required',
        ]);

        $etudiant = new etudiant();
        $etudiant->nom = $request -> nom;
        $etudiant -> prenom = $request -> prenom;
        $etudiant -> classe = $request -> classe;

        $etudiant -> save();

        return redirect('ajouter/etudiant')->with('status', 'Etudiant enrégistré avec succes');
    }

    public function updateEtudiant($id)
    {
        $etudiant = etudiant::find($id);
        return view('updateEtudiant', compact('etudiant'));
    }

    public function updateEtudiantTraitement(Request $request)
    {
        $request -> validate([
            'nom' =>'required',
            'prenom' =>'required',
            'classe' =>'required',
        ]);

        $etudiant = etudiant::find($request -> id);
        $etudiant->nom = $request -> nom;
        $etudiant->prenom = $request -> prenom;
        $etudiant->classe = $request -> classe;

        $etudiant -> update();

        return redirect('liste/etudiant')->with('status', 'Etudiant modifié avec succes');
    }

    public function deleteEtudiant($id)
    {
        $etudiant = etudiant::find($id);
        dd($id);
        $etudiant->delete();
        
        return redirect('liste/etudiant')->with('status', 'Etudiant supprimé avec succes');
    }

}
