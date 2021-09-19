<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Auth;
use App\Models\Menu;
use App\Models\OrderList;
use App\Models\Pesanan;
use Illuminate\Http\Request;

class PesananController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $pesanan = Pesanan::getPesanan();
        return view('pesanan.pesanan', compact('pesanan'));
    }
    public function rekap()
    {
        $rekap = Pesanan::getRekap();
        return view('pesanan.rekap', compact('rekap'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $menu = Pesanan::getPesananMenu();
        return view('pesanan.order', compact('menu'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $date = date(now()->format('dmY'));
        $cek = Pesanan::count();
        if ($cek == 0) {
            $no = '1001';
            $kode = 'ABC' . $date . '-' . $no;
        } else {
            $terakhir = Pesanan::all()->last();
            $no = (int)substr($terakhir->kode_pesanan, -4) + 1;
            $kode = 'ABC' . $date . '-' . $no;
        };

        $itemsId = $request->get('itemsId');
        if (is_null($itemsId)) {
            return redirect('order')->with('hapus_success', 'Anda belum memilih menu');
        } else {
            $id = $request->get('user_id');
            $meja = $request->get('nomor_meja');
            $nama = $request->get('nama_pemesan');

            $pesanan = new Pesanan;
            $pesanan->kode_pesanan = $kode;
            $pesanan->user_id = $id;
            $pesanan->nomor_meja = $meja;
            $pesanan->nama_pemesan = $nama;
            $pesanan->status = 0;
            $pesanan->save();

            $pesananId = $pesanan->id;
            $totalItem = count($itemsId);
            $jumlah = $request->get('jumlah');
            $harga = $request->get('harga');
            $tot = 0;
            for ($i = 0; $i < $totalItem; $i++) {
                $pid = $itemsId[$i];
                $jum = $jumlah[$pid];
                $har = $harga[$pid];

                $tot += ($jum * $har);

                $orderList = new OrderList;
                $orderList->menu_id = $pid;
                $orderList->pesanan_id = $pesananId;
                $orderList->jumlah = $jum;
                $orderList->harga = $har;
                $orderList->save();
            }

            $total_harga = $tot;
            $pesanId = $orderList->pesanan_id;
            $cek = Pesanan::findOrFail($pesanId);
            $cek->update([
                'total_harga' => $total_harga,
            ]);

            return redirect('pesanan')->with('added_success', 'Pesanan Berhasil diproses');
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $pesanan = Pesanan::findOrFail($id);
        $menu = Menu::all();
        return view('pesanan.order-edit', compact('pesanan', 'menu'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $itemsId = $request->get('itemsId');
        $meja = $request->get('nomor_meja');
        $nama = $request->get('nama_pemesan');

        $pesan = Pesanan::findOrFail($id);
        $pesan->update([
            'nomor_meja' => $meja,
            'nama_pemesan' => $nama
        ]);
        // $pesanan = new Pesanan;
        // $pesanan->nomor_meja = $meja;
        // $pesanan->nama_pemesan = $nama;
        // $pesanan->update();

        $pesananId = $id;
        $totalItem = count($itemsId);
        $jumlah = $request->get('jumlah');
        $harga = $request->get('harga');
        $tot = 0;
        for ($i = 0; $i < $totalItem; $i++) {
            $pid = $itemsId[$i];
            $jum = $jumlah[$pid];
            $har = $harga[$pid];

            $tot += ($jum * $har);

            $orderList = new OrderList;
            $orderList->menu_id = $pid;
            $orderList->pesanan_id = $pesananId;
            $orderList->jumlah = $jum;
            $orderList->harga = $har;
            $orderList->save();
        }

        $total_harga = $tot;
        $pesanId = $orderList->pesanan_id;
        $cek = Pesanan::findOrFail($pesanId);
        $cek->update([
            'total_harga' => $total_harga,
        ]);

        return redirect('pesanan')->with('added_success', 'Pesanan Berhasil diproses');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $pesanan = Pesanan::findOrFail($id);
        $pesanan->update([
            'status' => 1
        ]);
        return redirect('pesanan')->with('hapus_success', 'Pesenan Selesai');
    }
}
