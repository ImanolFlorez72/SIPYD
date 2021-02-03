<!-- Menu principal -->
<nav class="navbar navbar-expand-lg navbar-light bg-light">
  <a class="navbar-brand"><img src="../Img/Alcaldia.png" style="width:200px; height:85px;"></a>
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavDropdown" aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>
  <div class="collapse navbar-collapse" id="navbarNavDropdown">
    <ul class="navbar-nav">
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
      <li class="nav-item dropdown">
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
  <a href="../Vistas/Login.php"><button type="button" class="btn btn-danger" style="margin-left: 10px"><strong>Cerrar Sesion </strong></button></a>
</nav>