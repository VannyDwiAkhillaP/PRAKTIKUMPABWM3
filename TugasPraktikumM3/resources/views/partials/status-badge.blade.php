{{-- Variabel: $tinggi (cm). Kurang dari 30 = Waspada, 30-70 = Siaga, lebih dari 70 = Awas --}}
@if ($tinggi < 30)
    <span class="badge badge-waspada">WASPADA</span>
    <p class="saran saran-waspada">Pantau perkembangan air dan amankan barang di lantai dasar.</p>
@elseif ($tinggi <= 70)
    <span class="badge badge-siaga">SIAGA</span>
    <p class="saran saran-siaga">Siapkan tas darurat dan pindahkan barang berharga ke tempat tinggi.</p>
@else
    <span class="badge badge-awas">AWAS</span>
    <p class="saran saran-awas">Segera evakuasi ke tempat aman dan hubungi petugas BPBD.</p>
@endif
