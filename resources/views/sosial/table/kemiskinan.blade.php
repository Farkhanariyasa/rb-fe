@extends('./layouts/main')
@section ('content')
<div class="isi_admin">
    
    <h1 class="judul">Kemiskinan</h1>
    <div class="aksi">
        <a href="{{ route('export.excel_kemiskinan')}}" class="download-btn">Download</a>
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
                <th scope="col">Jumlah Penduduk Miskin (Ribu Jiwa)</th>
                <th scope="col">Persentase Penduduk Miskin (%)</th>
                <th scope="col">P1 Kedalaman Kemiskinan (Poin)</th>
                <th scope="col">P2 Keparahan Kemiskinan (Poin)</th>
            </tr>
        </thead>
        <tbody>
            @foreach($kemiskinan as $p)
            <tr>
                <th scope="row">{{ $loop->iteration }}</th>
                <td>{{ $p->tahun }}</td>
                <td>{{ $p->jumlah_miskin }}</td>
                <td>{{ $p->persentase_miskin }}</td>
                <td>{{ $p->p1 }}</td>
                <td>{{ $p->p2 }}</td>
            </tr>
            @endforeach
        </tbody>
    </table>


</div>
@endsection