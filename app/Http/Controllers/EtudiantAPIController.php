<?php

namespace App\Http\Controllers;


use App\Models\Etudiant;
use Illuminate\Http\Request;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Validator;

class EtudiantAPIController extends Controller
{
  
    public function index()
    {
        $etudiants = Etudiant::all();
        return response()->json(['etudiants' => $etudiants]);
    
    }

    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'nom' => 'required|string|max:255',
            'prenom' => 'required|string|max:255',
            'sexe' => 'required|string|max:10',
            'filiere_id' => 'required|exists:filieres,id',
            'user_id' => 'required|exists:users,id',
        ]);

        if ($validator->fails()) {
            return response()->json(['error' => $validator->errors()], 400);
        }

        $etudiant = Etudiant::create($request->all());
        return response()->json(['etudiant' => $etudiant]);
    }

    public function show($id)
    {
        $etudiant = Etudiant::findOrFail($id);
        return response()->json(['etudiant' => $etudiant]);
    }

    public function update(Request $request, $id)
    {
        $validator = Validator::make($request->all(), [
            'nom' => 'required|string|max:255',
            'prenom' => 'required|string|max:255',
            'sexe' => 'required|string|max:10',
            'filiere_id' => 'required|exists:filieres,id',
            'user_id' => 'required|exists:users,id',
        ]);

        if ($validator->fails()) {
            return response()->json(['error' => $validator->errors()], 400);
        }

        $etudiant = Etudiant::findOrFail($id);
        $etudiant->update($request->all());

        return response()->json(['etudiant' => $etudiant]);
    }

    public function destroy($id)
    {
        $etudiant = Etudiant::findOrFail($id);
        $etudiant->delete();

        return response()->json(['message' => 'Étudiant supprimé avec succès']);
    }
}
