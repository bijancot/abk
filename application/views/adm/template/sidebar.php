<!--start sidebar -->
<aside class="sidebar-wrapper" data-simplebar="true">
          <div class="sidebar-header">
            <div>
              <img src="<?= base_url()?>assets/adm/images/logo-icon.png" class="logo-icon" alt="logo icon">
            </div>
            <div>
              <h4 class="logo-text">SPAGETI</h4>
            </div>
            <div class="toggle-icon ms-auto"> <i class="bi bi-list"></i>
            </div>
          </div>
          <!--navigation-->
          <ul class="metismenu" id="menu">
            <li <?= $navActive == 'dashboard' ? 'class="mm-active"' : ''?> >
              <a href="<?= site_url('admin/dashboard')?>">
                <div class="parent-icon"><i class="bi bi-speedometer"></i>
                </div>
                <div class="menu-title">Dashboard</div>
              </a>
            </li>
            <li <?= $navActive == 'student' ? 'class="mm-active"' : ''?> >
              <a href="<?= site_url('admin/student/verification')?>">
                <div class="parent-icon"><i class="bi bi-people-fill"></i>
                </div>
                <div class="menu-title">Student</div>
              </a>
            </li>
            <li <?= $navActive == 'assignment' ? 'class="mm-active"' : ''?>>
              <a  class="has-arrow">
                <div class="parent-icon"><i class="bi bi-book"></i>
                </div>
                <div class="menu-title">Assignment</div>
              </a>
              <ul>                
                <li> <a href="<?= site_url('admin/assignment/worksheet')?>"><i class="bi bi-circle"></i>Worksheet</a>
                </li>
                <li> <a href="<?= site_url('admin/assignment/student')?>"><i class="bi bi-circle"></i>Student</a>
                </li>
              </ul>
            </li>
            <li <?= $navActive == 'worksheet' ? 'class="mm-active"' : ''?>>
              <a href="<?= site_url('admin/worksheet')?>">
                <div class="parent-icon"><i class="bi bi-view-list"></i>
                </div>
                <div class="menu-title">Worksheet</div>
              </a>
            </li>
            <!-- <li <?= $navActive == 'video' ? 'class="mm-active"' : ''?>>
              <a href="javascript:;">
                <div class="parent-icon"><i class="bi bi-camera-video-fill"></i>
                </div>
                <div class="menu-title">Video</div>
              </a>
            </li> -->
          </ul>
          <!--end navigation-->
       </aside>
       <!--end sidebar -->