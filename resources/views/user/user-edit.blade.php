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
                            Edit User
                        </div>
                        <div class="card-body">
                            
                            <form method="post" action="{{ route('user.update',$user->id) }}" enctype="multipart/form-data">
                                @method('PATCH')
                                @csrf
                                <input type="hidden" name="id" class="form-control" value="{{$user->id}}">
                                <div class="form-group">
                                    <label class="col-form-label">Nama User</label>
                                    <input type="text" value="{{ $user->name }}" name="name" placeholder="Masukkan nama User"
                                        class="form-control" required>
                                </div>
                                <div class="form-group">
                                    <label class="col-form-label">Email User</label>
                                    <input type="email" value="{{ $user->email }}" name="email" placeholder="Masukkan Email User"
                                        class="form-control" required>
                                </div>
                                <div class="form-group">
                                    <label class="col-form-label">Role User</label></br>
                                    <div class="custom-control custom-radio custom-control-inline">
                                        <input type="radio" id="role1" name="role"
                                            class="custom-control-input" value="kasir" {{ ($user->role == "kasir") ? "checked" : "" }} {{ ($user->role == "manager") ? "disabled" : "" }}>
                                        <label class="custom-control-label" for="role1">Kasir</label>
                                    </div>
                                    <div class="custom-control custom-radio custom-control-inline">
                                        <input type="radio" id="role2" name="role"
                                            class="custom-control-input" value="pelayan" {{ ($user->role == "pelayan") ? "checked" : "" }} {{ ($user->role == "manager") ? "disabled" : "" }}>
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
