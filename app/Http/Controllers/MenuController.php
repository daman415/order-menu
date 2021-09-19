<?php

namespace App\Http\Controllers;

use App\Models\Menu;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class MenuController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $makanan = Menu::getMakanan();
        $minuman = Menu::getMinumam();
        $menu = Menu::all();
        return view('menu.menu', compact('menu','makanan','minuman'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('menu.menu-tambah');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'nama' => ['required'],
            'desc' => ['text'],
            'harga' => ['required','numeric'],
            'tipe' => ['required', 'in:makanan,minuman']
        ]);


        Menu::create([
            'nama' => $request->get('nama'),
            'desc' => $request->get('desc'),
            'harga' => $request->get('harga'),
            'tipe' => $request->get('tipe')
        ]);

        return redirect('menu')->with('added_success', 'Data Berhasil Ditambahkan');
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
        $menu = Menu::findOrFail($id);
        return view('menu.menu-edit', compact('menu'));
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
        $menu = Menu::findOrFail($id);

        $validator = Validator::make($request->all(), [
            'nama' => ['required'],
            'desc' => ['text'],
            'harga' => ['required','numeric'],
            'tipe' => ['required', 'in:makanan,minuman']
        ]);


        $menu->update([
            'nama' => $request->get('nama'),
            'desc' => $request->get('desc'),
            'harga' => $request->get('harga'),
            'tipe' => $request->get('tipe')
        ]);


        return redirect('menu')->with('edit_success', 'Data Berhasil Diubah');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $menu = Menu::findOrFail($id);

        if($menu->status == 0){
            $menu->update([
                'status' => 1
            ]);
            return redirect('menu')->with('hapus_success', 'Data Ready');
        } elseif($menu->status == 1){
            $menu->update([
                'status' => 0
            ]);
            return redirect('menu')->with('hapus_success', 'Data Kosong');
        }

        
    }
}
