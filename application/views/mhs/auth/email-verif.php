<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Spageti - Email Verification</title>

    <!-- Favicon -->
    <link rel="icon" href="<?= site_url()?>/assets/src/img/logo2.svg" sizes="any" type="image/svg+xml">
    <!-- Font Icon -->
    <link rel="stylesheet" href="<?= base_url('assets/mhs/fonts/material-icon/css/material-design-iconic-font.min.css'); ?>">
    <!-- Main css -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/css/bootstrap.min.css">
    <!-- <link rel="stylesheet" href="<?= base_url('assets/mhs/css/style.css'); ?>">
    <link rel="stylesheet" href="<?= base_url('assets/mhs/css/custom.css'); ?>"> -->

    <link href="<?= site_url()?>/assets/src/css/general.css" rel="stylesheet">
</head>
<body>
    <?php $this->load->view('mhs/nav.php'); ?>
    <div class="primary-bg">
        <div class="bg-white signup p-5 mx-auto d-flex justify-content-center align-items-center min-h-screen">

            <div class="mt-5 rounded-15 d-flex flex-column justify-content-center align-items-center">

                <p class="h2">Activate Your Email</p>
                <div>
                    <svg width="150px" enable-background="new 0 0 511.999 511.999" version="1.1" viewBox="0 0 512 512" xml:space="preserve" xmlns="http://www.w3.org/2000/svg">
                        <path d="m152.42 284.31h-129.69c-12.532 0-22.727-10.194-22.727-22.727v-92.76c0-12.531 10.195-22.726 22.727-22.726h129.69c12.532 0 22.727 10.195 22.727 22.727v92.76c0 12.532-10.196 22.726-22.727 22.726zm-124.79-27.63h119.88v-82.953h-119.88v82.953z" fill="#0D3B66"/>
                        <path d="m156.1 175.34-63.802 48.65c-2.791 2.128-6.66 2.128-9.451 0l-63.803-48.648c-5.931-4.522-2.733-13.99 4.726-13.99h127.61c7.457-3e-3 10.655 9.466 4.723 13.988z" fill="#F7B2B7"/>
                        <g fill="#0D3B66">
                            <path d="m87.572 239.4c-4.708 0-9.362-1.574-13.105-4.429l-63.799-48.645c-7.377-5.623-10.339-15.308-7.372-24.098 2.969-8.789 11.196-14.695 20.472-14.695h127.61c9.277 0 17.504 5.905 20.471 14.694s7e-3 18.473-7.37 24.099l-63.803 48.648c-3.74 2.853-8.394 4.426-13.101 4.426zm-45.975-64.237 45.974 35.056 45.975-35.056h-91.949z"/>
                            <path d="m333.98 378.79c-35.77 0-85.813-9.108-121.09-52.497-12.898-15.858-20.209-34.254-27.278-52.047-7.67-19.318-14.9-37.529-28.576-51.136-5.077-5.052-5.45-13.148-0.862-18.645 13.95-16.715 62.961-71.248 107.92-71.248 1.04 0 2.093 0.029 3.106 0.087 33.767 1.894 61.412 21.517 82.257 58.363 29.995-37.658 109.26-46.54 133.95-48.408 7.681-0.571 15.223 2.202 20.694 7.631 5.503 5.458 8.359 13.028 7.836 20.764-3.171 46.956-14.343 83.715-34.104 112.07 1.742 0.188 3.966 0.316 6.793 0.316h8e-3c7.071 0 13.378 4.417 15.77 10.995 2.389 6.573 0.392 14.006-4.971 18.494-6.801 5.697-14.307 11.447-22.309 17.089-4.109 2.897-8.402 5.804-12.762 8.641-6.398 4.16-14.953 2.347-19.114-4.048-4.16-6.396-2.347-14.953 4.048-19.114 4.074-2.65 8.082-5.362 11.909-8.06 0.623-0.439 1.243-0.881 1.861-1.321-0.018-0.01-0.033-0.019-0.051-0.029-3.302-1.786-6.003-4.185-8.022-7.126-5.652-8.216-5.375-19.029 0.698-26.894 18.819-24.414 29.491-57.714 32.603-101.77-47.93 3.794-101.98 18.034-115.66 41.518-4.172 7.166-11.944 11.494-20.24 11.305-8.377-0.227-15.909-4.969-19.707-12.377-16.443-32.058-37.654-49.035-63.043-50.459-0.513-0.029-1.031-0.041-1.545-0.041-22.154 0-54.205 25.094-78.972 52.428 12.293 15.831 19.584 34.194 26.152 50.736 6.312 15.887 12.827 32.28 23.05 44.85 28.426 34.962 69.883 42.299 99.656 42.299 22.227 0 46.196-4.274 67.496-12.033 7.171-2.614 15.098 1.082 17.708 8.252 2.612 7.167-1.082 15.097-8.252 17.708-24.256 8.838-51.586 13.704-76.956 13.704z"/>
                            <circle cx="240.59" cy="215.21" r="15.657"/>
                        </g>
                    </svg>
                </div>
                <p style="text-align: center;">We have sent your email <?= $this->session->userdata('EMAIL_MHS')?>. Please enter your verification code. </p>
                <form action="<?= site_url('proses_verif')?>" method="POST" class="register-form" id="register-form">
                    <div class="form-group">
                        <input type="text" name="kode_aktivasi" class="auth-input text-center"  data-inputmask="'mask': '999-999'" id="paket" name="kode_aktivasi" placeholder-aria-label="kode_aktivasi" aria-describedby="kode_aktivasi" required>
                    </div>
                    <?php if ($this->session->tempdata("auth_msg")) { ?>
                        <span style="margin-bottom: 10px;"><strong><?php echo $this->session->tempdata("auth_msg"); ?></strong></span>
                    <?php  } else if ($this->session->tempdata("failed_auth_msg")) {?>
                        <span style="color: #FF6C5A;"><strong><?php echo $this->session->tempdata("failed_auth_msg"); ?></strong></span>
                    <?php  }?>
                    
                    <div class="d-flex flex-column text-center">
                        <div style="text-align: center;">
                            <input type="submit" class="login-btn font-w-700 mt-3 mb-5" style="width: 50%;" id="signup" value="Verif"/>
                        </div>
                        <span>Not receiving code?<a href="<?= site_url('send-code')?>" class="signup-image-link"> Send a code </a></span>
                    </div>
                </form>
            </div>
        </div>
        
    </div>

    <!-- JS -->
    <script src="<?= base_url('assets/mhs/js/jquery.min.js'); ?>"></script>
    <script src="<?= base_url('assets/mhs/js/input-mask.js'); ?>"></script>
    <script>
        $(document).ready(function () {
            $(":input").inputmask();
        });
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