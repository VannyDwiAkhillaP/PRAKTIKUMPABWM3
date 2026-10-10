@extends('layouts.app')

@section('title', 'Daftar Laporan')
@section('heading', 'Daftar Laporan Banjir')

@section('content')
<div class="panel">
    <div class="panel-heading">
        <div class="heading-icon">📄</div>
        <div>
            <h1>Daftar Laporan Banjir</h1>
            <p>Laporan yang masuk dari warga Kabupaten Bandung (laporan baru Anda tampil paling atas)</p>
        </div>
    </div>

    <div class="legend">
        <span class="badge badge-waspada">WASPADA &lt; 30 cm</span>
        <span class="badge badge-siaga">SIAGA 30–70 cm</span>
        <span class="badge badge-awas">AWAS &gt; 70 cm</span>
    </div>

    <div class="card-grid">
        @forelse ($daftarLaporan as $laporan)
            @include('partials.laporan-card', ['laporan' => $laporan])
        @empty
            <x-alert type="info">Belum ada laporan banjir yang masuk.</x-alert>
        @endforelse
    </div>

    <p class="hint" style="margin-top: 16px;">Total laporan: {{ count($daftarLaporan) }}</p>
</div>
@endsection
