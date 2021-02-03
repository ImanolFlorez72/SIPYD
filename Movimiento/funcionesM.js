function registrarM(id, estado, fechaSalida, fechaEntrada, funAutoriza, funEntrega, funRecibe, tipoM){
    let cadena = 'id=' + id +
                '&estado=' + estado +
                '&fechaSalida=' + fechaSalida +
                '&fechaEntrada=' + fechaEntrada +
                '&funAutoriza=' + funAutoriza +
                '&funEntrega=' + funEntrega +
                '&funRecibe=' + funRecibe + 
                'tipoM=' + tipoM;



        $.ajax({
        type:'POST',
        url: 'agregarMt.php',
        data: cadena,
        success: function(){
            $('#tablaPrestamo').load('tabla_movimiento.php');
        }
    });
}