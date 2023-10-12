@extends('./layouts.admin')
@section('content')
    <div class="isi_admin">
    <h1 class="judul">{{ $data['title'] }}</h1>
        </h1>
        <div class="aksi">
            <a href="{{ route('export.excel_harga')}}" class="download-btn">Download Template</a>
            <!-- import excel -->
            <form action="{{ route('import.excel_harga') }}" method="POST" enctype="multipart/form-data" class="import-form">
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
                   <!-- id	fungsi	indikator	time_lag	tahun	variabel	satuan	produksi_padi 	luas_panen_padi -->
                    <th scope="col">Fungsi</th>
                    <th scope="col">Indikator</th>
                    <th scope="col">Time Lag</th>
                    <th scope="col">Tahun</th>
                    <th scope="col">Variabel</th>
                    <th scope="col">Satuan</th>
                    <th scope="col">Produksi Padi</th>
                    <th scope="col">Luas Panen Padi</th>
                </tr>
            </thead>
            <tbody>
                @foreach($harga as $h)
                <tr>
                    <th scope="row">{{ $loop->iteration }}</th>
                    <td>{{ $h->fungsi }}</td>
                    <td>{{ $h->indikator }}</td>
                    <td>{{ $h->time_lag }}</td>
                    <td>{{ $h->tahun }}</td>
                    <td>{{ $h->variabel }}</td>
                    <td>{{ $h->satuan }}</td>
                    <td>{{ $h->produksi_padi }}</td>
                    <td>{{ $h->luas_panen_padi }}</td>

                </tr>
                @endforeach
            </tbody>
        </table>


        {{ $harga->links() }}
    </div>
@endsection