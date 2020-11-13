@extends('layouts/app')

@section('content')

<div class="container-fluid">
    <div class="block-header">
        <h2>PENGATURAN EMAIL UNTUK SELURUH TUJUAN</h2>
    </div>

    <div class="row clearfix">
        <div class="col-sm-12">
            <div class="card">
                <div class="header">
                    <h2>
                        PENGATURAN EMAIL
                    </h2>
                </div>

                <br>

                <div class="body">
                    <div class="table-responsive">
                        <table class="table table-striped table-hover">
                            <thead>
                                <tr>
                                    <th class="text-center" style="width: 10px;">No</th>
                                    <th>Tujuan</th>
                                    <th>Email</th>
                                    <th class="text-center">Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($setting as $key => $t)
                                <tr>
                                    <td class="text-center">{{ $key + 1 }}</td>
                                    <td>{{ $t->nama }}</td>
                                    <td class="text-primary">
                                        <u>
                                            {{ $t->email }}
                                        </u>
                                    </td>
                                    <td class="text-center">
                                        <button type="button" class="button-edit btn btn-xs btn-primary waves-effect" data-id="{{ $t->id }}" data-toggle="modal" data-target="#modalEdit">
                                            <i class="material-icons">create</i>
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

    <div class="modal fade" id="modalEdit" tabindex="-1" role="dialog">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h3 class="modal-title">DETAIL</h3>
                </div>
                <div class="modal-body">
                    <form method="POST" id="form-edit" action="">
                        @csrf
                        {{ method_field('PUT') }}
                        <div class="col-12">
                            <div class="form-group">
                                <div class="form-line">
                                    <label>Nama</label>
                                    <input id="nama" type="text" name="nama" class="form-control" placeholder="Nama" disabled>
                                </div>
                            </div>

                            <div class="form-group">
                                <div class="form-line">
                                    <label>Email</label>
                                    <input id="email" type="email" name="email" class="form-control" placeholder="Email" required>
                                </div>
                            </div>

                            <div class="form-group">
                                <button id="button-save" type="submit" class="btn btn-success waves-effect btn-block">Simpan</button>
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
    $('.button-edit').on('click', function() {
        $('#modal').modal('toggle');
        var id = $(this).attr("data-id");
        var url = "/admin/pengaturan/" + id;
        $.ajax({
            url: url,
            cache: false,
            success: function(result) {
                console.log(result)

                $('#nama').val(result.nama);
                $('#email').val(result.email);

                var action = "/admin/pengaturan/update/" + id;
                $("#form-edit").attr("action", action);

                $("#button-save").on('click', function() {
                    swal({
                        icon: 'success',
                        title: 'Sukses!',
                        text: 'Update data berhasil.',
                        buttons: false,
                        timer: 2000,
                    });
                });
            }
        })
    });
</script>
@endsection