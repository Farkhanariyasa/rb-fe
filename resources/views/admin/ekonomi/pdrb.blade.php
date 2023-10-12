@extends('./layouts.admin')
@section('content')
    <div class="isi_admin">
    <h1 class="judul">{{ $data['title'] }}</h1>
        </h1>
        <div class="aksi">
            <a href="{{ route('export.excel_pdrb')}}" class="download-btn">Download Template</a>
            <!-- import excel -->
            <form action="{{ route('import.excel_pdrb') }}" method="POST" enctype="multipart/form-data" class="import-form">
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
                   <!-- id	fungsi	indikator	time_lag	tahun	variabel	satuan	hierarki1	pdrb_adhb	pdrb_adhk	pdrb_perkapita	laju_pertumbuhan_ekonomi	lapangan_usaha	adhb_lapangan_usaha	adhk_lapangan usaha	distribusi_lapangan usaha	laju_adhk_lapangan_usaha	laju_pdrb_pak_rio -->
                    <th scope="col">Fungsi</th>
                    <th scope="col">Indikator</th>
                    <th scope="col">Time Lag</th>
                    <th scope="col">Tahun</th>
                    <th scope="col">Variabel</th>
                    <th scope="col">Satuan</th>
                    <th scope="col">Hierarki 1</th>
                    <th scope="col">PDRB ADHB</th>
                    <th scope="col">PDRB ADHK</th>
                    <th scope="col">PDRB Perkapita</th>
                    <th scope="col">Laju Pertumbuhan Ekonomi</th>
                    <th scope="col">Lapangan Usaha</th>
                    <th scope="col">ADHB Lapangan Usaha</th>
                    <th scope="col">ADHK Lapangan Usaha</th>
                    <th scope="col">Distribusi Lapangan Usaha</th>
                    <th scope="col">Laju ADHK Lapangan Usaha</th>
                    <th scope="col">Laju PDRB Pak Rio</th>
                </tr>
            </thead>
            <tbody>
                @foreach($pdrb as $p)
                <tr>
                    <th scope="row">{{ $loop->iteration }}</th>
                    <td>{{ $p->fungsi }}</td>
                    <td>{{ $p->indikator }}</td>
                    <td>{{ $p->time_lag }}</td>
                    <td>{{ $p->tahun }}</td>
                    <td>{{ $p->variabel }}</td>
                    <td>{{ $p->satuan }}</td>
                    <td>{{ $p->hierarki1 }}</td>
                    <td>{{ $p->pdrb_adhb }}</td>
                    <td>{{ $p->pdrb_adhk }}</td>
                    <td>{{ $p->pdrb_perkapita }}</td>
                    <td>{{ $p->laju_pertumbuhan_ekonomi }}</td>
                    <td>{{ $p->lapangan_usaha }}</td>
                    <td>{{ $p->adhb_lapangan_usaha }}</td>
                    <td>{{ $p->adhk_lapangan_usaha }}</td>
                    <td>{{ $p->distribusi_lapangan_usaha }}</td>
                    <td>{{ $p->laju_adhk_lapangan_usaha }}</td>
                    <td>{{ $p->laju_pdrb_pak_rio }}</td>
                </tr>
                @endforeach
            </tbody>
        </table>


        {{ $pdrb->links() }}
    </div>
@endsection