@extends('./layouts/main')
@section ('content')
<div class="isi_admin">
    
    <h1 class="judul">Kemiskinan</h1>
    <div class="aksi">
        <a href="{{ route('export.excel_kemiskinan')}}" class="download-btn">Download</a>
    </div>

    <table class="tabel" id="myTable">
        <thead>
            <tr>
                <!-- <th scope="col">#</th> -->
                <!-- Tahun	pdrb_adhb	pdrb_adhk	pdrb_perkapita	laju_pertumbuhan_ekonomi -->
                <th scope="col">No</th>
                <th scope="col">Tahun</th>
                <th scope="col">Jumlah Miskin</th>
                <th scope="col">Persentase Miskin</th>
                <th scope="col">P1</th>
                <th scope="col">P2</th>
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