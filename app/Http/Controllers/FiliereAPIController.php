<?php

namespace App\Http\Controllers;
use App\Models\Filiere;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;



use Illuminate\Support\Facades\Validator;

class FiliereAPIController extends Controller
{ 
    public function index()
    {
        $Filieres = Filiere::all();
        return response()->json(['Filieres' => $Filieres]);
    
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

        $Filiere = Filiere::create($request->all());
        return response()->json(['Filiere' => $Filiere]);
    }

    public function show($id)
    {
        $Filiere = Filiere::findOrFail($id);
        return response()->json(['Filiere' => $Filiere]);
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

        $Filiere = Filiere::findOrFail($id);
        $Filiere->update($request->all());

        return response()->json(['Filiere' => $Filiere]);
    }

    public function destroy($id)
    {
        $Filiere = Filiere::findOrFail($id);
        $Filiere->delete();

        return response()->json(['message' => 'Filiere supprimé avec succès']);
    }
}
