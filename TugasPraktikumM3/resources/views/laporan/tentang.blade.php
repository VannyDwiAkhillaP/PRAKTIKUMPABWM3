@extends('layouts.app')

@section('title', 'Tentang Aplikasi')
@section('heading', 'Tentang Aplikasi')

@section('content')
<div class="panel">
    <div class="panel-heading">
        <div class="heading-icon">ⓘ</div>
        <div>
            <h1>Tentang LaporBanjir</h1>
            <p>Sistem pelaporan banjir sederhana BPBD Kabupaten Bandung</p>
        </div>
    </div>

    <x-alert type="info" title="Prototipe">
        Aplikasi ini berupa prototipe tanpa database. Data laporan contoh disimpan dalam array pada Controller.
    </x-alert>

    <p style="line-height:1.7; margin-top:14px;">
        Aplikasi dibangun dengan Laravel dan Blade Template: layout utama (@@extends, @@section, @@yield),
        directive percabangan dan perulangan, komponen Blade &lt;x-alert&gt;, serta partial yang dipanggil dengan @@include.
    </p>
</div>
@endsection
