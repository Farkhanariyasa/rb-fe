@extends('./layouts.admin')
@section('content')
<div class="isi_admin">
    <h1 class="judul">{{ $data['title'] }}</h1>
    </h1>
    <div class="aksi">
        <a href="{{ route('export.excel_ipm')}}" class="download-btn">Download Template</a>
        <!-- import excel -->
        <form action="{{ route('import.excel_ipm') }}" method="POST" enctype="multipart/form-data" class="import-form">
            @csrf
            <input type="file" name="file">
            <button type="submit" class="import-btn">Import Update</button>
        </form>
    </div>

    <table class="tabel" id="myTable">
        <thead>
            <tr>
                <!-- id	fungsi	indikator	time_lag	tahun	variabel	satuan	IPM	RLS	AHS	RPJM_sekolah	AHH	pengeluaran_perkapita	garis_kemiskinan_tahun -->
                <th scope="col">No</th>
                <th scope="col">Fungsi</th>
                <th scope="col">Indikator</th>
                <th scope="col">Time Lag</th>
                <th scope="col">Tahun</th>
                <th scope="col">Variabel</th>
                <th scope="col">Satuan</th>
                <th scope="col">IPM</th>
                <th scope="col">RLS</th>
                <th scope="col">AHS</th>
                <th scope="col">RPJM Sekolah</th>
                <th scope="col">AHH</th>
                <th scope="col">Pengeluaran Perkapita</th>
                <th scope="col">Garis Kemiskinan Tahun</th>


            </tr>
        </thead>
        <tbody>
            @foreach($ipm as $i)
            <tr>

                <td data-label="No">{{ $loop->iteration }}</td>
                <td data-label="Fungsi">{{ $i->fungsi }}</td>
                <td data-label="Indikator">{{ $i->indikator }}</td>
                <td data-label="Time Lag">{{ $i->time_lag }}</td>
                <td data-label="Tahun">{{ $i->tahun }}</td>
                <td data-label="Variabel">{{ $i->variabel }}</td>
                <td data-label="Satuan">{{ $i->satuan }}</td>
                <td data-label="IPM">{{ $i->IPM }}</td>
                <td data-label="RLS">{{ $i->RLS }}</td>
                <td data-label="AHS">{{ $i->AHS }}</td>
                <td data-label="RPJM Sekolah">{{ $i->RPJM_sekolah }}</td>
                <td data-label="AHH">{{ $i->AHH }}</td>
                <td data-label="Pengeluaran Perkapita">{{ $i->pengeluaran_perkapita }}</td>
                <td data-label="Garis Kemiskinan Tahun">{{ $i->garis_kemiskinan_tahun }}</td>
            </tr>
            @endforeach
        </tbody>
    </table>


    {{ $ipm->links() }}
</div>
@endsection