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
        Schema::create('conclusions', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('estudio_id');
            $table->text('conclusion')->nullable();
            $table->foreign('estudio_id')->references('id')->on('estudios')->onDelete('cascade');
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
        Schema::dropIfExists('conclusions');
    }
};
