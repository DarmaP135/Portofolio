<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePerolehansTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('perolehans', function (Blueprint $table) {
            $table->id();
            $table->foreignId('acara_id');
            $table->foreignId('olahraga_id');
            $table->foreignId('nomor_id')->nullable();
            $table->foreignId('atletl_id');
            $table->string('medali');
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
        Schema::dropIfExists('perolehans');
    }
}
