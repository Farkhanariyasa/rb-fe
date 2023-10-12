@extends('./layouts/main')
@section ('content')
<div class="isi_admin">
    
    <h1 class="judul">IPM</h1>
    <div class="aksi">
        <a href="{{ route('export.excel_ipm')}}" class="download-btn">Download</a>
    </div>

    <table class="tabel" id="myTable">
        <thead>
            <tr>
                <!-- <th scope="col">#</th> -->
                <!-- Tahun	pdrb_adhb	pdrb_adhk	pdrb_perkapita	laju_pertumbuhan_ekonomi -->
                <th scope="col">No</th>
                <th scope="col">Tahun</th>
                <th scope="col">Indeks Pembangunan Manusia</th>
                <th scope="col">Rata-rata Lama Sekolah</th>
                <th scope="col">Angka Harapan Lama Sekolah</th>
                <th scope="col">Angka Harapan Hidup</th>
                <th scope="col">Pengeluaran Perkapita</th>
                <th scope="col">Garis Kemiskinan</th>
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