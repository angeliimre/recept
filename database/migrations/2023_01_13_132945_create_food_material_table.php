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
        Schema::create('food_material', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger("food_id");
            $table->unsignedBigInteger("material_id");
            $table->integer("amount");
            $table->timestamps();

            $table->foreign("material_id")->references("id")->on("materials");
            $table->foreign("food_id")->references("id")->on("foods");
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('food_material');
    }
};
