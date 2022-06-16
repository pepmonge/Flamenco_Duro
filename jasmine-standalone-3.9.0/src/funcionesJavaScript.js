
//Funcion que carga la tabla de informacion de contancto
function cargarTabla(contacto) {
  let cadena = '';
  cadena += 'Nombre: ' + contacto.nombre;
  return cadena;
};


// Funcion que carga algunos dato de contacto en el footer
function cargarPie(contacto) {
  let cadena = '';
  cadena += 'Nombre: ' + contacto.nombre + ' | Creador: ' + contacto.creador;
  return cadena;

}