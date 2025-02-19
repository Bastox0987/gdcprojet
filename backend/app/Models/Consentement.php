<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Consentement extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',  // Lien avec l'utilisateur
        'etat',     // Etat du consentement (accepté, refusé)
        'date',     // Date d'enregistrement du consentement
    ];

    /**
     * Un consentement appartient à un utilisateur.
     */
    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }
}
