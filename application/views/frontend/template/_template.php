<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="icon" href="favicon.ico">
    <title></title>
    <!-- Google Web Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Open+Sans:wght@400;600&family=Raleway:wght@600;800&display=swap" rel="stylesheet">

    <!-- Simple bar CSS -->
    <?= require_once('_css.php') ?>
</head>

<body class="vertical  light  ">
    <div class="wrapper">
        <?= require_once('_navbar.php') ?>
        <?= require_once('_sidebar.php') ?>
        <?= $contents ?>
    </div> <!-- .wrapper -->
    <?= require_once('_js.php') ?>
</body>

</html>