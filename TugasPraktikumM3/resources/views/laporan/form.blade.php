@extends('layouts.app')

@section('title', 'Form Pelaporan')
@section('heading', 'Form Pelaporan Banjir')

@section('content')
<div class="panel">
    <div class="form-grid">
        <div>
            <div class="panel-heading">
                <div class="heading-icon">📝</div>
                <div>
                    <h1>Form Pelaporan Banjir</h1>
                    <p>Laporkan kejadian banjir di wilayah Anda</p>
                </div>
            </div>

            <x-alert type="info" title="Informasi Pelaporan">
                Pastikan data yang Anda isi sudah benar. Laporan Anda dapat membantu petugas mengetahui kondisi genangan air di wilayah terdampak.
            </x-alert>

            <div class="illustration">
                <div class="big-icon">🏘️</div>
                <h3>Bersama Hadapi Banjir</h3>
                <p>Laporkan kondisi banjir di sekitar Anda agar informasi dapat digunakan sebagai data awal penanganan oleh petugas terkait.</p>
            </div>
        </div>

        <div>
            @if ($errors->any())
                <x-alert type="danger" title="Data belum valid">
                    @foreach ($errors->all() as $error)
                        <div>• {{ $error }}</div>
                    @endforeach
                </x-alert>
            @endif

            <form action="{{ route('lapor.kirim') }}" method="POST">
                @csrf

                <label for="nama_pelapor">Nama Pelapor</label>
                <input type="text" id="nama_pelapor" name="nama_pelapor" value="{{ old('nama_pelapor') }}" placeholder="Masukkan nama Anda">

                <label for="kecamatan">Kecamatan</label>
                <select id="kecamatan" name="kecamatan">
                    <option value="">-- Pilih Kecamatan --</option>
                    @foreach ($daftarKecamatan as $kec)
                        <option value="{{ $kec }}" @selected(old('kecamatan') === $kec)>{{ $kec }}</option>
                    @endforeach
                </select>

                <label for="desa">Desa / Kelurahan</label>
                <input type="text" id="desa" name="desa" value="{{ old('desa') }}" placeholder="Masukkan desa atau kelurahan">

                <label for="tinggi_air">Tinggi Genangan Air (cm)</label>
                <input type="number" id="tinggi_air" name="tinggi_air" value="{{ old('tinggi_air') }}" min="0" max="500" step="any" placeholder="Contoh: 45">
                <small class="hint">Contoh: 45 untuk genangan setinggi 45 cm.</small>

                <button type="submit" class="btn btn-primary btn-block">➤ Kirim Laporan</button>
            </form>
        </div>
    </div>
</div>
@endsection
