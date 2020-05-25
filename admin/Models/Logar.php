<?php 

namespace App\Models;
use App\DB\DB;

class Logar {

    private $nome;
    private $email;
    private $senha;
    protected $db;

    public function setNome($valor)
    {
        $this->nome = $valor;
    }

    public function getNome()
    {
        return $this->nome;
    }

    public function setEmail($valor)
    {
        $this->email = $valor;
    }

    public function getEmail()
    {
        return $this->email;
    }

    public function setSenha($valor)
    {
        $this->senha = password_hash($valor, PASSWORD_DEFAULT);
    }

    public function getSenha()
    {
        return $this->senha;
    }

    public function conexao()
    {
        $this->db = new DB('mysql', 'localhost', 'receiv_devedores', 'root', '');
        return $this->db;
    }

    public function logar($email, $senha)
    {

       
        if ($email == '' || $senha == '') {

            $_SESSION['danger'] = "Usuario ou senha incorretos";
            header('Location:../index.php');

        } else {

            try {

                $usuarios = $this->conexao()->select('SELECT * FROM usuarios WHERE 
                email_usuario = :email',
                ['email' => $email]);

                foreach ($usuarios as $usuario) {

                    if (password_verify($senha, $usuario->senha_usuario)) {
                        session_start();
                        $_SESSION['nome'] = $usuario->nome_usuario;
                        $_SESSION['email'] = $usuario->email_usuario;

                        $_SESSION['success'] = "Logado com sucesso!!";

                        header('Location:../index.php');

                    } else {

                        $_SESSION['danger'] = "Erro ao Logar no painel";
                        header('Location:../../index.php');

                    }
                }
                
            } catch (Exception $e) {
                echo $e->getMessage();
            }

        }
    }

    public function logout()
    {
        session_destroy();
        header("location: ../../index.php");
        session_start();
        $_SESSION['success'] = "Deslogado!!";
    }

}