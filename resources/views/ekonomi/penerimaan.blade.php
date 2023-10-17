@extends('./layouts/main')
@section ('content')
<div class="isi_admin">
    <h1 class="judul">{{ $data['title'] }}</h1>
    <div class="aksi">
        <a href="{{ route('export.excel_penerimaan')}}" class="download-btn">Download</a>
        @if (session('user'))
        <form action="{{ route('import.excel_penerimaan') }}" method="POST" enctype="multipart/form-data" class="import-form">
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
                <th scope="col">Penerimaan Daerah (Miliar Rupiah)</th>

            </tr>
        </thead>
        <tbody>
            @foreach($penerimaan as $p)
            <tr>
                <th scope="row">{{ $loop->iteration }}</th>
                <td>{{ $p->tahun }}</td>
                <td>{{ $p->penerimaan_daerah }}</td>
                @endforeach
        </tbody>
    </table>

    <h1 class="judul">Sumber Penerimaan</h1>
    <div class="aksi">
        <a href="{{ route('export.excel_sumberpenerimaan')}}" class="download-btn">Download</a>
        @if (session('user'))
        <form action="{{ route('import.excel_sumberpenerimaan') }}" method="POST" enctype="multipart/form-data" class="import-form">
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
                <th scope="col">Sumber Penerimaan Daerah</th>
                <th scope="col">Penerimaan (Miliar Rupiah)</th>

            </tr>
        </thead>
        <tbody>
            @foreach($sumber as $s)
            <tr>
                <th scope="row">{{ $loop->iteration }}</th>
                <td>{{ $s->tahun }}</td>
                <td>{{ $s->sumber_penerimaan }}</td>
                <td>{{ $s->penerimaan }}</td>
                @endforeach
        </tbody>
    </table>
</div>
@endsection