<?= $this->extend("templates/page_layout/index") ?>
<?= $this->section("content") ?>
<h4 class="py-3">Detail Information</h4>
<div class="flex align-items-center">
    <div class="p-2"><b>Nama Barang</b> :&nbsp; <?= esc($barang['namaBarang']) ?></div>
    <div class="p-2"><b>Quantity</b> :&nbsp;<?= esc($barang['Qty']) ?></div>
    <div class="p-2"><b>Dibuat pada Tanggal</b> :&nbsp;<?= esc($dibuat_tgl) ?></div>
    <div class="p-2"><b>Diubah pada Tanggal</b> :&nbsp;<?= esc($diubah_tgl) ?></div>
    <div class="p-2"><b>Dibuat Oleh</b> :&nbsp;<?= esc($dibuat['nama']) ?></div>
    <div class="p-2"><b>Diubah Oleh</b> :&nbsp;<?= esc($diubah['nama']) ?></div>
</div>
<div class="d-flex justify-content-center py-4">
    <button class="btn btn-outline-warning" onclick="history.back()">Go Back</button>
</div>
<?= $this->endSection() ?>