<?= $this->extend("templates/page_layout/datatables") ?>
<?= $this->section("tbl_header") ?>
<thead class="" style="background-color:#f1f5f9;">
    <tr>
        <th>No</th>
        <th>Nama Transaksi</th>
        <th>Dibuat Oleh</th>
        <th>Tanggal</th>
        <th>Jam</th>
        <th>Action</th>
    </tr>
</thead>
<?= $this->endSection() ?>
<?= $this->section("tbl_body") ?>
<tbody>
    <?php if ($transaksi) : ?>
        <?php for ($i = 0; $i < count($transaksi); $i++) : ?>
            <tr>
                <td><?= $i + 1 ?></td>
                <td><?= "Transaksi-" . $transaksi[$i]['idTransaksi'] ?></td>
                <td><?= $transaksi[$i]['nama'] ?></td>
                <td><?= date_format(date_create($transaksi[$i]['tgl']), "d-m-Y") ?></td>
                <td><?= date_format(date_create($transaksi[$i]['tgl']), "H:i") ?></td>
                <td><a class="btn my-2 btn-sm rounded btn-primary" href="<?= base_url("Transaksi/Detail/") . $transaksi[$i]['idTransaksi'] ?>"><img src="<?= base_url("assets/bootstrap-icons/book-half.svg") ?>" alt="Detail Transaksi"></a>&nbsp;<a class="btn my-2 btn-sm rounded btn-danger" href="<?= base_url("Transaksi/Delete/") . $transaksi[$i]['idTransaksi'] ?>"><img src="<?= base_url("assets/bootstrap-icons/x-circle.svg") ?>" alt="Delete Transaksi"></a></td>
            </tr>
        <?php endfor; ?>
    <?php endif; ?>
</tbody>
<?= $this->endSection() ?>