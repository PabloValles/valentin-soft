<!-- Navigation Bar-->
<header id="topnav" class="esconder">
    <div class="topbar-main" style="background-color:#143a73">
        <div class="container">

            <!-- LOGO -->
            <div class="topbar-left">
                <a href="index.php" class="logo">
                    <i class="fa fa-ambulance icon-c-logo"></i>
                    <span>Valentin 4.0</span>
                </a>
            </div>
            <!-- End Logo container-->


            <div class="menu-extras">

                <ul class="nav navbar-nav pull-right">

                    <li class="nav-item">
                        <!-- Mobile menu toggle-->
                        <a class="navbar-toggle">
                            <div class="lines">
                                <span></span>
                                <span></span>
                                <span></span>
                            </div>
                        </a>
                        <!-- End mobile menu toggle-->
                    </li>

                    <li class="nav-item dropdown notification-list">
                        <a class="nav-link dropdown-toggle arrow-none waves-light waves-effect" data-toggle="dropdown" href="#" role="button" aria-haspopup="false" aria-expanded="false">
                            <i class="zmdi zmdi-notifications-none noti-icon"></i>
                            <span class="noti-icon-badge"></span>
                        </a>
                        <div class="dropdown-menu dropdown-menu-right dropdown-arrow dropdown-lg" aria-labelledby="Preview">

                        </div>
                    </li>

                    <li class="nav-item dropdown notification-list">
                        <a class="nav-link dropdown-toggle arrow-none waves-effect waves-light nav-user" data-toggle="dropdown" href="#" role="button" aria-haspopup="false" aria-expanded="false">
                            <img src="assets/images/users/avatar2.png" alt="user" class="img-circle">
                        </a>
                        <div class="dropdown-menu dropdown-menu-right dropdown-arrow profile-dropdown " aria-labelledby="Preview">
                            <!-- item-->
                            <div class="dropdown-item noti-title">
                                <h5 class="text-overflow"><small>Bienvenida Doctora</small> </h5>
                            </div>

                            <!-- item-->
                            <a href="javascript:void(0);" class="dropdown-item notify-item">
                                <i class="zmdi zmdi-account-circle"></i> <span>Perfil</span>
                            </a>

                            <!-- item-->
                            <a href="config.php" class="dropdown-item notify-item">
                                <i class="zmdi zmdi-settings"></i> <span>Config</span>
                            </a>

                            <!-- item-->
                            <a href="javascript:void(0);" onclick="window.location.href='login.php'" class="dropdown-item notify-item">
                                <i class="zmdi zmdi-lock-open"></i> <span>Bloquear sistema</span>
                            </a>

                            <!-- item-->
                            <a href="login.php" class="dropdown-item notify-item" target="_blanc">
                                <i class="zmdi zmdi-power"></i> <span>Salir</span>
                            </a>

                        </div>
                    </li>

                </ul>

            </div> <!-- end menu-extras -->
            <div class="clearfix"></div>

        </div> <!-- end container -->
    </div>
    <!-- end topbar-main -->


    <div class="navbar-custom">
        <div class="container">
            <div id="navigation">
                <!-- Navigation Menu-->
                <ul class="navigation-menu">
                    <li>
                        <a href="index.php"><i class="zmdi zmdi-view-dashboard"></i> <span> Panel de control </span> </a>
                    </li>
                    <li class="has-submenu">
                        <a href="pacientes.php"><i class="zmdi zmdi-account-o"></i> <span> Pacientes </span> </a>
                        <ul class="submenu megamenu">
                            <li>
                                <ul>
                                    <li><a href="pacientes.php">Listado de pacientes</a></li>
                                    <li><a href="informes.php?tag=pac">Informes</a></li>
                                    <li><a href="ordenRapida.php">Imprimir órden</a></li>
                                </ul>
                            </li>
                        </ul>
                    </li>

                    <li class="has-submenu">
                        <a href="ordenRapida.php"><i class="zmdi zmdi-receipt"></i> <span> Órdenes </span> </a>
                        <ul class="submenu">
                            <li><a href="ordenRapida.php">Órdenes rápidas</a></li>
                            <li><a href="generador_orden.php">Generador de órden</a></li>
                            <li><a href="certificado.php">Certificado de embarazo</a></li>
                        </ul>
                    </li>
                    <li class="has-submenu">
                        <a href="consultas.php"><i class="zmdi zmdi-assignment-o"></i> <span> Consultas </span> </a>
                        <ul class="submenu">
                            <li><a href="consultas.php">Todas las consultas</a></li>
                            <li><a href="nuevaConsulta.php">Nueva consulta</a></li>
                            <li><a href="informes.php?tag=consultas">Informes</a></li>
                            <li><a href="ordenRapida.php">Órden de consulta</a></li>
                        </ul>
                    </li>
                    <li>
                        <a href="turnos.php"><i class="zmdi zmdi-calendar"></i> <span> Turnos</span> </a>
                    </li>
                    <li class="has-submenu">
                        <a href="informes.php"><i class="zmdi zmdi-local-printshop"></i> <span> Informes</span> </a>
                        <ul class="submenu megamenu">
                            <li>
                                <ul>
                                    <li><a href="informes.php">General</a></li>
                                    <li><a href="informes.php?tag=consultas">Consultas</a></li>
                                    <li><a href="informes.php?tag=fpp">FPP</a></li>
                                    <li><a href="informes_administracion.php">Administración</a></li>
                                </ul>
                            </li>
                        </ul>
                    </li>
                    <li>
                        <a href="config.php"><i class="zmdi zmdi-settings"></i> <span> Configuración</span> </a>
                    </li>
                    <!--<li>
                        <a href="#"><i class="zmdi zmdi-group-work"></i> <span> Usuarios</span> </a>
                    </li>-->
                </ul>
                <!-- End navigation menu  -->
            </div>
        </div>
    </div>
</header>
<!-- End Navigation Bar-->