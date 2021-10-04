<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Menu extends Model
{
    use HasFactory;

    protected $fillable = [
        'nama',
        'tipe',
        'harga',
        'desc',
        'status',
    ];

    public static function getMakanan()
    {
        $makanan = Menu::where('tipe', 'makanan')->orderBy('status','DESC')->orderBy('nama','ASC')->get();
        return $makanan;
    }
    public static function getMinumam()
    {
        $makanan = Menu::where('tipe', 'minuman')->orderBy('status','DESC')->orderBy('nama','ASC')->get();
        return $makanan;
    }
    public static function getMenu()
    {
        $menu = Menu::all();
        return $menu;
    }

    public function order_list(){
        return $this->hasMany(OrderList::class);
    }
}
