@extends('pdf.layout')

@section('content')
    <div class="report-title">LAPORAN REKAPITULASI EVALUASI PESERTA</div>
    <div class="report-period">{{ $periodeLabel }}</div>

    <table class="content-table">
        <thead>
            <tr>
                <th style="width: 3%" rowspan="2">No</th>
                <th style="width: 15%" rowspan="2">Nama Peserta</th>
                <th style="width: 12%" rowspan="2">Pembimbing</th>

                {{-- HEADER GROUP 10 KRITERIA --}}
                <th colspan="10" style="text-align: center; background-color: #f0f0f0;">Rincian Nilai Aspek</th>

                <th style="width: 5%" rowspan="2">Rerata</th>
                <th style="width: 8%" rowspan="2">Predikat</th>
            </tr>
            <tr>
                {{-- 10 SUB HEADER (Singkatan agar muat) --}}
                <th style="font-size: 8px; width: 4%; text-align: center" title="Kedisiplinan">Dsp</th>
                <th style="font-size: 8px; width: 4%; text-align: center" title="Etika & Perilaku">Etk</th>
                <th style="font-size: 8px; width: 4%; text-align: center" title="Motivasi Diri">Mtv</th>
                <th style="font-size: 8px; width: 4%; text-align: center" title="Kualitas Kerja">Kual</th>
                <th style="font-size: 8px; width: 4%; text-align: center" title="Penguasaan Materi">Pgs</th>
                <th style="font-size: 8px; width: 4%; text-align: center" title="Produktivitas">Prod</th>
                <th style="font-size: 8px; width: 4%; text-align: center" title="Kerjasama">Krj</th>
                <th style="font-size: 8px; width: 4%; text-align: center" title="Komunikasi">Kom</th>
                <th style="font-size: 8px; width: 4%; text-align: center" title="Inisiatif">Ini</th>
                <th style="font-size: 8px; width: 4%; text-align: center" title="Adaptasi">Adp</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($data as $index => $item)
                <tr>
                    <td style="text-align: center">{{ $index + 1 }}</td>
                    <td>
                        <strong style="font-size: 10px">{{ $item->peserta->nama_lengkap }}</strong><br>
                        <span style="font-size: 9px; color: #555;">{{ $item->peserta->institusi }}</span>
                    </td>
                    <td style="font-size: 10px">
                        {{ $item->peserta->penempatan->pembimbing->nama ?? '-' }}
                    </td>

                    {{-- NILAI 1-10 --}}
                    <td style="text-align: center; font-size: 9px;">{{ $item->nilai_disiplin }}</td>
                    <td style="text-align: center; font-size: 9px;">{{ $item->nilai_etika }}</td>
                    <td style="text-align: center; font-size: 9px;">{{ $item->nilai_motivasi }}</td>
                    <td style="text-align: center; font-size: 9px;">{{ $item->nilai_kualitas }}</td>
                    <td style="text-align: center; font-size: 9px;">{{ $item->nilai_penguasaan }}</td>
                    <td style="text-align: center; font-size: 9px;">{{ $item->nilai_produktivitas }}</td>
                    <td style="text-align: center; font-size: 9px;">{{ $item->nilai_kerjasama }}</td>
                    <td style="text-align: center; font-size: 9px;">{{ $item->nilai_komunikasi }}</td>
                    <td style="text-align: center; font-size: 9px;">{{ $item->nilai_inisiatif }}</td>
                    <td style="text-align: center; font-size: 9px;">{{ $item->nilai_adaptasi }}</td>

                    {{-- HASIL AKHIR --}}
                    <td style="text-align: center; font-weight: bold; background-color: #f9f9f9;">
                        {{ $item->nilai_rata_rata }}
                    </td>
                    <td style="text-align: center">
                        <strong>{{ $item->predikat_huruf }}</strong><br>
                        <span style="font-size: 8px">({{ $item->predikat_keterangan }})</span>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>

    {{-- KETERANGAN KODE (Optional, agar pembaca paham singkatan) --}}
    <div style="margin-top: 10px; font-size: 9px; color: #555;">
        <strong>Keterangan Aspek:</strong>
        Dsp: Disiplin, Etk: Etika, Mtv: Motivasi, Kual: Kualitas Kerja, Pgs: Penguasaan Materi,
        Prod: Produktivitas, Krj: Kerjasama, Kom: Komunikasi, Ini: Inisiatif, Adp: Adaptasi.
    </div>
@endsection
