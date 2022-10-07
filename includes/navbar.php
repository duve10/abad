<nav class="navbar navbar-expand navbar-light navbar-bg">
    <a class="sidebar-toggle js-sidebar-toggle">
        <i class="hamburger align-self-center"></i>
    </a>

    <div class="navbar-collapse collapse">
        <ul class="navbar-nav navbar-align">
           
          
            <li class="nav-item dropdown">
                <a class="nav-icon dropdown-toggle d-inline-block d-sm-none" href="#" data-bs-toggle="dropdown">
                    <i class="align-middle" data-feather="settings"></i>
                </a>

                <a class="nav-link dropdown-toggle d-none d-sm-inline-block" href="#" data-bs-toggle="dropdown">
                    <img src="<?= URL ?>/img/avatar/<?= $_SESSION["foto"] != '' ? $_SESSION["foto"] : "fotoUserDefault.jpg"; ?>" class="avatar img-fluid rounded me-1" alt="Charles Hall" />
                    <span class="text-dark"><?= $_SESSION["nombres"].' '.$_SESSION["apellido_paterno"] ?></span>
                </a>
                <div class="dropdown-menu dropdown-menu-end">
                    <a class="dropdown-item" href="pages-profile.html"><i class="align-middle me-1" data-feather="user"></i>
                        Perfil</a>
               
                    <div class="dropdown-divider"></div>
                   
                    <a class="dropdown-item" href="#"><i class="align-middle me-1" data-feather="help-circle"></i>
                        Ayuda</a>
                    <div class="dropdown-divider"></div>
                    <a class="dropdown-item" href="cerrar_sesion">Cerrar Sesión</a>
                </div>
            </li>
        </ul>
    </div>
</nav>