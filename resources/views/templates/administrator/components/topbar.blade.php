<div class="topbar">

  <!-- LOGO -->
  <div class="topbar-left">
          <a href="/admin" class="logo">
            <img src="/assets/images/logoHotel.png" alt="" style="width: 30%;margin-left: 10%">
          </a>
  </div>

  <!-- Button mobile view to collapse sidebar menu -->
  <div class="navbar navbar-default" role="navigation">
      <div class="container">
          <div class="">
              <div class="pull-left">
                  <button class="button-menu-mobile open-left">
                      <i class="ion-navicon"></i>
                  </button>
                  <span class="clearfix"></span>
              </div>

              <ul class="nav navbar-nav navbar-right pull-right">
                  <li class="dropdown">
                      <a href="" class="dropdown-toggle profile" data-toggle="dropdown" aria-expanded="true"><img src="/assets/images/users/avatar-1.jpg" alt="user-img" class="img-circle"> </a>
                      <ul class="dropdown-menu">
                          <li><a href="{{ url('auth/logout') }}"><i class="ti-power-off m-r-5"></i> Cerrar Sesión</a></li>
                      </ul>
                  </li>
              </ul>
          </div>
          <!--/.nav-collapse -->
      </div>
  </div>
</div>
