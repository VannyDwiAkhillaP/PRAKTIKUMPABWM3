<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class LaporanBanjirController extends Controller
{
    public const KECAMATAN = [
        'Baleendah', 'Banjaran', 'Bojongsoang', 'Cileunyi', 'Ciparay',
        'Dayeuhkolot', 'Katapang', 'Majalaya', 'Pameungpeuk', 'Rancaekek',
    ];

    // Data contoh laporan (prototipe tanpa database, disimpan dalam array)
    private function dataLaporan(): array
    {
        return [
            ['nama_pelapor' => 'Budi Santoso',   'kecamatan' => 'Dayeuhkolot',  'desa' => 'Citeureup',    'tinggi_air' => 85, 'waktu' => '02/10/2026 06:15 WIB'],
            ['nama_pelapor' => 'Siti Aminah',    'kecamatan' => 'Baleendah',    'desa' => 'Andir',        'tinggi_air' => 55, 'waktu' => '02/10/2026 07:40 WIB'],
            ['nama_pelapor' => 'Agus Permana',   'kecamatan' => 'Bojongsoang',  'desa' => 'Sukapura',     'tinggi_air' => 20, 'waktu' => '02/10/2026 08:05 WIB'],
            ['nama_pelapor' => 'Rina Marlina',   'kecamatan' => 'Majalaya',     'desa' => 'Padaulun',     'tinggi_air' => 70, 'waktu' => '02/10/2026 09:30 WIB'],
            ['nama_pelapor' => 'Dedi Kurniawan', 'kecamatan' => 'Rancaekek',    'desa' => 'Linggar',      'tinggi_air' => 30, 'waktu' => '02/10/2026 10:12 WIB'],
            ['nama_pelapor' => 'Lia Nurhayati',  'kecamatan' => 'Pameungpeuk',  'desa' => 'Rancamulya',   'tinggi_air' => 12, 'waktu' => '02/10/2026 11:00 WIB'],
        ];
    }

    // Menampilkan form pelaporan
    public function form()
    {
        return view('laporan.form', ['daftarKecamatan' => self::KECAMATAN]);
    }

    // Memproses laporan lalu mengarahkan ke halaman konfirmasi
    public function kirim(Request $request)
    {
        $data = $request->validate([
            'nama_pelapor' => 'required|string|max:100',
            'kecamatan'    => 'required|in:' . implode(',', self::KECAMATAN),
            'desa'         => 'required|string|max:100',
            'tinggi_air'   => 'required|numeric|min:0|max:500',
        ], [
            'required' => ':attribute wajib diisi.',
            'numeric'  => ':attribute harus berupa angka.',
            'min'      => ':attribute tidak boleh kurang dari :min.',
            'max'      => ':attribute melebihi batas maksimal.',
            'in'       => 'Kecamatan yang dipilih tidak valid.',
        ], [
            'nama_pelapor' => 'Nama pelapor',
            'kecamatan'    => 'Kecamatan',
            'desa'         => 'Desa / Kelurahan',
            'tinggi_air'   => 'Tinggi genangan air',
        ]);

        $data['waktu'] = now()->timezone('Asia/Jakarta')->format('d/m/Y H:i') . ' WIB';

        // Simpan ke session agar muncul di daftar laporan (tanpa database)
        $tersimpan = session('laporan_tersimpan', []);
        array_unshift($tersimpan, $data); // laporan terbaru di paling atas
        session(['laporan_tersimpan' => $tersimpan]);

        return redirect()->route('lapor.konfirmasi')->with('laporan', $data);
    }

    // Menampilkan konfirmasi laporan
    public function konfirmasi()
    {
        $laporan = session('laporan');

        if (!$laporan) {
            return redirect()->route('lapor.form');
        }

        return view('laporan.konfirmasi', ['laporan' => $laporan]);
    }

    // Menampilkan daftar laporan
    public function daftar()
    {
        // Laporan baru dari session ditampilkan lebih dulu, lalu data contoh
        $daftarLaporan = array_merge(session('laporan_tersimpan', []), $this->dataLaporan());

        return view('laporan.daftar', ['daftarLaporan' => $daftarLaporan]);
    }

    public function tentang()
    {
        return view('laporan.tentang');
    }
}
