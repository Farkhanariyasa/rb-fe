@extends('./layouts/main')
@section ('content')
<div class="isi_admin">

    <h1 class="judul">Kependudukan</h1>
    <div class="aksi">
        <a href="{{ route('export.excel_kependudukan')}}" class="download-btn">Download</a>
    </div>

    <table class="tabel" id="myTable">
        <thead>
            <tr>
                <!-- <th scope="col">#</th> -->
                <!-- Tahun	pdrb_adhb	pdrb_adhk	pdrb_perkapita	laju_pertumbuhan_ekonomi -->
                <th scope="col">No</th>
                <th scope="col">Tahun</th>
                <th scope="col">Jumlah Penduduk</th>
                <th scope="col">Sex_Ratio</th>
                <th scope="col">Kepadatan Penduduk</th>
                <th scope="col">Jumlah Penduduk Laki-laki</th>
                <th scope="col">Jumlah Penduduk Perempuan</th>
                <th scope="col">Persen Penduduk Laki-laki</th>
                <th scope="col">Persen Penduduk Perempuan</th>
        </thead>
        <tbody>
            @foreach($kependudukan as $p)
            <tr>
                <th scope="row">{{ $loop->iteration }}</th>
                <td>{{ $p->tahun }}</td>
                <td>{{ $p->penduduk }}</td>
                <td>{{ $p->sex_ratio }}</td>
                <td>{{ $p->kepadatan_penduduk }}</td>
                <td>{{ $p->laki }}</td>
                <td>{{ $p->perempuan }}</td>
                <td>{{ $p->persen_laki }}</td>
                <td>{{ $p->persen_perempuan }}</td>

            </tr>
            @endforeach
        </tbody>
    </table>


</div>
@endsection