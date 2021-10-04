@extends('layouts.template')

@section('content')

    <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
        <h1 class="h2">Menus</h1>
    </div>
    <div class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12">
                    <div class="card data-tables">
                        @if (session('added_success'))
                            <div class="alert alert-warning alert-dismissible fade show">
                                <button type="button" aria-hidden="true" class="close" data-dismiss="alert">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                                <span>
                                    <b> Berhasil - </b> {{ session('added_success') }}</span>
                            </div>
                        @elseif(session('edit_success'))
                            <div class="alert alert-warning alert-dismissible fade show">
                                <button type="button" aria-hidden="true" class="close" data-dismiss="alert">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                                <span>
                                    <b> Berhasil - </b> {{ session('edit_success') }}</span>
                            </div>
                        @elseif(session('hapus_success'))
                            <div class="alert alert-warning alert-dismissible fade show">
                                <button type="button" aria-hidden="true" class="close" data-dismiss="alert">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                                <span>
                                    <b> Berhasil - </b> {{ session('hapus_success') }}</span>
                            </div>
                        @endif
                        <div
                            class="card-body table-striped table-no-bordered table-hover dataTable dtr-inline table-full-width">
                            <div class="toolbar">
                                <div class="row">
                                    <div class="col-9">
                                        <h4 class="card-title col-5">Data Makanan</h4>
                                    </div>
                                    <div class="col-3">
                                        <a href="{{ route('menu.create') }}" type="button"
                                            class="btn btn-warning col-10">Tambah Data</a>
                                    </div>
                                </div>
                                </br>
                                <!--        Here you can write extra buttons/actions for the toolbar              -->
                            </div>
                            <div class="fresh-datatables">
                                <table id="datatables" class="table table-striped table-no-bordered table-hover"
                                    cellspacing="0" width="100%" style="width:100%">
                                    <thead>
                                        <tr>
                                            <th class="text-center">No</th>
                                            <th class="text-center">Nama</th>
                                            <th class="text-center">Harga</th>
                                            <th class="text-center">Deskripsi</th>
                                            <th class="text-center">Status</th>
                                            <th class="disabled-sorting text-center">Actions</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($makanan as $index => $row)
                                            <tr>
                                                <td class="text-center">{{ $index + 1 }}</td>
                                                <td class="text-center">{{ $row->nama }}</td>
                                                <td class="text-center">{{ $row->harga }}</td>
                                                <td class="text-center">{{ $row->desc }}</td>
                                                <td class="text-center {{$row->status == 1 ? 'bg-success' : 'bg-warning'}}">{{ $row->status == 1 ? 'Ready' : 'Habis' }}
                                                </td>
                                                <td class="text-center">
                                                    <a href="{{ route('menu.edit', $row->id) }}" type="button"
                                                        class="btn btn-warning"><i class="fa fa-edit"
                                                            title="Edit"></i></a>
                                                    <button type="button" class="btn btn-info" data-toggle="modal"
                                                        data-target="#modalHapusMenu{{ $row->id }}"
                                                        title="{{ $row->status == 1 ? 'Kosongkan' : 'Ready' }}"><i
                                                            class="fa {{ $row->status == 1 ? 'fa-times' : 'fa-check' }}"></i></button>
                                                </td>
                                            </tr>
                                        @endforeach()
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>

                    <div class="card data-tables mt-5">
                        <div
                            class="card-body table-striped table-no-bordered table-hover dataTable dtr-inline table-full-width">
                            <div class="toolbar">
                                <div class="row">
                                    <div class="col-9">
                                        <h4 class="card-title col-5">Data Minuman</h4>
                                    </div>
                                </div>
                                </br>
                                <!--        Here you can write extra buttons/actions for the toolbar              -->
                            </div>
                            <div class="fresh-datatables">
                                <table id="datatables" class="table table-striped table-no-bordered table-hover"
                                    cellspacing="0" width="100%" style="width:100%">
                                    <thead>
                                        <tr>
                                            <th class="text-center">No</th>
                                            <th class="text-center">Nama</th>
                                            <th class="text-center">Harga</th>
                                            <th class="text-center">Deskripsi</th>
                                            <th class="text-center">Status</th>
                                            <th class="disabled-sorting text-center">Actions</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($minuman as $index => $row)
                                            <tr>
                                                <td class="text-center">{{ $index + 1 }}</td>
                                                <td class="text-center">{{ $row->nama }}</td>
                                                <td class="text-center">{{ $row->harga }}</td>
                                                <td class="text-center">{{ $row->desc }}</td>
                                                <td class="text-center {{$row->status == 1 ? 'bg-success' : 'bg-warning'}}">{{ $row->status == 1 ? 'Ready' : 'Habis' }}
                                                </td>
                                                <td class="text-center">
                                                    <a href="{{ route('menu.edit', $row->id) }}" type="button"
                                                        class="btn btn-warning"><i class="fa fa-edit"
                                                            title="Edit"></i></a>
                                                    <button type="button" class="btn btn-info" data-toggle="modal"
                                                        data-target="#modalHapusMenu{{ $row->id }}"
                                                        title="{{ $row->status == 1 ? 'Kosongkan' : 'Ready' }}"><i
                                                            class="fa {{ $row->status == 1 ? 'fa-times' : 'fa-check' }}"></i></button>
                                                </td>
                                            </tr>
                                        @endforeach()
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    @foreach ($menu as $index => $row)
        <!-- Modal Hapus -->
        <div class="modal modal-alert py-5" id="modalHapusMenu{{ $row->id }}" tabindex="-1" role="dialog"
            aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content rounded-4 shadow">
                    <form method="post" action="{{ route('menu.destroy', $row->id) }}" enctype="multipart/form-data">
                        @method('DELETE')
                        @csrf
                        <div class="modal-body p-4 text-center">
                            <h5 class="mb-0">Apakah anda ingin mengubah data ini?</h5>
                            <p class="mb-0">Tekan tombol BACK untuk membatalkan mengubah data.</p>
                        </div>
                        <div class="modal-footer flex-nowrap p-0">
                            <button type="submit"
                                class="btn btn-lg btn-link fs-6 text-decoration-none col-6 m-0 rounded-0 border-right"><strong>Ya, Lanjutkan</strong></button>
                            <button type="button" class="btn btn-lg btn-link fs-6 text-decoration-none col-6 m-0 rounded-0"
                                data-dismiss="modal">Back</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    @endforeach

@endsection
