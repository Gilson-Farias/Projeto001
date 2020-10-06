<!DOCTYPE html>
<html lang="pt-Br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Conta Usuário</title>
</head>

<body>
    <h2>Cadastrar Conta de Usuário</h2>
    <hr>
    <form id="UsuarioForm" class="UsuarioForm">
        <table>
            <tr>
                <td><label>Nome:</label></td>
                <td><input class="txtNome" name="txtNome" id="txtNome" type="Text"></td>
            </tr>
            <tr>
                <td><label>E-mail:</label></td>
                <td> <input class="txtEmail" name="txtEmail" id="txtEmail" type="Text"></td>
            </tr>
            <tr>
                <td><label>Telefone:</label></td>
                <td><input class="txtTelefone" name="txtTelefone" id="txtTelefone" type="Text"></td>
            </tr>
            <tr>
                <td><label>CEP:</label></td>
                <td><input class="txtCep" name="txtCep" id="txtCep" type="Text" onblur="buscaCep()"></td>
            </tr>
            <tr>
                <td><label>Rua:</label></td>
                <td><input class="txtRua" name="txtRua" id="txtRua" type="Text"></td>
            </tr>
            <tr>
                <td><label>Bairro:</label></td>
                <td><input class="txtBairro" name="txtBairro" id="txtBairro" type="Text"></td>
            </tr>
            <tr>
                <td><label>Cidade/UF:</label></td>
                <td><input class="txtCidade" name="txtCidade" id="txtCidade" type="Text"></td>
            </tr>
        </table>
        <button class="btnGravar" id="btnGravar" name="btnGravar">GRAVAR</button>

        <dev class="msgRetorno" name="msgRetorno" id="msgRetorno"></dev>
    </form>
</body>
<script src="js/usuario.js"></script>

</html>