//MODAL

// Envia hacia adelante con el botón send y modal
var sendBtn = document.getElementById("sendBtn");
var modal = document.getElementById("myModal");

// Trae el elemento <span> y cierra ese elemento el modal
var span = document.getElementsByClassName("close")[0];

// Cuando el usuario clickea el botón de send, abre el modal
sendBtn.onclick = function() {
  modal.style.display = "block";
}

// Cuuando el usuario clickea en <span> (x), cierra el modal
span.onclick = function() {
  modal.style.display = "none";
}

// Cuando el usuari hace click donde sea fuera del modal, para luego cerrrarse
window.onclick = function(event) {
  if (event.target == modal) {
    modal.style.display = "none";
  }
}