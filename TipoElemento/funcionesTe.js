function cleanTe() {
    $('#idTe').val('');
    $('#descripcionTe').val('');
    
}

function agregarTe(idTe,descripcionTe) {
    let cadena = 'id=' + idTe + '&descripcion=' + descripcionTe;

    $.ajax({
        type: 'POST',
        url: 'agregarTe.php',
        data: cadena,
        success: function(){
            alertify.success('Guardado Exitosamente!');
            $('#tablaTe').load('tablaTe.php');
        }
    });
}
function agregaform(datos){
    let d = datos.split('||');
    
    $('#idTE').val(d[0]);
    $('#nombreTE').val(d[1]);
    
      
}

function actualizaTE() {
    nombre = $('#nombreTE').val();
    codigo=$('#idTE').val();
    
   
   
    let cadena = "nombre=" + nombre
                    + "&codigo=" + codigo;

    $.ajax({
        type: "POST",
        url: "actualizaTE.php",
        data: cadena,
        success: function (r) {
           
                $('#tablaTe').load('tablaTe.php');
                alertify.success("Actualizado con exito");
                   
        }
    });
}

function preguntarTE(id){
    alertify.confirm('Eliminar Elemento', 'Desea elimnar este elemento?', function(){ eliminarTE(id) }
                , function(){ alertify.error('Cancel')});
}

function eliminarTE(id) {
    let cadena = "id=" + id;

    $.ajax({
        type: "POST",
        url: "eliminarTE.php",
        data: cadena,
        success: function() {
           
            $('#tablaTe').load('tablaTe.php');
    
                
            
            
        }
    })
}