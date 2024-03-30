<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('paiments', function (Blueprint $table) {
            $table->id('Id_paiment');
            $table->string('montant');
            $table->string('date_peiment');
            $table->string('Statut_de_Paiement');
            $table->unsignedBigInteger('Id_carte');
            $table->unsignedBigInteger('id_client');
            $table->unsignedBigInteger('Id_commande');
            $table->foreign('Id_carte')->references('Id_carte')->on('cartes');
            $table->foreign('id_client')->references('id')->on('clients');
            $table->foreign('Id_commande')->references('Id_commande')->on('commandes');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('paiments');
    }
};
