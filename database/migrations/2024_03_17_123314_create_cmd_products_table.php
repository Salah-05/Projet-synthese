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
        Schema::create('cmds_product', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('cmds_id');
            $table->unsignedBigInteger('product_id');
            $table->timestamps();
        
            $table->foreign('cmds_id')->references('id')->on('cmds')->onDelete('cascade');
            $table->foreign('product_id')->references('id')->on('products')->onDelete('cascade');
        });
        
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('cmds_product');
    }
};
