<!DOCTYPE html>
<html>
<head>
    <title>Laporan Rekapitulasi</title>
    <style>
        body { font-family: sans-serif; font-size: 10pt; }
        .header { text-align: center; margin-bottom: 20px; border-bottom: 2px solid black; padding-bottom: 10px; }
        .title { font-size: 16pt; font-weight: bold; text-transform: uppercase; }
        .subtitle { font-size: 11pt; margin-top: 5px; }
        .periode { font-weight: bold; font-size: 12pt; margin-top: 5px; color: #333; }
        
        table { width: 100%; border-collapse: collapse; margin-top: 10px; }
        th, td { border: 1px solid #000; padding: 6px; text-align: left; vertical-align: top; }
        th { background-color: #f2f2f2; font-weight: bold; text-align: center; }
        
        .badge { font-weight: bold; text-transform: uppercase; font-size: 9pt; }
        
        .footer { margin-top: 40px; width: 100%; text-align: right; }
        .ttd { width: 200px; float: right; text-align: center; }
    </style>
</head>
<body>
    <div class="header">
        <div class="title">SATUAN LALU LINTAS (SATLANTAS)</div>
        <div class="subtitle">LAPORAN REKAPITULASI PENGADUAN MASYARAKAT</div>
        <div class="periode">{{ $periode }}</div>
    </div>

    <table>
        <thead>
            <tr>
                <th width="5%">No</th>
                <th width="15%">Tanggal</th>
                <th width="20%">Pelapor</th>
                <th width="30%">Isi Laporan & Lokasi</th>
                <th width="15%">Petugas</th>
                <th width="15%">Status</th>
            </tr>
        </thead>
        <tbody>
            @forelse($laporan as $item)
            <tr>
                <td style="text-align: center;">{{ $loop->iteration }}</td>
                <td>{{ \Carbon\Carbon::parse($item->tgl_pengaduan)->format('d/m/Y') }}</td>
                <td>
                    <strong>{{ $item->user->name }}</strong><br>
                    <span style="font-size: 9pt; color: #555;">{{ $item->user->email }}</span>
                </td>
                <td>
                    <strong>{{ $item->judul_laporan }}</strong><br>
                    <span style="font-style: italic; font-size: 9pt;">Lokasi: {{ $item->lokasi_kejadian }}</span>
                </td>
                <td>
                    {{ $item->petugas->name ?? '-' }}
                </td>
                <td style="text-align: center;">
                    <span class="badge">{{ $item->status }}</span>
                </td>
            </tr>
            @empty
            <tr>
                <td colspan="6" style="text-align: center; padding: 20px;">Tidak ada data laporan pada periode ini.</td>
            </tr>
            @endforelse
        </tbody>
    </table>

    <div class="footer">
        <div class="ttd">
            <p>Garut, {{ date('d F Y') }}</p>
            <p>Kepala Satuan,</p>
            <br><br><br><br>
            <p><strong>( ..................................... )</strong></p>
        </div>
    </div>
</body>
</html>1