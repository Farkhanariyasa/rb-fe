@extends('./layouts/main')
@section ('content')
<div class="isi_admin">

    <h1 class="judul">INFLASI</h1>
    <div class="aksi">
        <a href="{{ route('export.excel_inflasi')}}" class="download-btn">Download</a>
        @if (session('user'))
        <form action="{{ route('import.excel_inflasi') }}" method="POST" enctype="multipart/form-data" class="import-form">
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
                <th scope="col">Inflasi Kota Yogyakarta (Poin)</th>
                <th scope="col">Inflasi Nasional (Poin)</th>
            </tr>
        </thead>
        <tbody>
            @foreach($inflasi as $p)
            <tr>
                <th scope="row">{{ $loop->iteration }}</th>
                <td>{{ $p->tahun }}</td>
                <td>{{ $p->Inflasi_yogyakarta }}</td>
                <td>{{ $p->inflasi_nasional }}</td>
            </tr>
            @endforeach
        </tbody>
    </table>
    <h1 class="judul">INFLASI BULANAN</h1>
    <div class="aksi">
        <a href="{{ route('export.excel_inflasi_bulanan')}}" class="download-btn">Download</a>
        @if (session('user'))
        <form action="{{ route('import.excel_inflasi_bulanan') }}" method="POST" enctype="multipart/form-data" class="import-form">
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
                <th scope="col">Januari</th>
                <th scope="col">Februari</th>
                <th scope="col">Maret</th>
                <th scope="col">April</th>
                <th scope="col">Mei</th>
                <th scope="col">Juni</th>
                <th scope="col">Juli</th>
                <th scope="col">Agustus</th>
                <th scope="col">September</th>
                <th scope="col">Oktober</th>
                <th scope="col">November</th>
                <th scope="col">Desember</th>
            </tr>
        </thead>
        <tbody>
            @foreach($inflasi_bulanan as $p)
            <tr>
                <th scope="row">{{ $loop->iteration }}</th>
                <td>{{ $p->tahun }}</td>
                <td>{{ $p->januari }}</td>
                <td>{{ $p->februari }}</td>
                <td>{{ $p->maret }}</td>
                <td>{{ $p->april }}</td>
                <td>{{ $p->mei }}</td>
                <td>{{ $p->juni }}</td>
                <td>{{ $p->juli }}</td>
                <td>{{ $p->agustus }}</td>
                <td>{{ $p->september }}</td>
                <td>{{ $p->oktober }}</td>
                <td>{{ $p->november }}</td>
                <td>{{ $p->desember }}</td>
            </tr>
            @endforeach
        </tbody>
    </table>
    <h1 class="judul">INDEKS HARGA KONSUMEN BULANAN</h1>
    <div class="aksi">
        <a href="{{ route('export.excel_ihk')}}" class="download-btn">Download</a>
        @if (session('user'))
        <form action="{{ route('import.excel_ihk') }}" method="POST" enctype="multipart/form-data" class="import-form">
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
                <th scope="col">Januari</th>
                <th scope="col">Februari</th>
                <th scope="col">Maret</th>
                <th scope="col">April</th>
                <th scope="col">Mei</th>
                <th scope="col">Juni</th>
                <th scope="col">Juli</th>
                <th scope="col">Agustus</th>
                <th scope="col">September</th>
                <th scope="col">Oktober</th>
                <th scope="col">November</th>
                <th scope="col">Desember</th>
            </tr>
        </thead>
        <tbody>
            @foreach($Ihk as $p)
            <tr>
                <th scope="row">{{ $loop->iteration }}</th>
                <td>{{ $p->tahun }}</td>
                <td>{{ $p->januari }}</td>
                <td>{{ $p->februari }}</td>
                <td>{{ $p->maret }}</td>
                <td>{{ $p->april }}</td>
                <td>{{ $p->mei }}</td>
                <td>{{ $p->juni }}</td>
                <td>{{ $p->juli }}</td>
                <td>{{ $p->agustus }}</td>
                <td>{{ $p->september }}</td>
                <td>{{ $p->oktober }}</td>
                <td>{{ $p->november }}</td>
                <td>{{ $p->desember }}</td>
            </tr>
            @endforeach
        </tbody>
    </table>

</div>
@endsection