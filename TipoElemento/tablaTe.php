<?php
include("../Controlador/conexion.php");
?>
<div class="container">
    <div class="table-responsive"> 
    <table id="example" class="table table-bordered table-dark" style="width:100%">
        <thead>
            <tr>
                <th scope="col">Código</th>
                <th scope="col">Descripción</th>
                <th scope="col">Editar</th>
                <th scope="col">Eliminar</th>
            </tr>
        </thead>
        <?php 
 $conexion=new Conexion();
 $conx = $conexion->Conectar();
 $sql="SELECT * FROM tipo_elemento";
 $result = mysqli_query($conx,$sql);
 while($ver=mysqli_fetch_row($result)){
                    
    $datos = $ver[0]."||". 
            $ver[1];
            

?>
            <tr>

                <td><?php echo $ver[0]; ?></td>
                <td><?php echo $ver[1]; ?></td>
                <td><button class="btn btn-primary" id="Editar" data-bs-toggle="modal" data-bs-target="#modalEditarTE" onclick="agregaform('<?php echo $datos ?>')">Editar</button></td>
                <td><button class="btn btn-danger" onclick="preguntarTE('<?php echo $ver[0] ?>')"> Eliminar </button></td>
            </tr>
        <?php  } ?>
        </tbody>
    </table>
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