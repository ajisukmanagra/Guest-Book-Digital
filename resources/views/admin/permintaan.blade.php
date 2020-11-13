@extends('layouts/app')
@section('permintaan', 'active')

@section('content')
<div class="container-fluid">
    <div class="block-header">
        <h2>DATA PERMINTAAN PERTEMUAN</h2>
    </div>

    <div class="row clearfix">
        <div class="col-sm-12">
            <div class="card">
                <div class="header">
                    <h2>
                        PERMINTAAN PERTEMUAN <small>(Pengajuan Tamu)</small>
                    </h2>
                </div>

                <br>

                <div class="container-fluid">
                    <form action="/admin/permintaan" method="GET">
                        <div class="row clearfix">
                            <div class="col-sm-4">
                                <select name="cari" class="form-control">
                                    <option value="">-- pilih tujuan --</option>
                                    <option value="1">Kepala Sekolah</option>
                                    <option value="2">Tata Usaha</option>
                                    <option value="3">Kesiswaan</option>
                                    <option value="4">Kurikulum</option>
                                    <option value="5">Humas</option>
                                    <option value="6">Ketua Jurusan</option>
                                    <option value="7">Wali Kelas</option>
                                </select>
                            </div>
                            <div class="col-sm-1" style="margin-top: 5px;">
                                <button type="submit" class="btn btn-sm btn-primary waves-effect">Cari</button>
                            </div>
                            <div class="col-sm-7">
                                <div class="pull-right">
                                    <button type="button" class="btn btn-md btn-success waves-effect" data-toggle="modal" data-target="#modalExport">Export Excel</button>
                                    <a href="/admin/cetak_permintaan_pdf" target="_blank" class="btn btn-md btn-danger waves-effect">
                                        Cetak PDF
                                    </a>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>

                <div class="body">
                    <div class="table-responsive">
                        <table class="table table-striped table-hover" id="table">
                            <thead>
                                <tr>
                                    <th class="text-center" style="width: 10px;">No</th>
                                    <th>Nama Tamu</th>
                                    <th>NIK</th>
                                    <th>No Telepon</th>
                                    <!-- <th>Alamat</th>
                                    <th>Deskripsi</th> -->
                                    <th>Tujuan</th>
                                    <th>Tanggal Pengajuan</th>
                                    <!-- <th>Foto</th> -->
                                    <th class="text-center">Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($tamu as $key => $t)
                                <tr>
                                    <td class="text-center">{{ $key + 1 }}</td>
                                    <td>{{ $t->nama_tamu }}</td>
                                    <td>{{ $t->nik_ktp }}</td>
                                    <td>{{ $t->no_hp }}</td>
                                    <!-- <td>{{ $t->alamat }}</td>
                                    <td>{{ $t->deskripsi }}</td> -->
                                    <td>
                                        @if($t->tujuan == 1)
                                        <button class="btn btn-xs btn-success waves-effect">Kepala Sekolah</button>
                                        @elseif($t->tujuan == 2)
                                        <button class="btn btn-xs btn-success waves-effect">Tata Usaha</button>
                                        @elseif($t->tujuan == 3)
                                        <button class="btn btn-xs btn-success waves-effect">Kesiswaan</button>
                                        @elseif($t->tujuan == 4)
                                        <button class="btn btn-xs btn-success waves-effect">Kurikulum</button>
                                        @elseif($t->tujuan == 5)
                                        <button class="btn btn-xs btn-success waves-effect">Humas</button>
                                        @elseif($t->tujuan == 6)
                                        <button class="btn btn-xs btn-success waves-effect">Ketua Jurusan</button>
                                        @elseif($t->tujuan == 7)
                                        <button class="btn btn-xs btn-success waves-effect">Wali Kelas</button>
                                        @else
                                        <button class="btn btn-xs btn-danger waves-effect">Tidak ditemukan!</button>
                                        @endif
                                    </td>
                                    <td>{{ \Carbon\Carbon::parse($t->created_at)->translatedFormat('d F Y - H:i') }}</td>
                                    <!-- <td><img src="{{ asset($t->foto) }}" width="100px" height="100px"></td> -->
                                    <td class="text-center">
                                        <button type="button" class="button-show btn btn-xs btn-primary waves-effect" data-id="{{ $t->id }}" data-toggle="modal" data-target="#modalShow">
                                            <i class="material-icons">visibility</i>
                                        </button>

                                        <button type="button" data-id="{{ $t->id }}" class="button-delete btn btn-xs btn-danger waves-effect">
                                            <i class="material-icons">delete_forever</i>
                                        </button>
                                    </td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>


    <div class="modal fade" id="modalShow" tabindex="-1" role="dialog">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h3 class="modal-title">DETAIL TAMU</h3>
                </div>
                <div class="modal-body">
                    <div class="col-12">
                        <div class="form-group">
                            <div class="form-line">
                                <label>Nama Tamu</label>
                                <input id="nama_tamu" type="text" name="nama_tamu" class="form-control" placeholder="Nama" disabled>
                            </div>
                        </div>

                        <div class="form-group">
                            <div class="form-line">
                                <label>NIK KTP</label>
                                <input id="nik_ktp" type="text" name="nik_ktp" class="form-control" placeholder="NIK" disabled>
                            </div>
                        </div>

                        <div class="form-group">
                            <div class="form-line">
                                <label>NO HP</label>
                                <input id="no_hp" type="text" name="no_hp" class="form-control" placeholder="No HP" disabled>
                            </div>
                        </div>

                        <div class="form-group">
                            <div class="form-line">
                                <label>Alamat</label>
                                <input id="alamat" type="text" name="alamat" class="form-control" placeholder="Alamat" disabled>
                            </div>
                        </div>

                        <div class="form-group">
                            <div class="form-line">
                                <label>Deskripsi</label>
                                <input id="deskripsi" type="text" name="deskripsi" class="form-control" placeholder="Deskripsi" disabled>
                            </div>
                        </div>

                        <div class="form-group">
                            <label>Foto</label>
                            <img id="foto" width="100%">
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-link waves-effect" data-dismiss="modal">TUTUP</button>
                </div>
            </div>
        </div>
    </div>

    <div class="modal fade" id="modalExport" tabindex="-1" role="dialog">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h3 class="modal-title">EXPORT EXCEL</h3>
                </div>
                <div class="modal-body">
                    <form action="/admin/export_permintaan_excel_date" method="GET">
                        <div class="row clearfix">
                            <div class="col-sm-5">
                                <select id="option" name="option" class="form-control" required>
                                    <option value="">-- pilih option --</option>
                                    <option value="<">Kurang dari tanggal</option>
                                    <option value=">">Lebih dari tanggal</option>
                                </select>
                            </div>
                            <div class="col-sm-5">
                                <input id="tanggal" type="date" class="form-control" name="tanggal" required>
                            </div>
                            <div class="col-sm-2">
                                <button id="export" type="submit" class="btn btn-primary waves-effect">Export</button>
                            </div>
                        </div>

                        <br>

                        <div class="row clearfix">
                            <div class="col-sm-12">
                                <a href="/admin/export_permintaan_excel_all" target="_blank" class="btn btn-success waves-effect pull-right btn-block">Export Semua Data</a>
                            </div>
                        </div>
                    </form>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-link waves-effect" data-dismiss="modal">TUTUP</button>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

