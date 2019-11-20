var direccion
var par2
var num = 0


var participantes = ['Imagenes/1.jpg', 'Imagenes/2.jpg', 'Imagenes/3.jpg', 'Imagenes/4.jpg', 'Imagenes/5.jpg', 'Imagenes/.jpg', 'Imagenes/7.jpg', 'Imagenes/8.jpg', 'Imagenes/9.jpg', 'Imagenes/10.jpg'];

function iniciar() {
    console.log(participantes)
    num = 0
    for (var i = 0; i < 5; i++) {
        participantes[i] = Math.floor(Math.random() * (10))
    }
    console.log(participantes)
    par2 = participantes.slice(0, 5)
    alert('Se escogieron las ' + par2.length + ' imagenes aleatorias')
    console.log(par2)
    console.log(num)
    direccion = "Imagenes/" + par2[num] + ".jpg";
    console.log(direccion);
    document.getElementById("foto").src = direccion;
    document.getElementById("previos").disabled = true;
    document.getElementById("next").disabled = false;
}

function siguiente() {
    num++
    if (num == 4) {
        document.getElementById("next").disabled = true;
        document.getElementById("previous").disabled = false;
    }
    else if (num == 0) {
        document.getElementById("previous").disabled = true;
        document.getElementById("next").disabled = false;
    } else {
        document.getElementById("next").disabled = false;
        document.getElementById("previous").disabled = false;
    }
    direccion = "Imagenes/" + par2[num] + ".jpg";
    console.log(direccion);
    document.getElementById("foto").src = direccion;
}

function anterior() {
    num--
    if (num == 4) {
        document.getElementById("next").disabled = true;
        document.getElementById("previos").disabled = false;
    }
    else if (num == 0) {
        document.getElementById("previos").disabled = true;
        document.getElementById("next").disabled = false;
    } else {
        document.getElementById("next").disabled = false;
        document.getElementById("previos").disabled = false;
    }
    direccion = "Imagenes/" + par2[num] + ".jpg";
    console.log(direccion);
    document.getElementById("foto").src = direccion;
}