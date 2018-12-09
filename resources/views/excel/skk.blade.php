<table>
    <thead>
        <tr>
            <th>Kabupaten</th>
            <th>Kecamatan</th>
            <th>Desa</th>
            <th>Nama kepala keluarga</th>
            <th>No KK</th>
            <th>Nama</th>
            <th>Jenis kelamin</th>
            <th>Tempat/Tanggal lahir</th>
            <th>Jenis kelahiran</th>
            <th>Kelahiran_ke</th>
            <th>Berat</th>
            <th>Panjang</th>
            <th>NIK Ibu</th>
            <th>Nama Ibu</th>
            <th>Tanggal lahir Ibu</th>
            <th>Pekerjaan Ibu</th>
            <th>Alamat Ibu</th>
            <th>Kewarganegaraan Ibu</th>
            <th>Kebangsaan Ibu</th>
            <th>Tanggal perkawinan Ibu</th>
            <th>NIK Ayah</th>
            <th>Nama Ayah</th>
            <th>Tanggal lahir Ayah</th>
            <th>Pekerjaan Ayah</th>
            <th>Alamat Ayah</th>
            <th>Kewarganegaraan Ayah</th>
            <th>Kebangsaan Ayah</th>
            <th>Tanggal perkawinan Ayah</th>
            <th>NIK Pelapor</th>
            <th>Nama Pelapor</th>
            <th>Umur Pelapor</th>
            <th>Jenis kelamin Pelapor</th>
            <th>Pekerjaan Pelapor</th>
            <th>Alamat Pelapor</th>
            <th>NIK Saksi 1</th>
            <th>Nama Saksi 1</th>
            <th>Umur Saksi 1</th>
            <th>Pekerjaan Saksi 1</th>
            <th>Alamat Saksi 1</th>
            <th>NIK Saksi 2</th>
            <th>Nama Saksi 2</th>
            <th>Umur Saksi 2</th>
            <th>Pekerjaan Saksi 2</th>
            <th>Alamat Saksi 2</th>
        </tr>
    </thead>
    <tbody>
        @foreach($datas as $d)
            <tr>
                <td>{{$d->kabupaten}}</td>
                <td>{{$d->kecamatan}}</td>
                <td>{{$d->desa}}</td>
                <td>{{$d->nama_kepala_keluarga}}</td>
                <td>{{$d->no_kk}}</td>
                <td>{{$d->b_nama}}</td>
                <td>{{$d->b_jenis_kelamin}}</td>
                <td>{{$d->b_tempat}},{{date('d-m-Y',strtotime($d->b_tanggal))}}</td>
                <td>{{$d->b_jenis_kelahiran}}</td>
                <td>{{$d->b_kelahiran_ke}}</td>
                <td>{{$d->b_berat}}</td>
                <td>{{$d->b_panjang}}</td>
                <td>{{$d->i_nik}}</td>
                <td>{{$d->i_nama}}</td>
                <td>{{date('d-m-Y',strtotime($d->i_tanggal_lahir))}}</td>
                <td>{{$d->i_pekerjaan}}</td>
                <td>{{$d->i_alamat}}</td>
                <td>{{$d->i_kewarganegaraan}}</td>
                <td>{{$d->i_kebangsaan}}</td>
                <td>{{date('d-m-Y',strtotime($d->i_tanggal_perkawinan))}}</td>
                <td>{{$d->a_nik}}</td>
                <td>{{$d->a_nama}}</td>
                <td>{{date('d-m-Y',strtotime($d->a_tanggal_lahir))}}</td>
                <td>{{$d->a_pekerjaan}}</td>
                <td>{{$d->a_alamat}}</td>
                <td>{{$d->a_kewarganegaraan}}</td>
                <td>{{$d->a_kebangsaan}}</td>
                <td>{{date('d-m-Y',strtotime($d->a_tanggal_perkawinan))}}</td>
                <td>{{$d->p_nik}}</td>
                <td>{{$d->p_nama}}</td>
                <td>{{$d->p_umur}}</td>
                <td>{{$d->p_jenis_kelamin}}</td>
                <td>{{$d->p_pekerjaan}}</td>
                <td>{{$d->p_alamat}}</td>
                <td>{{$d->s1_nik}}</td>
                <td>{{$d->s1_nama}}</td>
                <td>{{$d->s1_umur}}</td>
                <td>{{$d->s1_pekerjaan}}</td>
                <td>{{$d->s1_alamat}}</td>
                <td>{{$d->s2_nik}}</td>
                <td>{{$d->s2_nama}}</td>
                <td>{{$d->s2_umur}}</td>
                <td>{{$d->s2_pekerjaan}}</td>
                <td>{{$d->s2_alamat}}</td>
            </tr>
        @endforeach
    </tbody>
</table>