<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{ 
    /**
     * Run the migrations. Schemi blueprint cioè delle tavole che identificano quelle che sono le nostre tabelle.  ciò che ci interessa è la funzione up() e la funzione down() che lanciano le logiche per andare a definire come sono strutturate le nostre tabelle con righe (entità). Inseriremo dopo aver definitivo lo schema, i vari record. Lo schema cioè la struttura è formata dalle colonne cioè i campi delle nostre tabelle. Qui viene creata una tabella degli utenti. Schema è una classe di laravel che definisce una tabella attraverso una funzione create. La tabella si chiama users. Attraverso una callback cioè una funzione che utilizza l'oggetto table che fa riferimento alla tabella che stiamo creando e ci dice le diverse colonne. Di questa tabella ho bisogno dell'id() che è un big integer autoincrementale e senza segno
     */
    public function up(): void
    {
        Schema::create('users', function (Blueprint $table) {
            $table->id(); // con il metodo id() sto definendo una colonna che contiene numeri interi autoincrementali senza segno. L'incremento sarà compito del nostro database e così evitiamo errori e rendiamo univoco il dato. Un id non può essere riutilizzato ma una volta consumato, si genera un incremento dall'ultimo id utilizzato
            $table->string('name'); // il metodo string() sto definendo una colonna contenente un dato di tipo string con un massimo di 255 caratteri. name è il nome della colonna che sto creando
            $table->string('email')->unique(); // colonna di tipo stringa. il metodo unique() definisce che ogni record deve avere questo campo con valore univoco. Non ci possono essere record con email uguali
            $table->timestamp('email_verified_at')->nullable(); //Timestamp crea due colonne che identificano la data di creazione e la data di aggiornamento della riga. Il metodo nullable() permette alla colonna di avere come dato valido il NULL
            $table->string('password');
            $table->rememberToken();
            $table->timestamps();
        });

        Schema::create('password_reset_tokens', function (Blueprint $table) {
            $table->string('email')->primary();
            $table->string('token');
            $table->timestamp('created_at')->nullable();
        });

        Schema::create('sessions', function (Blueprint $table) {
            $table->string('id')->primary();
            $table->foreignId('user_id')->nullable()->index();
            $table->string('ip_address', 45)->nullable();
            $table->text('user_agent')->nullable();
            $table->longText('payload');
            $table->integer('last_activity')->index();
        });
    }

    /**
     * Reverse the migrations. Fa il contrario della up() cioè cancello righe e colonne delle tabelle. Di base una fa l'opposto dell'altro. Up() crea e down() distrugge
     */
    public function down(): void
    {
        Schema::dropIfExists('users');
        Schema::dropIfExists('password_reset_tokens');
        Schema::dropIfExists('sessions');
    }
};
