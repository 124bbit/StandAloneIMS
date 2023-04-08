<div class="container-fluid mt-4">
    <div class="my-3">
        <div class="p-3">
            <h1 class="h1 text-dark fw-bold"><?= esc($namaTable) ?></h1>
        </div>
        <div class="row justify-content-center">
            <div class="col-12 p-3">
                <div class="card px-3 py-2" style="border-radius:1rem;">
                    <div class="card-body">
                        <table class="table table-responsive table-borderless table-hover" style="width:100%;" id="dt">
                            <?= $this->renderSection("tbl_header") ?>
                            <?= $this->renderSection("tbl_body") ?>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>