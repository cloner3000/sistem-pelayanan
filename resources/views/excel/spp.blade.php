<table>
    <thead>
    <tr>
        <td>NIK</td>
        <td>Nama</td>
        <td>No KK</td>
        <td>Kepala Keluarga</td>
        <td>Alamat Sekarang</td>
        <td>Alamat Tujuan</td>
        <td>Jumlah Pindah</td>
    </tr>
    </thead>
    <tbody>
        @foreach($datas as $d)
            <tr>
                <td>{{$d->nik}}</td>
                <td>{{$d->nama}}</td>
                <td>{{$d->no_kk}}</td>
                <td>{{$d->kepala_keluarga}}</td>
                <td>{{$d->alamat_sekarang}}</td>
                <td>{{$d->alamat_tujuan}}</td>
                <td>{{$d->jumlah_pindah}}</td>
            </tr>
        @endforeach
    </tbody>
</table>