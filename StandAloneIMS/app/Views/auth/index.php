<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <?= $this->include("templates/layout/header") ?>
    <title>Login Iventory Management System</title>
</head>

<body>
    <section class="vh-100" style="background-color: #F5EBE0;">
        <div class="container py-5 h-100">
            <div class="row d-flex justify-content-center align-items-center h-100">
                <div class="col-12 col-md-8 col-lg-6 col-xl-5">
                    <?= $this->include("templates/layout/alert") ?>
                    <div class="card shadow-lg" style="border-radius: 1rem;">
                        <div class="card-body p-5 ">
                            <form action="<?= base_url('/') ?>" method="POST">
                                <?= csrf_field() ?>
                                <h1 class="h1 fw-bold mb-5 text-center">Sign In</h1>
                                <div class="form-outline mb-4">
                                    <label class="form-label" for="typeEmailX-2">Email <small class="text-danger ">
                                            *
                                        </small></label>
                                    <input name="email" type="email" id="typeEmailX-2" class="form-control form-control-lg" />
                                    <small class="text-danger ">
                                        <?php if (isset($err)) : ?>
                                            <?= var_dump(isset($err)) ?>
                                        <?php endif; ?>
                                    </small>
                                </div>

                                <div class="form-outline mb-4">
                                    <label class="form-label" for="typePasswordX-2">Password<small class="text-danger ">
                                            *
                                        </small></label>
                                    <input name="password" type="password" id="typePasswordX-2" class="form-control form-control-lg" />
                                    <small class="text-danger">
                                        <?php if (isset($err)) : ?>
                                            <?= var_dump(isset($err)) ?>
                                        <?php endif; ?>

                                    </small>
                                </div>
                                <div class="my-3 py-3 text-center">
                                    <button class="btn btn-lg btn-block fw-semibold " style="background-color: #95E1D3; " type="submit">Login</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <?= $this->include("templates/layout/footer") ?>
</body>

</html>