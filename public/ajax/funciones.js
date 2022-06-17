addEventListener('load', cargador);
addEventListener('load', cargaTitulo);
addEventListener('load', cargaComentarios);
addEventListener('load', cargaContenido);

//Funcion que carga los usuarios
function cargador() {
  let userId = document.getElementById('autor').value
  
  let xhr = new XMLHttpRequest();
  xhr.onreadystatechange = function () {
    if (this.readyState == 4 && this.status == 200) {

      let array = JSON.parse(this.responseText);

      let cadena = '';
      
      cadena += '<option value="' + array[0].id + '">' + array[0].name + '</option>';
      
      document.getElementById('ajax').innerHTML = cadena;

    }
  }

  xhr.open('GET', `http://localhost/Ejercicio%20PHP/Laravel/Flamenco%20Duro%20Amove/Flamenco_Duro/public/api/articulos/${userId}`); //Asi paso el value del option, input y eso a una variable 
  xhr.send();

}

// document.getElementById('ajax').addEventListener('change', cargaTitulo);

//Funcion que carga los videos de un usuario especifico
function cargaTitulo() {
  // let id = ev.target.value
  let id = document.getElementById('autor').value
  let xhr = new XMLHttpRequest();
  xhr.onreadystatechange = function () {
    if (this.readyState == 4 && this.status == 200) {

      let array = JSON.parse(this.responseText);
console.log(array)
      let cadena = '';

      for (let i = 0; i < array.length; i++) {

        cadena += '<a href="' + array[i].id + '" style="text-decoration: none;" class="link-dark">' + array[i].titulo + '</a></br>';

      }
      document.getElementById('ajaxDos').innerHTML = cadena;
    }
  }

  xhr.open('GET', `http://localhost/Ejercicio%20PHP/Laravel/Flamenco%20Duro%20Amove/Flamenco_Duro/public/api/articulos/${id}`); //Asi paso el value del option, input y eso a una variable 
  xhr.send();

}

// Funcion que carga los comentarios de cada articulo
function cargaComentarios() {

  let xhr = new XMLHttpRequest();
  let ide = document.getElementById('id').value
  xhr.onreadystatechange = function () {

    if (this.readyState == 4 && this.status == 200) {

      let array = JSON.parse(this.responseText);
      let cadena = '';

      for (let i = 0; i < array.length; i++) {
        
        cadena += '<div class="card text-dark bg-light mb-3" >' +
          '<div class="card-header">Usuario: ' + array[i].name + '</div>' +
          '<div class="card-body">' +
          '<p class="card-text">' + array[i].comentario + '</p>' +
          '<p class="card-text"><small class="text-muted">Creado el ' + formateoFecha(array[i].created_at) + '</small></p>' +
          '</div>' +
          '</div>';
      }

      document.getElementById('coment').innerHTML = cadena;

    }
  }

  xhr.open('GET', `http://localhost/Ejercicio%20PHP/Laravel/Flamenco%20Duro%20Amove/Flamenco_Duro/public/api/comentarios/${ide}`); //Asi paso el value del option, input y eso a una variable 
  xhr.send();

}

//Funcion que formatea la fecha de los comentarios
function formateoFecha(fecha) {
  let ceroUno = '';
  let ceroDos = '';
  let amb = new Date(fecha);
  if (amb.getDate() < 10) { ceroUno = '0'; }
  if (amb.getMonth() < 10) { ceroDos = '0'; }
  return (ceroUno + '' + amb.getDate()) + '-' + ceroDos + (amb.getMonth() + 1) + '-' + amb.getFullYear()
}

//Funcion que carga todos los usuarios al clicar el boton
function cargarTodos() {

  let xhr = new XMLHttpRequest();
  xhr.onreadystatechange = function () {
    if (this.readyState == 4 && this.status == 200) {

      let array = JSON.parse(this.responseText);

      let cadena = '';

      for (let i = 0; i < array.length; i++) {
        cadena += '<option value="' + array[i].id + '">' + array[i].name + '</option>';
      }
      document.getElementById('ajax').innerHTML = cadena;
    }
  }

  xhr.open('GET', 'http://localhost/Ejercicio%20PHP/Laravel/Flamenco%20Duro%20Amove/Flamenco_Duro/public/api/usuarios'); //Asi paso el value del option, input y eso a una variable 
  xhr.send();

}



//Funcion que carga los videos de un usuario especifico
document.getElementById('ajax').addEventListener('change', cargaArticulosUsuario);
function cargaArticulosUsuario(ev) {
  let id = ev.target.value
  let xhr = new XMLHttpRequest();
  xhr.onreadystatechange = function () {
    if (this.readyState == 4 && this.status == 200) {

      let array = JSON.parse(this.responseText);

      let cadena = '';

      for (let i = 0; i < array.length; i++) {

        cadena += '<a href="' + array[i].id + '" style="text-decoration: none;" class="link-dark">' + array[i].titulo + '</a></br>';

      }
      document.getElementById('ajaxDos').innerHTML = cadena;
    }
  }

  xhr.open('GET', `http://localhost/Ejercicio%20PHP/Laravel/Flamenco%20Duro%20Amove/Flamenco_Duro/public/api/articulos/${id}`); //Asi paso el value del option, input y eso a una variable 
  xhr.send();

}


//Funcion que carga el contenido (el desarrollo del articulo) de un articulo
function cargaContenido() {
  let idCont = document.getElementById('cont').value
  
  let xhr = new XMLHttpRequest();
  xhr.onreadystatechange = function () {
    if (this.readyState == 4 && this.status == 200) {

      let array = JSON.parse(this.responseText);
      console.log(array)
      let cadena = '';
      
      cadena += '<p>' + array[0].contenido + '</p>';
      
      document.getElementById('contenido').innerHTML = cadena;

    }
  }

  xhr.open('GET', `http://localhost/Ejercicio%20PHP/Laravel/Flamenco%20Duro%20Amove/Flamenco_Duro/public/api/articulo/contenido/${idCont}`); //Asi paso el value del option, input y eso a una variable 
  xhr.send();

}






