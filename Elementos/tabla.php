
<?php 
require_once("../Controlador/conexion.php");
?>
<div class="row">
    <div class="col-sm-12">
        <div class="table-responsive"> 
        <table id="example" class="table table-bordered table-dark" style="width:100%">
            <thead>
                <tr>
                    <td>Identificacion</td>
                    <td>Descripcion</td>
                    <td>Serial</td>
                    <td>Modelo</td>
                    <td>Estado</Em></td>
                    <td>Observacion</td>
                    <td>Tipo de Elemento</td>
                    <td>Editar</td>
                    <td>Eliminar</td>
                </tr>
            </thead>

            <?php
            $conexion=new Conexion();
            $conx = $conexion->Conectar();
                $sql = "SELECT e.`e_cod`,e.`e_descripcion`,e.`e_serial`,e.`e_modelo`, ee.`ee_descripcion`, e.`e_observacion` ,te.`te_descripcion`
                FROM `elementos` AS e ,`estado_elemento` AS ee,`tipo_elemento` AS te
                WHERE e.`ee_cood`=ee.`ee_cood` AND e.`te_cood`=te.`te_cood`";
                $result = mysqli_query($conx,$sql);

                while($ver=mysqli_fetch_row($result)){
                    
                    $datos = $ver[0]."||". 
                            $ver[1]."||".
                            $ver[2]."||".
                            $ver[3]."||".
                            $ver[4]."||".
                            $ver[5]."||".
                            $ver[6];
                    
            ?>
            
            <tr>
                <td><?php echo $ver[0] ?></td>
                <td><?php echo $ver[1] ?></td>
                <td><?php echo $ver[2] ?></td>
                <td><?php echo $ver[3] ?></td>
                <td><?php echo $ver[4] ?></td>
                <td><?php echo $ver[5] ?></td>
                <td><?php echo $ver[6] ?></td>
                <td>
                    <button class="btn btn-primary" id="Editar" data-bs-toggle="modal" data-bs-target="#modalEditar" onclick="agregarFormElem('<?php echo $datos ?>');"><i class="far fa-edit"></i></button>
                </td>
                <td>
                    <button class="btn btn-danger" onclick="preguntarE('<?php echo $ver[0] ?>')"><i class="far fa-trash-alt"></i></button>
                </td>
            </tr>
            <?php }?>
        </table>
    </div>
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