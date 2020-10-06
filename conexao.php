<?php

class Conexao
{
    # Variável que guarda a conexão PDO.
    protected static $db;
	
    # Private construct - garante que a classe só possa ser instanciada internamente.
    private function __construct()
    {
        # Informações sobre o banco de dados:
		$db_driver = "mysql"; 	# MySQL(mysql) , Postres(pgsql), Firebid(firebird), SQL Server(sqlsrv)
        $db_host = "localhost";
        $db_nome = "PGI";           //Base de Dados
        $db_usuario = "gilson";     //Usuário
        $db_senha = "123Gabriel";   //Senha
		
        # Informações sobre o sistema:
        $sistema_titulo = "Projeto Bemol.";
        $sistema_email = "gilsonfarias@hotmail.com";

        try
        {
            # Atribui o objeto PDO à variável $db.
            self::$db = new PDO("$db_driver:host=$db_host; dbname=$db_nome", $db_usuario, $db_senha);
            # Garante que o PDO lance exceções durante erros.
            self::$db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            # Garante que os dados sejam armazenados com codificação UFT-8.
            self::$db->exec('SET NAMES utf8');
        }
        catch (PDOException $e)
        {
            # Envia um e-mail para o e-mail oficial do sistema, em caso de erro de conexão.
            mail($sistema_email, "PDOException em $sistema_titulo", $e->getMessage());
            # Então não carrega nada mais da página.
            die("Connection Error: " . $e->getMessage());
        }
    }
    # Método estático - acessível sem instanciação.
    public static function conectar()
    {
        # Garante uma única instância. Se não existe uma conexão, criamos uma nova.
        if (!self::$db)
        {
            new Conexao();
        }
        # Retorna a conexão.
        return self::$db;
    }
    
    public static function executarQueryGravar($sqlQuery)
	{
        try{
            $pdo = Conexao::conectar();
            
            $pdo->beginTransaction();

            $stm = $pdo->prepare($sqlQuery);
        		
            $resultado = $stm->execute();
            
            $pdo->commit();

            return $resultado;

        }catch( Exception $e ){
            $pdo->rollBack();
            echo 'Exceção capturada: ',  $e->getMessage(), "\n";
        }
    }
}