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
        Schema::create('aides', function (Blueprint $table) {
            $table->id('Id_aide');
            $table->string('message');
            $table->unsignedBigInteger('id_client');
            $table->unsignedBigInteger('Id_Administrateur');
            $table->foreign('id_client')->references('id')->on('clients');
            $table->foreign('Id_Administrateur')->references('Id_Administrateur')->on('administrateurs');
            $table->rememberToken();
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
        Schema::dropIfExists('aides');
    }
};
