<?= $this->extend("templates/page_layout/index") ?>
<?= $this->section("content") ?>
<form action="<?= base_url("User") ?>" method="post" enctype='multipart/form-data'>
    <?= csrf_field() ?>
    <div class="mb-3">
        <label for="" class="form-label">Nama User</label>
        <input type="text" class="form-control" id="" aria-describedby="nama" name="nama">
        <div id="nama" class="form-text"></div>
    </div>
    <div class="mb-3">
        <label for="" class="form-label">Email</label>
        <input type="email" class="form-control" id="" aria-describedby="email" name="email">
        <div id="email" class="form-text"></div>
    </div>
    <div class="mb-3">
        <label for="" class="form-label">Nomor Handphone</label>
        <input type="text" class="form-control" id="" aria-describedby="nohp" name="nohp">
        <div id="nohp" class="form-text"></div>
    </div>
    <div class="mb-3">
        <label for="" class="form-label">Password</label>
        <input type="text" class="form-control" id="" aria-describedby="password" name="password">
        <div id="password" class="form-text"></div>
    </div>
    <div class="mb-3">
        <label for="" class="form-label">Role</label>
        <input class="form-control" list="datalistOptions" id="exampleDataList" placeholder="Pilih Role User ..." name="role">
        <datalist id="datalistOptions">
            <option value="SuperAdmin">
            <option value="Admin">
            <option value="User">
            <option value="Viewer">
        </datalist>
        <div id="role" class="form-text"></div>
    </div>
    <div class="d-flex justify-content-center py-4">
        <button type="submit" class="btn btn-outline-success">Submit</button>
    </div>
</form>
<?= $this->endSection() ?>