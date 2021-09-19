@extends('layouts.template')

@section('content')

    <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
        <h1 class="h2">Menus</h1>
    </div>

    <div class="content">
        <div class="container-fluid">
            <div class="row justify-content-center">
                <div class="col-md-8">
                    <div class="card">
                        <div class="card-header">
                            Tambah Menu
                        </div>
                        <div class="card-body">
                            
                            <form method="post" action="{{ route('menu.store') }}" enctype="multipart/form-data">
                               @csrf
                                <input type="hidden" name="id" class="form-control" value="">
                                <div class="form-group">
                                    <label class="col-form-label">Nama Menu</label>
                                    <input type="text" value="" name="nama" placeholder="Masukkan Nama Menu"
                                        class="form-control" required>
                                </div>
                                <div class="form-group">
                                    <label class="col-form-label">Harga Menu</label>
                                    <input type="numeric" value="" name="harga" placeholder="Masukkan Harga Menu"
                                        class="form-control" required>
                                </div>
                                <div class="form-group">
                                    <label class="col-form-label">Deskripsi</label>
                                    <textarea name="desc" class="form-control"></textarea>
                                </div>
                                <div class="form-group">
                                    <label class="col-form-label">Tipe</label></br>
                                    <div class="custom-control custom-radio custom-control-inline">
                                        <input type="radio" id="tipe1" name="tipe"
                                            class="custom-control-input" value="makanan" required>
                                        <label class="custom-control-label" for="tipe1">Makanan</label>
                                    </div>
                                    <div class="custom-control custom-radio custom-control-inline">
                                        <input type="radio" id="tipe2" name="tipe"
                                            class="custom-control-input" value="minuman" required>
                                        <label class="custom-control-label" for="tipe2">Minuman</label>
                                    </div>
                                </div>
                                <div class="form-footer text-right">
                                    <a href="{{ route('menu.index') }}" type="button" class="btn btn-secondary pull-left">Back</a>
                                    <button type="submit" class="btn btn-primary"> Simpan </button>
                                </div>
                            </form>
                           
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection
