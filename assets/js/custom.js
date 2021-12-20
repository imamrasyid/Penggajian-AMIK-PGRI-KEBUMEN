function ShowToast(Time, Icon, Messages) {
  Swal.fire({
    toast: true,
    timer: Time,
    position: "top-end",
    timerProgressBar: true,
    icon: Icon,
    title: Messages,
    showConfirmButton: false,
  });
}

function ShowToast2(Time, Icon, Messages) {
  Swal.fire({
    toast: true,
    timer: Time,
    position: "center",
    timerProgressBar: true,
    icon: Icon,
    title: Messages,
    showConfirmButton: false,
  });
}

function ButtonState(button_id, type, value) {
  var btn = document.getElementById(button_id);

  btn.setAttribute("type", type);
  btn.setAttribute("value", value);
}
