<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">

    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Quicksand:wght@400;500;600&display=swap" rel="stylesheet">
    <style>
        html,
        body {
            font-family: 'Quicksand', sans-serif;
        }
    </style>
    <title>Login IMS</title>
</head>

<body>
    <section class="vh-100" style="background-color: #F5EBE0;">
        <div class="container py-5 h-100">
            <div class="row d-flex justify-content-center align-items-center h-100">
                <div class="col-12 col-md-8 col-lg-6 col-xl-5">
                    <?php if (validation_show_error("password")) : ?>
                        <?= var_dump(validation_show_error("password")) ?>
                    <?php endif; ?>
                    <?php if (session()->getFlashdata("msg")) : ?>
                        <div class="alert alert-success alert-dismissible fade show" role="alert">
                            <strong>
                                <?= esc(session()->getFlashdata("msg")) ?>
                            </strong>
                            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                        </div>
                    <?php endif; ?>
                    <?php if (session()->getFlashdata("err")) : ?>
                        <div class="alert alert-danger alert-dismissible fade show" role="alert">
                            <strong>
                                <?= esc(session()->getFlashdata("err")) ?>
                            </strong>
                            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                        </div>
                    <?php endif; ?>
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
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js" integrity="sha384-oBqDVmMz9ATKxIep9tiCxS/Z9fNfEXiDAYTujMAeBAsjFuCZSmKbSSUnQlmh/jp3" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.min.js" integrity="sha384-cuYeSxntonz0PPNlHhBs68uyIAVpIIOZZ5JqeqvYYIcEL727kskC66kF92t6Xl2V" crossorigin="anonymous"></script>
</body>

</html>