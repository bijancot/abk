<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="description" content="Unique Responsive Multipurpose Bootstrap 4 HTML Template">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title><?= !empty($title) ? $title : 'Course'?></title>

    <!-- CSS files -->
    <!-- <link href="https://fonts.googleapis.com/css?family=Roboto+Condensed:300,300i,400,400i,700%7CRoboto:300,300i,400,400i,700,700i" rel="stylesheet">
    <link rel="stylesheet" href="<?= site_url()?>/assets/mhs/css/animate.min.css">
    <link rel="stylesheet" href="<?= site_url()?>/assets/mhs/css/education-modern.css">
    <link rel="stylesheet" href="<?= base_url('assets/mhs/css/custom.css'); ?>"> -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/css/bootstrap.min.css">

    <link href="<?= site_url()?>/assets/src/css/general.css" rel="stylesheet">

    <!-- Fav Icons -->
    <link rel="apple-touch-icon" sizes="57x57" href="<?= site_url()?>/assets/mhs/favicon/apple-icon-57x57.png">
    <link rel="apple-touch-icon" sizes="60x60" href="<?= site_url()?>/assets/mhs/favicon/apple-icon-60x60.png">
    <link rel="apple-touch-icon" sizes="72x72" href="<?= site_url()?>/assets/mhs/favicon/apple-icon-72x72.png">
    <link rel="apple-touch-icon" sizes="76x76" href="<?= site_url()?>/assets/mhs/favicon/apple-icon-76x76.png">
    <link rel="apple-touch-icon" sizes="114x114" href="<?= site_url()?>/assets/mhs/favicon/apple-icon-114x114.png">
    <link rel="apple-touch-icon" sizes="120x120" href="<?= site_url()?>/assets/mhs/favicon/apple-icon-120x120.png">
    <link rel="apple-touch-icon" sizes="144x144" href="<?= site_url()?>/assets/mhs/favicon/apple-icon-144x144.png">
    <link rel="apple-touch-icon" sizes="152x152" href="<?= site_url()?>/assets/mhs/favicon/apple-icon-152x152.png">
    <link rel="apple-touch-icon" sizes="180x180" href="<?= site_url()?>/assets/mhs/favicon/apple-icon-180x180.png">
    <link rel="icon" type="image/png" sizes="192x192"  href="<?= site_url()?>/assets/mhs/favicon/android-icon-192x192.png">
    <link rel="icon" type="image/png" sizes="32x32" href="<?= site_url()?>/assets/mhs/favicon/favicon-32x32.png">
    <link rel="icon" type="image/png" sizes="96x96" href="<?= site_url()?>/assets/mhs/favicon/favicon-96x96.png">
    <link rel="icon" type="image/png" sizes="16x16" href="<?= site_url()?>/assets/mhs/favicon/favicon-16x16.png">
    <link rel="manifest" href="<?= site_url()?>/assets/mhs/favicon/manifest.json">
    <meta name="msapplication-TileColor" content="#ffffff">
    <meta name="msapplication-TileImage" content="<?= site_url()?>/assets/mhs/favicon/ms-icon-144x144.png">
    <meta name="theme-color" content="#ffffff">
    
    <link rel="stylesheet" href="<?= site_url()?>/assets/mhs/game-assets/TemplateData/style.css">
    <script src="https://code.iconify.design/2/2.0.3/iconify.min.js"></script>
    <script src="<?= site_url()?>/assets/mhs/js/jquery.min.js"></script>
</head>

<body class="primary-bg">
    <?php $this->load->view('mhs/nav.php'); ?>