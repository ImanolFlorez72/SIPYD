<?php
    require_once("../Controlador/conexion.php");
    $conx = new Conexion();
?>
<div class="container">
  <div class="table-responsive">
  <table id="example" class="table table-bordered table-dark" style="width:100%">
    <thead>
      <tr>
        <th scope="col">Código </th>
        <th scope="col">Fecha/Salida</th>
        <th scope="col">Estado</th>
        <th scope="col">Tipo/Movimiento</th>
        <th scope="col">Fecha/Entrega</th>
        <th scope="col">F/Autoriza</th>
        <th scope="col">F/Entrega</th>
        <th scope="col">F/Recibe</th>
        <th scope="col">Editar</th>
        <th scope="col">Eliminar</th>

      </tr>
    </thead>

    <?php
    $conx = $conx->Conectar();
    $sql = "SELECT m.`m_cod`, m.`m_fecha_salida`, m.`m_estado`, tm.`tm_movimiento`, m.`m_fecha_estipulada` 
            FROM movimiento AS m, tipo_movimiento AS tm WHERE m.`tm_cod` = tm.`tm_cod`";
    
    $sqlFa = "SELECT f.`f_nombre` FROM movimiento AS m, funcionario AS f WHERE m.`m_autoriza` = f.`f_cood`";
    $re = mysqli_query($conx, $sqlFa);

    $sqlFe = "SELECT f.`f_nombre` FROM movimiento AS m, funcionario AS f WHERE m.`m_entrega` = f.`f_cood` ORDER BY f.`f_nombre` DESC";
    $re2 = mysqli_query($conx, $sqlFe);
    
    $sqlFr = "SELECT f.`f_nombre` FROM movimiento AS m, funcionario AS f WHERE m.`m_recibe` = f.`f_cood` ORDER BY f.`f_nombre` ASC";
    $re3 = mysqli_query($conx, $sqlFr);

    $r1 = mysqli_query($conx,$sql);
    while($ver1 = mysqli_fetch_row($r1)){
    ?>
    <tr>
      <td><?php echo $ver1[0];?></td>
      <td><?php echo $ver1[1];?></td>
      <td><?php echo $ver1[2];?></td>
      <td><?php echo $ver1[3];?></td>
      <td><?php echo $ver1[4];?></td>

      <?php while($ver2 = mysqli_fetch_row($re)){?> 
      <td><?php echo $ver2[0];?></td>
      <?php break; }?>

      <?php while($ver3 = mysqli_fetch_row($re2)){?>
      <td><?php echo $ver3[0];?></td>
      <?php break; }?>
      
      <?php while($ver4 = mysqli_fetch_row($re3)){?>
      <td><?php echo $ver4[0];?></td>
      <?php break; }?>


      <td><button type="button" class="btn btn-success">Editar</button></td>
      <td><button type="button" class="btn btn-danger">Eliminar</button></td>
    <?php }?>
    </tr>
    </tbody>
  </table>
</div>
</div>
<script type="text/javascript">
    $(document).ready(function() {    
    $('#example').DataTable({
    //para cambiar el lenguaje a español
        "language": {
                "lengthMenu": "Mostrar _MENU_ registros",
                "zeroRecords": "No se encontraron resultados",
                "info": "Mostrando registros del _START_ al _END_ de un total de _TOTAL_ registros",
                "infoEmpty": "Mostrando registros del 0 al 0 de un total de 0 registros",
                "infoFiltered": "(filtrado de un total de _MAX_ registros)",
                "sSearch": "Buscar:",
                "oPaginate": {
                    "sFirst": "Primero",
                    "sLast":"Último",
                    "sNext":"Siguiente",
                    "sPrevious": "Anterior"
                 },
                 "sProcessing":"Procesando...",
            }
    });     
});
</script>
