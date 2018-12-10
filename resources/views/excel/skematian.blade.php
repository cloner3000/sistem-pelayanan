<table>
    <thead>
    <tr>
        <td>Nama</td>
        <td>Nik</td>
        <td>Jenis kelamin</td>
        <td>Tanggal lahir</td>
        <td>Agama</td>
        <td>Alamat</td>
        <td>Waktu</td>
        <td>Tempat</td>
        <td>Penyebab</td>
        <td>Nik Pelapor</td>
        <td>Nama Pelapor</td>
        <td>Tempat/Tanggal Lahir Pelapor</td>
        <td>Pekerjaan Pelapor</td>
        <td>Alamat Pelapor</td>
        <td>Pekerjaan Pelapor</td>
        <td>Hubungan Pelapor</td>
    </tr>
    </thead>
    <tbody>
        @foreach($datas as $d)
            <tr>
                <td>{{$d->nama}}</td>
                <td>{{$d->nik}}</td>
                <td>{{$d->jenis_kelamin}}</td>
                <td>{{date('d-m-Y',strtotime($d->tanggal_lahir))}}</td>
                <td>{{$d->agama}}</td>
                <td>{{$d->alamat}}</td>
                <td>{{$d->waktu}}</td>
                <td>{{$d->tempat}}</td>
                <td>{{$d->penyebab}}</td>
                <td>{{$d->p_nik}}</td>
                <td>{{$d->p_nama}}</td>
                <td>{{$d->p_tempat}},{{date('d-m-Y',strtotime($d->p_tanggal))}}</td>
                <td>{{$d->p_pekerjaan}}</td>
                <td>{{$d->p_alamat}}</td>
                <td>{{$d->p_pekerjaan}}</td>
                <td>{{$d->p_hubungan}}</td>
            </tr>
        @endforeach
    </tbody>
</table>