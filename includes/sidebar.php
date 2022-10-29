<nav id="sidebar" class="sidebar js-sidebar">
    <div class="sidebar-content js-simplebar">
        <a class="sidebar-brand" href="<?= URL ?>/index">
            <!-- <span class="align-middle">Abad Asociados</span> -->
            <img class="logoDash" src="<?= URL ?>/img/empresa/logo-blanco.png" alt="">
        </a>

        <ul class="sidebar-nav">
            <li class="sidebar-header">Datos</li>

            <li class="sidebar-item <?php echo $active_empresas; ?>">
                <a class="sidebar-link" href="<?= URL ?>/empresas">
                    <i class="align-middle" data-feather="briefcase"></i>
                    <span class="align-middle">Empresas</span>
                </a>
            </li>

            <?php if ($_SESSION["idrol"] === '1' || $_SESSION["idrol"] === '3') : ?>
                <li class="sidebar-item <?php echo $active_usuarios; ?>">
                    <a class="sidebar-link" href="<?= URL ?>/usuarios">
                        <i class="align-middle" data-feather="users"></i>
                        <span class="align-middle">Usuarios</span>
                    </a>
                </li>
            <?php endif; ?>
            <li class="sidebar-item <?php echo $active_maestros ?>">
                <a href="#auth" data-bs-toggle="collapse" class="sidebar-link">
                    <i class="align-middle" data-feather="folder-minus"></i>
                    <span class="align-middle">Maestros</span>
                </a>
                <ul id="auth" class="sidebar-dropdown list-unstyled collapse <?php echo $active_maestros != '' ? "show" : ''; ?>" data-bs-parent="#sidebar">
                    <li class="sidebar-item <?php echo $active_calificacion; ?>"><a class="sidebar-link" href="<?= URL ?>/calificacion">Calificación</a></li>
                    
                    <li class="sidebar-item <?php echo $active_propiedad; ?>"><a class="sidebar-link" href="<?= URL ?>/propiedad">Propiedad</a></li>

                </ul>
            </li>

            <li class="sidebar-header">Auditoria</li>

            <li class="sidebar-item <?php echo $active_auditoria; ?>">
                <a class="sidebar-link" href="<?= URL ?>/auditoria">
                    <i class="align-middle" data-feather="shield"></i>
                    <span class="align-middle">Auditorias</span>
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