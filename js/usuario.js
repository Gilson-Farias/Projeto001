
var frmUsuario = document.getElementById('UsuarioForm');
var gravar = document.getElementById('btnGravar');
gravar.addEventListener('click', function (e) {
  e.preventDefault();

  var formData = new FormData(frmUsuario);
  formData.append('operacao', "Incluir");

  fetch('usuarioController.php', {
    method: 'POST',
    body: formData
  })
    .then(function (response) {
      return response.text();
    })
    .then(response => {
      let output = response;

      if( output == "true"){
        document.querySelector('.msgRetorno').innerHTML = "Gravação concluida.";
      }
      else{
        document.querySelector('.msgRetorno').innerHTML = "Operação erro:" + output;
      }

    }).catch(error => document.querySelector('.msgRetorno').innerHTML = error);
});

function buscaCep() {
    $cep = document.getElementById('txtCep').value;
    
    $url = 'https://viacep.com.br/ws/' + $cep + '/json/';

    if($cep == ""){
        document.getElementById('txtRua').value = "";
        document.getElementById('txtBairro').value = "";
        document.getElementById('txtCidade').value = "";
    }
    else{

    fetch($url, {})
        .then(function (response) {
            return response.json();
        })
        .then(response => {
            document.getElementById('txtRua').value = response["logradouro"];
            document.getElementById('txtBairro').value = response["bairro"];
            document.getElementById('txtCidade').value = response["localidade"] + "/" + response["uf"];

        }).catch(error => document.querySelector('.msgRetorno').innerHTML = error);
    }
}