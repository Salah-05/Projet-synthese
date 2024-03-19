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
        Schema::create('cmds', function (Blueprint $table) {
        $table->id();
        $table->unsignedBigInteger('utilisateure_id');
        $table->foreign('utilisateure_id')->references('id')->on('utilisateures')->onDelete('cascade');
        $table->string('name');
        $table->string('command_code');
        $table->integer('qte_cmds')->default(1);
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
        Schema::dropIfExists('cmds');
    }
};
