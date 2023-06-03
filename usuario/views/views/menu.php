<!-- ======= Header ======= -->
<header id="header" class="header fixed-top d-flex align-items-center">
  <div class="d-flex align-items-center justify-content-between">
    <a href="index.html" class="logo d-flex align-items-center">
      <img src="assets/img/logo.png" alt="">
      <span class="d-none d-lg-block">NiceAdmin</span>
    </a>
    <i class="bi bi-list toggle-sidebar-btn"></i>
  </div><!-- End Logo -->

  <nav class="header-nav ms-auto">
    <ul class="d-flex align-items-center">
      <li class="nav-item d-block d-lg-none">
        <a class="nav-link nav-icon search-bar-toggle " href="#">
          <i class="bi bi-search"></i>
        </a>
      </li><!-- End Search Icon-->
      <li class="nav-item dropdown pe-3">
        <a class="nav-link nav-profile d-flex align-items-center pe-0" href="#" data-bs-toggle="dropdown">
          <span class="d-none d-md-block dropdown-toggle ps-2"><?php echo($_SESSION['usuario']); ?></span>
        </a><!-- End Profile Iamge Icon -->
    </ul>
  </nav><!-- End Icons Navigation -->

</header><!-- End Header -->
<!-- ======= Sidebar ======= -->
<aside id="sidebar" class="sidebar">

  <ul class="sidebar-nav" id="sidebar-nav">

    <li class="nav-item">
      <a class="nav-link " href="index.php">
        <i class="bi bi-grid"></i>
        <span>Inicio</span>
      </a>
    </li><!-- End Dashboard Nav -->

    <li class="nav-item">
      <a class="nav-link collapsed" data-bs-target="#components-nav" data-bs-toggle="collapse" href="#">
        <i class="bi bi-menu-button-wide"></i><span>Registrar Equipos</span><i class="bi bi-chevron-down ms-auto"></i>
      </a>
      <ul id="components-nav" class="nav-content collapse " data-bs-parent="#sidebar-nav">
        <li>
          <a href="equipo.php">
            <i class="bi bi-circle"></i><span>Equipos</span>
          </a>
        </li>
        <li>
          <a href="servidor.php">
            <i class="bi bi-circle"></i><span>Servidor</span>
          </a>
        </li>
      </ul>
    </li><!-- End Components Nav -->

    <li class="nav-item">
      <a class="nav-link collapsed" data-bs-target="#forms-nav" data-bs-toggle="collapse" href="#">
        <i class="bi bi-journal-text"></i><span>Catálogos</span><i class="bi bi-chevron-down ms-auto"></i>
      </a>
      <ul id="forms-nav" class="nav-content collapse " data-bs-parent="#sidebar-nav">
        <li>
          <a href="pu.php">
            <i class="bi bi-circle"></i><span>Puntos de Ubicación</span>
          </a>
        </li>
        <li>
          <a href="area.php">
            <i class="bi bi-circle"></i><span>Áreas</span>
          </a>
        </li>
        <li>
          <a href="dependencia.php">
            <i class="bi bi-circle"></i><span>Dependencias</span>
          </a>
        </li>
        <li>
          <a href="tipo_equipo.php">
            <i class="bi bi-circle"></i><span>Tipo de Equipo</span>
          </a>
        </li>
        <li>
          <a href="funcion.php">
            <i class="bi bi-circle"></i><span>Función del Equipo</span>
          </a>
        </li>
        <li>
          <a href="marca_equipo.php">
            <i class="bi bi-circle"></i><span>Marca del Equipo</span>
          </a>
        </li>
        <li>
          <a href="modelo.php">
            <i class="bi bi-circle"></i><span>Modelo del Equipo</span>
          </a>
        </li>
        <li>
          <a href="tipo_servidor.php">
            <i class="bi bi-circle"></i><span>Tipo de Servidor</span>
          </a>
        </li>
        <li>
          <a href="sistema_operativo.php">
            <i class="bi bi-circle"></i><span>Sistema Operativo</span>
          </a>
        </li>
        <li>
          <a href="tipo_dd.php">
            <i class="bi bi-circle"></i><span>Tipo de Disco Duro</span>
          </a>
        </li>
        <li>
          <a href="marca_procesador.php">
            <i class="bi bi-circle"></i><span>Marca de Procesador</span>
          </a>
        </li>
        <li>
          <a href="procesador.php">
            <i class="bi bi-circle"></i><span>Modelo de Procesador</span>
          </a>
        </li>
        <li>
          <a href="usuario_servidor.php">
            <i class="bi bi-circle"></i><span>Usuarios del Servidor</span>
          </a>
        </li>
      </ul>
    </li><!-- End Forms Nav -->
    <li class="nav-heading">Pages</li>
    <li class="nav-item">
      <a class="nav-link collapsed" data-bs-target="#charts-nav" data-bs-toggle="collapse" href="#">
        <i class="bi bi-person"></i><span>Utilerías</span><i class="bi bi-chevron-down ms-auto"></i>
      </a>
      <ul id="charts-nav" class="nav-content collapse " data-bs-parent="#sidebar-nav">
        <li>
          <a href="usuario.php">
            <i class="bi bi-circle"></i><span>Usuarios</span>
          </a>
        </li>
        <li>
          <a href="rol.php">
            <i class="bi bi-circle"></i><span>Roles</span>
          </a>
        </li>
        <li>
          <a href="privilegio.php">
            <i class="bi bi-circle"></i><span>Privilegios</span>
          </a>
        </li>
      </ul>
    </li><!-- End Charts Nav -->
    <li class="nav-item">
      <a class="nav-link collapsed" href="../login.php?action=logout">
        <i class="bi bi-box-arrow-in-right"></i>
        <span>Cerrar Sesión</span>
      </a>
    </li><!-- End Login Page Nav -->
  </ul>
</aside><!-- End Sidebar-->