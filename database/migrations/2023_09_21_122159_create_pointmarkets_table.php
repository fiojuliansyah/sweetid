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
        Schema::create('pointmarkets', function (Blueprint $table) {
            $table->id();
            $table->string('image')->nullabel();
            $table->string('Name')->nullabel();
            $table->string('description')->nullabel();
            $table->string('point')->nullabel();
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
        Schema::dropIfExists('pointmarkets');
    }
};
