<?php

namespace App\Models;

use Illuminate\Support\Facades\DB;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Auth;


class Pesanan extends Model
{
    use HasFactory;

    protected $guarded = ['id'];

    public static function getRekap()
    {
        $id = Auth::user()->id;
        if ((Auth::user()->role == 'manager')) {
            $rekap = Pesanan::where('status', 1);
        } else {
            $rekap = Pesanan::where('user_id', $id)->where('status', 1)->get();
        }

        return $rekap;
    }

    public static function getPesanan()
    {
        $pesanan = Pesanan::where('status', 0)->get();
        return $pesanan;
    }

    public static function getPesananEdit($id)
    {
        $pesanan = Pesanan::where('id', $id)->get();
        return $pesanan;
    }
    public static function getPesananMenu()
    {
        $menu = Menu::where('status', 1)->get();
        return $menu;
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function order_list()
    {
        return $this->hasMany(OrderList::class);
    }

    // public static function log()
    // {
    //     DB::unprepared("CREATE TRIGGER `after_insert` AFTER INSERT ON `pesanans`
    //     FOR EACH ROW
    //     BEGIN
    //       INSERT INTO activity_log_pesanans (ket, access, user, new_data, date)
    //       VALUES (CONCAT('Insert data ke tabel pesanans, id = ', NEW.id), USER(), NEW.user_id, NEW.kode_pesanan, NOW());
    //     END");

    //     DB::unprepared("CREATE TRIGGER `after_update` AFTER UPDATE ON `pesanans`
    //     FOR EACH ROW
    //     BEGIN
    //       INSERT INTO activity_log_pesanans (ket, access, user, new_data, old_data, date)
    //       VALUES (CONCAT('Update data ke tabel pesanans, id = ', NEW.id), USER(), NEW.user_id, NEW.total_harga, OLD.total_harga, NOW());
    //     END");

    //     DB::unprepared("CREATE TRIGGER `before_delete` BEFORE DELETE ON `pesanans`
    //     FOR EACH ROW
    //     BEGIN
    //       INSERT INTO activity_log_pesanans (ket, access, user, old_data, date)
    //       VALUES (CONCAT('Delete data ke tabel pesanans, id = ', OLD.id), USER(), OLD.user_id, OLD.kode_pesanan, NOW());
    //     END");
    // }
}
