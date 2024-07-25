<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="icon" href="favicon.ico">
    <title><?= $title; ?></title>
    <?= require_once('_css.php') ?>
</head>

<body class="vertical light">
    <div class="wrapper">
        <?= require_once('_navbar.php') ?>
        <?= require_once('_sidebar.php') ?>
        <main role="main" class="main-content">
            <div class="container-fluid">
                <button style="display: none;" class="flash-data-error" value="<?= $this->session->flashdata('flash-error'); ?>"></button>
                <button style="display: none;" class="flash-data-success" value="<?= $this->session->flashdata('flash-success'); ?>"></button>
                <?= $contents; ?>
            </div>
        </main> <!-- main -->
    </div> <!-- .wrapper -->
    <?= require_once('_js.php') ?>
</body>

</html>