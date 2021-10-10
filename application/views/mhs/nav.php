<div class="w-100 position-fixed nav-index bg-white">
    <div class="container d-flex justify-content-between align-items-center">
        <div class="d-flex align-items-center brand-logo home">
            <img src="<?= base_url('assets/src/img/logo2.svg'); ?>" alt="logo">
            <p class="font-w-700 h5 ml-2 mb-0 text-dark">Spageti.</p>
        </div>
        <div class="d-flex">
            <?php if($this->session->userdata('USER_LOGGED')) { ?>
                <p class="mb-0 mr-3">Hi, <?= strtok($this->session->userdata('NAMA_MHS'), " ") ?></p>
                <a href="<?= site_url('proses_logout')?>" >Log out</a>
            <?php } else { ?>
                <a class="mb-0 mr-3" href="#" data-toggle="modal" data-target="#login">Login</a>
                <a href="#" data-toggle="modal" data-target="#signup">Sign Up</a>
            <?php } ?>
        </div>
    </div>
</div>