@section('js')
<script src="{{ asset('js/jquery.min.js') }}"></script>
<script src="{{ asset('js/sweetalert.min.js') }}"></script>
<script>
    $(".button-delete").on('click', function() {
        var id = $(this).attr("data-id");
        var url = "/admin/permintaan/hapus/" + id;
        console.log(url);
        swal({
                icon: 'warning',
                title: 'Apakah anda yakin?',
                text: 'Data tamu ini tidak akan bisa dipulihkan setelah dihapus.',
                buttons: ['Batal', 'Ya'],
                dangerMode: true,
            })
            .then((willDelete) => {
                if (willDelete) {
                    swal({
                        icon: 'success',
                        title: 'Sukses!',
                        text: 'Data tamu berhasil dihapus',
                        timer: 1500,
                        buttons: false,
                    });
                    setTimeout(function() {
                        window.location.href = url;
                    }, 1000);
                }
            })
    });

    $('.button-show').on('click', function() {
        $('#modal').modal('toggle');
        var id = $(this).attr("data-id");
        var url = "/admin/permintaan/" + id;
        $.ajax({
            url: url,
            cache: false,
            success: function(result) {
                console.log(result)

                $('#nama_tamu').val(result.nama_tamu);
                $('#nik_ktp').val(result.nik_ktp);
                $('#no_hp').val(result.no_hp);
                $('#alamat').val(result.alamat);
                $('#deskripsi').val(result.deskripsi);
                $('#img').val(result.foto);
                var src = result.foto;
                $('#foto').attr("src", src);
            }
        })
    });

    $('#export').on('click', function() {
        var option = $("#option").val();
        var tanggal = $("#tanggal").val();

        if (option.length < 1) {
            swal({
                icon: 'warning',
                title: 'Error!',
                text: 'Silahkan pilih option.',
                buttons: false,
                timer: 2000,
            });
        } else if (tanggal.length < 1) {
            swal({
                icon: 'warning',
                title: 'Error!',
                text: 'Silahkan tentukan tanggal.',
                buttons: false,
                timer: 2000,
            });
        } else {
            swal({
                icon: 'success',
                title: 'Berhasil!',
                text: 'File sedang didownload ....',
                buttons: false,
                timer: 3000,
            });
        }
    });
</script>
@endsection