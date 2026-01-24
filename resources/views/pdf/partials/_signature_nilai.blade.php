<div class="ttd-container">

    <div class="ttd-box">
        <p>Mengetahui,<br>Kepala Dinas Kominfo</p>
        <div class="ttd-space"></div> {{-- Jarak TTD --}}
        <p class="ttd-name">Hery Sasmita, S.STP., M.AP</p>
        <p>NIP. 19800101 200001 1 001</p>
    </div>

    <div class="ttd-box right">
        {{-- Tanggal dinamis sesuai tgl penilaian --}}
        <p>
            Marabahan, {{ \Carbon\Carbon::parse($evaluasi->created_at)->translatedFormat('d F Y') }}<br>
            Pembimbing Lapangan
        </p>
        <div class="ttd-space"></div> {{-- Jarak TTD --}}
        <p class="ttd-name">{{ $pembimbing->nama }}</p>
        <p>NIP. {{ $pembimbing->nip ?? '-' }}</p>
    </div>

    <div style="clear: both;"></div>
</div>
