<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up()
    {
        Schema::create('consentements', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->constrained()->onDelete('cascade'); // Clé étrangère
            $table->string('etat'); // Ex: "accepté" ou "refusé"
            $table->timestamp('date')->useCurrent(); // Enregistrement automatique de la date
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('consentements');
    }
};
