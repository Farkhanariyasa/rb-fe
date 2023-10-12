@extends('./layouts.admin')
@section('content')
<div class="isi_admin">
    <h1 class="judul">{{ $data['title'] }}</h1>
    </h1>
    <div class="aksi">
        <a href="{{ route('export.excel_kependudukan')}}" class="download-btn">Download Template</a>
        <!-- import excel -->
        <form action="{{ route('import.excel_kependudukan') }}" method="POST" enctype="multipart/form-data" class="import-form">
            @csrf
            <input type="file" name="file">
            <button type="submit" class="import-btn">Import Update</button>
        </form>
    </div>

    <table class="tabel" id="myTable">
        <thead>
            <tr>
               <!-- id	fungsi	indikator	time_lag	tahun	variabel	satuan	hierarki1	sensus_penduduk	penduduk 	penduduk_jenis_kelamin	persen_penduduk	sex_ratio	luas_wilayah	kepadatan_penduduk -->
               <th scope="col">No</th>
                <th scope="col">Fungsi</th>
                <th scope="col">Indikator</th>
                <th scope="col">Time Lag</th>
                <th scope="col">Tahun</th>
                <th scope="col">Variabel</th>
                <th scope="col">Satuan</th>
                <th scope="col">Hierarki 1</th>
                <th scope="col">Sensus Penduduk</th>
                <th scope="col">Penduduk</th>
                <th scope="col">Penduduk Jenis Kelamin</th>
                <th scope="col">persen_penduduk</th>
                <th scope="col">sex_ratio</th>
                <th scope="col">luas_wilayah</th>
                <th scope="col">kepadatan_penduduk</th>
            </tr>
        </thead>
        <tbody>
            @foreach($kependudukan as $k)
            <tr>
                <th scope="row">{{ $loop->iteration }}</th>
                <!-- <td>{{ $k->id }}</td> -->
                <td>{{ $k->fungsi }}</td>
                <td>{{ $k->indikator }}</td>
                <td>{{ $k->time_lag }}</td>
                <td>{{ $k->tahun }}</td>
                <td>{{ $k->variabel }}</td>
                <td>{{ $k->satuan }}</td>
                <td>{{ $k->hierarki1 }}</td>
                <td>{{ $k->sensus_penduduk }}</td>
                <td>{{ $k->penduduk }}</td>
                <td>{{ $k->penduduk_jenis_kelamin }}</td>
                <td>{{ $k->persen_penduduk }}</td>
                <td>{{ $k->sex_ratio }}</td>
                <td>{{ $k->luas_wilayah }}</td>
                <td>{{ $k->kepadatan_penduduk }}</td>
            </tr>
            @endforeach
        </tbody>
    </table>

</div>
@endsection