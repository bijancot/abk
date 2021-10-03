<!-- Content -->
<div class="verso-content">

    <div class="section">
        <div class="section-background">
            <div class="section-bg-image section-bg-image-size-cover section-bg-image-position-top verso-demo-bg-image-01"></div>
        </div>
        <div class="section-content">
            <div class="container">

                <div class="row verso-pb-18 verso-pt-25">
                    <div class="col-lg-12">

                        <div class="card verso-shadow-10 verso-shadow-hover-15 verso-transition verso-mb-3 verso-os-animation verso-os-animation" data-os-animation="fadeIn" data-os-animation-delay=".3s">
                            <div class="embed-responsive embed-responsive-16by9">
                                <iframe class="embed-responsive-item" src="https://www.youtube.com/embed/bVS7ca6A9u8?list=PLgGbWId6zgaVkI3H31w_avkotSZCM3D9Y" allowfullscreen></iframe>
                            </div>
                            <div class="card-body">
                                <h1 class="h2 card-title text-uppercase verso-mb-1">
                                    Argument
                                </h1>
                                <!-- <h4 class="verso-mb-2 text-muted">
                                    by
                                    <a href="tutor.html" class="text-muted">John Langan</a>
                                </h4> -->
                                <p class="card-text verso-mb-0">The most critical first step to becoming a web designer is learning how to code HTML. By the end of this short course you’ll know what HTML is, how it works, and how to use its most common elements. You’ll go from a blank slate to having your first fully functioning, basic hand-coded page. This will give you the fundamental foundation on which all your future designs can be built. So let’s jump into “Start Here: Learn Basic HTML”.</p>
                                <h1 class="h2 text-uppercase verso-mb-1 verso-mt-2">Worksheets</h2>
                            </div>
                            <div id="accordion">
                                <?php 
                                    if($this->session->userdata('USER_LOGGED')) {
                                        foreach ($course as $item) {
                                            if($item->ID_WS == null){
                                                break;
                                            }
                                            echo '
                                                <div class="card">
                                                    <div class="card-header list-group-item list-group-item-action verso-demo-bg-color-quicksand" id="headingTwo">
                                                        <div class="list-group-item-content">
                                                            <button id="dropdown" class="btn btn-link collapsed verso-text-light" data-toggle="collapse" data-target="#'.$item->ID_WS.'" aria-expanded="false" aria-controls="'.$item->ID_WS.'">
                                                                '.$item->NAMA_WS.'
                                                            </button>
                                                        </div>
                                                    </div>
                                                    <div id="'.$item->ID_WS.'" class="collapse" aria-labelledby="headingTwo" data-parent="#accordion">
                                                        <div class="card-body">
                                                            This is a body
                                                        </div>
                                                    </div>
                                                </div>
                                            ';
                                        }
                                    }
                                ?>
                                <!-- <div class="card">
                                    <div class="card-header list-group-item list-group-item-action verso-demo-bg-color-quicksand" id="headingOne">
                                        <div class="list-group-item-content">
                                            <button id="dropdown" class="btn btn-link collapsed verso-text-light" data-toggle="collapse" data-target="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
                                                Collapsible Group Item #1
                                            </button>
                                        </div>
                                    </div>

                                    <div id="collapseOne" class="collapse" aria-labelledby="headingOne" data-parent="#accordion">
                                        <div class="card-body">
                                            Anim pariatur cliche reprehenderit, enim eiusmod high life accusamus terry richardson ad squid. 3 wolf moon officia aute, non cupidatat skateboard dolor brunch. Food truck quinoa nesciunt laborum eiusmod. Brunch 3 wolf moon tempor, sunt aliqua put a bird on it squid single-origin coffee nulla assumenda shoreditch et. Nihil anim keffiyeh helvetica, craft beer labore wes anderson cred nesciunt sapiente ea proident. Ad vegan excepteur butcher vice lomo. Leggings occaecat craft beer farm-to-table, raw denim aesthetic synth nesciunt you probably haven't heard of them accusamus labore sustainable VHS.
                                        </div>
                                    </div>
                                </div>

                                <div class="card">
                                    <div class="card-header list-group-item list-group-item-action verso-demo-bg-color-quicksand" id="headingTwo">
                                        <div class="list-group-item-content">
                                            <button id="dropdown" class="btn btn-link collapsed verso-text-light" data-toggle="collapse" data-target="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo">
                                                Collapsible Group Item #2
                                            </button>
                                        </div>
                                    </div>
                                    <div id="collapseTwo" class="collapse" aria-labelledby="headingTwo" data-parent="#accordion">
                                        <div class="card-body">
                                            Anim pariatur cliche reprehenderit, enim eiusmod high life accusamus terry richardson ad squid. 3 wolf moon officia aute, non cupidatat skateboard dolor brunch. Food truck quinoa nesciunt laborum eiusmod. Brunch 3 wolf moon tempor, sunt aliqua put a bird on it squid single-origin coffee nulla assumenda shoreditch et. Nihil anim keffiyeh helvetica, craft beer labore wes anderson cred nesciunt sapiente ea proident. Ad vegan excepteur butcher vice lomo. Leggings occaecat craft beer farm-to-table, raw denim aesthetic synth nesciunt you probably haven't heard of them accusamus labore sustainable VHS.
                                        </div>
                                    </div>
                                </div>
                                
                                <div class="card">
                                    <div class="card-header list-group-item list-group-item-action verso-demo-bg-color-quicksand" id="headingThree">
                                        <div class="list-group-item-content">
                                            <button id="dropdown"  class="btn btn-link collapsed verso-text-light" data-toggle="collapse" data-target="#collapseThree" aria-expanded="false" aria-controls="collapseThree">
                                                Collapsible Group Item #3
                                            </button>
                                        </div>
                                    </div>
                                    <div id="collapseThree" class="collapse" aria-labelledby="headingThree" data-parent="#accordion">
                                        <div class="card-body">
                                            Anim pariatur cliche reprehenderit, enim eiusmod high life accusamus terry richardson ad squid. 3 wolf moon officia aute, non cupidatat skateboard dolor brunch. Food truck quinoa nesciunt laborum eiusmod. Brunch 3 wolf moon tempor, sunt aliqua put a bird on it squid single-origin coffee nulla assumenda shoreditch et. Nihil anim keffiyeh helvetica, craft beer labore wes anderson cred nesciunt sapiente ea proident. Ad vegan excepteur butcher vice lomo. Leggings occaecat craft beer farm-to-table, raw denim aesthetic synth nesciunt you probably haven't heard of them accusamus labore sustainable VHS.
                                        </div>
                                    </div>
                                </div> -->
                            </div>
                            <!-- <ul class="list-group list-group-flush">
                                <li class="list-group-item list-group-item-action verso-demo-bg-color-quicksand verso-text-light">
                                    <div class="list-group-item-content">
                                        <strong>1. Introduction</strong>
                                        <span class="float-right">2 Lessons</span>
                                    </div>
                                </li>
                                <li class="list-group-item list-group-item-action ">
                                    <div class="list-group-item-content">
                                        <a href="https://www.youtube.com/embed/bVS7ca6A9u8?list=PLgGbWId6zgaVkI3H31w_avkotSZCM3D9Y" class="magnific-youtube">
                                            1.1 Introduction to web design
                                        </a>
                                        <span class="float-right text-muted">2:12</span>
                                    </div>
                                </li>
                                <li class="list-group-item list-group-item-action ">
                                    <div class="list-group-item-content">
                                        <a href="https://www.youtube.com/embed/bVS7ca6A9u8?list=PLgGbWId6zgaVkI3H31w_avkotSZCM3D9Y" class="magnific-youtube">
                                            1.2 Basic HTML markup
                                        </a>
                                        <span class="float-right text-muted">3:25</span>
                                    </div>
                                </li>
                                <li class="list-group-item list-group-item-action verso-demo-bg-color-quicksand verso-text-light">
                                    <div class="list-group-item-content">
                                        <strong>2. Learn HTML</strong>
                                        <span class="float-right">6 Lessons</span>
                                    </div>
                                </li>
                                <li class="list-group-item list-group-item-action ">
                                    <div class="list-group-item-content">
                                        <a href="https://www.youtube.com/embed/bVS7ca6A9u8?list=PLgGbWId6zgaVkI3H31w_avkotSZCM3D9Y" class="magnific-youtube">
                                            2.1 What is HHTML
                                        </a>
                                        <span class="float-right text-muted">3:08</span>
                                    </div>
                                </li>
                                <li class="list-group-item list-group-item-action ">
                                    <div class="list-group-item-content">
                                        <a href="https://www.youtube.com/embed/bVS7ca6A9u8?list=PLgGbWId6zgaVkI3H31w_avkotSZCM3D9Y" class="magnific-youtube">
                                            2.2 Basic HTML elements
                                        </a>
                                        <span class="float-right text-muted">3:25</span>
                                    </div>
                                </li>
                                <li class="list-group-item list-group-item-action ">
                                    <div class="list-group-item-content">
                                        <a href="https://www.youtube.com/embed/bVS7ca6A9u8?list=PLgGbWId6zgaVkI3H31w_avkotSZCM3D9Y" class="magnific-youtube">
                                            2.3 The revolution of HTML 5
                                        </a>
                                        <span class="float-right text-muted">4:01</span>
                                    </div>
                                </li>
                                <li class="list-group-item list-group-item-action ">
                                    <div class="list-group-item-content">
                                        <a href="https://www.youtube.com/embed/bVS7ca6A9u8?list=PLgGbWId6zgaVkI3H31w_avkotSZCM3D9Y" class="magnific-youtube">
                                            2.4 The HTML attributes
                                        </a>
                                        <span class="float-right text-muted">1:18</span>
                                    </div>
                                </li>
                                <li class="list-group-item list-group-item-action ">
                                    <div class="list-group-item-content">
                                        <a href="https://www.youtube.com/embed/bVS7ca6A9u8?list=PLgGbWId6zgaVkI3H31w_avkotSZCM3D9Y" class="magnific-youtube">
                                            2.5 Classes & Intensifiers
                                        </a>
                                        <span class="float-right text-muted">4:41</span>
                                    </div>
                                </li>
                                <li class="list-group-item list-group-item-action verso-demo-bg-color-quicksand verso-text-light">
                                    <div class="list-group-item-content ">
                                        <strong>3. Conclusion</strong>
                                        <span class="float-right">2 Lessons</span>
                                    </div>
                                </li>
                                <li class="list-group-item list-group-item-action ">
                                    <div class="list-group-item-content">
                                        <a href="https://www.youtube.com/embed/bVS7ca6A9u8?list=PLgGbWId6zgaVkI3H31w_avkotSZCM3D9Y" class="magnific-youtube">
                                            3.1 Wrapping up
                                        </a>
                                        <span class="float-right text-muted">2:12</span>
                                    </div>
                                </li>
                                <li class="list-group-item list-group-item-action ">
                                    <div class="list-group-item-content">
                                        <a href="https://www.youtube.com/embed/bVS7ca6A9u8?list=PLgGbWId6zgaVkI3H31w_avkotSZCM3D9Y" class="magnific-youtube">
                                            3.2 Whats next?
                                        </a>
                                        <span class="float-right text-muted">0:48</span>
                                    </div>
                                </li>
                            </ul> -->
                            <!-- <div class="card-footer">
                                <small class="text-muted">
                                    <i class="fa fa-tags text-muted verso-pr-1"></i>
                                    <a href="#" class="text-muted">HTML</a>,
                                    <a href="#" class="text-muted">CSS</a>,
                                    <a href="#" class="text-muted">DESIGN</a>
                                </small>
                                <div class="verso-icon-set verso-icon-set-expandable verso-transition float-right">
                                    <a class="verso-icon-set-item verso-icon-set-item-trigger text-muted" href="1">
                                        <i class="fa fa-share-alt"></i>
                                    </a>
                                    <a class="verso-icon-set-item verso-icon-set-item-close verso-transition" href="2">
                                        <i class="fa fa-close"></i>
                                    </a>
                                    <a class="verso-icon-set-item text-muted verso-transition" href="#">
                                        <i class="fa fa-instagram"></i>
                                    </a>
                                    <a class="verso-icon-set-item text-muted verso-transition" href="#">
                                        <i class="fa fa-linkedin"></i>
                                    </a>
                                    <a class="verso-icon-set-item text-muted verso-transition" href="#">
                                        <i class="fa fa-facebook"></i>
                                    </a>
                                    <a class="verso-icon-set-item text-muted verso-transition" href="#">
                                        <i class="fa fa-twitter"></i>
                                    </a>
                                </div>
                            </div> -->
                        </div>
                        <!-- <h3 class="verso-mt-5 verso-mb-3 h4 verso-os-animation" data-os-animation="fadeIn" data-os-animation-delay=".3s">Related Courses</h3>
                        <div class="row">
                            <div class="col-md-4">
                                <div class="card verso-shadow-10 verso-shadow-hover-15 verso-transition verso-mb-3 verso-os-animation text-center verso-os-animation" data-os-animation="fadeIn" data-os-animation-delay=".3s">
                                    <div class="card-img-container">
                                        <img class="card-img" src="assets/images/education-modern-course-02-400x300-notinclude.jpg" alt="Card image">
                                        <div class="card-img-overlay card-img-overlay-mini card-img-overlay-top card-img-overlay-right text-xs-center">
                                            <span>
                                                <small>$</small>16
                                            </span>
                                        </div>
                                    </div>
                                    <div class="card-body">
                                        <h4 class="card-title text-uppercase verso-mb-1">
                                            <a href="course.html">Angular 2</a>
                                        </h4>
                                        <h5 class="verso-mb-2 text-muted">
                                            by
                                            <a href="tutor.html" class="text-muted">John Langan</a>
                                        </h5>
                                        <p class="card-text verso-mb-0">If you're building a web app, at some point you'll need to get data from your users.</p>
                                    </div>
                                    <div class="card-footer clearfix">
                                        <div class="float-left">
                                            <i class="fa fa-star"></i>
                                            <i class="fa fa-star"></i>
                                            <i class="fa fa-star"></i>
                                            <i class="fa fa-star"></i>
                                            <i class="fa fa-star-o"></i>
                                        </div>
                                        <div class="float-right text-muted">
                                            24 hours
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="card verso-shadow-10 verso-shadow-hover-15 verso-transition verso-mb-3 verso-os-animation text-center verso-os-animation" data-os-animation="fadeIn" data-os-animation-delay=".4s">
                                    <div class="card-img-container">
                                        <img class="card-img" src="assets/images/education-modern-course-03-400x300-notinclude.jpg" alt="Card image">
                                        <div class="card-img-overlay card-img-overlay-mini card-img-overlay-top card-img-overlay-right text-xs-center">
                                            <span>
                                                <small>$</small>18
                                            </span>
                                        </div>
                                    </div>
                                    <div class="card-body">
                                        <h4 class="card-title text-uppercase verso-mb-1">
                                            <a href="course.html">Sequence intro</a>
                                        </h4>
                                        <h5 class="verso-mb-2 text-muted">
                                            by
                                            <a href="tutor.html" class="text-muted">Mike Smith</a>
                                        </h5>
                                        <p class="card-text verso-mb-0">equence.js is a CSS framework which you can use to create presentations.</p>
                                    </div>
                                    <div class="card-footer clearfix">
                                        <div class="float-left">
                                            <i class="fa fa-star"></i>
                                            <i class="fa fa-star"></i>
                                            <i class="fa fa-star"></i>
                                            <i class="fa fa-star-o"></i>
                                            <i class="fa fa-star-o"></i>
                                        </div>
                                        <div class="float-right text-muted">
                                            15 hours
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="card verso-shadow-10 verso-shadow-hover-15 verso-transition verso-mb-3 verso-os-animation text-center verso-os-animation" data-os-animation="fadeIn" data-os-animation-delay=".5s">
                                    <div class="card-img-container">
                                        <img class="card-img" src="assets/images/education-modern-course-04-400x300-notinclude.jpg" alt="Card image">
                                        <div class="card-img-overlay card-img-overlay-mini card-img-overlay-top card-img-overlay-right text-xs-center">
                                            <span>
                                                FREE
                                            </span>
                                        </div>
                                    </div>
                                    <div class="card-body">
                                        <h4 class="card-title text-uppercase verso-mb-1">
                                            <a href="course.html">Grav CMS</a>
                                        </h4>
                                        <h5 class="verso-mb-2 text-muted">
                                            by
                                            <a href="tutor.html" class="text-muted">Spike Lee</a>
                                        </h5>
                                        <p class="card-text verso-mb-0">Grav is a flat-file CMS, meaning you get a fast, sophisticated flexible.</p>
                                    </div>
                                    <div class="card-footer clearfix">
                                        <div class="float-left">
                                            <i class="fa fa-star"></i>
                                            <i class="fa fa-star"></i>
                                            <i class="fa fa-star"></i>
                                            <i class="fa fa-star"></i>
                                            <i class="fa fa-star"></i>
                                        </div>
                                        <div class="float-right text-muted">
                                            40 hours
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div> -->
                    </div>
                    <!-- <div class="col-lg-3">
                        <div class="card verso-shadow-15 verso-shadow-hover-20 verso-transition verso-os-animation card-inverse verso-demo-bg-color-yellow verso-mb-3" data-os-animation="fadeIn" data-os-animation-delay=".3s">
                            <div class="card-header  verso-text-light text-center">
                                <h2 class="verso-mb-0 verso-font-weight-300">
                                    <small class="verso-font-weight-300">$</small>19.99
                                </h2>
                            </div>
                            <ul class="list-group list-group-flush verso-text-light">
                                <li class="list-group-item list-group-item-action ">
                                    <div class="list-group-item-content verso-text-light">
                                        <strong>Lessons</strong>
                                        <span class="float-right">12</span>
                                    </div>
                                </li>
                                <li class="list-group-item list-group-item-action ">
                                    <div class="list-group-item-content verso-text-light">
                                        <strong>Length</strong>
                                        <span class="float-right">52:30</span>
                                    </div>
                                </li>
                                <li class="list-group-item list-group-item-action ">
                                    <div class="list-group-item-content verso-text-light">
                                        <strong>Level</strong>
                                        <span class="float-right">Novice</span>
                                    </div>
                                </li>
                                <li class="list-group-item list-group-item-action ">
                                    <div class="list-group-item-content verso-text-light">
                                        <strong>Rating</strong>
                                        <span class="float-right">
                                            <i class="fa fa-star"></i>
                                            <i class="fa fa-star"></i>
                                            <i class="fa fa-star"></i>
                                            <i class="fa fa-star"></i>
                                            <i class="fa fa-star-o"></i>
                                        </span>
                                    </div>
                                </li>
                            </ul>
                        </div>
                        <div class="card verso-shadow-15 verso-shadow-hover-20 verso-transition verso-os-animation verso-mb-3" data-os-animation="fadeIn" data-os-animation-delay=".3s">
                            <div class="card-img-container">
                                <img class="card-img" src="assets/images/education-modern-team-02-400x400-notinclude.jpg" alt="Card image">
                            </div>
                            <div class="card-body">
                                <h4 class="card-title text-uppercase verso-mb-1">
                                    <a href="tutor.html">John Langan</a>
                                </h4>
                                Hi there. I'm a designer and coder who specializes in web design and development and also works in the areas of game development and digital art.
                            </div>
                        </div>
                    </div> -->
                </div>
            </div>
        </div>
    </div>



</div>