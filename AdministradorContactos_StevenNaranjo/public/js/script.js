
function login(nombre, contrasena) {

    var parametros = {"nombre": nombre, "contrasena": contrasena};
    $.ajax({
        data: parametros,
        url: '?controlador=Usuario&accion=login',
        type: 'post',
        beforeSend: function () {
            $("#resultadoLogin").html("Espere un momento por favor...");
        },
        success: function (response) {
            if (Number(response) === 1) {
                $(location).attr('href', '?controlador=Usuario&accion=redirecionLogin');
            } else {
                $("#resultadoLogin").html("Error al ingresar los datos, verifique que sean los correctos.      ", response);
            }
        }
    }
    );

} // 

function registrar(nombre, contrasena) {

    var parametros = {"nombre": nombre, "contrasena": contrasena};
    $.ajax({
        data: parametros,
        url: '?controlador=Usuario&accion=registrar',
        type: 'post',
        beforeSend: function () {
            $("#resultadoRegistro").html("Espere un momento por favor...");
        },
        success: function (response) {

//            $("#resultadoRegistro").html(response);
            if (Number(response) === 1) {
                $(location).attr('href', '?controlador=Usuario&accion=redirecionLogin');
            } else {
                $("#resultadoRegistro").html("Estos datos ya han sido ingresados en el sistema previamente, por favor cambie las credenciales", response);
            }

        }

    }
    );

}


function actualizarContacto2(nick, nombre, correo, telefono, edad, provincia, genero) {

    var parametros = {"nick": nick, "nombre": nombre, "correo": correo, "telefono": telefono, "edad": edad, "provincia": provincia, "genero": genero};
    $.ajax({
        data: parametros,
        url: '?controlador=Usuario&accion=actualizarContacto',
        type: 'post',
        beforeSend: function () {
            $("#resultadoActualizacionContacto").html("Espere un momento por favor...");
        },
        success: function (response) {

            $(location).attr('href', '?controlador=Usuario&accion=redirecionLogin');
        }
    }
    );

}

function eliminarContacto(nick) {

    var parametros = {"nick": nick};
    $.ajax({
        data: parametros,
        url: '?controlador=Usuario&accion=eliminarContacto',
        type: 'post',
        beforeSend: function () {
            $("#resultadoRegistro").html("Espere un momento por favor...");
             },
            success: function (response) {
                $(location).attr('href', '?controlador=Usuario&accion=redirecionLogin');

            
        }
    }
    );

}









