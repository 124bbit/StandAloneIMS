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
    <?= $this->include("templates/layout/main") ?>
    <?= $this->include("templates/layout/footer") ?>
</body>

</html>