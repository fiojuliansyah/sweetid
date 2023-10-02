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
    Schema::create('meeting_rooms', function (Blueprint $table) {
      $table->id();
      $table->unsignedBigInteger('user_id');
      $table->unsignedBigInteger('room_id');
      $table->string('meeting_uuid');
      $table->string('meeting_id');
      $table->string('topic');
      $table->string('description');
      $table->string('start_time');
      $table->string('created_time');
      $table->text('join_url');
      $table->text('start_url');
      $table->text('custom_url');
      $table->string('password');
      $table->integer('duration');
      $table->json('payload');
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
    Schema::dropIfExists('meeting_rooms');
  }
};
