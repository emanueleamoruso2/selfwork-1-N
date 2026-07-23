<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::table('products', function (Blueprint $table) {
            $table->unsignedBigInteger('user_id')->nullable()->after('price');//->default(1)//; 
            // una colonna con all'interno un tipo di dato intero molto grande senza segno (solo positivi). nome della colonna intero biginteger che contiene molti record. Utente amministratore default 1
            $table->foreign('user_id')->references('id')->on('users'); // questi metodi definiscono la foreign key della tabella products collegata alla tabella users tramite i loro id specifici. Vincolo referenziale. sto vincolando quel record, quel prodotto ad un utente specifico. Qell'utente hauna relazione col nostro prodotto ed è vincolato.
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('products', function (Blueprint $table) {
            $table->dropForeign(['user_id']); // sto rompendo il vincolo di integrità referenziale
            $table->dropColumn('user_id'); // sto eliminando la colonna creata
        });
    }
};
