<?= $this->extend("templates/page_layout/index") ?>
<?= $this->section("content") ?>
<form action="<?= base_url("User/Update/" . $usr['idUser'])  ?>" method="post" enctype='multipart/form-data'>
    <input type="hidden" name="_method" value="PUT">
    <?= csrf_field() ?>
    <div class="mb-3">
        <label for="" class="form-label">Nama User</label>
        <input type="text" class="form-control" id="" aria-describedby="nama" name="nama" value="<?= $usr['nama'] ?>">
        <div id="nama" class="form-text"></div>
    </div>
    <div class="mb-3">
        <label for="" class="form-label">Email</label>
        <input type="email" class="form-control" id="" aria-describedby="email" name="email" value="<?= $usr['email'] ?>">
        <div id="email" class="form-text"></div>
    </div>
    <div class="mb-3">
        <label for="" class="form-label">Nomor Handphone</label>
        <input type="text" class="form-control" id="" aria-describedby="nohp" name="nohp" value="<?= $usr['nohp'] ?>">
        <div id="nohp" class="form-text"></div>
    </div>
    <div class="mb-3">
        <label for="" class="form-label">Role</label>
        <select class="form-select" aria-label="Default select example" name="role">
            <?php switch ($usr['role']) {
                case 'SuperAdmin':
                    echo ('<option selected value="SuperAdmin">Super Admin</option>
                   <option value="Admin">Admin</option>
                   <option value="User">User</option>
                   <option value="Viewer">Viewer</option>');
                    break;
                case 'Admin':
                    echo ('<option value="SuperAdmin">Super Admin</option>
                   <option selected value="Admin">Admin</option>
                   <option value="User">User</option>
                   <option value="Viewer">Viewer</option>');
                    break;
                case 'User':
                    echo ('<option value="SuperAdmin">Super Admin</option>
                   <option value="Admin">Admin</option>
                   <option selected value="User">User</option>
                   <option value="Viewer">Viewer</option>');
                    break;

                default:
                    echo ('<option value="SuperAdmin">Super Admin</option>
                <option value="Admin">Admin</option>
                <option  value="User">User</option>
                <option selected value="Viewer">Viewer</option>');
                    break;
            } ?>
        </select>
        <div id="role" class="form-text"></div>
    </div>

    <div class="d-flex justify-content-center py-4">
        <button type="submit" class="btn btn-outline-warning">Modify</button>
    </div>
</form>
<?= $this->endSection() ?>