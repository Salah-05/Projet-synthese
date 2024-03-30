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
        Schema::create('avis_sur_le_produits', function (Blueprint $table) {
            $table->id('Id_Avis_sur_le_produit');
            $table->string('Avis');
            $table->unsignedBigInteger('id_client');
            $table->unsignedBigInteger('Id_produit');
            $table->foreign('id_client')->references('id')->on('clients');
            $table->foreign('Id_produit')->references('Id_produit')->on('produits');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('avis_sur_le_produits');
    }
};
