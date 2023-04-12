<?= $this->extend("templates/page_layout/index") ?>
<?= $this->section("content") ?>
<h4 class="py-3">Detail Information</h4>
<div class="flex align-items-center">
    <div class="p-2"><b>Nama </b> :&nbsp; <?= esc($usr['nama']) ?></div>
    <div class="p-2"><b>Email</b> :&nbsp;<?= esc($usr['email']) ?></div>
    <div class="p-2"><b>Nomor Handphone</b> :&nbsp;<?= esc($usr['nohp']) ?></div>
    <div class="p-2"><b>Role</b> :&nbsp;<?= esc($usr['role']) ?></div>
    <div class="p-2"><b>Dibuat pada Tanggal</b> :&nbsp;<?= esc(date_format(date_create($usr['created_at']), "d/m/Y H:i:s")) ?></div>

</div>
<div class="d-flex justify-content-center py-4">
    <button class="btn btn-outline-warning" onclick="history.back()">Go Back</button>
</div>
<?= $this->endSection() ?>