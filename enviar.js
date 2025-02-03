function EnviarMail() {
  var array = [];
  nombre = $("#nombre").val();
  email = $("#email").val();
  telefono = $("#telefono").val();
  mensaje = $("#mensaje").val();
  array.push(nombre, email, telefono, mensaje);
  array = JSON.stringify(array);

  $.post("enviar.php", { valores: array })
    .then((resp) => console.log(resp))
    .then(() => {
      alert("MENSAJE ENVIADO");
    });
}
