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
                <?php if ($user['role'] == "SuperAdmin") : ?>
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                            User
                        </a>
                        <ul class="dropdown-menu">
                            <li><a class="dropdown-item" href="<?= base_url("/User") ?>">View Data User</a></li>
                            <li>
                                <hr class="dropdown-divider">
                            </li>
                            <li><a class="dropdown-item" href="<?= base_url("/User/New") ?>">Add New User</a></li>
                        </ul>
                    </li>
                <?php endif; ?>
            </ul>
            <a href="<?= base_url("/Logout") ?>" class="btn btn-outline-danger btn-sm">Logout</a>
        </div>
    </div>
</nav>