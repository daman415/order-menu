<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateActivityLogPesanansTable extends Migration
{
  /**
   * Run the migrations.
   *
   * @return void
   */
  public function up()
  {
    Schema::create('activity_log_pesanans', function (Blueprint $table) {
      $table->id();
      $table->string('ket');
      $table->string('access');
      $table->string('user');
      $table->string('old_data')->nullable(true);
      $table->string('new_data')->nullable(true);
      $table->timestamp('date');
    });
  }

  /**
   * Reverse the migrations.
   *
   * @return void
   */
  public function down()
  {

  }
}
