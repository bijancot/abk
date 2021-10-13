<!doctype html>
<html lang="en">

<head>
  <!-- Required meta tags -->
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="icon" href="<?= site_url()?>/assets/src/img/logo2.svg" sizes="any" type="image/svg+xml">
  <!-- Bootstrap CSS -->
  <link href="<?= site_url()?>/assets/adm/css/bootstrap.min.css" rel="stylesheet" />
  <link href="<?= site_url()?>/assets/adm/css/bootstrap-extended.css" rel="stylesheet" />
  <link href="<?= site_url()?>/assets/adm/css/style.css" rel="stylesheet" />
  <link href="<?= site_url()?>/assets/adm/css/icons.css" rel="stylesheet">

  <link href="<?= site_url()?>/assets/src/css/general.css" rel="stylesheet">

  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=Montserrat:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap" rel="stylesheet">
  <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@400;500&display=swap" rel="stylesheet">
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.5.0/font/bootstrap-icons.css">

  <!-- loader-->
	<link href="<?= site_url()?>/assets/adm/css/pace.min.css" rel="stylesheet" />

  <title>Spageti - Sign In</title>
</head>

<body>

  <!--start wrapper-->
  <div class="wrapper">
    
       <!--start content-->
       <main class="authentication-content">
        <div class="container-fluid">
          <div class="authentication-card">
            <div class="card shadow rounded-0 overflow-hidden">
              <div class="row g-0">
                <div class="col-lg-6 bg-login d-flex align-items-center justify-content-center">
                  <img src="<?= site_url()?>/assets/adm/images/error/login-img.jpg" class="img-fluid" alt="">
                </div>
                <div class="col-lg-6">
                  <div class="card-body p-4 p-sm-5">                    
                    <?= $this->session->flashdata('message'); ?>
                    <h5 class="card-title">Sign In</h5>
                    <form class="form-body" action="<?= site_url('admin/auth') ?>" method="POST">                      
                      <div class="login-separater text-center mb-4">
                        <hr>
                      </div>
                        <div class="row g-3">
                          <div class="col-12">
                            <label for="inputUsername" class="form-label">Username</label>
                            <div class="ms-auto position-relative">
                              <div class="position-absolute top-50 translate-middle-y search-icon px-3"><i class="bi bi-person-fill"></i></div>
                              <input type="text" class="form-control radius-30 ps-5" name="USERNAME" placeholder="Username">
                            </div>
                          </div>
                          <div class="col-12">
                            <label for="inputChoosePassword" class="form-label">Password</label>
                            <div class="ms-auto position-relative">
                              <div class="position-absolute top-50 translate-middle-y search-icon px-3"><i class="bi bi-lock-fill"></i></div>
                              <input type="password" class="form-control radius-30 ps-5" name="PASSWORD" placeholder="Enter Password">
                            </div>
                          </div>
                          <div class="col-12">
                            <div class="d-grid">
                              <button type="submit" class="btn btn-primary radius-30">Sign In</button>
                            </div>
                          </div>
                        </div>
                    </form>
                 </div>
                </div>
              </div>
            </div>
          </div>
        </div>
       </main>
        
       <!--end page main-->

  </div>
  <!--end wrapper-->


  <!--plugins-->
  <script src="<?= site_url()?>/assets/adm/js/jquery.min.js"></script>
  <script src="<?= site_url()?>/assets/adm/js/pace.min.js"></script>


</body>

</html>