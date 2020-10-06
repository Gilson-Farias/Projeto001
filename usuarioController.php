<?php
require_once('UsuarioClass.Class.php');

class usuarioController extends UsuarioClass
{   
    public static function getObUsuario(){
        $obUsuario = new UsuarioClass();
        $obUsuario->setNome( $_POST['txtNome']);
        $obUsuario->setEmail( $_POST['txtEmail'] );
        $obUsuario->setTelefone( $_POST['txtTelefone'] );
        $obUsuario->setCep( $_POST['txtCep'] );
        return $obUsuario;
    }

    public static function chamarOperacao()
    {
        if (isset($_POST['operacao']) && $_POST['operacao'] == "Incluir") {
               
            $obUsuario = usuarioController::getObUsuario();

            return json_encode(UsuarioClass::getIncluir($obUsuario));
        } 
    }
}

exit(usuarioController::chamarOperacao());
