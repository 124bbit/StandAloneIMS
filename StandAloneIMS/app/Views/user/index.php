<?= $this->extend("templates/page_layout/datatables") ?>
<?= $this->section("tbl_header") ?>
<thead class="" style="background-color:#f1f5f9;">
    <tr>
        <th>No</th>
        <th>Nama User</th>
        <th>Email</th>
        <th>Role</th>
        <th>Action</th>
    </tr>
</thead>
<?= $this->endSection() ?>
<?= $this->section("tbl_body") ?>
<tbody>
    <?php if ($users) : ?>
        <?php for ($i = 0; $i < count($users); $i++) : ?>
            <tr>
                <td><?= $i + 1 ?></td>
                <td><?= $users[$i]['nama'] ?></td>
                <td><?= $users[$i]['email'] ?></td>
                <td><?= $users[$i]['role'] ?></td>
                <td><a class="btn my-2 btn-sm rounded btn-primary" href="<?= base_url("User/Detail/") . $users[$i]['idUser'] ?>"><img src="<?= base_url("assets/bootstrap-icons/book-half.svg") ?>" alt="Detail User"></a> &nbsp;<a class="btn my-2 btn-sm rounded btn-warning" href="<?= base_url("User/ResetPassword/") . $users[$i]['idUser'] ?>"><img src="<?= base_url("assets/bootstrap-icons/person-fill-exclamation.svg") ?>" alt="Reset Password User"></a> &nbsp;<a class="btn my-2 btn-sm rounded btn-warning" href="<?= base_url("User/Edit/") . $users[$i]['idUser'] ?>"><img src="<?= base_url("assets/bootstrap-icons/pencil-square.svg") ?>" alt="Edit User"></a> &nbsp;<a class="btn my-2 btn-sm rounded btn-danger" href="<?= base_url("User/Delete/") . $users[$i]['idUser'] ?>"><img src="<?= base_url("assets/bootstrap-icons/x-circle.svg") ?>" alt="Delete User"></a></td>
            </tr>
        <?php endfor; ?>
    <?php endif; ?>
</tbody>
<?= $this->endSection() ?>