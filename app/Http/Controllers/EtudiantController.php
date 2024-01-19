<?php

namespace App\Http\Controllers;

use App\Models\Filiere;
use App\Models\Etudiant;
use Illuminate\Http\Request;
use Illuminate\Foundation\Auth\User;

class EtudiantController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $etudiants = Etudiant::all();
        return view('etudiant.index', compact('etudiants'));
    }

    public function create()
    {
      
        $users = User::all(); // Récupérez la liste des utilisateurs
        $filieres = Filiere::all(); // Récupérez également la liste des filières si nécessaire
    
        return view('etudiant.form', compact('users', 'filieres'));
    }

    public function store(Request $request)
    {
        // Validation des données du formulaire
        $request->validate([
            'nom' => 'required|string|max:255',
        'prenom' => 'required|string|max:255',
        'sexe' => 'required|string|max:10',
        'filiere_id' => 'required|exists:filieres,id',
        'user_id' => 'required|exists:users,id',
        ]);

        Etudiant::create($request->all());
        return redirect()->to('/etudiants')->with('success', 'Étudiant supprimé avec succès.', 'id');

    }

    public function show($id)
    {
        $etudiant = Etudiant::findOrFail($id);
        return view('etudiant.show', compact('etudiant','id'));
    }

    public function edit($id)
    {
        $etudiant = Etudiant::findOrFail($id);
        $filieres = Filiere::all();
        $users = User::all(); 
        return view('etudiant.form', compact('etudiant', 'users', 'filieres', 'id'));
    }

    public function update(Request $request, $id)
    {
        // Validation des données du formulaire
        $request->validate([
            'nom' => 'required|string|max:255',
            'prenom' => 'required|string|max:255',
            'sexe' => 'required|string|max:10',
            'filiere_id' => 'required|exists:filieres,id',
            'user_id' => 'required|exists:users,id',
        ]);

        $etudiant = Etudiant::findOrFail($id);
        $etudiant->update($request->all());

        return redirect()->to('/etudiants')->with('success', 'Étudiant supprimé avec succès.', 'id');

    }

    public function destroy($id)
    {
        $etudiant = Etudiant::findOrFail($id);
        $etudiant->delete();

      return redirect()->to('/etudiants')->with('success', 'Étudiant supprimé avec succès.', 'id');

    }
}
