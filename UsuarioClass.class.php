<?php

require_once('conexao.php');

class UsuarioClass{

    private $nome;
    private $email;
    private $telefone;
    private $cep;

    public function getNome():string{ return $this->nome;}
    public function setNome(string $nome){ $this->nome = $nome; }

    public function getEmail():string{ return $this->email; }
    public function setEmail( string $email){ $this->email = $email;}

    public function getTelefone():string { return $this->telefone; }
    public function setTelefone( string $telefone){ $this->telefone = $telefone; }

    public function getCep():string { return $this->cep; }
    public function setCep( string $cep){ $this->cep = $cep; }

	public static function getIncluir( UsuarioClass $usuario )
	{
		$sql = "INSERT INTO usuario( nome, email, telefone, cep) VALUES ('".$usuario->getNome()."','".$usuario->getEmail()."','".$usuario->getTelefone()."', '".$usuario->getCep()."');";
		
		$resultado = Conexao::executarQueryGravar( $sql );

		return $resultado; 
	}
}
?>