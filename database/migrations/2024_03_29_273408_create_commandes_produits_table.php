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
        Schema::create('commandes_produits', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('Id_produit');
            $table->unsignedBigInteger('Id_commande');
            $table->integer('qte')->default(1);
            $table->foreign('Id_produit')->references('Id_produit')->on('produits');
            $table->foreign('Id_commande')->references('Id_commande')->on('commandes');
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
        Schema::dropIfExists('commandes_produits');
    }
};
