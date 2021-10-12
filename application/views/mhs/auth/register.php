<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Spageti - Register</title>

    <!-- Favicon -->
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
    <!-- Font Icon -->
    <link rel="stylesheet" href="<?= base_url('assets/mhs/fonts/material-icon/css/material-design-iconic-font.min.css'); ?>">
    <!-- Main css -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/css/bootstrap.min.css">
    <!-- <link rel="stylesheet" href="<?= base_url('assets/mhs/css/style.css'); ?>">
    <link rel="stylesheet" href="<?= base_url('assets/mhs/css/custom.css'); ?>"> -->

    <link href="<?= site_url()?>/assets/src/css/general.css" rel="stylesheet">
</head>
<body>
    <?php $this->load->view('mhs/nav-auth.php'); ?>
    <div class="primary-bg">
        <div class="bg-white signup p-5 mx-auto d-flex justify-content-center align-items-center min-h-screen">

            <div class="rounded-15 d-flex flex-column justify-content-center align-items-center">

                <p class="h2">Sign up</p>
                <form action="<?= site_url('proses_register')?>" method="POST" class="register-form" id="register-form">
                    <div class="form-group">
                        <label for="name">Name</i></label>
                        <input type="text" name="name" id="name" onkeypress="return isTextKey(event)" placeholder="Your Name" class="auth-input" required/>
                    </div>
                    <div class="form-group">
                        <label for="npm">NPM</label>
                        <input type="text" onkeypress="return isNumberKey(event)" name="npm" id="npm" placeholder="Your NPM" class="auth-input" required/>
                    </div>
                    <div class="form-group">
                        <label for="email">Email</label>
                        <input type="email" name="email" id="email" placeholder="Your Email" class="auth-input" required/>
                    </div>
                    <div class="form-group">
                        <label for="phone">Phone</label>
                        <input type="tel" onkeypress="return isNumberKey(event)" name="phone" id="phone" placeholder="Your Phone Number" class="auth-input" required/>
                    </div>
                    <!-- <span><i class="zmdi zmdi-male-female"></i>   Your gender</span><br><br>
                    <div class="form-group">
                        <input style="width: auto;" type="radio" name="gender" id="signupgenderMale" value="1" checked>
                        <label style="margin-left: 50px;" for="signupgenderMale">Male</label>
                    </div>
                    <div class="form-group">
                        <input style="width: auto;" type="radio" name="gender" id="signupgenderFemale"value="2" >
                        <label style="margin-left: 50px;" for="signupgenderFemale">Female</label>
                    </div>
                    <div class="form-group">
                        <textarea class="form-control" name="address" placeholder="Your Address" style="height: 100px" required></textarea>
                    </div> -->
                    <div class="form-group">
                        <label for="pass">Password</i></label>
                        <input type="password" id="r_password" name="password" id="password" placeholder="Your Password" class="auth-input" required/>
                    </div>
                    <div class="form-group">
                        <label for="pass">Repeat Password</i></label>
                        <input type="password" id="r_confirm_password" name="confirm_password" id="confirm_password" placeholder="Repeat Password" class="auth-input" required/>
                    </div>
                    <?php if ($this->session->tempdata("auth_msg")) { ?>
                        <span><strong><?php echo $this->session->tempdata("auth_msg"); ?></strong></span>
                        <?php  } else if ($this->session->tempdata("failed_auth_msg")) {?>
                        <span><strong><?php echo $this->session->tempdata("failed_auth_msg"); ?></strong></span>
                    <?php  }?>
                    
                    <div class="d-flex flex-column">

                        <input type="submit" class="login-btn font-w-700 mb-3" id="signup" value="Register"/>
                        <a href="login" class="signup-image-link">I already have an account</a>
                        
                    </div>
                </form>
            </div>
        </div>
        
    </div>

    <!-- JS -->
    <script src="<?= base_url('assets/mhs/js/jquery.min.js'); ?>"></script>
    <script src="<?= site_url()?>/assets/mhs/js/custom.js"></script>
    <script>
        // Text only input
        function isTextKey(evt) {
            var charCode = (evt.which) ? evt.which : event.keyCode
            if (charCode > 31 && (charCode < 48 || charCode > 57))
                return true;

            return false;
        }
    </script>
</body>
</html>