<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <?= $this->include("templates/layout/header") ?>
    <title><?= esc($title) ?></title>
</head>

<body>
    <?= $this->include("templates/layout/navbar") ?>
    <div class="d-flex justify-content-center py-4">
        <?= $this->include("templates/layout/alert") ?>
    </div>
    <div class="row mx-3">
        <div class="col-xxl-8 py-2">
            <?= $this->include("templates/layout/barang_list") ?>
        </div>
        <div class="col-xxl-4 py-2">
            <?= $this->include("templates/layout/cart") ?>
        </div>
    </div>
    <form action="<?= base_url("Transaksi") ?>" method="POST" id="form" class="visually-hidden" enctype='multipart/form-data'>
        <?= csrf_field() ?>

    </form>
    <?= $this->include("templates/layout/footer") ?>
    <?= $this->include("templates/layout/shoppingcartJs") ?>
</body>

</html>