<table>
    <thead>
        <tr>
            <th style="text-align: center;">No</th>
            <th style="text-align: center;">Nama Tamu</th>
            <th style="text-align: center;">NIK</th>
            <th style="text-align: center;">No HP</th>
            <th style="text-align: center;">Alamat</th>
            <th style="text-align: center;">Deskripsi</th>
            <th style="text-align: center;">Tujuan</th>
            <th style="text-align: center;">Tanggal Pengajuan</th>
        </tr>
    </thead>
    <tbody>
        @foreach($tamu as $key => $t)
        <tr>
            <td style="text-align: center;">{{ $key + 1 }}</td>
            <td>{{ $t->nama_tamu }}</td>
            <td>{{ $t->nik_ktp }}</td>
            <td>{{ $t->no_hp }}</td>
            <td>{{ $t->alamat }}</td>
            <td>{{ $t->deskripsi }}</td>
            <td>
                @if($t->tujuan == 1)
                Kepala Sekolah
                @elseif($t->tujuan == 2)
                Tata Usaha
                @elseif($t->tujuan == 3)
                Kesiswaan
                @elseif($t->tujuan == 4)
                Kurikulum
                @elseif($t->tujuan == 5)
                Humas
                @elseif($t->tujuan == 6)
                Ketua Jurusan
                @elseif($t->tujuan == 7)
                Wali Kelas
                @else
                Tidak ditemukan!
                @endif
            </td>
            <td>{{ $t->created_at }}</td>
        </tr>
        @endforeach
    </tbody>
</table>