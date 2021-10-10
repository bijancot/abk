<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>

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
    <div class="">
        <!-- Sing in  Form -->

        <div class="row m-0 p-0 w-full min-h-screen primary-bg">
            <div class="col-12 col-md-7 d-flex justify-content-center align-items-center">
                <img src="<?= base_url('assets/src/img/illustration.svg'); ?>" alt="Illustration" class="w-75">
            </div>
            <div class="col-12 col-md-5 bg-white d-flex align-items-center px-5 pt-5 pt-md-0">
                <div class="d-flex flex-column w-100">

                    <p class="h2 font-w-700">Log In</p>
                    <p class="text-small opacity-70">Log into your account</p>
                    <form action="<?= site_url('proses_login')?>" method="POST" class="register-form mt-3" id="login-form">
                        <div class="form-group">
                            <label class="text-primary font-w-600">Email</i></label>
                            <input type="text" name="email" id="email" placeholder="Enter your email address" class="auth-input"/>
                        </div>
                        <div class="form-group">
                            <label class="text-primary font-w-600">Password</label>
                            <input type="password" name="password" id="password" placeholder="Enter your password" class="auth-input"/>
                        </div>
                        <!-- <div class="form-group">
                            <input type="checkbox" name="remember-me" id="remember-me" class="agree-term" />
                            <label for="remember-me" class="label-agree-term"><span><span></span></span>Remember me</label>
                        </div> -->
                        <?php if ($this->session->tempdata("auth_msg")) { ?>
                            <span><strong><?php echo $this->session->tempdata("auth_msg"); ?></strong></span>
                        <?php  } else if ($this->session->tempdata("failed_auth_msg")) {?>
                            <span><strong><?php echo $this->session->tempdata("failed_auth_msg"); ?></strong></span>
                        <?php  }?>
                        <div class="d-flex flex-column justify-content-center align-items-center">
                            <input type="submit" name="login" id="signin" class="login-btn font-w-700 w-50 mb-3 mt-5" value="Log in"/>
                            <p class="text-small opacity-70">Don’t have account? <a href="register" class="text-primary"><u>Sign Up</u></a></p> 
                        </div>
                    </form>
                </div>
            </div>
        </div>

    </div>

    <!-- JS -->
    <script src="<?= base_url('assets/mhs/js/jquery.min.js'); ?>"></script>
    <!-- <script src="<?= base_url('assets/js/main.js'); ?>"></script> -->
</body>
</html>