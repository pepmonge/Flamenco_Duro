addEventListener('load', cargarPie);

let contacto =
{
  nombre: 'Flamenco Duro',
  creador: 'Creaciones Oripandó',
  direccion: 'C/ Falseta, 4, Utrera (Sevilla)',
  email: 'felipondio1974@gmail.com',
  movil: '666323345'

}

//Funcion que carga la tabla de informacion de contancto
function cargarTabla() {

  let cadena = '';
  cadena += '<br><p><strong>Nombre de la web</strong>: ' + contacto.nombre + '</p><hr>' +
    '<p><strong>Dirección</strong>: ' + contacto.direccion + '</p><hr>' +
    '<p><strong>Email</strong>: ' + contacto.email + '</p><hr>' +
    '<p><strong>Teléfono</strong>: ' + contacto.movil + '</p><hr>' +
    '<button type="button" class="btn btn-success btn-sm" onclick="descargarTabla()">'+
    'Cerrar</button>';

  document.getElementById('lista').innerHTML = cadena;

};

//Funcion para el boton que cierra la tabla de informacion de contacto
function descargarTabla() {
  document.getElementById('lista').innerHTML = '';
}

// Funcion que carga algunos dato de contacto en el footer
function cargarPie() {
  let cadena = '';
  cadena += '<br><p><strong>Nombre de la web</strong>: ' + contacto.nombre + '</p>' +
    '<p><strong>Creación original</strong>: ' + contacto.creador + '</p>' +
    '<p><strong>Email</strong>: ' + contacto.email + '</p>';
  document.getElementById('contact').innerHTML = cadena;

}