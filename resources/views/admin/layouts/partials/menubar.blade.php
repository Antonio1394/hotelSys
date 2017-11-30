<!-- ========== Left Sidebar Start ========== -->

<div class="left side-menu">
    <div class="sidebar-inner slimscrollleft">

        <!--- Divider -->
        <div id="sidebar-menu">
            <ul>
                <li class="text-muted menu-title">Opciones</li>

                <li class="@yield('dashboardMenu', 'default')">
                    <a href="{{url('/admin')}}" class="waves-effect @yield('dashboardMenu', 'default')"><i class="ti-home"></i> <span> Inicio </span> </a>
                </li>
                <li class="@yield('dashboardMenu', 'default')">
                    <a href="{{url('/admin/user')}}" class="waves-effect @yield('userMenu', 'default')"><i class="ti-user"></i> <span> Empleados </span> </a>
                </li>

                <li class="@yield('habitacionMenu', 'default')">
                    <a href="{{url('/admin/habitacion')}}" class="waves-effect @yield('habitacionMenu', 'default')"><i class="fa fa-bed"></i> <span> Habitaciones </span> </a>
                </li>

                <li class="@yield('itemMenu', 'default')">
                    <a href="{{url('/admin/item')}}" class="waves-effect @yield('itemMenu', 'default')"><i class="md md-toc"></i> <span> Items Habitación </span> </a>
                </li>

                <li class="@yield('inventarioMenu', 'default')">
                    <a href="{{url('/admin/inventario')}}" class="waves-effect @yield('inventarioMenu', 'default')"><i class="fa fa-cubes"></i> <span> Inventario </span> </a>
                </li>

                <li class="@yield('ClienteMenu', 'default')">
                    <a href="{{url('/admin/cliente')}}" class="waves-effect @yield('clienteMenu', 'default')"><i class="md  md-assignment-ind"></i> <span> Clientes </span> </a>
                </li>


                <li class="has_sub">
                  <a href="#" class="waves-effect">
                    <i class="md-assignment-turned-in"></i>
                    <span>Reservaciones</span>
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

                <li>
                  <br>
                  <br>
                    <img src="/assets/images/logoHotel.png" alt="" style="width: 60%;margin-left: 20%">
                </li>
            </ul>
            <div class="clearfix"></div>
        </div>
        <div class="clearfix"></div>
    </div>
</div>

<!-- Left Sidebar End -->
