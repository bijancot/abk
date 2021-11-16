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
    <link href="<?= site_url()?>/assets/adm/plugins/datatable/css/dataTables.bootstrap5.min.css" rel="stylesheet" />

    <link href="<?= site_url()?>/assets/src/css/general.css" rel="stylesheet">

    <!-- Fav Icons -->
    <link rel="icon" href="<?= site_url()?>/assets/src/img/logo2.svg" sizes="any" type="image/svg+xml">
    
    <script src="https://code.iconify.design/2/2.0.3/iconify.min.js"></script>
    <script src="<?= site_url()?>/assets/mhs/js/jquery.min.js"></script>

    <link rel="stylesheet" href="<?= site_url()?>/assets/mhs/game-assets/assets/css/reset.css">
    <link rel="stylesheet" href="<?= site_url()?>/assets/mhs/game-assets/assets/css/style.css">

</head>

<body class="primary-bg">
    <?php $this->load->view('mhs/nav.php'); ?>