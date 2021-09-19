<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Auth;


class Pesanan extends Model
{
    use HasFactory;

    protected $guarded = ['id'];

    public static function getRekap(){
        $id = Auth::user()->id;
        if ( (Auth::user()->role == 'manager')) {
            $rekap = Pesanan::where('status',1);
        } else{
            $rekap = Pesanan::where('user_id',$id)->where('status',1)->get();
        }

        return $rekap;
    }

    public static function getPesanan(){
        $pesanan = Pesanan::where('status',0)->get();
        return $pesanan;
    }

    public static function getPesananEdit($id){
        $pesanan = Pesanan::where('id',$id)->get();
        return $pesanan;
    }
    public static function getPesananMenu(){
        $menu = Menu::where('status',1)->get();
        return $menu;
    }

    public function user(){
        return $this->belongsTo(User::class);
    }

    public function order_list(){
        return $this->hasMany(OrderList::class);
    }
}
