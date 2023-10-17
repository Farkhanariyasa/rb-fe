@extends('./layouts/main')
@section ('content')
<div class="isi_admin">
    <h1 class="judul">{{ $data['title'] }}</h1>
    <div class="aksi">
        <a href="{{ route('export.excel_pdrb')}}" class="download-btn">Download</a>
        @if (session('user'))
        <form action="{{ route('import.excel_pdrb') }}" method="POST" enctype="multipart/form-data" class="import-form">
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
                <th scope="col">PDRB ADHB (Juta Rupiah)</th>
                <th scope="col">PDRB ADHK (Juta Rupiah)</th>
                <th scope="col">PDRB Perkapita (Ribu Rupiah per Tahun)</th>
                <th scope="col">Laju Pertumbuhan Ekonomi (%)</th>

            </tr>
        </thead>
        <tbody>
            @foreach($pdrb as $p)
            <tr>
                <th scope="row">{{ $loop->iteration }}</th>
                <td>{{ $p->tahun }}</td>
                <td>{{ $p->pdrb_adhb }}</td>
                <td>{{ $p->pdrb_adhk }}</td>
                <td>{{ $p->pdrb_perkapita }}</td>
                <td>{{ $p->laju_pertumbuhan_ekonomi }}</td>
            </tr>
            @endforeach
        </tbody>
    </table>
    <h1 class="judul">PDRB Lapangan Usaha</h1>
    <div class="aksi">
        <a href="{{ route('export.excel_pdrblapus') }}" class="download-btn">Download</a>
        @if (session('user'))
        <form action="{{ route('import.excel_pdrblapus') }}" method="POST" enctype="multipart/form-data" class="import-form">
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
            $tahun = DB::table('datapdrblapus')->select('tahun')->distinct()->get();
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
                <th scope="col">Lapangan Usaha</th>
                <th scope="col">PDRB ADHB Lapangan Usaha (Juta Rupiah)</th>
                <th scope="col">PDRB ADHK Lapangan Usaha (Juta Rupiah)</th>
                <th scope="col">Distribusi PDRB Lapangan Usaha (%)</th>
                <th scope="col">Laju PDRB ADHK Lapangan Usaha (%)</th>
            </tr>
        </thead>
        <tbody>
            @foreach($pdrblapus as $p)
            <tr>
                <th scope="row">{{ $loop->iteration }}</th>
                <td>{{ $p->tahun }}</td>
                <td>{{ $p->lapangan_usaha }}</td>
                <td>{{ $p->adhb_lapangan_usaha }}</td>
                <td>{{ $p->adhk_lapangan_usaha }}</td>
                <td>{{ $p->distribusi_lapangan_usaha }}</td>
                <td>{{ $p->laju_adhk_lapangan_usaha }}</td>
            </tr>
            @endforeach
        </tbody>
    </table>
    <h1 class="judul">PDRB Kabupaten</h1>
    <div class="aksi">
        <a href="{{ route('export.excel_pdrbkab') }}" class="download-btn">Download</a>
        @if (session('user'))
        <form action="{{ route('import.excel_pdrbkab') }}" method="POST" enctype="multipart/form-data" class="import-form">
            @csrf
            <input type="file" name="file">
            <button type="submit" class="import-btn">Import Update</button>
        </form>
        @endif
    </div>
    <span class="filter-tahun">
        <p>Filter by Tahun :</p>
        <select id="tahun-filter2">
            <option value="">All</option>
            <?php
            // get all unique year from table datapdrblapus
            $tahun = DB::table('pdrbmap')->select('tahun')->distinct()->get();
            foreach ($tahun as $t) {
                echo "<option value='$t->tahun'>$t->tahun</option>";
            }
            ?>
        </select>
    </span>


    <table class="tabel2" id="myTable">
        <thead>
            <tr>
                <!-- <th scope="col">#</th> -->
                <!-- Tahun	pdrb_adhb	pdrb_adhk	pdrb_perkapita	laju_pertumbuhan_ekonomi -->
                <th scope="col">No</th>
                <th scope="col">Tahun</th>
                <th scope="col">Kabupaten</th>
                <th scope="col">PDRB ADHB Kabupaten (Juta Rupiah)</th>
            </tr>
        </thead>
        <tbody>
            @foreach($pdrbkabupaten as $p)
            <tr>
                <th scope="row">{{ $loop->iteration }}</th>
                <td>{{ $p->tahun }}</td>
                <td>{{ $p->kabupaten }}</td>
                <td>{{ $p->pdrb }}</td>
            </tr>
            @endforeach
        </tbody>
    </table>


</div>
@endsection