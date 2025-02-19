<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Http\JsonResponse;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    /**
     * Afficher tous les utilisateurs.
     */
    public function index(): JsonResponse
    {
        $users = User::all();
        return response()->json([
            'statut' => 'succès',
            'data' => $users
        ], 200);
    }

    /**
     * Ajouter un utilisateur.
     */
    public function store(Request $request): JsonResponse
    {
        $validatedData = $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|unique:users,email',
            'password' => 'required|string|min:8',
        ]);

        $validatedData['password'] = Hash::make($validatedData['password']);

        $user = User::create($validatedData);

        return response()->json([
            'statut' => 'succès',
            'message' => 'Utilisateur créé avec succès',
            'data' => $user
        ], 201);
    }

    /**
     * Afficher un utilisateur spécifique.
     */
    public function show(User $user): JsonResponse
    {
        return response()->json([
            'statut' => 'succès',
            'data' => $user
        ], 200);
    }

    /**
     * Mettre à jour un utilisateur.
     */
    public function update(Request $request, User $user): JsonResponse
    {
        $validatedData = $request->validate([
            'name' => 'sometimes|string|max:255',
            'email' => 'sometimes|string|email|unique:users,email,' . $user->id,
            'password' => 'sometimes|string|min:8',
        ]);

        if (isset($validatedData['password'])) {
            $validatedData['password'] = Hash::make($validatedData['password']);
        }

        $user->update($validatedData);

        return response()->json([
            'statut' => 'succès',
            'message' => 'Utilisateur mis à jour avec succès',
            'data' => $user
        ], 200);
    }

    /**
     * Supprimer un utilisateur.
     */
    public function destroy(User $user): JsonResponse
    {
        $user->delete();

        return response()->json([
            'statut' => 'succès',
            'message' => 'Utilisateur supprimé avec succès'
        ], 200);
    }
}
