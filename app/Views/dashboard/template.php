<!DOCTYPE html>
<html lang="en">
<head>
    <?= view('dashboard/head'); ?>
</head>
<body class="<?= getRouteName() ?>">
    <div class="container-scroller">
        <?= view('dashboard/header'); ?>
        <div class="container-fluid page-body-wrapper">
            <?= view('dashboard/sidebar'); ?>
            <div class="main-panel">
                <?= view($main_content); ?>
                <?= view('dashboard/footer'); ?>
            </div>
        </div>
    </div>
</body>
</html>