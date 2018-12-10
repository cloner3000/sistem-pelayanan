<table>
    <thead>
    <tr>
        <td>Nama</td>
        <td>Nik</td>
        <td>Tanggal lahir</td>
        <td>Pekerjaan</td>
        <td>Alamat</td>
        <td>Sasaran</td>
        <td>Isi</td>
        <td>Alternatif</td>
    </tr>
    </thead>
    <tbody>
        @foreach($datas as $d)
            <tr>
                <td>{{$d->nama}}</td>
                <td>{{$d->nik}}</td>
                <td>{{date('d-m-Y',strtotime($d->tanggal_lahir))}}</td>
                <td>{{$d->pekerjaan}}</td>
                <td>{{$d->alamat}}</td>
                <td>{{$d->sasaran}}</td>
                <td>{{$d->isi}}</td>
                <td>{{$d->alternatif}}</td>
            </tr>
        @endforeach
    </tbody>
</table>