@extends('./layouts/main')
@section ('content')
<div class="isi_admin">

    <h1 class="judul">Ketimpangan</h1>
    <div class="aksi">
        <a href="{{ route('export.excel_ketimpangan')}}" class="download-btn">Download</a>
    </div>

    <table class="tabel" id="myTable">
        <thead>
            <tr>
                <!-- <th scope="col">#</th> -->
                <!-- Tahun	pdrb_adhb	pdrb_adhk	pdrb_perkapita	laju_pertumbuhan_ekonomi -->
                <th scope="col">No</th>
                <th scope="col">Tahun</th>
                <th scope="col">Gini Ratio </th>
            </tr>
        </thead>
        <tbody>
            @foreach($ketimpangan as $p)
            <tr>
                <th scope="row">{{ $loop->iteration }}</th>
                <td>{{ $p->tahun }}</td>
                <td>{{ $p->gini_ratio}}</td>
            </tr>
            @endforeach
        </tbody>
    </table>


</div>
@endsection