<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\DB;

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

    DB::unprepared("CREATE TRIGGER `after_insert` AFTER INSERT ON `pesanans`
        FOR EACH ROW
        BEGIN
          INSERT INTO activity_log_pesanans (ket, access, user, new_data, date)
          VALUES (CONCAT('Insert data ke tabel pesanans, id = ', NEW.id), USER(), NEW.user_id, NEW.kode_pesanan, NOW());
        END");

    DB::unprepared("CREATE TRIGGER `after_update` AFTER UPDATE ON `pesanans`
        FOR EACH ROW
        BEGIN
          INSERT INTO activity_log_pesanans (ket, access, user, new_data, old_data, date)
          VALUES (CONCAT('Update data ke tabel pesanans, id = ', NEW.id), USER(), NEW.user_id, NEW.total_harga, OLD.total_harga, NOW());
        END");

    DB::unprepared("CREATE TRIGGER `before_delete` BEFORE DELETE ON `pesanans`
        FOR EACH ROW
        BEGIN
          INSERT INTO activity_log_pesanans (ket, access, user, old_data, date)
          VALUES (CONCAT('Delete data ke tabel pesanans, id = ', OLD.id), USER(), OLD.user_id, OLD.kode_pesanan, NOW());
        END");
  }

  /**
   * Reverse the migrations.
   *
   * @return void
   */
  public function down()
  {
    Schema::dropIfExists('after_insert');
    Schema::dropIfExists('after_update');
    Schema::dropIfExists('before_delete');
  }
}
