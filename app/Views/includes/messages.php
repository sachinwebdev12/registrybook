<div id="page-message" class="message-alart-style1">
    <?php if(session()->getFlashdata('error')):?>
        <div class="alert alart_style_three alert-dismissible fade show mb20" role="alert">
            <?= session()->getFlashdata('error') ?>
            <i class="far fa-xmark btn-close" data-bs-dismiss="alert" aria-label="Close"></i>
        </div>
    <?php endif; ?>
    <?php if(session()->getFlashdata('success')):?>
        <div class="alert alart_style_four alert-dismissible fade show mb20" role="alert">
            <?= session()->getFlashdata('success') ?>
            <i class="far fa-xmark btn-close" data-bs-dismiss="alert" aria-label="Close"></i>
        </div>
    <?php endif; ?>
</div>