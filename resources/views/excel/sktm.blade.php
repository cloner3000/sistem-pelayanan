<table>
    <thead>
    <tr>
        <td>Nama</td>
        <td>Nik</td>
        <td>Tempat/Tanggal lahir</td>
        <td>Pekerjaan</td>
        <td>Alamat</td>
        <td>Kewarganegaraan</td>
        <td>Agama</td>
        <td>Keperluan</td>
        <td>Nama Ayah</td>
        <td>Nama Ibu</td>
    </tr>
    </thead>
    <tbody>
        @foreach($datas as $d)
            <tr>
                <td>{{$d->nama}}</td>
                <td>{{$d->nik}}</td>
                <td>{{$d->tempat}},{{date('d-m-Y',strtotime($d->tanggal))}}</td>
                <td>{{$d->pekerjaan}}</td>
                <td>{{$d->alamat}}</td>
                <td>{{$d->kewarganegaraan}}</td>
                <td>{{$d->agama}}</td>
                <td>{{$d->keperluan}}</td>
                <td>{{$d->n_ayah}}</td>
                <td>{{$d->n_ibu}}</td>
            </tr>
        @endforeach
    </tbody>
</table>