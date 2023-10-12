@extends('./layouts.admin')
@section('content')
    <div class="isi_admin">
    <h1 class="judul">{{ $data['title'] }}</h1>
        </h1>
        <div class="aksi">
            <a href="{{ route('export.excel_penerimaan')}}" class="download-btn">Download Template</a>
            <!-- import excel -->
            <form action="{{ route('import.excel_penerimaan') }}" method="POST" enctype="multipart/form-data" class="import-form">
                @csrf
                <input type="file" name="file">
                <button type="submit" class="import-btn">Import Update</button>
            </form>
        </div>

        <table class="tabel" id="myTable">
            <thead>
                <tr>
                    <!-- <th scope="col">#</th> -->
                    <th scope="col">No</th>
                   <!--  id	fungsi	indikator	time_lag	tahun	variabel	satuan	hierarki1	penerimaan_daerah	penyusun_penerimaan_daerah
-->
                    <th scope="col">Fungsi</th>
                    <th scope="col">Indikator</th>
                    <th scope="col">Time Lag</th>
                    <th scope="col">Tahun</th>
                    <th scope="col">Variabel</th>
                    <th scope="col">Satuan</th>
                    <th scope="col">Hierarki 1</th>
                    <th scope="col">Penerimaan Daerah</th>
                    <th scope="col">Penyusun Penerimaan Daerah</th>
                </tr>
            </thead>
            <tbody>
                @foreach($penerimaan as $p)
                <tr>
                    <th scope="row">{{ $loop->iteration }}</th>
                    <td>{{ $p->fungsi }}</td>
                    <td>{{ $p->indikator }}</td>
                    <td>{{ $p->time_lag }}</td>
                    <td>{{ $p->tahun }}</td>
                    <td>{{ $p->variabel }}</td>
                    <td>{{ $p->satuan }}</td>
                    <td>{{ $p->hierarki1 }}</td>
                    <td>{{ $p->penerimaan_daerah }}</td>
                    <td>{{ $p->penyusun_penerimaan_daerah }}</td>
                </tr>
                @endforeach
            </tbody>
        </table>


        {{ $penerimaan->links() }}
    </div>
@endsection