 <!-- Footer -->

 <footer class="verso-footer">
            <div class="section verso-py-9">
                <div class="section-content">
                    <div class="container">
                        <div class="row">
                            <div class="col-md-3">
                                <div class="verso-widget widget_text">
                                    <h4 class="verso-widget-header text-uppercase">About Verso</h4>
                                    <p>Quickly coordinate e-business applications through revolutionary catalysts for change.</p>
                                    <p>Seamlessly underwhelm optimal testing procedures whereas bricks-and-clicks. </p>
                                </div>

                            </div>
                            <div class="col-md-3">
                                <div class="verso-widget widget_categories">
                                    <h4 class="verso-widget-header text-uppercase">Categories</h4>
                                    <ul>
                                        <li>
                                            <a href="blog.html">
                                                Web Design (31 courses)
                                            </a>
                                        </li>
                                        <li>
                                            <a href="blog.html">
                                                Web Development (20 courses)
                                            </a>
                                        </li>
                                        <li>
                                            <a href="blog.html">
                                                Brading Design (10 courses)
                                            </a>
                                        </li>
                                        <li>
                                            <a href="blog.html">
                                                Programming (12 courses)
                                            </a>
                                        </li>
                                    </ul>
                                </div>

                            </div>
                            <div class="col-md-3">
                                <div class="verso-widget widget_recent_entries">
                                    <h4 class="verso-widget-header text-uppercase">Latest Courses</h4>

                                    <ul>
                                        <li class="text-truncate">
                                            <a href="course.html" class="float-left verso-mr-1 verso-widget-image" title="Post title">
                                                <img alt="post image" src="<?= site_url()?>/assets/mhs/images/education-modern-post-04-50x50-notinclude.jpg">
                                            </a>
                                            <a href="course.html">CSS3 selectors</a>
                                            <small class="post-date d-block">102 Hours, $20</small>
                                        </li>

                                        <li class="text-truncate">
                                            <a href="course.html" class="float-left verso-mr-1 verso-widget-image" title="Post title">
                                                <img alt="post image" src="<?= site_url()?>/assets/mhs/images/education-modern-post-05-50x50-notinclude.jpg">
                                            </a>
                                            <a href="course.html"> Intro In WordPress</a>
                                            <small class="post-date d-block">80 Hours, $25</small>
                                        </li>
                                        <li class="text-truncate">
                                            <a href="course.html" class="float-left verso-mr-1 verso-widget-image" title="Post title">
                                                <img alt="post image" src="<?= site_url()?>/assets/mhs/images/education-modern-post-06-50x50-notinclude.jpg">
                                            </a>
                                            <a href="course.html">Javascript for begginers</a>
                                            <small class="post-date d-block">25 Hours, free</small>
                                        </li>
                                    </ul>
                                </div>

                            </div>
                            <div class="col-md-3">
                                <div class="verso-widget widget_tag_cloud">
                                    <h4 class="verso-widget-header text-uppercase">Tags</h4>
                                    <ul>
                                        <li>
                                            <a href="courses-list.html">CSS</a>
                                        </li>

                                        <li>
                                            <a href="courses-list.html">HTML</a>
                                        </li>

                                        <li>
                                            <a href="courses-list.html">Design</a>
                                        </li>

                                        <li>
                                            <a href="courses-list.html">PHP</a>
                                        </li>

                                        <li>
                                            <a href="courses-list.html">WordPress</a>
                                        </li>
                                        <li>
                                            <a href="courses-list.html">CMS</a>
                                        </li>
                                        <li>
                                            <a href="courses-list.html">Logo</a>
                                        </li>

                                        <li>
                                            <a href="courses-list.html">PSD</a>
                                        </li>

                                        <li>
                                            <a href="courses-list.html">Illustrator</a>
                                        </li>

                                        <li>
                                            <a href="courses-list.html">Design</a>
                                        </li>
                                    </ul>
                                </div>

                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </footer>

        <a href="#" class="verso-go-top verso-shadow-10 verso-shadow-hover-15 d-none d-sm-block hide">
            <i class="fa fa-angle-up"></i>
        </a>




    </div>

    <div class="verso-search-widget-container">
        <button class="verso-search-widget-button-close">
            <i class="fa fa-close"></i>
        </button>
        <form class="verso-search-widget-form" action="index.html">
            <input class="verso-search-widget-input" name="search" type="search" spellcheck="false" />
            <span class="verso-search-widget-info">Hit enter to search or ESC to close</span>
        </form>
    </div>

    <div class="modal fade" id="login" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h3 class="modal-title text-uppercase" id="myModalLabel">Log in to Your Account</h3>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form action="contact_mailer.php" class="contact-form">
                        <input type="email" id="loginemail" name="email" class="form-control verso-shadow-0 verso-shadow-focus-2 verso-transition verso-mb-3" placeholder="Your Email">
                        <input type="password" id="password" name="password" class="form-control verso-shadow-0 verso-shadow-focus-2 verso-transition verso-mb-3" placeholder="Your Password">
                        <div class="form-check verso-mb-3">
                            <label class="form-check-label">
                                <input class="form-check-input" type="checkbox" value=""> Remember me
                            </label>
                        </div>
                        <button type="submit" class="btn btn-primary verso-shadow-2">Log in </button>
                        <a href="#" class="d-block verso-pt-3">Forgotten your password?</a>
                        <div class="verso-messages verso-pt-2"></div>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <div class="modal fade" id="signup" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h3 class="modal-title text-uppercase" id="myModalLabel2">Sign Up Now</h3>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form action="<?= site_url('proses_register')?>" method="post" class="contact-form">
                        <input type="text" id="signupname" name="name" class="form-control verso-shadow-0 verso-shadow-focus-2 verso-transition verso-mb-3" placeholder="Your Name" required>
                        <input type="text" id="signupnpm" name="npm" class="form-control verso-shadow-0 verso-shadow-focus-2 verso-transition verso-mb-3" placeholder="Your NPM" required>
                        <input type="email" id="signupemail" name="email" class="form-control verso-shadow-0 verso-shadow-focus-2 verso-transition verso-mb-3" placeholder="Your Email" required>
                        <input type="tel" id="signupphone" name="phone" class="form-control verso-shadow-0 verso-shadow-focus-2 verso-transition verso-mb-3" placeholder="Your Phone Number" required>
                        <div class="form-check form-check-inline verso-mb-2">
                            <label class="form-check-label">
                                <input class="form-check-input" id="signupgenderMale" name="gender" type="radio" value="1" checked>
                                <label for="signupgenderMale">Male</label>
                            </label>
                        </div>
                        <div class="form-check form-check-inline verso-mb-2">
                            <label class="form-check-label">
                                <input class="form-check-input" id="signupgenderFemale" name="gender" type="radio" value="2">
                                <label for="signupgenderFemale">Female</label>
                            </label>
                        </div>
                        <textarea rows="6" class="form-control verso-shadow-0 verso-shadow-focus-2 verso-transition verso-mb-3" id="signupaddress" name="address" placeholder="Your Address" required></textarea>
                        <input type="password" id="password" name="password" class="form-control verso-shadow-0 verso-shadow-focus-2 verso-transition verso-mb-3" placeholder="Your Password" required>
                        <input type="password" id="passwordrepeat" name="confirm_password" class="form-control verso-shadow-0 verso-shadow-focus-2 verso-transition verso-mb-3" placeholder="Repeat Password" required>
                        <!-- <div class="form-check verso-mb-3">
                            <label class="form-check-label">
                                <input class="form-check-input" type="checkbox" value=""> Sign me up to the newsletter
                            </label>
                        </div> -->
                        <button type="submit" class="btn btn-primary verso-shadow-2">Create Account</button>
                        <div class="verso-messages verso-pt-2"></div>
                    </form>
                </div>
            </div>
        </div>
    </div>


    <script src="<?= site_url()?>/assets/mhs/js/jquery.min.js"></script>
    <script src="<?= site_url()?>/assets/mhs/js/bootstrap.min.js"></script>
    <script src="<?= site_url()?>/assets/mhs/js/magnific.min.js"></script>
    <script src="<?= site_url()?>/assets/mhs/js/pace.min.js"></script>
    <script src="<?= site_url()?>/assets/mhs/js/smooth-scroll.min.js"></script>
    <script src="<?= site_url()?>/assets/mhs/js/waypoints.min.js"></script>
    <script src="<?= site_url()?>/assets/mhs/js/prlx.min.js"></script>
    <script src="<?= site_url()?>/assets/mhs/js/countdown.min.js"></script>
    <script src="<?= site_url()?>/assets/mhs/js/education-modern.min.js"></script>


</body>

</html>