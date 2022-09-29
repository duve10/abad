<nav id="sidebar" class="sidebar js-sidebar">
    <div class="sidebar-content js-simplebar">
        <a class="sidebar-brand" href="index">
            <!-- <span class="align-middle">Abad Asociados</span> -->
            <img class="logoDash" src="<?= URL ?>/img/empresa/logo-blanco.png" alt="">
        </a>

        <ul class="sidebar-nav">
            <li class="sidebar-header">Datos</li>

            <li class="sidebar-item <?php echo $active_empresas; ?>">
                <a class="sidebar-link" href="empresas">
                    <i class="align-middle" data-feather="sliders"></i>
                    <span class="align-middle">Empresas</span>
                </a>
            </li>

            <?php if ($_SESSION["idrol"] === '1' || $_SESSION["idrol"] === '3') : ?>
                <li class="sidebar-item <?php echo $active_usuarios; ?>">
                    <a class="sidebar-link" href="usuarios">
                        <i class="align-middle" data-feather="user"></i>
                        <span class="align-middle">Usuarios</span>
                    </a>
                </li>
            <?php endif; ?>
            <li class="sidebar-item">
                <a href="#auth" data-bs-toggle="collapse" class="sidebar-link collapsed" aria-expanded="false">
                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-users align-middle">
                        <path d="M17 21v-2a4 4 0 0 0-4-4H5a4 4 0 0 0-4 4v2"></path>
                        <circle cx="9" cy="7" r="4"></circle>
                        <path d="M23 21v-2a4 4 0 0 0-3-3.87"></path>
                        <path d="M16 3.13a4 4 0 0 1 0 7.75"></path>
                    </svg> <span class="align-middle">Maestros</span>
                </a>
                <ul id="auth" class="sidebar-dropdown list-unstyled collapse" data-bs-parent="#sidebar">
                    <li class="sidebar-item"><a class="sidebar-link" href="pages-sign-in.html">Tipos</a></li>
                    <li class="sidebar-item"><a class="sidebar-link" href="pages-sign-up.html">Tipos 2</a></li>
                </ul>
            </li>

            <li class="sidebar-header">Formularios</li>

            <li class="sidebar-item">
                <a class="sidebar-link" href="ui-buttons.html">
                    <i class="align-middle" data-feather="square"></i>
                    <span class="align-middle">Formulario 1</span>
                </a>
            </li>

            <li class="sidebar-item">
                <a class="sidebar-link" href="ui-forms.html">
                    <i class="align-middle" data-feather="check-square"></i>
                    <span class="align-middle">Formulario 2</span>
                </a>
            </li>

        </ul>

        <!-- <div class="sidebar-cta">
            <div class="sidebar-cta-content">
                <strong class="d-inline-block mb-2">Upgrade to Pro</strong>
                <div class="mb-3 text-sm">
                    Are you looking for more components? Check out our premium
                    version.
                </div>
                <div class="d-grid">
                    <a href="upgrade-to-pro.html" class="btn btn-primary">Upgrade to Pro</a>
                </div>
            </div>
        </div> -->
    </div>
</nav>