<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ConsentementController extends Controller
{
    //

    public function index()
    {
        $consentements = \App\Models\Consentement::all();
        return response()->json([
            'statut' => 'succès',
            'data' => $consentements
        ], 200);
    }







}
