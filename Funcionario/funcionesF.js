function agregarF(identificacion,nombre,apellido,documento,mail,oficiona,cuenta,usuario,contrasena){
    
    let cadena = 'id=' + identificacion +
                '&nombre=' + nombre +
                '&apellido=' + apellido +
                '&documento=' + documento +
                '&mail=' + mail +
                '&oficina=' + oficiona +
                '&cuenta=' + cuenta +
                '&usuario=' + usuario +
                '&contrasena=' + contrasena;
                

    $.ajax({
        type: 'POST',
        url: 'agregarF.php',
        data: cadena,
        success: function(r) {
            alertify.success("Agregado con exito");
            $('#tablaFuncionario').load('tablaFunc.php');
        }

    });
    
}

function agregarFormFunc(datos) {
    let d = datos.split('||');

    $('#idF').val(d[0]);
    $('#nombreF').val(d[1]);
    $('#apellidoF').val(d[2]);
    $('#DocumentoF').val(d[3]);
    $('#mailF').val(d[4]);
    $('#oficionaF > option[value="0"]').text(d[5]);
    $('#cuentaF > option[value="0"]').text(d[6]);
    
}


function actualizaF(oficionaF, cuentaF) {
    identificacion = $('#idF').val();
    nombre = $('#nombreF').val();
    apellido = $('#apellidoF').val();
    documento = $('#DocumentoF').val();
    mail = $('#mailF').val();
    oficina = oficionaF;
    cuenta = cuentaF;

    let cadena = 'id=' + identificacion +
                '&nombre=' + nombre +
                '&apellido=' + apellido +
                '&documento=' + documento +
                '&mail=' + mail +
                '&oficina=' + oficina +
                '&cuenta=' + identificacion;
                alert(cadena);

    $.ajax({
        type: 'POST',
        url: 'actualizaF.php',
        data: cadena,
        success: function(r) {
            alertify.success("Actualizado con exito");
            $('#tablaFuncionario').load('tablaFunc.php');
        }
    });
 
}
function preguntarF(id){
    alertify.confirm('Eliminar Elemento', 'Desea elimnar este elemento?', function(){ eliminarF(id) }
                , function(){ alertify.error('Cancel')});
}
function eliminarF(id) {
    let cadena = "id=" + id;

    $.ajax({
        type: "POST",
        url: "eliminarF.php",
        data: cadena,
        success: function() {
            alertify.success("Eliminado con exito");
            $('#tablaFuncionario').load('tablaFunc.php');
        }
    })
}