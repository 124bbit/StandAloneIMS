<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- Bootstrap -->
    <link rel="stylesheet" href="<?= base_url("assets/bootstrap/css/bootstrap.min.css") ?>">
    <!-- Font Google -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Quicksand:wght@400;500;600&display=swap" rel="stylesheet">
    <style>
        html {
            font-family: 'Quicksand', sans-serif;
        }

        body {
            background-color: #f1f5f9;
        }
    </style>
    <title>
        <?= esc($title) ?>
    </title>
</head>

<body>
    <nav class="navbar navbar-expand-lg sticky-top" style="background-color: #f1f5f9;">
        <div class="container-fluid">
            <a class="navbar-brand" href="<?= base_url("/Dashboard") ?>">IMS</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                    <li class="nav-item">

                        <a class="nav-link " aria-current="page" href="<?= base_url("/Dashboard") ?>">Dashboard</a>
                    </li>
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                            Barang
                        </a>
                        <ul class="dropdown-menu">
                            <li><a class="dropdown-item" href="<?= base_url("/Barang") ?>">View Data Barang</a></li>
                            <li>
                                <hr class="dropdown-divider">
                            </li>
                            <li><a class="dropdown-item" href="<?= base_url("/Barang/New") ?>">Add New Barang</a></li>
                        </ul>
                    </li>
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                            Transaksi
                        </a>
                        <ul class="dropdown-menu">
                            <li><a class="dropdown-item" href="<?= base_url("/Transaksi") ?>">View Data Transaksi</a></li>
                            <li>
                                <hr class="dropdown-divider">
                            </li>
                            <li><a class="dropdown-item" href="<?= base_url("/Transaksi/New") ?>">Add New Transaksi</a></li>
                        </ul>
                    </li>
                </ul>
                <a href="<?= base_url("/Logout") ?>" class="btn btn-outline-danger btn-sm">Logout</a>
            </div>
        </div>
    </nav>
    <div class="container-fluid mt-4">
        <div class="my-3">
            <div class="p-3">
                <h1 class="h1 text-dark fw-bold">Dashboard</h1>
            </div>
        </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js" integrity="sha384-oBqDVmMz9ATKxIep9tiCxS/Z9fNfEXiDAYTujMAeBAsjFuCZSmKbSSUnQlmh/jp3" crossorigin="anonymous"></script>
    <script src="<?= base_url("assets/bootstrap/js/bootstrap.min.js") ?>"></script>
</body>

</html>