{{-- Variabel: $laporan (array) --}}
<div class="card-laporan">
    <div class="card-head">
        <div>
            <h3>{{ $laporan['nama_pelapor'] }}</h3>
            <small>{{ $laporan['waktu'] }}</small>
        </div>
        <div class="card-height">{{ $laporan['tinggi_air'] }} <span>cm</span></div>
    </div>
    <p class="card-lokasi">📍 {{ $laporan['desa'] }}, Kec. {{ $laporan['kecamatan'] }}</p>
    @include('partials.status-badge', ['tinggi' => $laporan['tinggi_air']])
</div>
