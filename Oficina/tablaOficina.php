<?php 
require_once("../Controlador/conexion.php");
?>
<div class="row">
    <div class="col-sm-12">
        <div class="table-responsive">  
            <table id="example" class="table table-bordered table-dark" style="width:100%">
                <thead>
                    <tr>
                        <th scope="col">Código De Oficina</th>
                        <th scope="col">Nombre De Oficina</th>
                        <th scope="col">Opcion Editar</th>
                        <th scope="col">Opcion Eliminar</th>
                    </tr>
               </thead>
                <?php 
                $conexion=new Conexion();
                $conx = $conexion->Conectar();
                $sql="SELECT o_cood, o_descripcion FROM oficina";
                $result = mysqli_query($conx,$sql);
                while($ver=mysqli_fetch_row($result)){
                    $datos = $ver[0]."||". 
                    $ver[1];
                    ?>


                    <tr>
                        <td><?php echo $ver[0]; ?></td>
                        <td><?php echo $ver[1]; ?></td>
                        <td>
                            <button class="btn btn-primary" id="Editar" data-bs-toggle="modal" data-bs-target="#modalEditarO" onclick="agregaform('<?php echo $datos ?>')">Editar</button>
                        </td>
                        <td>
                            <button class="btn btn-danger" onclick="preguntarO('<?php echo $ver[0] ?>')"> Eliminar </button>
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
