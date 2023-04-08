<?= $this->extend("templates/page_layout/datatables") ?>
<?= $this->section("tbl_header") ?>
<thead class="" style="background-color:#f1f5f9;">
    <tr>
        <th>No</th>
        <th>Nama Barang</th>
        <th>Jumlah Barang</th>
        <th>Action</th>
    </tr>
</thead>
<?= $this->endSection() ?>
<?= $this->section("tbl_body") ?>
<tbody>
    <?php if ($barang) : ?>
        <?php for ($i = 0; $i < count($barang); $i++) : ?>
            <tr>
                <td><?= $i + 1 ?></td>
                <td><?= $barang[$i]['namaBarang'] ?></td>
                <td><?= $barang[$i]['Qty'] ?></td>
                <td><a class="btn my-2 btn-sm rounded btn-primary" href="<?= base_url("Barang/Detail/") . $barang[$i]['idBarang'] ?>"><img src="<?= base_url("assets/bootstrap-icons/book-half.svg") ?>" alt="Detail Barang"></a> &nbsp;<a class="btn my-2 btn-sm rounded btn-warning" href="<?= base_url("Barang/Edit/") . $barang[$i]['idBarang'] ?>"><img src="<?= base_url("assets/bootstrap-icons/pencil-square.svg") ?>" alt="Edit Barang"></a> &nbsp;<a class="btn my-2 btn-sm rounded btn-danger" href="<?= base_url("Barang/Delete/") . $barang[$i]['idBarang'] ?>"><img src="<?= base_url("assets/bootstrap-icons/x-circle.svg") ?>" alt="Delete Barang"></a></td>
            </tr>
        <?php endfor; ?>
    <?php endif; ?>
</tbody>
<?= $this->endSection() ?>