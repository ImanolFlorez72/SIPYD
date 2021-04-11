<?php 
// ANOTACION: COPIAR Y PEGAR ESTE PHP EN LOS FORMULARIO, Y PONER CORRECTAS LAS RUTAS, PARA QUE REDIRECCIONE AL LOGIN CORRECTAMENTE
  $usuario = $_SESSION['username'];

  if (!isset($usuario)) {
    header("location: Login.php");
  } else {
  
  
?>
<!-- Menu principal -->
  $usuario = $_SESSION['username'];

  if (!isset($usuario)) {
    header("location: Login.php");
  } else {
  
  
?>
<nav class="navbar navbar-expand-lg navbar-light bg-light">
  <a class="navbar-brand" href="../Vistas/indexA.php">
    <img src="../Img/Alcaldia.png" style="width:200px; height:85px;" title="Inicio | Alcaldia de Barranquilla">
  </a>
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavDropdown" aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>
  <div class="collapse navbar-collapse" id="navbarNavDropdown">
    <ul class="navbar-nav">
      <li class="nav-item">
        <a class="nav-link active" href="../Vistas/indexA.php"><strong>Inicio</strong></a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="../Funcionario/Funcionarios.php">Funcionarios</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="../Elementos/Elementos.php">Elementos</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="../Movimiento/prestamo.php">Movimientos</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="historialreserva.php">Devolucion</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="historialreserva.php">Reportes</a>
      </li>
      <li class="nav-item dropdown" style="cursor: pointer;">
        <a class="nav-link dropdown-toggle" id="menuDesplegable" data-bs-toggle="dropdown" aria-expanded="false">
          Opciones
        </a>
        <div class="dropdown-menu" aria-labelledby="menuDesplegable">
          <a class="dropdown-item" href="../Oficina/oficina.php">Oficina</a>
          <a class="dropdown-item" href="../TipoElemento/tipo_elemento.php">Tipo Elemento</a>
          <a class="dropdown-item" href="../TipoMovimiento/tipo_movimiento.php">Tipo Movimiento</a>
        </div>
      </li>
    </ul>
  </div>
  <?php
  echo "
  <span class='navbar-text' style='color: #A0A0A0; font-size: 1rem; margin: 0 0 0 0; cursor: help;' title='Iniciaste sesión como $usuario'>

  <svg xmlns='http://www.w3.org/2000/svg' width='30' height='30' fill='currentColor' class='bi bi-person-circle' viewBox='0 0 16 16'>
  <path d='M11 6a3 3 0 1 1-6 0 3 3 0 0 1 6 0z'/>
  <path fill-rule='evenodd' d='M0 8a8 8 0 1 1 16 0A8 8 0 0 1 0 8zm8-7a7 7 0 0 0-5.468 11.37C3.242 11.226 4.805 10 8 10s4.757 1.225 5.468 2.37A7 7 0 0 0 8 1z'/>
  </svg>

   $usuario </span>";
  ?>
  <div class="vertical-line"></div>
  <a href="../Componentes/salir.php">
    <button type="button" class="btn btn-danger" style="margin-left: 10px">
      <strong>Cerrar Sesion </strong>
    </button>
  </a>
  <?php
  }
  ?>
</nav>