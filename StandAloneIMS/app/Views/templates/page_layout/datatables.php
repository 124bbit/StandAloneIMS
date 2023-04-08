<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <?= $this->include("templates/layout/css_datatables") ?>
    <title><?= esc($title) ?></title>
</head>

<body>
    <?= $this->include("templates/layout/navbar") ?>
    <?= $this->include("templates/layout/main_table") ?>
    <?= $this->include("templates/layout/js_datatables") ?>
</body>

</html>