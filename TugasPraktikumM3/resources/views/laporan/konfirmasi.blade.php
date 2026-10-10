@extends('layouts.app')

@section('title', 'Konfirmasi Laporan')
@section('heading', 'Konfirmasi Laporan')

@section('content')
<div class="success-header">
    <div class="success-icon">✓</div>
    <h1>Laporan Berhasil Dikirim!</h1>
    <p>Terima kasih atas laporan Anda. Data telah diproses dan ditampilkan sebagai konfirmasi laporan.</p>
</div>

<div class="panel" style="max-width: 900px; margin: 0 auto;">
    <x-alert type="success" title="Berhasil">
        Laporan dari <strong>{{ $laporan['nama_pelapor'] }}</strong> telah diterima oleh sistem LaporBanjir.
    </x-alert>

    <div class="summary-grid">
        <div class="summary-section">
            <h3>📋 Ringkasan Laporan</h3>
            <div class="summary-row"><span>Nama Pelapor</span><strong>{{ $laporan['nama_pelapor'] }}</strong></div>
            <div class="summary-row"><span>Kecamatan</span><strong>{{ $laporan['kecamatan'] }}</strong></div>
            <div class="summary-row"><span>Desa / Kelurahan</span><strong>{{ $laporan['desa'] }}</strong></div>
            <div class="summary-row"><span>Tinggi Genangan Air</span><strong>{{ $laporan['tinggi_air'] }} cm</strong></div>
            <div class="summary-row"><span>Waktu Laporan</span><strong>{{ $laporan['waktu'] }}</strong></div>
        </div>

        <div class="summary-section">
            <h3>ⓘ Status Genangan</h3>
            @include('partials.status-badge', ['tinggi' => $laporan['tinggi_air']])
        </div>
    </div>

    <x-alert type="info" title="Informasi">
        Data laporan hanya diproses sementara dan tidak disimpan secara permanen ke database.
    </x-alert>
</div>

<div class="actions">
    <a href="{{ route('lapor.daftar') }}" class="btn btn-light">📄 Lihat Daftar Laporan</a>
    <a href="{{ route('lapor.form') }}" class="btn btn-primary">📝 Kirim Laporan Lagi</a>
</div>
@endsection
