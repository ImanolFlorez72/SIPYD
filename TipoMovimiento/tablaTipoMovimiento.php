<?php
require_once("../Controlador/conexion.php");
?>
<div class="row">
  <div class="col-sm-12">
    <table class="table table-dark table-hover table-condensed table-bordered">

      <thead>
        <tr>

          <th scope="col">Código</th>
          <th scope="col">Descripción</th>
          <th scope="col">Editar</th>
          <th scope="col">Eliminar</th>

        </tr>
      </thead>

      <?php
      $conexion = new Conexion();
      $conx = $conexion->Conectar();
      $sql = "SELECT * FROM tipo_movimiento";
      $result = mysqli_query($conx, $sql);
      while ($ver = mysqli_fetch_row($result)) {

        $datos = $ver[0] . "||" .
          $ver[1];
      ?>
        <tr>

          <td><?php echo $ver[0]; ?></td>
          <td><?php echo $ver[1]; ?></td>
          <td>
            <button class="btn btn-primary" id="Editar" data-bs-toggle="modal" data-bs-target="#modalEditarTM" onclick="agregaform('<?php echo $datos ?>')">Editar</button>
          </td>
          <td>
            <button class="btn btn-danger" onclick="preguntarTM('<?php echo $ver[0] ?>')"> Eliminar </button>
          </td>
        </tr>
      <?php
      }
      ?>

    </table>
  </div>
</div>