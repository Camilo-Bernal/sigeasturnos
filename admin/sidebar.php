<!-- Main Sidebar Container -->
<aside class="main-sidebar sidebar-dark-blue elevation-4 layout-fixed sidebar-open oss-dragging">
    <!-- Brand Logo -->
    <a href="inicio.php" class="brand-link decoration">
        <img src="../dist/img/calendario.png" alt=" Logo" class="brand-image  elevation-3" style="opacity: .8">
        <span class="brand-text font-weight-light"><b style="color: #ffffff;">SuTurno HUDN</b></span>
    </a>

    <!-- Sidebar -->
    <div class="sidebar">
        <!-- Sidebar user panel (optional) -->
        <div class="user-panel mt-3 pb-3 mb-3 d-flex">
            <div class="image">
                <img src="../dist/img/account.png" class="img-circle elevation-2" alt="User Image">
            </div>
            <div class="info">
                <a href="inicio.php" class="d-block decoration" style="color: #ffffff;">
                    <?php
                    echo "$user";
                    ?>
                </a>
            </div>
        </div>

        <!-- Sidebar Menu -->
        <nav class="mt-2">
            <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="true">
                <!-- Add icons to the links using the .nav-icon class
                 with font-awesome or any other icon font library -->
                <li class="nav-item has-treeview">
                    <a href="#" class="nav-link" style="color: white;">
                        <i class="nav-icon fa fa-users"></i>
                        <p>
                            <i class="fas fa-angle-left right"></i>
                            Empleados
                        </p>
                    </a>
                    <ul class="nav nav-treeview">
                        <li class="nav-item">
                            <a href="./empleados.php" class="nav-link" style="color: white;">
                                <i class="far fa-circle nav-icon text-success"></i>

                                <p>Lista de empleados</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="./crearEmpleado.php" class="nav-link" style="color: white;">
                                <i class="far fa-circle nav-icon text-success"></i>
                                <p>Registrar empleado</p>
                            </a>
                        </li>
                        <!-- <li class="nav-item">
                            <a href="./editarEmpleado.php" class="nav-link" style="color: white;">
                            <i class="far fa-circle nav-icon text-success"></i>
                                <p>Editar empleado</p>
                            </a>
                        </li> -->
                        <li class="nav-item">
                            <a href="./desactivarEmpleado.php" class="nav-link" style="color: white;">
                                <i class="far fa-circle nav-icon text-success"></i>
                                <p>Desactivar empleado</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="./activarEmpleados.php" class="nav-link" style="color: white;">
                                <i class="far fa-circle nav-icon text-success"></i>
                                <p>Activar empleado</p>
                            </a>
                        </li>
                    </ul>
                </li>

                <!-- asignación manual -->
                <li class="nav-item">
                    <a href="" class="nav-link" style="color: white;">
                        <i class="nav-icon fa fa-calendar"></i>
                        <p>
                            <i class="fas fa-angle-left right"></i>
                            Asignar Turnos
                        </p>
                    </a>
                    <ul class="nav nav-treeview">
                        <li class="nav-item">
                            <a href="./planta_permanente.php" class="nav-link" style="color: white;">
                                <i class="far fa-circle nav-icon text-success"></i>
                                <p>Planta Permanente</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="./planta_temporal.php" class="nav-link" style="color: white;">
                                <i class="far fa-circle nav-icon text-success"></i>
                                <p>Planta Temporal</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="./OPS-SAS.php" class="nav-link" style="color: white;">
                                <i class="far fa-circle nav-icon text-success"></i>
                                <p>OPS-SAS</p>
                            </a>
                        </li>
                    </ul>
                </li>

                <!-- Asignacuin automática -->
                <li class="nav-item">
                    <a href="" class="nav-link" style="color: white;">
                        <i class="nav-icon fa fa-calendar"></i>
                        <p>
                            <i class="fas fa-angle-left right"></i>
                            Asignación automática
                        </p>
                    </a>
                    <ul class="nav nav-treeview">
                        <li class="nav-item">
                            <a href="./planta_permanente_auto.php" class="nav-link" style="color: white;">
                                <i class="far fa-circle nav-icon text-success"></i>
                                <p>Planta Permanente</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="./planta_temporal_auto.php" class="nav-link" style="color: white;">
                                <i class="far fa-circle nav-icon text-success"></i>
                                <p>Planta Temporal</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="./OPS-SAS.php" class="nav-link" style="color: white;">
                                <i class="far fa-circle nav-icon text-success"></i>
                                <p>OPS-SAS</p>
                            </a>
                        </li>
                    </ul>
                </li>

                <!-- Recargos -->
                <li class="nav-item has-treeview">
                    <a href="#" class="nav-link" style="color: white;">
                        <i class="nav-icon fa fa-calculator"></i>
                        <p>
                            <i class="fas fa-angle-left right"></i>
                            Recargos
                        </p>
                    </a>
                    <ul class="nav nav-treeview">
                        <li class="nav-item">
                            <a href="./recargosPlantaPermanente.php" class="nav-link" style="color: white;">
                                <i class="far fa-circle nav-icon text-success"></i>
                                <p>Planta Permanente</p>
                            </a>
                        </li>

                        <li class="nav-item">
                            <a href="./recargosPlantaTemporal.php" class="nav-link" style="color: white;">
                                <i class="far fa-circle nav-icon text-success"></i>
                                <p>Planta Temporal</p>
                            </a>
                        </li>
                    </ul>
                </li>

                <!-- Tablas básicas -->
                <li class="nav-item has-treeview">
                    <a href="#" class="nav-link" style="color: white;">

                        <i class="nav-icon fa-solid fa-gears"></i>
                        <p>
                            <i class="fas fa-angle-left right"></i>
                            Tablas Básicas
                        </p>
                    </a>
                    <ul class="nav nav-treeview">
                        <li class="nav-item">
                            <a href="./cargos.php" class="nav-link" style="color: white;">
                                <i class="far fa-circle nav-icon text-success"></i>
                                <p>Cargos</p>
                            </a>
                        </li>

                        <li class="nav-item">
                            <a href="./contratos.php" class="nav-link" style="color: white;">
                                <i class="far fa-circle nav-icon text-success"></i>
                                <p>Contratos</p>
                            </a>
                        </li>

                        <li class="nav-item">
                            <a href="./generos.php" class="nav-link" style="color: white;">
                                <i class="far fa-circle nav-icon text-success"></i>
                                <p>Géneros</p>
                            </a>
                        </li>

                        <li class="nav-item">
                            <a href="./profesiones.php" class="nav-link" style="color: white;">
                                <i class="far fa-circle nav-icon text-success"></i>
                                <p>Profesiones</p>
                            </a>
                        </li>

                        <li class="nav-item">
                            <a href="./servicios.php" class="nav-link" style="color: white;">
                                <i class="far fa-circle nav-icon text-success"></i>
                                <p>Servicios</p>
                            </a>
                        </li>
                    </ul>
                </li>

                <!-- Novedades -->
                <li class="nav-item has-treeview">
                    <a href="#" class="nav-link" style="color: white;">


                        <i class="nav-icon fa-solid fa-table-list"></i>
                        <p>
                            <i class="fas fa-angle-left right"></i>
                            Novedades
                        </p>
                    </a>
                    <ul class="nav nav-treeview">


                        <li class="nav-item">
                            <a href="./novedades.php" class="nav-link" style="color: white;">
                                <i class="far fa-circle nav-icon text-success"></i>
                                <p>Registrar novedad</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="./editarNovedades.php" class="nav-link" style="color: white;">
                                <i class="far fa-circle nav-icon text-success"></i>
                                <p>Consultar novedades</p>
                            </a>
                        </li>
                    </ul>
                </li>

                <!-- Reportes -->
                <li class="nav-item has-treeview">
                    <a href="#" class="nav-link" style="color: white;">
                        <!-- <i class="nav-icon fas fa-table"></i>-->
                        <i class="nav-icon fas fa-chart-pie"></i>
                        <p>
                            <i class="fas fa-angle-left right"></i>
                            Reportes
                        </p>
                    </a>
                    <ul class="nav nav-treeview">
                        <li class="nav-item">
                            <a href="./reportes.php" class="nav-link" style="color: white;">
                                <i class="far fa-circle nav-icon text-success"></i>
                                <p>Novedades</p>
                            </a>
                        </li>

                        <li class="nav-item">
                            <a href="reporRecargo.php" class="nav-link" style="color: white;">
                                <i class="far fa-circle nav-icon text-success"></i>
                                <p>Recargos</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="reporteTurnos.php" class="nav-link" style="color: white;">
                                <i class="far fa-circle nav-icon text-success"></i>
                                <p>Turnos</p>
                            </a>
                        </li>
                    </ul>
                </li>

                <!-- LABELS -->
                <br>
                <li class="nav-item">
                    <a href="./lib/logout.php" class="nav-link" style="color: white;">
                        <i class="nav-icon fas fa-power-off text-black"></i>
                        <p>Cerrar Sesión </p>
                    </a>
                </li>
            </ul>
        </nav>
        <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
</aside>
<!-- /.Main Sidebar Container -->

<!-- Estilos -->
<style>
    .color-palette {
        height: 35px;
        line-height: 35px;
        text-align: right;
        padding-right: .75rem;
    }

    .color-palette.disabled {
        text-align: center;
        padding-right: 0;
        display: block;
    }

    .color-palette-set {
        margin-bottom: 15px;
    }

    .color-palette span {
        display: none;
        font-size: 12px;
    }

    .color-palette:hover span {
        display: block;
    }

    .color-palette.disabled span {
        display: block;
        text-align: left;
        padding-left: .75rem;
    }

    .color-palette-box h4 {
        position: absolute;
        left: 1.25rem;
        margin-top: .75rem;
        color: rgba(255, 255, 255, 0.8);
        font-size: 12px;
        display: block;
        z-index: 7;
    }

    .sidebar-dark-blue {
        background: #157e70 !important;
        text-decoration-color: rgb(255, 255, 255);
    }

    .sidebar-blue2 {
        background: #108b7b;
        text-decoration-color: rgb(255, 255, 255);
    }

    .decoration {
        text-decoration: none;
    }
</style>
<!--  -->