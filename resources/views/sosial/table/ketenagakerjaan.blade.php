@extends('./layouts/main')
@section ('content')
<div class="isi_admin">

    <h1 class="judul">Ketenagakerjaan</h1>
    <div class="aksi">
        <a href="{{ route('export.excel_ketenagakerjaan')}}" class="download-btn">Download</a>
        @if (session('user'))
        <form action="{{ route('import.excel_harga') }}" method="POST" enctype="multipart/form-data" class="import-form">
            @csrf
            <input type="file" name="file">
            <button type="submit" class="import-btn">Import Update</button>
        </form>
        @endif
    </div>

    <table class="tabel" id="myTable">
        <thead>
            <tr>
                <!-- <th scope="col">#</th> -->
                <!-- Tahun	pdrb_adhb	pdrb_adhk	pdrb_perkapita	laju_pertumbuhan_ekonomi -->
                <th scope="col">No</th>
                <th scope="col">Tahun</th>
                <th scope="col">Jumlah Usia Kerja (Jiwa)</th>
                <th scope="col">Jumlah Angkatan Kerja  (Jiwa)</th>
                <th scope="col">Jumlah Bukan Angkatan Kerja  (Jiwa)</th>
                <th scope="col">Jumlah Bekerja  (Jiwa)</th>
                <th scope="col">Jumlah Pengangguran  (Jiwa)</th>
                <th scope="col">Jumlah Sekolah  (Jiwa)</th>
                <th scope="col">Jumlah Mengurus Rumah Tangga  (Jiwa)</th>
                <th scope="col">Jumlah Lainnya  (Jiwa)</th>
                <th scope="col">Tingkat Partisipasi Angkatan Kerja (%)</th>
                <th scope="col">Tingkat Pengangguran Terbuka (%)</th>
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