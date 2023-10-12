@extends('./layouts.admin')
@section('content')
<div class="isi_admin">
    <h1 class="judul">{{ $data['title'] }}</h1>
    </h1>
    <div class="aksi">
        <a href="{{ route('export.excel_ketenagakerjaan')}}" class="download-btn">Download Template</a>
        <!-- import excel -->
        <form action="{{ route('import.excel_ketenagakerjaan') }}" method="POST" enctype="multipart/form-data" class="import-form">
            @csrf
            <input type="file" name="file">
            <button type="submit" class="import-btn">Import Update</button>
        </form>
    </div>

    <table class="tabel" id="myTable">
        <thead>
            <tr>
              <!-- id	fungsi	indikator	time_lag	tahun	variabel	hierarki1	usia_kerja	angkatan_kerja	bukan_angkatan_kerja	persen_h1_usia_kerja	bekerja	pengangguran	sekolah	mengurus_rt	lainnya	persen_h2_usia_kerja	jml_tenaga_kerja	TPAK	TPT
 -->
                <th scope="col">No</th>
                <th scope="col">Fungsi</th>
                <th scope="col">Indikator</th>
                <th scope="col">Time Lag</th>
                <th scope="col">Tahun</th>
                <th scope="col">Variabel</th>
                <th scope="col">Satuan</th>
                <th scope="col">Hierarki 1</th>
                <th scope="col">Usia Kerja</th>
                <th scope="col">Angkatan Kerja</th>
                <th scope="col">Bukan Angkatan Kerja</th>
                <th scope="col">Persen H1 Usia Kerja</th>
                <th scope="col">Bekerja</th>
                <th scope="col">Pengangguran</th>
                <th scope="col">Sekolah</th>
                <th scope="col">Mengurus RT</th>
                <th scope="col">Lainnya</th>
                <th scope="col">Persen H2 Usia Kerja</th>
                <th scope="col">Jumlah Tenaga Kerja</th>
                <th scope="col">TPAK</th>
                <th scope="col">TPT</th>
            </tr>
        </thead>
        <tbody>
            @foreach($ketenagakerjaan as $k)
            <tr>
                <th scope="row">{{ $loop->iteration }}</th>
                <!-- <td>{{ $k->id }}</td> -->
                <td>{{ $k->fungsi }}</td>
                <td>{{ $k->indikator }}</td>
                <td>{{ $k->time_lag }}</td>
                <td>{{ $k->tahun }}</td>
                <td>{{ $k->variabel }}</td>
                <td>{{ $k->hierarki1 }}</td>
                <td>{{ $k->usia_kerja }}</td>
                <td>{{ $k->angkatan_kerja }}</td>
                <td>{{ $k->bukan_angkatan_kerja }}</td>
                <td>{{ $k->persen_h1_usia_kerja }}</td>
                <td>{{ $k->bekerja }}</td>
                <td>{{ $k->pengangguran }}</td>
                <td>{{ $k->sekolah }}</td>
                <td>{{ $k->mengurus_rt }}</td>
                <td>{{ $k->lainnya }}</td>
                <td>{{ $k->persen_h2_usia_kerja }}</td>
                <td>{{ $k->jml_tenaga_kerja }}</td>
                <td>{{ $k->TPAK }}</td>
                <td>{{ $k->TPT }}</td>
            </tr>
            @endforeach
        </tbody>
    </table>


    {{ $ketenagakerjaan->links() }}
</div>
@endsection