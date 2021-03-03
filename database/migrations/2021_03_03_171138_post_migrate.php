<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class PostMigrate extends Migration
{
  /**
   * Run the migrations.
   *
   * @return void
   */
  public function up()
  {
      Schema::create('posts', function (Blueprint $table) {
          $table->id();
          $table->unsignedBigInteger('user_id');
          $table->text('data');
          $table->timestamps();

          $table->foreign('user_id')
          ->references('id')
          ->on('users')
          ->onDalete('cascade');
      });
  }

  /**
   * Reverse the migrations.
   *
   * @return void
   */
  public function down()
  {
    Schema::table('posts', function (Blueprint $table) {
        $table->dropForeign('user_id');
    });
      Schema::dropIfExists('posts');
  }
}
