<?php

namespace Database\Seeders;

use App\Models\Menu;
use Illuminate\Database\Seeder;

class MenuSeeders extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $menus = [
            [
                'nama' => 'Nasi Goreng',
                'tipe' => 'makanan',
                'harga' => 15000,
                'desc' => 'Nasi goreng luar biasa'
            ],
            [
                'nama' => 'Soto Nasi',
                'tipe' => 'makanan',
                'harga' => 13000,
                'desc' => 'Soto ayam ditambah nasi'
            ],
            [
                'nama' => 'Sup Iga',
                'tipe' => 'makanan',
                'harga' => 25000,
                'desc' => 'Sup dengan tulang Iga istimewa'
            ],
            [
                'nama' => 'Es Teh',
                'tipe' => 'minuman',
                'harga' => 5000,
                'desc' => 'Teh es segar'
            ],
            [
                'nama' => 'Jus Mangga',
                'tipe' => 'minuman',
                'harga' => 10000,
                'desc' => 'Jus dengan buah mangga pilihan'
            ],
            [
                'nama' => 'Coffe Late',
                'tipe' => 'minuman',
                'harga' => 15000,
                'desc' => 'Varian kopi late'
            ]
        ];

        foreach ($menus as $menu) {
            Menu::create($menu);
        }
    }
}
