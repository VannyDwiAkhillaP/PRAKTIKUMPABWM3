<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>@yield('title', 'LaporBanjir') | BPBD Kabupaten Bandung</title>

    <style>
        * { box-sizing: border-box; margin: 0; padding: 0; }
        body { font-family: "Segoe UI", Arial, sans-serif; background: #f3f7fd; color: #172b4d; }
        a { text-decoration: none; color: inherit; }

        .app { display: flex; min-height: 100vh; }

        /* Sidebar */
        .sidebar { width: 230px; background: #fff; border-right: 1px solid #e3eaf5; padding: 18px 14px; display: flex; flex-direction: column; gap: 18px; }
        .brand { display: flex; align-items: center; gap: 10px; }
        .brand-logo { width: 38px; height: 38px; border-radius: 10px; background: #1a6ee8; color: #fff; display: flex; align-items: center; justify-content: center; font-size: 18px; }
        .brand h2 { font-size: 15px; }
        .brand small { font-size: 10px; color: #6b7a99; }
        .nav { display: flex; flex-direction: column; gap: 6px; }
        .nav a { padding: 10px 12px; border-radius: 8px; font-size: 13px; color: #44516e; }
        .nav a:hover { background: #eef4ff; }
        .nav a.active { background: #e3eeff; color: #1a6ee8; font-weight: 600; }
        .contact-box { margin-top: auto; background: #eaf2ff; border-radius: 10px; padding: 12px; font-size: 11px; line-height: 1.6; }
        .contact-box .tag { display: inline-block; background: #e53935; color: #fff; font-size: 9px; font-weight: 700; padding: 2px 6px; border-radius: 4px; margin-bottom: 4px; }

        /* Main */
        .main { flex: 1; display: flex; flex-direction: column; min-width: 0; }
        .header { background: #fff; border-bottom: 1px solid #e3eaf5; padding: 14px 28px; display: flex; justify-content: space-between; align-items: center; }
        .header h1 { font-size: 16px; }
        .header small { color: #6b7a99; font-size: 11px; }
        .content { flex: 1; padding: 26px 28px; }
        .footer { text-align: center; font-size: 11px; color: #6b7a99; padding: 16px; border-top: 1px solid #e3eaf5; background: #fff; }

        /* Panel & form */
        .panel { background: #fff; border-radius: 14px; padding: 26px; box-shadow: 0 2px 10px rgba(30, 70, 140, .07); max-width: 960px; margin: 0 auto; }
        .form-grid { display: grid; grid-template-columns: 1fr 1fr; gap: 28px; }
        .panel-heading { display: flex; align-items: center; gap: 12px; margin-bottom: 16px; }
        .heading-icon { width: 42px; height: 42px; border-radius: 10px; background: #1a6ee8; color: #fff; display: flex; align-items: center; justify-content: center; font-size: 19px; }
        .panel-heading h1 { font-size: 19px; }
        .panel-heading p { font-size: 12px; color: #6b7a99; }
        .illustration { margin-top: 14px; background: #eef4ff; border-radius: 12px; padding: 22px; text-align: center; }
        .big-icon { font-size: 44px; }
        .illustration h3 { margin: 6px 0; font-size: 14px; }
        .illustration p { font-size: 11px; color: #5b6a88; line-height: 1.6; }

        label { display: block; font-size: 12px; font-weight: 600; margin: 12px 0 5px; }
        input, select { width: 100%; padding: 10px 12px; border: 1px solid #d5deee; border-radius: 8px; font-size: 13px; font-family: inherit; background: #fff; }
        input:focus, select:focus { outline: none; border-color: #1a6ee8; box-shadow: 0 0 0 3px rgba(26, 110, 232, .15); }
        .hint { font-size: 11px; color: #6b7a99; }

        /* Buttons */
        .btn { display: inline-block; padding: 10px 18px; border-radius: 8px; border: 1px solid transparent; font-size: 13px; font-weight: 600; cursor: pointer; font-family: inherit; }
        .btn-primary { background: #1a6ee8; color: #fff; }
        .btn-primary:hover { background: #1558bd; }
        .btn-light { background: #fff; border-color: #d5deee; color: #172b4d; }
        .btn-block { width: 100%; margin-top: 16px; }

        /* Alert (komponen x-alert) */
        .alert { padding: 12px 14px; border-radius: 8px; font-size: 12px; line-height: 1.6; margin-bottom: 14px; border: 1px solid; }
        .alert-info { background: #eef4ff; border-color: #cfe0ff; color: #1b4a9c; }
        .alert-success { background: #e8f8ee; border-color: #bfe8cc; color: #1c7a3f; }
        .alert-danger { background: #fdecec; border-color: #f6c5c5; color: #b3261e; }

        /* Konfirmasi */
        .success-header { text-align: center; margin-bottom: 20px; }
        .success-icon { width: 60px; height: 60px; margin: 0 auto 10px; border-radius: 50%; background: #e1f7e8; color: #1c9c4f; font-size: 28px; display: flex; align-items: center; justify-content: center; }
        .success-header h1 { font-size: 22px; color: #1a3a7a; }
        .success-header p { font-size: 12px; color: #6b7a99; margin-top: 4px; }
        .summary-grid { display: grid; grid-template-columns: 1.2fr 1fr; gap: 28px; margin: 14px 0; }
        .summary-section h3 { font-size: 14px; margin-bottom: 10px; }
        .summary-row { display: flex; justify-content: space-between; padding: 9px 0; border-bottom: 1px solid #edf1f8; font-size: 12px; }
        .summary-row span { color: #6b7a99; }
        .actions { text-align: center; margin-top: 18px; display: flex; gap: 10px; justify-content: center; }

        /* Status & kartu */
        .badge { display: inline-block; padding: 5px 12px; border-radius: 6px; font-size: 11px; font-weight: 700; letter-spacing: .4px; }
        .badge-waspada { background: #dff6e5; color: #1c7a3f; }
        .badge-siaga { background: #fff1d1; color: #a66a00; }
        .badge-awas { background: #fde0e0; color: #b3261e; }
        .saran { margin-top: 10px; padding: 10px 12px; border-radius: 8px; font-size: 12px; }
        .saran-waspada { background: #fff8e1; color: #8a6d00; }
        .saran-siaga { background: #fff1d1; color: #8a5a00; }
        .saran-awas { background: #fde8e8; color: #9c1d17; }
        .legend { display: flex; gap: 8px; flex-wrap: wrap; margin-bottom: 16px; }
        .card-grid { display: grid; grid-template-columns: repeat(auto-fill, minmax(260px, 1fr)); gap: 14px; }
        .card-laporan { border: 1px solid #e3eaf5; border-radius: 12px; padding: 16px; background: #fff; }
        .card-head { display: flex; justify-content: space-between; align-items: flex-start; }
        .card-head h3 { font-size: 14px; }
        .card-head small { color: #6b7a99; font-size: 10px; }
        .card-height { font-size: 24px; font-weight: 700; color: #1a6ee8; }
        .card-height span { font-size: 11px; font-weight: 500; color: #6b7a99; }
        .card-lokasi { font-size: 12px; color: #44516e; margin: 8px 0 10px; }

        @media (max-width: 800px) {
            .app { flex-direction: column; }
            .sidebar { width: 100%; }
            .form-grid, .summary-grid { grid-template-columns: 1fr; }
        }
    </style>
</head>
<body>
<div class="app">
    {{-- Sidebar / Menu navigasi (named route) --}}
    <aside class="sidebar">
        <div class="brand">
            <div class="brand-logo">🌊</div>
            <div>
                <h2>LaporBanjir</h2>
                <small>BPBD Kabupaten Bandung</small>
            </div>
        </div>

        <nav class="nav">
            <a href="{{ route('lapor.form') }}" class="{{ request()->routeIs('lapor.form', 'lapor.konfirmasi') ? 'active' : '' }}">📝 Lapor Banjir</a>
            <a href="{{ route('lapor.daftar') }}" class="{{ request()->routeIs('lapor.daftar') ? 'active' : '' }}">📄 Daftar Laporan</a>
            <a href="{{ route('tentang') }}" class="{{ request()->routeIs('tentang') ? 'active' : '' }}">ⓘ Tentang Aplikasi</a>
        </nav>

        <div class="contact-box">
            <span class="tag">DARURAT</span><br>
            <strong>Hubungi BPBD</strong><br>
            Hubungi petugas saat darurat
        </div>
    </aside>

    <div class="main">
        {{-- Header --}}
        <header class="header">
            <div>
                <h1>Sistem Pelaporan Banjir</h1>
                <small>Kabupaten Bandung</small>
            </div>
            <small>@yield('heading')</small>
        </header>

        {{-- Konten halaman --}}
        <main class="content">
            @yield('content')
        </main>

        {{-- Footer --}}
        <footer class="footer">
            LaporBanjir &copy; {{ date('Y') }} · Sistem Pelaporan Banjir Kabupaten Bandung
        </footer>
    </div>
</div>
</body>
</html>
