@extends('pdf.layout')

@section('content')
    <div class="report-title">LAPORAN PENEMPATAN PESERTA MAGANG</div>

    <table class="content-table">
        <thead>
            <tr>
                <th style="width: 5%">No</th>
                <th style="width: 25%">Nama Peserta</th>
                <th style="width: 20%">Institusi</th>
                <th style="width: 25%">Pembimbing</th>
                <th style="width: 15%">Ruangan</th>
                <th style="width: 10%">Periode</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($data as $index => $item)
                <tr>
                    <td style="text-align: center">{{ $index + 1 }}</td>
                    <td>
                        <strong>{{ $item->peserta->nama_lengkap }}</strong><br>
                        <small>NIM: {{ $item->peserta->nim_nisn }}</small>
                    </td>
                    <td>{{ $item->peserta->institusi }}</td>
                    <td>
                        {{ $item->pembimbing->nama }}<br>
                        <small>NIP. {{ $item->pembimbing->nip }}</small>
                    </td>
                    <td>{{ $item->ruangan }}</td>
                    <td>
                        {{ \Carbon\Carbon::parse($item->peserta->tgl_mulai)->format('d/m/y') }} -
                        {{ \Carbon\Carbon::parse($item->peserta->tgl_selesai)->format('d/m/y') }}
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
@endsection
