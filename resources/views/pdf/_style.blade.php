<style>
    /* Reset dasar */
    body {
        font-family: Arial, sans-serif;
        font-size: 12px;
        margin: 0;
        padding: 0;
    }

    /* KOP SURAT (Menggunakan Table agar presisi) */
    .header-table {
        width: 100%;
        border-bottom: 3px double #000; /* Garis ganda di bawah kop */
        margin-bottom: 20px;
        padding-bottom: 10px;
    }
    .logo-cell {
        width: 80px; /* Ukuran kolom logo */
        text-align: center;
        vertical-align: middle;
    }
    .logo-img {
        width: 70px;
        height: auto;
    }
    .text-cell {
        text-align: center;
        vertical-align: middle;
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
        line-height: 1.2;
    }

    /* KONTEN TABEL DATA */
    .content-table {
        width: 100%;
        border-collapse: collapse;
        margin-top: 10px;
    }
    .content-table th, .content-table td {
        border: 1px solid #000;
        padding: 6px;
        text-align: left;
        vertical-align: top;
    }
    .content-table th {
        background-color: #f0f0f0;
        text-align: center;
        font-weight: bold;
    }
    
    /* JUDUL LAPORAN */
    .report-title {
        text-align: center;
        font-size: 14px;
        font-weight: bold;
        margin-bottom: 20px;
        text-decoration: underline;
        text-transform: uppercase;
    }

    /* TANDA TANGAN (Signature) */
    .signature-container {
        width: 100%;
        margin-top: 40px;
        /* Teknik float untuk memposisikan di kanan bawah */
        page-break-inside: avoid;
    }
    .signature-box {
        float: right;
        width: 250px;
        text-align: center;
    }
    .signature-name {
        font-weight: bold;
        text-decoration: underline;
        margin-top: 70px; /* Jarak untuk tanda tangan basah */
    }
</style>