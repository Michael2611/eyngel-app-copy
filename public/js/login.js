document.addEventListener("DOMContentLoaded", function() {
  $('#exampleModal').modal('show');  
});

var personalizado_sexo = document.getElementById("personalizado_sexo");
var u_sexo = document.getElementById("u_sexo");


personalizado_sexo.style.display = "none";
u_sexo.classList = "col-md-12";

function getSelected(valor) {
  console.log(valor.value);

  if (valor.value == 'O') {
    personalizado_sexo.style.display = "block";
    u_sexo.className = "col-md-6";
  } else {
    personalizado_sexo.style.display = "none";
    u_sexo.className = "col-md-12";
  }

}
let click = false;
function showPassword() {
  var password = document.getElementById("password-login");
 
  if (!click) {
    password.type = 'text'
    click = true
  } else if (click) {
    password.type = 'password'
    click = false
  }
}
