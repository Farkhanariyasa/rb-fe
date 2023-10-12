@extends('./layouts/main')
@section ('content')
<div class="isi_admin">

    <h1 class="judul">Ketenagakerjaan</h1>
    <div class="aksi">
        <a href="{{ route('export.excel_ketenagakerjaan')}}" class="download-btn">Download</a>
    </div>

    <table class="tabel" id="myTable">
        <thead>
            <tr>
                <!-- <th scope="col">#</th> -->
                <!-- Tahun	pdrb_adhb	pdrb_adhk	pdrb_perkapita	laju_pertumbuhan_ekonomi -->
                <th scope="col">No</th>
                <th scope="col">Tahun</th>
                <th scope="col">Usia Kerja</th>
                <th scope="col">Angkatan Kerja</th>
                <th scope="col">Bukan Angkatan Kerja</th>
                <th scope="col">Bekerja</th>
                <th scope="col">Pengangguran</th>
                <th scope="col">Sekolah</th>
                <th scope="col">Mengurus Rumah Tangga</th>
                <th scope="col">Lainnya</th>
                <th scope="col">Tingkat Partisipasi Angkatan Kerja</th>
                <th scope="col">Tingkat Pengangguran Terbuka</th>
            </tr>
        </thead>
        <tbody>
            @foreach($ketenagakerjaan as $p)
            <tr>
                <th scope="row">{{ $loop->iteration }}</th>
                <td>{{ $p->tahun }}</td>
                <td>{{ $p->usia_kerja }}</td>
                <td>{{ $p->pengangguran }}</td>
                <td>{{ $p->angkatan_kerja }}</td>
                <td>{{ $p->bukan_angkatan_kerja }}</td>
                <td>{{ $p->bekerja }}</td>
                <td>{{ $p->sekolah }}</td>
                <td>{{ $p->mengurus_rt }}</td>
                <td>{{ $p->lainnya }}</td>
                <td>{{ $p->tpak }}</td>
                <td>{{ $p->tpt }}</td>
            </tr>
            @endforeach
        </tbody>
    </table>


</div>
@endsection