@extends('./layouts/main')
@section ('content')
<div class="isi_admin">
    <h1 class="judul">{{ $data['title'] }}</h1>
    <div class="aksi">
        <a href="{{ route('export.excel_harga')}}" class="download-btn">Download</a>
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
                <th scope="col">No</th>
                <th scope="col">Tahun</th>
                <th scope="col">Produksi Padi (Ton GKG)</th>
                <th scope="col">Luas Panen Padi (Hektare)</th>

            </tr>
        </thead>
        <tbody>
            @foreach($produksi as $p)
            <tr>
                <th scope="row">{{ $loop->iteration }}</th>
                <td>{{ $p->tahun }}</td>
                <td>{{ $p->produksi_padi }}</td>
                <td>{{ $p->luas_panen_padi }}</td>
            </tr>
            @endforeach
        </tbody>
    </table>


    {{ $produksi->links() }}
</div>
@endsection