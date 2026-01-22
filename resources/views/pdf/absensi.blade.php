@extends('pdf.layout')

@section('content')
    <div class="report-title">LAPORAN REKAPITULASI ABSENSI</div>
    <div class="report-period">{{ $periodeLabel }}</div>
    <table class="content-table">
        <thead>
            <tr>
                <th style="width: 5%">No</th>
                <th style="width: 15%">Tanggal</th>
                <th style="width: 25%">Nama Peserta</th>
                <th style="width: 15%">Jam Masuk</th>
                <th style="width: 15%">Jam Pulang</th>
                <th style="width: 10%">Status</th>
                <th style="width: 15%">Keterangan</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($data as $index => $item)
                <tr>
                    <td style="text-align: center">{{ $index + 1 }}</td>
                    <td style="text-align: center">
                        {{ \Carbon\Carbon::parse($item->tgl)->translatedFormat('d F Y') }}
                    </td>
                    <td>
                        <strong>{{ $item->peserta->nama_lengkap }}</strong>
                    </td>
                    <td style="text-align: center">{{ $item->jam_masuk ?? '-' }}</td>
                    <td style="text-align: center">{{ $item->jam_keluar ?? '-' }}</td>
                    <td style="text-align: center">
                        @if ($item->status == 'hadir')
                            Hadir
                        @elseif($item->status == 'izin')
                            Izin
                        @elseif($item->status == 'sakit')
                            Sakit
                        @else
                            Alfa
                        @endif
                    </td>
                    <td>{{ $item->keterangan ?? '-' }}</td>
                </tr>
            @endforeach
        </tbody>
    </table>
@endsection
