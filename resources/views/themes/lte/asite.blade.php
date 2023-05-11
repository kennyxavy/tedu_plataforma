<aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    <a href="{{ url('home') }}" class="brand-link">
        <img src="{{ asset('images/tedu.png') }}" alt="" class="brand-image" style="opacity: .8">
        <!-- <span class="brand-text font-weight-light"><strong> SISTEMA</strong> </span> -->
        <span class="brand-text font-weight-dark"><strong> SISTEMA</strong> </span>
    </a>

    <!-- Sidebar -->
    <div class="sidebar">
        <!-- Sidebar user (optional) -->
        <div class="user-panel mt-3 pb-3 mb-3 d-flex">
            <div class="image">
                <img src="{{ asset('images/logo.png') }}" alt="User Image">
            </div>
            <div class="info">
                <a href="{{ url('home') }}"></a>
                <a href="{{ url('usuarios/misdatos') }}"
                    class="d-block"><small>{{ Auth()->user()->apellidos }}</small></a>
                <a href="{{ url('home') }}" class="d-block"><small
                        class="d-block">{{ Auth()->user()->categoriausers->nombre }}</small></a>


                @if (Auth()->user()->plan_id == 2)
                    <a data-toggle="tooltip" data-placement="bottom" title="" href="{{ url('home') }}"
                        class="d-block"><small
                            class="d-block">{{ Auth()->user()->micodigo . ' / ' . 'PLAN PRO' }}</small></a>
                @else
                    <a data-toggle="tooltip" data-placement="bottom" title="" href="{{ url('home') }}"
                        class="d-block"><small
                            class="d-block">{{ Auth()->user()->micodigo . ' / ' . 'PLAN FAN' }}</small></a>
                @endif
            </div>
        </div>

        <!-- Sidebar Menu -->
        <nav class="mt-2">
            <ul class="nav nav-pills nav-sidebar flex-column nav-child-indent nav-compact" data-widget="treeview"
                role="menu" data-accordion="false">
                <!-- Add icons to the links using the .nav-icon class
               with font-awesome or any other icon font library -->
                <!-- <li class="nav-item has-treeview">
                <a href="{{ route('home') }}" class="nav-link">
                  <i class="nav-icon fa fa-cube"></i>
                  <p>
                    Planes TEDU <small>Comprar!!</small>
                  </p>
                </a>

              </li> -->
                @if (Auth()->user()->categoria_users_id == 1)
                    <li class="nav-item has-treeview">
                        <a href="{{ route('pagossocios') }}" class="nav-link">
                            <i class="nav-icon fa fa-usd"></i>
                            <p>
                                Pago a socios
                            </p>
                        </a>

                    </li>
                @endif



                <li class="nav-item has-treeview">
                    <a href="#" class="nav-link">
                        <i class="nav-icon fa fa-globe"></i>
                        <p>
                            TEDU - Socios
                            <i class="right fas fa-angle-left"></i>
                        </p>

                        <!-- <img src="{{ asset('images/tedu_socios.png') }}" alt="" height="60" width="80%" class="brand-image" style="opacity: .8" > -->

                    </a>

                    <!-- poniendo -->
                    <ul class="nav nav-treeview">

                        <li class="nav-item">
                            @if (Auth()->user()->plan_id == 2 || Auth()->user()->categoria_users_id == 1 || Auth()->user()->categoria_users_id == 2)
                                <a href="{{ route('market') }}" class="nav-link">
                                @else
                                    <a href="{{ route('comprarplan') }}" class="nav-link">
                            @endif
                            {{-- <i class="nav-icon fa fa-address-book"></i>
                            <p>Comunidad</p> --}}
                            </a>
                        </li>

                        <li class="nav-item">
                            @if (Auth()->user()->plan_id == 2 || Auth()->user()->categoria_users_id == 1 || Auth()->user()->categoria_users_id == 2)
                                <a href="{{ route('usuarios.mired') }}" class="nav-link">
                                @else
                                    <a href="{{ route('comprarplan') }}" class="nav-link">
                            @endif

                            <i class="nav-icon fa fa-users"></i>
                            <p>Mi red</p>
                            </a>
                        </li>

                        <li class="nav-item">
                            @if (Auth()->user()->plan_id == 2 || Auth()->user()->categoria_users_id == 1 || Auth()->user()->categoria_users_id == 2)
                                <a href="{{ route('usuarios.misdatos') }}" class="nav-link">
                                @else
                                    <a href="{{ route('comprarplan') }}" class="nav-link">
                            @endif

                            <i class="nav-icon fa fa-address-book"></i>
                            <p>Mis datos</p>
                            </a>
                        </li>


                    </ul>
                </li>


                <li class="nav-item has-treeview">
                    <a href="#" class="nav-link">
                        <i class="nav-icon fas fa-shopping-basket"></i>
                        <p>
                            TEDU - Market
                            <i class="right fas fa-angle-left"></i>
                        </p>

                        <!-- <img src="{{ asset('images/tedu_market.png') }}" alt="" height="60" width="80%" class="brand-image" style="opacity: .8" > -->

                    </a>
                    <ul class="nav nav-treeview">
                        <li class="nav-item">

                            <a href="{{ route('market') }}" class="nav-link">
                                <i class="nav-icon fa fa-shopping-cart"></i>
                                <p>MarketPlace</p>
                            </a>

                            @if (Auth()->user()->plan_id == 2 || Auth()->user()->categoria_users_id == 1)
                                <!-- <a href="{{ route('productos') }}" class="nav-link"> -->
                                <a href="{{ route('productos') }}" class="nav-link">
                                    <i class="nav-icon fa fa-list"></i>
                                    <p>Mis productos</p>
                                </a>
                                <!-- <a href="{{ route('misventas') }}" class="nav-link"> -->
                                <a href="{{ route('misventas') }}" class="nav-link">
                                    <i class="nav-icon fa fa-usd"></i>
                                    <p>Mis ventas</p>
                                </a>
                                <!-- <a href="{{ route('envios') }}" class="nav-link"> -->
                                <a href="{{ route('envios') }}" class="nav-link">
                                    <i class="nav-icon fa fa-truck"></i>
                                    <p>Envios</p>
                                </a>
                            @endif

                            <!-- <a href="{{ route('mispedidos') }}" class="nav-link"> -->
                            <a href="{{ route('mispedidos') }}" class="nav-link">
                                <i class="nav-icon fa fa-clone"></i>
                                <p>Mis pedidos</p>
                            </a>

                            @if (Auth()->user()->categoria_users_id == 1)
                                <a href="{{ route('misdespachos') }}" class="nav-link">
                                    <i class="nav-icon fa fa-arrow-circle-right"></i>
                                    <p>Despachos</p>
                                </a>
                                <a href="{{ route('productos.aprobar') }}" class="nav-link">
                                    <i class="nav-icon fa fa-check"></i>
                                    <p>Aprobaciones</p>
                                </a>
                            @endif


                            <!--
                          <a href="" class="nav-link">
                              <i class="nav-icon fas fa-hospital-user"></i>
                              <p>Revisar órdenes</p>
                          </a>

                          <a href="{{ url('consignacion/reportegeneral') }}" class="nav-link">
                              <i class="nav-icon fas fa-file-invoice"></i>
                              <p>Reporte general</p>
                          </a>
                          -->
                        </li>
                    </ul>
                </li>



                <li class="nav-item has-treeview">
                    <a href="#" class="nav-link">
                        <i class="nav-icon fa fa-graduation-cap"></i>

                        <p>
                            TEDU - Academy
                            <i class="right fas fa-angle-left"></i>
                        </p>
                        <!-- <img src="{{ asset('images/tedu_academy.png') }}" alt="" height="60" width="80%" class="brand-image" style="opacity: .8" > -->

                    </a>
                    <ul class="nav nav-treeview">
                        <li class="nav-item">
                            <!-- <a href="{{ route('market') }}" class="nav-link" > -->
                            <!-- <a href="{{ route('listadocursos') }}" class="nav-link" > -->
                            <a href="{{ route('listacursos') }}" class="nav-link">
                                <i class="nav-icon fa fa-share"></i>
                                <p>Acceder</p>
                            </a>
                        </li>
                        {{-- @if (Auth()->user()->categoria_users_id == 1)
                            <li class="nav-item">
                                <a href="{{ route('cursos') }}" class="nav-link">
                                    <i class="nav-icon fa fa-book"></i>
                                    <p>Cursos</p>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a href="{{ route('categoriacursos') }}" class="nav-link">
                                    <i class="nav-icon fa fa-file-text"></i>
                                    <p>Categorias</p>
                                </a>
                            </li>
                        @endif --}}

                    </ul>
                </li>


                <li class="nav-item has-treeview">
                    <a href="#" class="nav-link">
                        <i class="nav-icon fa fa-credit-card"></i>
                        <p>
                            Mi monedero
                            <i class="right fas fa-angle-left"></i>
                        </p>
                    </a>
                    <ul class="nav nav-treeview">
                        <li class="nav-item">
                            <a href="{{ route('recargas') }}" class="nav-link">
                                <i class="nav-icon fa fa-university"></i>
                                <p>Solicitud de recarga</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="{{ route('retiros') }}" class="nav-link">
                                <i class="nav-icon fa fa-university"></i>
                                <p>Solicitud de retiro</p>
                            </a>
                        </li>
                        @if (Auth()->user()->categoria_users_id == 1)
                            <li class="nav-item">
                                <a href="{{ route('recargas.aprobar') }}" class="nav-link">
                                    <i class="nav-icon fa fa-refresh"></i>
                                    <p>Aprobar recarga</p>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a href="{{ route('retiros.aprobar') }}" class="nav-link">
                                    <i class="nav-icon fa fa-refresh"></i>
                                    <p>Aprobar retiro</p>
                                </a>
                            </li>
                        @endif

                        <li class="nav-item">
                            <a href="{{ route('monedero') }}" class="nav-link">
                                <i class="nav-icon fa fa-check"></i>
                                <p>Mis Transacciones</p>
                            </a>
                        </li>

                    </ul>
                </li>
                <!--
              <li class="nav-item has-treeview">
                <a href="#" class="nav-link">
                  <i class="nav-icon fa fa-pie-chart"></i>
                  <p>
                    Reportes
                    <i class="right fas fa-angle-left"></i>
                  </p>
                </a>
                <ul class="nav nav-treeview">
                    <li class="nav-item">
                        <a href="" class="nav-link">
                            <i class="nav-icon fa fa-share"></i>
                            <p>Acceder</p>
                        </a>
                    </li>
                </ul>
              </li>
            -->
                @if (Auth()->user()->categoria_users_id == 1)
                    <li class="nav-item has-treeview">
                        <a href="#" class="nav-link">
                            <i class="nav-icon fa fa-database"></i>
                            <p>
                                Mantenimiento
                                <i class="right fas fa-angle-left"></i>
                            </p>
                        </a>
                        <ul class="nav nav-treeview">
                            <li class="nav-item">
                                <a href="{{ url('configuraciones') }}" class="nav-link">
                                    <i class="nav-icon fa fa-share"></i>
                                    <p>Conf.-Market</p>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a href="{{ url('usuarios') }}" class="nav-link">
                                    <i class="nav-icon fa fa-share"></i>
                                    <p>Conf.-Usuarios</p>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a href="{{ url('monedero/contifico') }}" class="nav-link">
                                    <i class="nav-icon fa fa-share"></i>
                                    <p>Contifico</p>
                                </a>
                            </li>
                        </ul>
                    </li>
                @endif

                <li class="nav-item">
                    <a href="{{ route('logout') }}"
                        onclick="event.preventDefault();document.getElementById('logout-form').submit();"
                        class="nav-link">
                        <i class="nav-icon fas fa-sign-out-alt"></i>
                        <p>
                            Salir
                        </p>
                    </a>
                    <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                        @csrf
                    </form>
                </li>

            </ul>
        </nav>
        <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
</aside>
