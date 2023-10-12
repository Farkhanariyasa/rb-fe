@extends('./layouts/main')
@section ('content')
<div class="isi_admin">
    <h1 class="judul">{{ $data['title'] }}</h1>
    <div class="aksi">
        <a href="{{ route('export.excel_pdrb')}}" class="download-btn">Download</a>
    </div>

    <table class="tabel" id="myTable">
        <thead>
            <tr>
                <!-- <th scope="col">#</th> -->
                <!-- Tahun	pdrb_adhb	pdrb_adhk	pdrb_perkapita	laju_pertumbuhan_ekonomi -->
                <th scope="col">No</th>
                <th scope="col">Tahun</th>
                <th scope="col">PDRB ADHB</th>
                <th scope="col">PDRB ADHK</th>
                <th scope="col">PDRB Perkapita</th>
                <th scope="col">Laju Pertumbuhan Ekonomi</th>

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
        <a href="{{ route('export.excel_pdrblapus')}}" class="download-btn">Download</a>
    </div>
    <span class="filter-tahun">
        <p>Filter by Tahun :</p>
        <select id="tahun-filter">
            <option value="">All</option>
            <option value="2022">2022</option>
            <option value="2021">2021</option>
            <option value="2020">2020</option>
            <option value="2019">2019</option>
            <option value="2019">2018</option>
            <option value="2019">2017</option>
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
                <th scope="col">PDRB ADHB Lapangan Usaha</th>
                <th scope="col">PDRB ADHK Lapangan Usaha</th>
                <th scope="col">Distribusi PDRB Lapangan Usaha</th>
                <th scope="col">Laju PDRB ADHK Lapangan Usaha</th>
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


</div>
@endsection