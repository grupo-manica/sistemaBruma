
    function mostrarCliente() {
      var formCliente = document.getElementById("formCliente");
      var formClinica = document.getElementById("formClinica");
      if (formCliente.style.display === "none") {
        formCliente.style.display = "block" //Mostra o formulário do cliente
        formClinica.style.display = "none" //Esconde o formulário da clínica
      } else {
        formCliente.style.display = "none" //Esconde o formulário do cliente
      }
    }
    function mostrarClinica() {
      var formClinica = document.getElementById("formClinica");
      var formCliente = document.getElementById("formCliente");
      if (formClinica.style.display === "none") {
        formClinica.style.display = "block" //Mostra o formulário da clínica
        formCliente.style.display = "none" //Esconde o formulário do cliente
     } else {
        formClinica.style.display = "none" //Esconde o formulário da clínica
      }
    }
