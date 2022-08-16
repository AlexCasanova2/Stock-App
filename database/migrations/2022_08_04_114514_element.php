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
        Schema::create('elements', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('description');
            $table->string('imagen');
            $table->integer('stock');
            $table->string('estat');
            $table->decimal('ample');
            $table->decimal('llarg');
            $table->decimal('alçada');
            $table->date('adquisicio');
            $table->foreignId('proveidor_id');
            $table->foreignId('client_id');
            $table->foreignId('area_id');
            $table->foreignId('user_id');
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
        //
    }
};
