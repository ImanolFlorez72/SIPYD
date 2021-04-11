function cleanOfi() {
    $('#nombreoficina').val('');
    $('#codigooficina').val('');
    
}

function agregarO(nombre,codigo){
    let cadena = "nombre=" + nombre + "&codigo=" + codigo;
                
    $.ajax({
        type: 'POST',
        url: 'agregarO.php',
        data: cadena,
        success: function() {
            alertify.success("Agregado con exito");
            $('#tablaOficina').load('tablaOficina.php'); 
            
        }
    });
}

function agregaFormOfi(datos){
    let d = datos.split('||');
    $('#idO').val(d[0]);
    $('#nombreO').val(d[1]);
}

function actualizaO() {
    nombre = $('#nombreO').val();
    codigo=$('#idO').val();
    
    let cadena = "nombre=" + nombre + "&codigo=" + codigo;

    $.ajax({
        type: "POST",
        url: "actualizaO.php",
        data: cadena,
        success: function (r) {
            $('#tablaOficina').load('tablaOficina.php');
            alertify.success("Actualizado con exito");      
        }
    });
}

function preguntarO(id){
    alertify.confirm('Eliminar Elemento', 'Desea elimnar este elemento?', function(){ eliminarO(id) }
                , function(){ alertify.error('Cancel')});
}

function eliminarO(id) {
    let cadena = "id=" + id;

    $.ajax({
        type: "POST",
        url: "eliminarO.php",
        data: cadena,
        success: function() {
            $('#tablaOficina').load('tablaOficina.php');
            alertify.success("Proceso con exito");
        }
    })
}