<!DOCTYPE html>
<html>

<head>
    <title>Formulir Penilaian PKL - {{ $peserta->nama_lengkap }}</title>
    {{-- Include Style Umum & Style Khusus Nilai --}}
    @include('pdf.partials._style_nilai')

    {{-- Kita inject style kop juga --}}
    <style>
        /* Copas dikit dari _style lama buat KOP */
        .header-table {
            width: 100%;
            border-bottom: 3px double #000;
            margin-bottom: 20px;
            padding-bottom: 10px;
        }

        .logo-img {
            width: 70px;
            height: auto;
        }

        .text-cell {
            text-align: center;
        }

        .instansi-name {
            font-size: 16px;
            font-weight: bold;
            text-transform: uppercase;
            margin: 0;
        }

        .instansi-address {
            font-size: 10px;
            margin-top: 5px;
        }
    </style>
</head>

<body>

    @include('pdf._header')

    {{-- 2. JUDUL --}}
    <div class="judul-surat">
        Formulir Penilaian Praktek Kerja Lapangan (PKL)
    </div>

    {{-- 3. BIODATA --}}
    <table class="biodata-table">
        <tr>
            <td class="label-col">Nama Pembimbing Lapangan</td>
            <td class="sep-col">:</td>
            <td>{{ $pembimbing->nama }}</td>
        </tr>
        <tr>
            <td class="label-col">Instansi Kerja Praktek</td>
            <td class="sep-col">:</td>
            <td>Dinas Komunikasi dan Informatika Kab. Barito Kuala</td>
        </tr>
    </table>

    <p class="paragraf">
        Menyatakan bahwa peserta Praktek Kerja Lapangan berikut ini:
    </p>

    <table class="biodata-table">
        <tr>
            <td class="label-col">Nama Mahasiswa/Siswa</td>
            <td class="sep-col">:</td>
            <td style="font-weight: bold;">{{ $peserta->nama_lengkap }}</td>
        </tr>
        <tr>
            <td class="label-col">Nomor Induk (NIM/NISN)</td>
            <td class="sep-col">:</td>
            <td>{{ $peserta->nim_nisn }}</td>
        </tr>
        <tr>
            <td class="label-col">Waktu Pelaksanaan</td>
            <td class="sep-col">:</td>
            <td>
                {{ \Carbon\Carbon::parse($peserta->tgl_mulai)->translatedFormat('d F Y') }} –
                {{ \Carbon\Carbon::parse($peserta->tgl_selesai)->translatedFormat('d F Y') }}
            </td>
        </tr>
    </table>

    <p class="paragraf">
        Telah menyelesaikan Praktek Kerja Lapangan di Kantor kami. Dengan mempertimbangkan segala aspek,
        baik dari segi bobot pekerjaan maupun pelaksanaan Kerja Praktek, maka kami memutuskan bahwa
        yang bersangkutan telah menyelesaikan kewajibannya dengan hasil sebagai berikut:
    </p>

    {{-- 4. TABEL NILAI --}}
    <table class="nilai-table">
        <thead>
            <tr>
                <th style="width: 50px;">No.</th>
                <th>Aktivitas Yang Dinilai</th>
                <th style="width: 150px;">Nilai (Angka)</th>
            </tr>
        </thead>
        <tbody>
            <tr>
                <td>1</td>
                <td class="text-left">Kedisiplinan</td>
                <td>{{ $evaluasi->nilai_disiplin }}</td>
            </tr>
            <tr>
                <td>2</td>
                <td class="text-left">Etika & Perilaku (Sopan Santun)</td>
                <td>{{ $evaluasi->nilai_etika }}</td>
            </tr>
            <tr>
                <td>3</td>
                <td class="text-left">Motivasi & Kesungguhan</td>
                <td>{{ $evaluasi->nilai_motivasi }}</td>
            </tr>
            <tr>
                <td>4</td>
                <td class="text-left">Kualitas Hasil Kerja</td>
                <td>{{ $evaluasi->nilai_kualitas }}</td>
            </tr>
            <tr>
                <td>5</td>
                <td class="text-left">Penguasaan Materi/Tugas</td>
                <td>{{ $evaluasi->nilai_penguasaan }}</td>
            </tr>
            <tr>
                <td>6</td>
                <td class="text-left">Produktivitas Kerja</td>
                <td>{{ $evaluasi->nilai_produktivitas }}</td>
            </tr>
            <tr>
                <td>7</td>
                <td class="text-left">Kemampuan Bekerja Sama</td>
                <td>{{ $evaluasi->nilai_kerjasama }}</td>
            </tr>
            <tr>
                <td>8</td>
                <td class="text-left">Komunikasi & Pendapat</td>
                <td>{{ $evaluasi->nilai_komunikasi }}</td>
            </tr>
            <tr>
                <td>9</td>
                <td class="text-left">Inisiatif & Kreativitas</td>
                <td>{{ $evaluasi->nilai_inisiatif }}</td>
            </tr>
            <tr>
                <td>10</td>
                <td class="text-left">Adaptasi Lingkungan Baru</td>
                <td>{{ $evaluasi->nilai_adaptasi }}</td>
            </tr>

            {{-- ROW RATA-RATA --}}
            <tr style="font-weight: bold; background-color: #f9f9f9;">
                <td colspan="2" style="text-align: right; padding-right: 15px;">NILAI RATA-RATA AKHIR</td>
                <td>{{ $evaluasi->nilai_rata_rata }}</td>
            </tr>
        </tbody>
    </table>

    <p style="margin-top: 10px;">
        <strong>Predikat Akhir: {{ $evaluasi->predikat_huruf }} ({{ $evaluasi->predikat_keterangan }})</strong>
    </p>

    {{-- 5. SIGNATURE --}}
    @include('pdf.partials._signature_nilai')

</body>

</html>
