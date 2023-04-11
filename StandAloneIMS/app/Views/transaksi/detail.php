<?= $this->extend("templates/page_layout/index") ?>
<?= $this->section("content") ?>
<h4 class="py-3">Detail Information</h4>
<div class="flex align-items-center">
    <div class="p-2"><b>Nama Transaksi</b> :&nbsp; <?= "Transaksi-" . esc($transaksi[0]['idTransaksi']) ?></div>
    <div class="p-2"><b>Dibuat Oleh</b> :&nbsp;<?= esc($transaksi[0]['nama']) ?></div>
    <div class="p-2"><b>Tanggal</b> :&nbsp;<?= esc(date_format(date_create($transaksi[0]['tgl']), "d-m-Y")) ?></div>
    <div class="p-2"><b>Jam</b> :&nbsp;<?= esc(date_format(date_create($transaksi[0]['tgl']), "H:i")) ?></div>
</div>
<h4 class="py-3">Detail Transaksi</h4>

<div class="flex align-items-center">
    <?php for ($i = 0; $i < count($transaksi); $i++) : ?>
        <div class="p-2">
            <b>Nama Barang</b> :&nbsp; <?= esc($transaksi[$i]['namaBarang']) ?>
            <b>Jumlah</b> :&nbsp; <?= esc($transaksi[$i]['Jml']) ?>
        </div>
    <?php endfor; ?>

</div>
<div class="d-flex justify-content-center py-4">
    <button class="btn btn-outline-warning" onclick="history.back()">Go Back</button>
</div>
<?= $this->endSection() ?>