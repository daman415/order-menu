@extends('layouts.template')

@push('css')
    
@endpush

@section('content')

    <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
        <h1 class="h2">Rekapitulasi</h1>
    </div>
    <div class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12">
                    <div class="card data-tables">

                        <div class="card-body table-striped table-no-bordered table-hover dataTable dtr-inline table-full-width"
                            id="print">
                            <div class="toolbar">
                                <div class="row">
                                    <div class="col-9">
                                        <h4 class="card-title col-5">Rekap Pesanan</h4>
                                    </div>
                                    <div class="col-3">
                                        <a href="javascript:printDiv('print');" type="button"
                                            class="btn btn-secondary col-10 no-print"><i class="fa fa-print"></i> Cetak
                                            Rekap</a>
                                    </div>
                                </div>
                                </br>
                                <!--        Here you can write extra buttons/actions for the toolbar              -->
                            </div>
                            <div class="fresh-datatables">
                                <table id="datatables" class="table table-striped table-no-bordered table-hover"
                                    cellspacing="0" width="100%" style="width:100%" border="1">
                                    <thead>
                                        <tr>
                                            <th class="text-center">No</th>
                                            <th class="text-center">Kode Pesanan</th>
                                            <th class="text-center">Nama Pemesan</th>
                                            <th class="text-center">Nomor Meja</th>
                                            <th class="text-center">Total Harga</th>
                                            <th class="text-center">Tanggal</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($rekap as $index => $row)
                                            <tr>
                                                <td class="text-center">{{ $index + 1 }}</td>
                                                <td class="text-center">{{ $row->kode_pesanan }}</td>
                                                <td class="text-center">{{ $row->nama_pemesan }}</td>
                                                <td class="text-center">{{ $row->nomor_meja }}</td>
                                                <td class="text-center">{{ $row->total_harga }}</td>
                                                <td class="text-center">{{ $row->created_at }}</td>
                                            </tr>
                                        @endforeach()
                                    </tbody>
                                </table>
                            </div>
                        </div>
                        <textarea id="printing-css" style="display:none;">.no-print{display:none}</textarea>
                        <iframe id="printing-frame" name="print_frame" src="about:blank" style="display:none;"></iframe>
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection

@push('scripts')
    <script>
        function printDiv(elementId) {
            var a = document.getElementById('printing-css').value;
            var b = document.getElementById(elementId).innerHTML;
            window.frames["print_frame"].document.title = document.title;
            window.frames["print_frame"].document.body.innerHTML = '<style>' + a + '</style>' + b;
            window.frames["print_frame"].window.focus();
            window.frames["print_frame"].window.print();
        }
    </script>
@endpush
