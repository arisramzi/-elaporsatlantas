<!DOCTYPE html>
<html>
<head>
    <title>Laporan Pengaduan</title>
    <style>
        body { font-family: sans-serif; }
        .header { text-align: center; margin-bottom: 30px; }
        .title { font-size: 24px; font-weight: bold; }
        .subtitle { font-size: 14px; color: #555; }
        .content { margin-top: 20px; }
        table { width: 100%; border-collapse: collapse; margin-top: 10px; }
        th, td { padding: 8px; text-align: left; border-bottom: 1px solid #ddd; }
        .status { font-weight: bold; text-transform: uppercase; }
    </style>
</head>
<body>
    <div class="header">
        <div class="title">SATLANTAS POLRES</div>
        <div class="subtitle">Sistem Laporan Pelanggaran & Kejadian Lalu Lintas</div>
        <hr>
    </div>

    <h3>Detail Laporan #{{ $pengaduan->id }}</h3>

    <table>
        <tr>
            <th width="150">Pelapor</th>
            <td>{{ $pengaduan->user->name }} ({{ $pengaduan->user->email }})</td>
        </tr>
        <tr>
            <th>Tanggal Lapor</th>
            <td>{{ $pengaduan->created_at->format('d F Y, H:i') }}</td>
        </tr>
        <tr>
            <th>Kategori</th>
            <td>{{ json_decode($pengaduan->kategori)->nama_kategori ?? $pengaduan->kategori }}</td>
        </tr>
        <tr>
            <th>Lokasi</th>
            <td>{{ $pengaduan->lokasi_kejadian }}</td>
        </tr>
        <tr>
            <th>Status</th>
            <td class="status">{{ $pengaduan->status }}</td>
        </tr>
    </table>

    <div class="content">
        <h4>Isi Laporan:</h4>
        <p style="text-align: justify;">{{ $pengaduan->detail_laporan ?? $pengaduan->isi_laporan }}</p>
    </div>

    @if($pengaduan->tanggapan)
    <div class="content" style="background-color: #f4f4f4; padding: 10px; border-left: 5px solid #333;">
        <h4>Tanggapan Petugas:</h4>
        <p>{{ $pengaduan->tanggapan }}</p>
    </div>
    @endif
    
    <div style="margin-top: 50px; text-align: right;">
        <p>Garut, {{ date('d F Y') }}</p>
        <br><br>
        <p><strong>Admin Satlantas</strong></p>
    </div>
</body>
</html>