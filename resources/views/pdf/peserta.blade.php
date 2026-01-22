@extends('pdf.layout')

@section('content')
    <div class="report-title">LAPORAN DATA PESERTA MAGANG</div>

    <table class="content-table">
        <thead>
            <tr>
                <th style="width: 5%">No</th>
                <th style="width: 25%">Biodata Peserta</th>
                <th style="width: 25%">Institusi & Jurusan</th>
                <th style="width: 20%">Kontak / Alamat</th>
                <th style="width: 15%">Periode Magang</th>
                <th style="width: 10%">Status</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($data as $index => $item)
                <tr>
                    <td style="text-align: center">{{ $index + 1 }}</td>
                    <td>
                        <strong>{{ $item->nama_lengkap }}</strong><br>
                        <small>NIM: {{ $item->nim_nisn }}</small>
                    </td>
                    <td>
                        {{ $item->institusi }}<br>
                        <small>{{ $item->jurusan }}</small>
                    </td>
                    <td>
                        {{ $item->no_hp }}<br>
                        <small>{{ Str::limit($item->alamat, 30) }}</small>
                    </td>
                    <td style="text-align: center">
                        {{ \Carbon\Carbon::parse($item->tgl_mulai)->format('d/m/y') }} -
                        {{ \Carbon\Carbon::parse($item->tgl_selesai)->format('d/m/y') }}
                    </td>
                    <td style="text-align: center">
                        {{ ucfirst($item->status) }}
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
@endsection
