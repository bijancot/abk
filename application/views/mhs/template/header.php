<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="description" content="Unique Responsive Multipurpose Bootstrap 4 HTML Template">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Verso - multipurpose HTML Template</title>

    <!-- CSS files -->
    <link href="https://fonts.googleapis.com/css?family=Roboto+Condensed:300,300i,400,400i,700%7CRoboto:300,300i,400,400i,700,700i" rel="stylesheet">
    <link rel="stylesheet" href="<?= site_url()?>/assets/mhs/css/animate.min.css">
    <link rel="stylesheet" href="<?= site_url()?>/assets/mhs/css/education-modern.min.css">
    <link rel="stylesheet" href="<?= site_url()?>/assets/mhs/css/custom.css">

    <!-- Fav Icons -->
    <link rel="icon" type="image/png" sizes="16x16" href="<?= site_url()?>/assets/mhs/favicon/favicon-16x16.png">
    <link rel="icon" type="image/png" sizes="32x32" href="<?= site_url()?>/assets/mhs/favicon/favicon-32x32.png">

    <link rel="shortcut icon" href="<?= site_url()?>/assets/mhs/favicon/favicon.ico">
</head>

<body class="pace-on pace-squares">
    <div class="pace-overlay"></div>
    <!--[if lt IE 10]>
            <p class="browserupgrade">You are using an <strong>outdated</strong> browser. Please <a href="http://browsehappy.com/">upgrade your browser</a> to improve your experience.</p>
        <![endif]-->

    <div class="verso-content-box verso-content-box-move-behind">

        <!-- Header -->

        <div class="verso-header verso-header-transparent">

            <!-- Top Bar -->
            <div class="verso-topbar verso-topbar-leftright">
                <div class="verso-topbar-inner">
                    <div class="verso-topbar-container">
                        <div class="verso-topbar-col">
                            <div class="verso-widget widget_text">
                                <a class="verso-pr-2" href="about.html">About</a>
                                <a class="verso-pr-2" href="faq.html">FAQ</a>
                                <a href="courses-list.html">Courses</a>
                            </div>
                        </div>
                        <div class="verso-topbar-col">
                            <div class="verso-widget widget_text">
                                <div class="verso-icon-set">
                                    <a class="verso-icon-set-item verso-transition" href="#">
                                        <i class="fa fa-linkedin"></i>
                                    </a>
                                    <a class="verso-icon-set-item verso-transition" href="#">
                                        <i class="fa fa-facebook"></i>
                                    </a>
                                    <a class="verso-icon-set-item verso-transition" href="#">
                                        <i class="fa fa-twitter"></i>
                                    </a>
                                </div>
                            </div>
                            <div class="verso-widget widget_text">
                                <?php if($this->session->userdata('USER_LOGGED')) { ?>
                                    <a class="verso-pr-2 verso-pl-4"><?= strtok($this->session->userdata('NAMA_MHS'), " ") ?></a>
                                    <a href="<?= site_url('proses_logout')?>" >Log out</a>
                                <?php } else { ?>
                                    <a class="verso-pr-2 verso-pl-4" href="#" data-toggle="modal" data-target="#login">Login</a>
                                    <a href="#" data-toggle="modal" data-target="#signup">Sign Up</a>
                                <?php } ?>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Navigation -->
            <div class="verso-nav verso-nav-sticky verso-nav-layout-logo-l-menu-r">
                <div class="verso-nav-inner">
                    <div class="verso-nav-container">

                        <!-- Logo -->
                        <div class="verso-nav-brand">
                            <a href="<?= site_url()?>">
                                <img src="<?= site_url()?>/assets/mhs/images/education-modern-logo-130x100.png" alt="verso"> Education
                            </a>
                        </div>

                        <!-- Mobile menu toggle button -->
                        <div class="verso-nav-mobile">
                            <a id="nav-toggle" href="#">
                                <span></span>
                            </a>
                        </div>

                        <!-- Menu One -->
                        <nav class="verso-nav-menu">
                            <ul class="verso-nav-list">
                                <li>
                                    <a href="<?= site_url()?>">Home</a>
                                </li>
                                <li>
                                    <a href="about.html">About</a>
                                    <ul class="verso-nav-dropdown closed">
                                        <li>
                                            <a href="about.html">About us</a>
                                        </li>
                                        <li>
                                            <a href="team.html">Our team</a>
                                        </li>
                                        <li>
                                            <a href="tutor.html">Tutor Page</a>
                                        </li>
                                        <li>
                                            <a href="faq.html">FAQ</a>
                                        </li>
                                        <li>
                                            <a href="pricing.html">Pricing</a>
                                        </li>
                                    </ul>
                                </li>
                                <li>
                                    <a href="courses-list.html">Courses</a>
                                    <ul class="verso-nav-dropdown closed">
                                        <li>
                                            <a href="courses-list.html">Courses List</a>
                                        </li>
                                        <li>
                                            <a href="courses-grid.html">Courses Grid</a>
                                        </li>
                                        <li>
                                            <a href="<?= site_url('course')?>">Single Course</a>
                                        </li>
                                    </ul>
                                </li>
                                <li>
                                    <a href="events.html">Events</a>
                                    <ul class="verso-nav-dropdown closed">
                                        <li>
                                            <a href="events.html">Events</a>
                                        </li>
                                        <li>
                                            <a href="events-list.html">Event List</a>
                                        </li>
                                        <li>
                                            <a href="event.html">Single Event</a>
                                        </li>
                                    </ul>
                                </li>
                                <li>
                                    <a href="blog.html">Blog</a>
                                    <ul class="verso-nav-dropdown closed">
                                        <li>
                                            <a href="blog.html">Blog</a>
                                        </li>
                                        <li>
                                            <a href="post.html">Single Post</a>
                                        </li>
                                        <li>
                                            <a href="author.html">Author Page</a>
                                        </li>
                                    </ul>
                                </li>
                                <li>
                                    <a href="contact.html">Contact</a>
                                    <ul class="verso-nav-dropdown closed">
                                        <li>
                                            <a href="contact.html">Contact Us</a>
                                        </li>
                                        <li>
                                            <a href="#" data-toggle="modal" data-target="#login">Login</a>
                                        </li>
                                        <li>
                                            <a href="#" data-toggle="modal" data-target="#signup">Sign Up</a>
                                        </li>
                                    </ul>


                                </li>
                            </ul>
                            <div class="verso-nav-widget">
                                <div class="verso-widget">
                                    <div class="verso-icon-set">
                                        <a class="verso-icon-set-item verso-transition verso-search-widget-button-open" href="#">
                                            <i class="fa fa-search"></i>
                                        </a>
                                    </div>
                                </div>
                            </div>

                        </nav>
                    </div>
                </div>
                <?php if ($this->session->flashdata("auth_msg")) { ?>
                    <div class="alert alert-success alert-dismissible fade show" role="alert">
                        <strong><?php echo $this->session->flashdata("auth_msg"); ?></strong>
                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                <?php  } else if ($this->session->flashdata("failed_auth_msg")) {?>
                    <div class="alert alert-warning alert-dismissible fade show" role="alert">
                        <strong><?php echo $this->session->flashdata("failed_auth_msg"); ?></strong>
                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                <?php  }?>
            </div>
        </div>