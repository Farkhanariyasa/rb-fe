@extends('./layouts/main')
@section ('content')
<div class="isi_admin">

    <h1 class="judul">GINI RATIO</h1>
    <div class="aksi">
        <a href="{{ route('export.excel_ketimpangan')}}" class="download-btn">Download</a>
        @if (session('user'))
        <form action="{{ route('import.excel_ketimpangan') }}" method="POST" enctype="multipart/form-data" class="import-form">
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
                <th scope="col">Gini Ratio (Poin)</th>
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
    <h1 class="judul">GINI RATIO KABUPATEN</h1>
    <div class="aksi">
        <a href="{{ route('export.excel_ginikab')}}" class="download-btn">Download</a>
        @if (session('user'))
        <form action="{{ route('import.excel_ginikab') }}" method="POST" enctype="multipart/form-data" class="import-form">
            @csrf
            <input type="file" name="file">
            <button type="submit" class="import-btn">Import Update</button>
        </form>
        @endif
    </div>
    <span class="filter-tahun">
        <p>Filter by Tahun :</p>
        <select id="tahun-filter">
            <option value="">All</option>
            <?php

            use Illuminate\Support\Facades\DB;
            // get all unique year from table datapdrblapus
            $tahun = DB::table('ginimap')->select('tahun')->distinct()->get();
            foreach ($tahun as $t) {
                echo "<option value='$t->tahun'>$t->tahun</option>";
            }
            ?>
        </select>
    </span>

    <table class="tabel" id="myTable">
        <thead>
            <tr>
                <!-- <th scope="col">#</th> -->
                <!-- Tahun	pdrb_adhb	pdrb_adhk	pdrb_perkapita	laju_pertumbuhan_ekonomi -->
                <th scope="col">No</th>
                <th scope="col">Tahun</th>
                <th scope="col">Kabupaten</th>
                <th scope="col">Gini Ratio (Poin)</th>
            </tr>
        </thead>
        <tbody>
            @foreach($gini as $p)
            <tr>
                <th scope="row">{{ $loop->iteration }}</th>
                <td>{{ $p->tahun }}</td>
                <td>{{ $p->kabupaten }}</td>
                <td>{{ $p->gini}}</td>
            </tr>
            @endforeach
        </tbody>
    </table>


</div>
@endsection