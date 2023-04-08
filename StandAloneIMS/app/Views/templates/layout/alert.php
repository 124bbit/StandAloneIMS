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