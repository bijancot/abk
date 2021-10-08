<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Register</title>

    <!-- Font Icon -->
    <link rel="stylesheet" href="<?= base_url('assets/mhs/fonts/material-icon/css/material-design-iconic-font.min.css'); ?>">
    <!-- Main css -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="<?= base_url('assets/mhs/css/style.css'); ?>">
    <link rel="stylesheet" href="<?= base_url('assets/mhs/css/custom.css'); ?>">
</head>
<body>
    <?php if ($this->session->tempdata("auth_msg")) { ?>
        <div class="alert alert-success alert-dismissible fade show" role="alert">
            <strong><?php echo $this->session->tempdata("auth_msg"); ?></strong>
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
        </div>
    <?php  } else if ($this->session->tempdata("failed_auth_msg")) {?>
        <div class="alert alert-warning alert-dismissible fade show" role="alert">
            <strong><?php echo $this->session->tempdata("failed_auth_msg"); ?></strong>
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
        </div>
    <?php  }?>
    <div class="main">
        <!-- Sign up form -->
        <section class="signup">
            <div class="container">
                <div class="signup-content">
                    <div class="signup-form">
                        <h2 class="form-title">Sign up</h2>
                        <form action="<?= site_url('proses_register')?>" method="POST" class="register-form" id="register-form">
                            <div class="form-group">
                                <label for="name"><i class="zmdi zmdi-account material-icons-name"></i></label>
                                <input type="text" name="name" id="name" placeholder="Your Name" required/>
                            </div>
                            <div class="form-group">
                                <label for="npm"><i class="zmdi zmdi-account-box"></i></label>
                                <input type="text" onkeypress="return isNumberKey(event)" name="npm" id="npm" placeholder="Your NPM" required/>
                            </div>
                            <div class="form-group">
                                <label for="email"><i class="zmdi zmdi-email"></i></label>
                                <input type="email" name="email" id="email" placeholder="Your Email" required/>
                            </div>
                            <div class="form-group">
                                <label for="phone"><i class="zmdi zmdi-phone"></i></label>
                                <input type="tel" onkeypress="return isNumberKey(event)" name="phone" id="phone" placeholder="Your Phone Number" required/>
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
                                <label for="pass"><i class="zmdi zmdi-lock"></i></label>
                                <input type="password" id="r_password" name="password" id="password" placeholder="Your Password" required/>
                            </div>
                            <div class="form-group">
                                <label for="pass"><i class="zmdi zmdi-lock"></i></label>
                                <input type="password" id="r_confirm_password" name="confirm_password" id="confirm_password" placeholder="Repeat Password" required/>
                            </div>
                            <div class="form-group form-button">
                                <input type="submit" class="form-submit" id="signup" value="Register"/>
                            </div>
                            <a href="login" class="signup-image-link">I am already have an account</a>
                        </form>
                    </div>
                </div>
            </div>
        </section>
    </div>

    <!-- JS -->
    <script src="<?= base_url('assets/mhs/js/jquery.min.js'); ?>"></script>
    <script src="<?= site_url()?>/assets/mhs/js/custom.js"></script>
</body>
</html>