<?php

namespace App\Http\Controllers;

use App\Models\Consentement;
use Illuminate\Http\Request;
use Illuminate\Http\JsonResponse;

class ConsentementController extends Controller
{
    /**
     * Afficher tous les consentements.
     */
    public function index(): JsonResponse
    {
        $consentements = Consentement::all();
        return response()->json([
            'statut' => 'succès',
            'data' => $consentements
        ], 200);
    }

    /**
     * Ajouter un consentement.
     */
    public function store(Request $request): JsonResponse
    {
        $validatedData = $request->validate([
            'user_id' => 'required|exists:users,id',
            'etat' => 'required|string|in:accepté,refusé',
        ]);

        $consentement = Consentement::create($validatedData);

        return response()->json([
            'statut' => 'succès',
            'message' => 'Consentement enregistré avec succès',
            'data' => $consentement
        ], 201);
    }

    /**
     * Afficher un consentement spécifique.
     */
    public function show(Consentement $consentement): JsonResponse
    {
        return response()->json([
            'statut' => 'succès',
            'data' => $consentement
        ], 200);
    }

    /**
     * Mettre à jour un consentement.
     */
    public function update(Request $request, Consentement $consentement): JsonResponse
    {
        $validatedData = $request->validate([
            'etat' => 'required|string|in:accepté,refusé',
        ]);

        $consentement->update($validatedData);

        return response()->json([
            'statut' => 'succès',
            'message' => 'Consentement mis à jour avec succès',
            'data' => $consentement
        ], 200);
    }

    /**
     * Supprimer un consentement.
     */
    public function destroy(Consentement $consentement): JsonResponse
    {
        $consentement->delete();

        return response()->json([
            'statut' => 'succès',
            'message' => 'Consentement supprimé avec succès'
        ], 200);
    }
}
