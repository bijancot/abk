<!doctype html>
<html lang="en">

<head>
  <!-- Required meta tags -->
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="icon" href="<?= site_url()?>/assets/src/img/logo2.svg" sizes="any" type="image/svg+xml">
  <!--plugins-->
  <link href="<?= site_url()?>/assets/adm/plugins/simplebar/css/simplebar.css" rel="stylesheet" />
  <link href="<?= site_url()?>/assets/adm/plugins/perfect-scrollbar/css/perfect-scrollbar.css" rel="stylesheet" />
  <link href="<?= site_url()?>/assets/adm/plugins/metismenu/css/metisMenu.min.css" rel="stylesheet" />
  <!-- Bootstrap CSS -->
  <link href="<?= site_url()?>/assets/adm/css/bootstrap.min.css" rel="stylesheet" />
  <link href="<?= site_url()?>/assets/adm/css/bootstrap-extended.css" rel="stylesheet" />
  <link href="<?= site_url()?>/assets/adm/css/style.css" rel="stylesheet" />
  <link href="<?= site_url()?>/assets/adm/css/icons.css" rel="stylesheet">
  <link href="https://fonts.googleapis.com/css2?family=Montserrat:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap" rel="stylesheet">
  <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@400;500&display=swap" rel="stylesheet">
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.5.0/font/bootstrap-icons.css">
  <link href="<?= site_url()?>/assets/adm/plugins/datatable/css/dataTables.bootstrap5.min.css" rel="stylesheet" />
  <link rel="stylesheet" href="<?= site_url()?>/assets/adm/plugins/notifications/css/lobibox.min.css" />
  <link rel="stylesheet" href="<?= site_url()?>/assets/adm/summernote/summernote.min.css" />

  <!-- loader-->
	<link href="<?= site_url()?>/assets/adm/css/pace.min.css" rel="stylesheet" />


  <!--Theme Styles-->
  <link href="<?= site_url()?>/assets/adm/css/dark-theme.css" rel="stylesheet" />
  <link href="<?= site_url()?>/assets/adm/css/light-theme.css" rel="stylesheet" />
  <link href="<?= site_url()?>/assets/adm/css/semi-dark.css" rel="stylesheet" />
  <link href="<?= site_url()?>/assets/adm/css/header-colors.css" rel="stylesheet" />
    <!-- Bootstrap bundle JS -->
    <script src="<?= site_url()?>/assets/adm/js/bootstrap.bundle.min.js"></script>
    <script src="<?= site_url()?>/assets/adm/js/jquery.min.js"></script>

  <title><?= !empty($title) ? $title : 'Spageti'?></title>
</head>

<body>


  <!--start wrapper-->
  <div class="wrapper">
    <!--start top header-->
    <header class="top-header">        
      <nav class="navbar navbar-expand gap-3">
        <div class="mobile-toggle-icon fs-3">
            <i class="bi bi-list"></i>
          </div>
          <div class="top-navbar-right ms-auto">
            <ul class="navbar-nav align-items-center">
              <li class="nav-item dropdown dropdown-user-setting">
                <a class="nav-link dropdown-toggle dropdown-toggle-nocaret" href="#" data-bs-toggle="dropdown">
                  <div class="user-setting d-flex align-items-center">
                    <img src="<?= site_url()?>/assets/adm/images/avatars/avatar-1.png" class="user-img" alt="">
                  </div>
                </a>
              <ul class="dropdown-menu dropdown-menu-end">
                <li>
                   <a class="dropdown-item" href="#">
                     <div class="d-flex align-items-center">
                        <img src="<?= site_url()?>/assets/adm/images/avatars/avatar-1.png" alt="" class="rounded-circle" width="54" height="54">
                        <div class="ms-3">
                          <h6 class="mb-0 dropdown-user-name">Admin</h6>
                          <small class="mb-0 dropdown-user-designation text-secondary">admin</small>
                        </div>
                     </div>
                   </a>
                 </li>
                 <li><hr class="dropdown-divider"></li>
                  <li>
                    <a class="dropdown-item" href="<?php echo site_url('logout'); ?>">
                       <div class="d-flex align-items-center">
                         <div class=""><i class="bi bi-lock-fill"></i></div>
                         <div class="ms-3"><span>Logout</span></div>
                       </div>
                     </a>
                  </li>
              </ul>
            </li>
            </ul>
            </div>
      </nav>
    </header>
     <!--end top header-->