function agregarTM(nombre,codigo){
    let cadena = "nombre=" + nombre +
                 "&codigo=" + codigo;
                
    
    $.ajax({
        type: 'POST',
        url: 'agregarTM.php',
        data: cadena,
        success: function() {
            
                alertify.success("Agregado con exito");
                $('#tablaTipoMovimiento').load('tablaTipoMovimiento.php');
           
            
        }
    });
}

function agregaform(datos){
    let d = datos.split('||');
    
    $('#idTM').val(d[0]);
    $('#nombreTM').val(d[1]);
    
      
}

function actualizaTM() {
    nombre = $('#nombreTM').val();
    codigo=$('#idTM').val();
    
   
   
    let cadena = "nombre=" + nombre
                    + "&codigo=" + codigo;

    $.ajax({
        type: "POST",
        url: "actualizaTM.php",
        data: cadena,
        success: function (r) {
           
                $('#tablaTipoMovimiento').load('tablaTipoMovimiento.php');
                alertify.success("Actualizado con exito");
                   
        }
    });
}

function preguntarTM(id){
    alertify.confirm('Eliminar Elemento', 'Desea elimnar este elemento?', function(){ eliminarTM(id) }
                , function(){ alertify.error('Cancel')});
}

function eliminarTM(id) {
    let cadena = "id=" + id;

    $.ajax({
        type: "POST",
        url: "eliminaTM.php",
        data: cadena,
        success: function() {
           
            $('#tablaTipoMovimiento').load('tablaTipoMovimiento.php');
    
                
            
            
        }
    })
}