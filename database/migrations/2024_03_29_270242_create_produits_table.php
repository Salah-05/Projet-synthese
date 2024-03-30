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
        
        Schema::create('produits', function (Blueprint $table) {
            $table->id('Id_produit');
            $table->string('description');
            $table->string('image');
            $table->string('prix');
            $table->string('qte_produit');
            $table->unsignedBigInteger('Id_type');
            $table->unsignedBigInteger('Id_Administrateur');
            $table->unsignedBigInteger('Id_categorie');
            $table->foreign('Id_type')->references('Id_type')->on('types');
            $table->foreign('Id_Administrateur')->references('Id_Administrateur')->on('administrateurs');
            $table->foreign('Id_categorie')->references('Id_categorie')->on('categories');
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
        Schema::dropIfExists('produits');
    }
};
