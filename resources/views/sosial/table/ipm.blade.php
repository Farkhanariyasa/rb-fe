@extends('./layouts/main')
@section ('content')
<div class="isi_admin">

    <h1 class="judul">IPM</h1>
    <div class="aksi">
        <a href="{{ route('export.excel_ipm')}}" class="download-btn">Download</a>
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
                <th scope="col">Indeks Pembangunan Manusia (Poin)</th>
                <th scope="col">Rata-rata Lama Sekolah (Tahun)</th>
                <th scope="col">Angka Harapan Lama Sekolah (Tahun)</th>
                <th scope="col">Angka Harapan Hidup (Tahun)</th>
                <th scope="col">Pengeluaran Riil Perkapita (Juta Rupiah per Tahun)</th>
                <th scope="col">Garis Kemiskinan (Rupiah per Kapita per Bulan)</th>
            </tr>
        </thead>
        <tbody>
            @foreach($ipm as $p)
            <tr>
                <th scope="row">{{ $loop->iteration }}</th>
                <td>{{ $p->tahun }}</td>
                <td>{{ $p->ipm }}</td>
                <td>{{ $p->rls }}</td>
                <td>{{ $p->ahs }}</td>
                <td>{{ $p->ahh }}</td>
                <td>{{ $p->pengeluaran_perkapita }}</td>
                <td>{{ $p->garis_kemiskinan_tahun }}</td>
            </tr>
            @endforeach
        </tbody>
    </table>


</div>
@endsection