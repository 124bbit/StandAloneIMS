<?= $this->extend("templates/page_layout/index") ?>
<?= $this->section("content") ?>
<form action="<?= base_url("Barang") ?>" method="post" enctype='multipart/form-data'>
    <?= csrf_field() ?>
    <div class="mb-3">
        <label for="" class="form-label">Nama Barang</label>
        <input type="text" class="form-control" id="" aria-describedby="namaBarang" name="namaBarang">
        <div id="namaBarang" class="form-text"></div>
    </div>
    <div class="mb-3">
        <label for="" class="form-label">Jumlah Barang / Quantity</label>
        <input type="number" class="form-control" id="" aria-describedby="Qty" name="Qty">
        <div id="Qty" class="form-text"></div>
    </div>
    <div class="d-flex justify-content-center py-4">
        <button type="submit" class="btn btn-outline-success">Submit</button>
    </div>
</form>
<?= $this->endSection() ?>