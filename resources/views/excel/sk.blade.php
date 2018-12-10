<table>
    <thead>
    <tr>
        <td>Nama</td>
        <td>Nik</td>
        <td>Jenis kelamin</td>
        <td>Tempat/Tanggal Lahir</td>
        <td>Pekerjaan</td>
        <td>Alamat</td>
        <td>Kewarganegaraan</td>
        <td>Agama</td>
        <td>Keperluan</td>
        <td>Keterangan</td>
    </tr>
    </thead>
    <tbody>
        @foreach($datas as $d)
            <tr>
                <td>{{$d->nama}}</td>
                <td>{{$d->nik}}</td>
                <td>{{$d->jenis_kelamin}}</td>
                <td>{{$d->tempat}},{{date('d-m-Y',strtotime($d->tanggal))}}</td>
                <td>{{$d->pekerjaan}}</td>
                <td>{{$d->alamat}}</td>
                <td>{{$d->kewarganegaraan}}</td>
                <td>{{$d->agama}}</td>
                <td>{{$d->keperluan}}</td>
                <td>{{$d->keterangan}}</td>
            </tr>
        @endforeach
    </tbody>
</table>