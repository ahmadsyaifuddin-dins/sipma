@extends('pdf.layout')

@section('content')
    <div class="report-title">DAFTAR PEMBIMBING LAPANGAN DISKOMINFO</div>

    <table class="content-table">
        <thead>
            <tr>
                <th style="width: 5%">No</th>
                <th style="width: 20%">NIP</th>
                <th style="width: 30%">Nama Pembimbing</th>
                <th style="width: 25%">Jabatan & Bidang</th>
                <th style="width: 20%">Kontak (HP)</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($data as $index => $item)
                <tr>
                    <td style="text-align: center">{{ $index + 1 }}</td>
                    <td>{{ $item->nip }}</td>
                    <td>
                        <strong>{{ $item->nama }}</strong>
                    </td>
                    <td>
                        {{ $item->jabatan }}<br>
                        <small>Bidang: {{ $item->bidang }}</small>
                    </td>
                    <td>{{ $item->no_hp ?? '-' }}</td>
                </tr>
            @endforeach
        </tbody>
    </table>
@endsection
