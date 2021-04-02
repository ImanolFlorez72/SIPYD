<?php
    require_once("../Controlador/conexion.php");
    include("../Modelo/Funcionario.php");
?>

<div class="row">
    <div class="col-sm-12">
        <div class="table-responsive"> 
        <table id="example" class="table table-bordered table-dark" style="width:100%">
            <thead>
            <tr>
                <td>Codigo</td>
                <td>Nombre</td>
                <td>Apellido</td>
                <td>Documento (C.C)</td>
                <td>Correo</Em></td>
                <td>Oficiona</td>
                <td>Cuenta</td>
                <td>Editar</td>
                <td>Eliminar</td>
            </tr>
        </thead>
            <?php
            $conexion = new Conexion();
            $conx = $conexion->Conectar();
            $sql = "SELECT f.`f_cood`, f.`f_nombre`, f.`f_apellido`, f.`f_documento`, f.`f_correo`, o.`o_descripcion`, tc.`tc_descripcion`
            FROM `funcionario` AS f, `oficina` AS o, `cuenta` AS c, `tipo_cuenta` AS tc
            WHERE f.`o_cood`= o.`o_cood` AND f.`c_cood` = c.`c_cood` AND c.`tc_cood` = tc.`tc_cood`";
            $result = mysqli_query($conx,$sql);
            while($ver = mysqli_fetch_row($result)){
                $datos = $ver[0]."||". 
                        $ver[1]."||".
                        $ver[2]."||".
                        $ver[3]."||".
                        $ver[4]."||".
                        $ver[5]."||".
                        $ver[6];
                
            ?>
            <tr>
                <td><?php echo $ver[0]; ?></td>
                <td><?php echo $ver[1]; ?></td>
                <td><?php echo $ver[2]; ?></td>
                <td><?php echo $ver[3]; ?></td>
                <td><?php echo $ver[4]; ?></td>
                <td><?php echo $ver[5]; ?></td>
                <td><?php echo $ver[6]; ?></td>
                <td><button class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#modalEditarF" onclick="agregarFormFunc('<?php echo $datos ?>')"><i class="far fa-edit"></i></button></td>
                <td><button class="btn btn-danger" onclick="preguntarF('<?php echo $ver[0] ?>')"><i class="far fa-trash-alt"></i></button> </td>
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