@extends('./layouts.admin')
@section('content')
    <div class="isi_admin">
    <h1 class="judul">{{ $data['title'] }}</h1>
        </h1>
        <div class="aksi">
            <a href="{{ route('export.excel_kemiskinan')}}" class="download-btn">Download Template</a>
            <!-- import excel -->
            <form action="{{ route('import.excel_kemiskinan') }}" method="POST" enctype="multipart/form-data" class="import-form">
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
                    <th scope="col">Fungsi</th>
                    <th scope="col">Indikator</th>
                    <!-- time_lag	tahun	variabel	satuan	hierarki1	hierarki2	jumlah_miskin	persentase_miskin	p1	p2 -->
                    <th scope="col">Time Lag</th>
                    <th scope="col">Tahun</th>
                    <th scope="col">Variabel</th>
                    <th scope="col">Satuan</th>
                    <th scope="col">Hierarki 1</th>
                    <th scope="col">Hierarki 2</th>
                    <th scope="col">Jumlah Miskin</th>
                    <th scope="col">Persentase Miskin</th>
                    <th scope="col">P1</th>
                    <th scope="col">P2</th>
                </tr>
            </thead>
            <tbody>
                @foreach($kemiskinan as $k)
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
                    <td>{{ $k->hierarki2 }}</td>
                    <td>{{ $k->jumlah_miskin }}</td>
                    <td>{{ $k->persentase_miskin }}</td>
                    <td>{{ $k->p1 }}</td>
                    <td>{{ $k->p2 }}</td>
                </tr>
                @endforeach
            </tbody>
        </table>


        {{ $kemiskinan->links() }}
    </div>
@endsection