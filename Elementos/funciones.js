
function agregarE(identificacion, descripcion, serial, modelo, estado, obeservacion, tipoElemento){
    let cadena = "identificacion=" + identificacion + 
                "&descripcion=" + descripcion + 
                "&serial=" + serial + 
                "&modelo=" + modelo +
                "&estado=" + estado +
                "&observacion=" + obeservacion +
                "&tipoElemento=" + tipoElemento;
    
    $.ajax({
        type: 'POST',
        url: 'agregarE.php',
        data: cadena,
        success: function(r) {
            if(r==1){
                alertify.success("Agregado con exito");
                $('#tabla').load('tabla.php');
            }else{
                alertify.error("Fallo del servidor");
            }
            
        }
    });
}

function agregarFormElem(datos){
    let d = datos.split('||');
    
    $('#identificacion_elementoE').val(d[0]);
    $('#descripcion_elementoE').val(d[1]);
    $('#serial_elementoE').val(d[2]);
    $('#modelo_elementoE').val(d[3]);
    $('#estado_elementoE > option[value="0"]').text(d[4]);
    $('#observacion_elementoE').val(d[5]);
    $('#tipo_elementoE > option[value="0"]').text(d[6]);
      
}

function actualizaE(estadoE,TipoE) {
    identificacion = $('#identificacion_elementoE').val();
    descripcion = $('#descripcion_elementoE').val();
    serial = $('#serial_elementoE').val();
    modelo = $('#modelo_elementoE').val();
    estado = estadoE;
    obeservacion = $('#observacion_elementoE').val();
    tipoElemento = TipoE;
   
    let cadena = "identificacion=" + identificacion + 
                "&descripcion=" + descripcion + 
                "&serial=" + serial + 
                "&modelo=" + modelo +
                "&estado=" + estado +
                "&observacion=" + obeservacion +
                "&tipoElemento=" + tipoElemento;
                alert(cadena);
    
    $.ajax({
        type: "POST",
        url: "actualiza.php",
        data: cadena,
        success: function (r) {
            if(r==1){
                $('#tabla').load('tabla.php');
                alertify.success("Actualizado con exito");
            }else{
                alertify.error("Fallo del servidor");
            }          
        }
    });
}

function preguntarE(id){
    alertify.confirm('Eliminar Elemento', 'Desea elimnar este elemento?', function(){ eliminarE(id) }
                , function(){ alertify.error('Cancel')});
}

function eliminarE(id) {
    let cadena = "id=" + id;

    $.ajax({
        type: "POST",
        url: "eliminar.php",
        data: cadena,
        success: function() {
           
            $('#tabla').load('tabla.php');
    
                
            
            
        }
    })
}