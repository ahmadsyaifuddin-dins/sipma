@extends('pdf.layout')

@section('content')
    <div class="report-title">LAPORAN HASIL EVALUASI PESERTA</div>
    <div class="report-period">{{ $periodeLabel }}</div>
    <table class="content-table">
        <thead>
            <tr>
                <th style="width: 5%" rowspan="2">No</th>
                <th style="width: 25%" rowspan="2">Nama Peserta</th>
                <th style="width: 20%" rowspan="2">Pembimbing</th>
                <th colspan="4" style="text-align: center">Rincian Nilai</th>
                <th style="width: 10%" rowspan="2">Rata-rata</th>
                <th style="width: 10%" rowspan="2">Predikat</th>
            </tr>
            <tr>
                <th style="font-size: 10px; text-align: center">Disiplin</th>
                <th style="font-size: 10px; text-align: center">Kerjasama</th>
                <th style="font-size: 10px; text-align: center">Inisiatif</th>
                <th style="font-size: 10px; text-align: center">Kerajinan</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($data as $index => $item)
                <tr>
                    <td style="text-align: center">{{ $index + 1 }}</td>
                    <td>
                        <strong>{{ $item->peserta->nama_lengkap }}</strong><br>
                        <small>{{ $item->peserta->institusi }}</small>
                    </td>
                    <td>
                        {{ $item->peserta->penempatan->pembimbing->nama ?? '-' }}
                    </td>
                    <td style="text-align: center">{{ $item->nilai_disiplin }}</td>
                    <td style="text-align: center">{{ $item->nilai_kerjasama }}</td>
                    <td style="text-align: center">{{ $item->nilai_inisiatif }}</td>
                    <td style="text-align: center">{{ $item->nilai_kerajinan }}</td>
                    <td style="text-align: center; font-weight: bold;">
                        {{ $item->nilai_rata_rata }}
                    </td>
                    <td style="text-align: center">
                        <strong>{{ $item->predikat_huruf }}</strong><br>
                        <span style="font-size: 9px">({{ $item->predikat_keterangan }})</span>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
@endsection
