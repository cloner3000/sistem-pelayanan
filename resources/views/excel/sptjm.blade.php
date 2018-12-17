<table>
    <thead>
    <tr>
        <td>No Kartu Keluarga</td>
        <td>Nama Pemohon</td>
        <td>Nik Pemohon</td>
        <td>Tempat/tanggal lahir Pemohon</td>
        <td>Pekerjaan Pemohon</td>
        <td>Alamat Pemohon</td>

        <td>Nama Suami</td>
        <td>Nik Suami</td>
        <td>Tempat/tanggal lahir Suami</td>
        <td>Pekerjaan Suami</td>
        <td>Alamat Suami</td>

        <td>Nama Istri</td>
        <td>Nik Istri</td>
        <td>Tempat/tanggal lahir Istri</td>
        <td>Pekerjaan Istri</td>
        <td>Alamat Istri</td>

        <td>Nama Anak</td>
        <td>Tempat/tanggal lahir Anak</td>
        <td>Pekerjaan Anak</td>
        <td>Alamat Anak</td>

        <td>Nama Saksi 1</td>
        <td>Nik Saksi 1</td>
        <td>Nama Saksi 2</td>
        <td>Nik Saksi 2</td>
    </tr>
    </thead>
    <tbody>
        @foreach($datas as $d)
            <tr>
                <td>{{$d->no_kk}}</td>
                <td>{{$d->nama}}</td>
                <td>{{$d->nik}}</td>
                <td>{{$d->tempat}},{{date('d-m-Y',strtotime($d->tanggal))}}</td>
                <td>{{$d->pekerjaan}}</td>
                <td>{{$d->alamat}}</td>
                <td>{{$d->nama1}}</td>
                <td>{{$d->nik1}}</td>
                <td>{{$d->tempat1}},{{date('d-m-Y',strtotime($d->tanggal1))}}</td>
                <td>{{$d->pekerjaan1}}</td>
                <td>{{$d->alamat1}}</td>

                <td>{{$d->nama2}}</td>
                <td>{{$d->nik2}}</td>
                <td>{{$d->tempat2}},{{date('d-m-Y',strtotime($d->tanggal2))}}</td>
                <td>{{$d->pekerjaan2}}</td>
                <td>{{$d->alamat2}}</td> 
                @if(!empty($d->nama_anak))
                    <td>{{$d->nama_anak}}</td>
                @else
                    <td>-</td>                    
                @endif

                @if(!empty($d->tempat_anak) || !empty($d->tanggal_anak))
                    <td>{{$d->tempat_anak}},{{date('d-m-Y',strtotime($d->tanggal2))}}</td>
                @else
                    <td>-</td>
                @endif

                @if(!empty($d->nama_anak))
                    <td>{{$d->pekerjaan_anak}}</td>
                @else
                    <td>-</td>
                @endif

                @if(!empty($d->nama_anak))
                    <td>{{$d->alamat_anak}}</td>
                @else
                    <td>-</td>
                @endif

                <td>{{$d->s1_nama}}</td>
                <td>{{$d->s1_nik}}</td>
                <td>{{$d->s2_nama}}</td>
                <td>{{$d->s2_nik}}</td>
            </tr>
        @endforeach
    </tbody>
</table>