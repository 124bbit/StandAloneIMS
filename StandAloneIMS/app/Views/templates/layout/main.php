<div class="container-fluid mt-4" style="background-color: #f1f5f9;">
    <div class="my-3">
        <div class="p-3">
            <h1 class="h1 text-dark fw-bold"><?= esc($header) ?></h1>
        </div>
        <div class="row justify-content-center">
            <div class="col-12 p-3">
                <div class="card" style="border-radius: 1rem;">
                    <div class="card-body px-4">
                        <?= $this->renderSection("content") ?>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>