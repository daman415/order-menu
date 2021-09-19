@extends('layouts.template')

@push('css')
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="{{ asset('assets/dist/css/choices.min.css') }}">
@endpush


@section('content')


    <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
        <h1 class="h2">Orders</h1>
    </div>

    <div class="content">
        <div class="container-fluid">
            <div class="row justify-content-center">
                <div class="col-md-8">
                    <div class="card">
                        <div class="card-header">
                            Order Menu
                        </div>
                        <div class="card-body">

                            <form method="post" action="{{ route('pesanan.update',$pesanan->id) }}" enctype="multipart/form-data">
                                @method('PATCH')
                                @csrf
                                
                                <div class="row">
                                    <div class="form-group col-10">
                                        <label class="col-form-label">Nama Pemesan</label>
                                        <input type="text" value="{{$pesanan->nama_pemesan}}" name="nama_pemesan" placeholder="Masukkan Nama Pemesan"
                                            class="form-control" required>
                                    </div>
                                    <div class="form-group col-2">
                                        <label class="col-form-label">Nomor Meja</label>
                                        <input type="number" value="{{$pesanan->nomor_meja}}" name="nomor_meja" placeholder="1"
                                            class="form-control" required>
                                    </div>
                                </div>
                                <div class="row mt-3">
                                    <div class="fresh-datatables">
                                        <table id="datatables" class="table table-striped table-no-bordered table-hover"
                                            cellspacing="0" width="100%" style="width:100%">
                                            <thead>
                                                <tr>
                                                    <th class="text-center"><input type="checkbox" id="chkpilihsemua">
                                                    </th>
                                                    <th class="text-center">Nama Menu</th>
                                                    <th class="text-center">Harga</th>
                                                    <th class="text-center">Jumlah</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                @foreach ($menu as $index => $row)
                                                    <tr>
                                                        <td class="text-center"><input type="checkbox" name="itemsId[]"
                                                                value="{{ $row->id }}"></td>
                                                        <td class="text-center">{{ $row->nama }}</td>
                                                        <td class="text-center">{{ $row->harga }}</td>
                                                        <td class="text-center"><input type="number"
                                                                name="jumlah[{{ $row->id }}]" value="{{$pesanan->jumlah}}"></td>
                                                        
                                                    </tr>
                                                    <td class="text-center"><input type="hidden"
                                                        value="{{ $row->harga }}"
                                                        name="harga[{{ $row->id }}]"></td>
                                                @endforeach()
                                            </tbody>
                                        </table>
                                    </div>

                                </div>

                                <div class="form-footer text-right">
                                    <a href="{{ route('pesanan.create') }}" type="button"
                                        class="btn btn-secondary pull-left">Back</a>
                                    <button type="submit" class="btn btn-primary"> Order </button>
                                </div>
                            </form>

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection

@push('scripts')

    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.bundle.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    <script src="https://cdn.jsdelivr.net/gh/bbbootstrap/libraries@main/choices.min.js"></script>

@endpush
