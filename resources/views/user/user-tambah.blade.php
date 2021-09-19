@extends('layouts.template')

@section('content')

    <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
        <h1 class="h2">Users</h1>
    </div>

    <div class="content">
        <div class="container-fluid">
            <div class="row justify-content-center">
                <div class="col-md-8">
                    <div class="card">
                        <div class="card-header">
                            Tambah User
                        </div>
                        <div class="card-body">
                            
                            <form method="post" action="{{ route('user.store') }}" enctype="multipart/form-data">
                               @csrf
                                <input type="hidden" name="id" class="form-control" value="">
                                <div class="form-group">
                                    <label class="col-form-label">Nama User</label>
                                    <input type="text" value="" name="name" placeholder="Masukkan nama User"
                                        class="form-control" required>
                                </div>
                                <div class="form-group">
                                    <label class="col-form-label">Email User</label>
                                    <input type="email" value="" name="email" placeholder="Masukkan Email User"
                                        class="form-control" required>
                                </div>
                                <div class="form-group">
                                    <label class="col-form-label">Password User</label>
                                    <input type="password" value="" name="password" placeholder="Masukkan Password User"
                                        class="form-control" required>
                                </div>
                                <div class="form-group">
                                    <label class="col-form-label">Role User</label></br>
                                    <div class="custom-control custom-radio custom-control-inline">
                                        <input type="radio" id="role1" name="role"
                                            class="custom-control-input" value="kasir" required>
                                        <label class="custom-control-label" for="role1">Kasir</label>
                                    </div>
                                    <div class="custom-control custom-radio custom-control-inline">
                                        <input type="radio" id="role2" name="role"
                                            class="custom-control-input" value="pelayan" required>
                                        <label class="custom-control-label" for="role2">Pelayan</label>
                                    </div>
                                </div>
                                <div class="form-footer text-right">
                                    <a href="{{ route('user.index') }}" type="button" class="btn btn-secondary pull-left">Back</a>
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
