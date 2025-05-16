  document.addEventListener("DOMContentLoaded", function () {
  let botonOK = document.getElementById("ok");
  let cajaid = document.getElementById("cajaid");
  function visoOk() {
    cajaid.style.display = "none";
    }
    botonOK.addEventListener("click", visoOk); 
});