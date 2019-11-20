function validarCamposObligatorios() {
    var bandera = true
    for (var i = 0; i < document.forms[0].elements.length; i++) {
        var elemento = document.forms[0].elements[i]
        if (elemento.value == '' && elemento.type == 'text') {
            if (elemento.id == 'cedula') {
                document.getElementById('mensajeCedula').innerHTML = '<br>La cedula esta vacia'
            }
            if (elemento.id == 'nombres') {
                document.getElementById('mensajeNombre').innerHTML = '<br>El nombre esta vacio'
            }
            if (elemento.id == 'apellidos') {
                document.getElementById('mensajeApellido').innerHTML = '<br>El apellido esta vacio'
            }
            if (elemento.id == 'direccion') {
                document.getElementById('mensajeDireccion').innerHTML = '<br>La direccion esta vacia'
            }
            if (elemento.id == 'telefono') {
                document.getElementById('mensajeTelefono').innerHTML = '<br>El telefono esta vacio'
            }
            if (elemento.id == 'fecha_nacimiento') {
                document.getElementById('mensajeFecNac').innerHTML = '<br>La fecha de nacimiento esta vacia'
            }


            elemento.style.border = '1px red solid'
            //elemento.className =''
            bandera = false
        }
    }
    if (!bandera) {
        alert('LLene todo porfavor ')
    }
    return bandera
}

function validarcedula() {
    var cad = document.getElementById("cedula").value.trim();
    var total = 0;
    var longitud = cad.length;
    var longcheck = longitud - 1;

    if (cad !== "" && longitud === 10) {
        for (i = 0; i < longcheck; i++) {
            if (i % 2 === 0) {
                var aux = cad.charAt(i) * 2;
                if (aux > 9) aux -= 9;
                total += aux;
            } else {
                total += parseInt(cad.charAt(i)); 
            }
        }

        total = total % 10 ? 10 - total % 10 : 0;

        if (cad.charAt(longitud - 1) == total) {
            document.getElementById("mensajeCedula").innerHTML = ("Cedula Valida");
        } else {
            document.getElementById("mensajeCedula").innerHTML = ("Cedula Invalida");
        }
    }
}

//funcion sololetras
function soloLetras(e) {
    key = e.keyCode || e.which;
    tecla = String.fromCharCode(key).toString();
    //aqui se ponen las letras q estaran permitidas
    letras = " áéíóúabcdefghijklmnñopqrstuvwxyzÁÉÍÓÚABCDEFGHIJKLMNÑOPQRSTUVWXYZ";

    //A continuacion se hara la  validación del KeyCodes, que teclas recibe el campo de texto.
    especiales = [8, 37, 39, 46, 6];

    tecla_especial = false
    for (var i in especiales) {
        if (key == especiales[i]) {
            tecla_especial = true;
            break;
        }
    }
    if (letras.indexOf(tecla) == -1 && !tecla_especial) {
        return false;
    }
}

function soloNumeros(evt) {
    if (window.event) {//asignamos el valor de la tecla que se esta presionando a keynum
        keynum = evt.keyCode;
    }
    else {
        keynum = evt.which;
    }
    //comprobamos si se encuentra en el rango numérico y que teclas no recibirá.
    if ((keynum > 47 && keynum < 58) || keynum == 8 || keynum == 13 || keynum == 6) {
        return true;
    }
    else {
        return false;
    }
}

// Función para verificar que la fecha escrita sea correcta según el formato YYYYMMDD
function validarFecha() {
    // Almacenamos el valor digitado en TxtFecha
    var Fecha = document.getElementById('fecha_nacimiento').value;
    var Mensaje = '';

    // Si la fecha está completa comenzamos la validación
    if (Fecha.length == 10) {
        var Anio = Fecha.substr(6, 4); // Extraemos en año
        var Mes = parseFloat(Fecha.substr(3, 2)) - 1; // Extraemos el mes
        var Dia = Fecha.substr(0, 2); // Extraemos el día

        // Con la función Date() de javascript evaluamos si la fecha existe
        var VFecha = new Date(Anio, Mes, Dia);

        // Si las partes de la fecha concuerdan con las que digitamos, es correcta
        if ((VFecha.getFullYear() == Anio) && (VFecha.getMonth() == Mes) && (VFecha.getDate() == Dia)) {
            Mensaje = 'Fecha correcta';
        }
        else {
            Mensaje = 'Fecha incorrecta';
        }
    }

    // Mostramos el mesaje
    document.getElementById('mensajeFecNac').innerHTML = Mensaje;
}

function validarCorreo(correo){
	//Creamos un objeto 
	object=document.getElementById('correo');
	valueForm=object.value;
	// Patron para el correo
    var patron="[a-zA-Z0-9_]+([.][a-zA-Z0-9_]+)*@[ups]+([.][edu]+)*[.][ec]{1,5}";
    var patron2="[a-zA-Z0-9_]+([.][a-zA-Z0-9_]+)*@[est]+([.][ups]+)*([.][edu]+)*[.][ec]{1,5}";
	if(valueForm.search(patron)==0)
	{
		//Mail correcto
        object.style.color="#000";
        document.getElementById('mensajeCorreo').innerHTML = ('Correo Valido');
		return;
	}else if(valueForm.search(patron2)==0){
        document.getElementById('mensajeCorreo').innerHTML = ('Correo Valido');
		return;
    }else{
        //Mail incorrecto
    document.getElementById('mensajeCorreo').innerHTML = ('Correo Invalido');
    }
}