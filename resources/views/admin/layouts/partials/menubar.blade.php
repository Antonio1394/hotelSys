<!-- ========== Left Sidebar Start ========== -->

<div class="left side-menu">
    <div class="sidebar-inner slimscrollleft">

        <!--- Divider -->
        <div id="sidebar-menu">
            <ul>
                <li class="text-muted menu-title">Navigation</li>

                <li class="@yield('dashboardMenu', 'default')">
                    <a href="{{url('/admin')}}" class="waves-effect @yield('dashboardMenu', 'default')"><i class="ti-home"></i> <span> Inicio </span> </a>
                </li>
                <li class="has_sub">
                  <a href="#" class="waves-effect">
                    <i class="ti-light-bulb"></i>
                    <span>Elementos PNC</span>
                  </a>
                  <ul class="list-unstyled" style="display: none;">
                    <li class="@yield('agentMenu', 'default')">
                        <a href="{{ url('admin/agents') }}" class="waves-effect @yield('agentMenu', 'default')"><i class="fa fa-user-secret"></i> <span>Listado</span> </a>
                    </li>

                    <li class="@yield('suspendingMenu', 'default')">
                        <a href="{{ url('admin/agents/showSuspending') }}" class="waves-effect @yield('suspendingMenu', 'default')"><i class="fa fa-minus-square"></i> <span>Suspendidos </span> </a>
                    </li>

                    <li class="@yield('breakMenu', 'default')">
                        <a href="{{ url('admin/agents/showBreak') }}" class="waves-effect @yield('breakMenu', 'default')"><i class="md-brightness-3"></i> <span>Descanso </span> </a>
                    </li>
                  </ul>

                </li>

                <li class="@yield('turnnMenu', 'default')">
                    <a href="{{ url('admin/shifts') }}" class="waves-effect @yield('turnnMenu', 'default')"><i class=" md-view-week"></i> <span> Turnos </span> </a>
                </li>

                <li class="@yield('userMenu', 'default')">
                    <a href="{{ url('admin/users') }}" class="waves-effect @yield('userMenu', 'default')"><i class="ion-android-contact"></i> <span> Usuarios </span> </a>
                </li>

                <li class="@yield('mapMenu', 'default')">
                    <a href="{{ url('admin/maps') }}" class="waves-effect @yield('mapMenu', 'default')"><i class=" md-pin-drop"></i> <span> Central </span> </a>
                </li>

                <li class="@yield('mapAlertMenu', 'default')">
                    <a href="{{ url('admin/mapsAlert') }}" class="waves-effect @yield('mapAlertMenu', 'default')"><i class="ion-alert-circled "></i> <span>Generar Preliminares</span> </a>
                </li>

                <li class="@yield('historialMenu', 'default')">
                    <a href="{{ url('admin/records') }}" class="waves-effect @yield('historialMenu', 'default')"><i class=" md-view-list"></i> <span>Historial Preliminares</span> </a>
                </li>
                <li>
                    <img src="/assets/images/umg.png" alt="" style="width: 60%;margin-left: 20%">
                </li>
            </ul>
            <div class="clearfix"></div>
        </div>
        <div class="clearfix"></div>
    </div>
</div>

<!-- Left Sidebar End -->
