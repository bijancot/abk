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
    <div class="primary-bg">
        <div class="bg-white signup p-5 mx-auto d-flex justify-content-center align-items-center min-h-screen">

            <div class="rounded-15 d-flex flex-column justify-content-center align-items-center">

                <p class="h2">Sign up</p>
                <form action="<?= site_url('proses_register')?>" method="POST" class="register-form" id="register-form">
                    <div class="form-group">
                        <label for="name">Name</i></label>
                        <input type="text" name="name" id="name" placeholder="Your Name" class="auth-input" required/>
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
</body>
</html>