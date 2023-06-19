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
        Schema::create('rooms', function (Blueprint $table) {
            $table->id();
            $table->string('classtype_id')->nullable();
            $table->string('category_id')->nullable();
            $table->string('cover')->nullable();
            $table->string('title')->nullable();
            $table->string('slug')->nullable();
            $table->mediumText('short_description')->nullable();
            $table->longText('description')->nullable();
            $table->string('duration')->nullable();
            
            $table->string('price')->nullable();
            $table->string('disc_price')->nullable();
            
            $table->string('trailer')->nullable();

            $table->string('is_active')->nullable();
            $table->string('is_featured')->nullable();
            $table->string('is_recommended')->nullable();

            $table->string('meta_keyword')->nullable();
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
        Schema::dropIfExists('rooms');
    }
};