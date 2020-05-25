<?php 

namespace App\Models;
use App\DB\DB;

class Cliente {

    protected $id;
    protected $nome;
    protected $email;
    protected $data_nascimento;
    protected $telefone;
    protected $tipo;
    protected $cpf;
    protected $cnpj;
    protected $cep;
    protected $endereco;
    protected $numero;
    protected $complemento;
    protected $cidade;
    protected $estado;

    public function setId($id) 
    {
        $this->id = $id;
    }
    public function getId()
    {
        return $this->id;
    }

    public function setNome($nome) 
    {
        $nome = filter_var($nome, FILTER_SANITIZE_STRING);
        $this->nome = $nome;
    }
    public function getNome()
    {
        return $this->nome;
    }

    public function setEmail($email) 
    {
        $email = filter_var($email, FILTER_VALIDATE_EMAIL);
        $this->email = $email;
    }
    public function getEmail()
    {
        return $this->email;
    }

    public function setDataNasc($data_nascimento) 
    {
        $this->data_nascimento = $data_nascimento;
    }
    public function getDataNasc()
    {
        return $this->data_nascimento;
    }

    public function setTelefone($telefone)
    {
        $this->telefone = $telefone;
    }
    public function getTelefone()
    {
        return $this->telefone;
    }

    public function setTipo($tipo)
    {
        $this->tipo = $tipo;
    }
    public function getTipo()
    {
        return $this->tipo;
    }

    public function setCPF($cpf)
    {
        $this->cpf = $cpf;
    }
    public function getCPF()
    {
        return $this->cpf;
    }

    public function setCNPJ($cnpj)
    {
        $this->cnpj = $cnpj;
    }
    public function getCNPJ()
    {
        return $this->cnpj;
    }

    public function setCEP($cep)
    {
        $this->cep = $cep;
    }
    public function getCEP()
    {
        return $this->cep;
    }

    public function setEndereco($endereco)
    {
        $this->endereco = $endereco;
    }
    public function getEndereco()
    {
        return $this->endereco;
    }

    public function setNumero($numero)
    {
        $this->numero = $numero;
    }
    public function getNumero()
    {
        return $this->numero;
    }

    public function setComplemento($complemento)
    {
        if ($complemento == '') {
            $this->complemento = 'sem complemento';
        } else {
            $this->complemento = $complemento;
        }
        
    }
    public function getComplemento()
    {
        return $this->complemento;
    }

    public function setCidade($cidade)
    {
        $this->cidade = $cidade;
    }
    public function getCidade()
    {
        return $this->cidade;
    }

    public function setEstado($estado)
    {
        $this->estado = $estado;
    }
    public function getEstado()
    {
        return $this->estado;
    }

    public function conexao()
    {
        $this->db = new DB('mysql', 'localhost', 'receiv_devedores', 'root', '');
        return $this->db;
    }

    public function inserir($nome, $email, $data_nascimento, $telefone, $tipo, $cpf, $cnpj, $cep, $endereco, $numero, $complemento, $cidade, $estado)  {

        try {

            $id = $this->conexao()->insert('clientes', [
                'nome_cliente' => $nome,
                'email_cliente' => $email,
                'dataNasc_cliente' => $data_nascimento,
                'telefone_cliente' => $telefone,
                'tipo_cliente' => $tipo,
                'cpf_cliente' => $cpf,
                'cnpj_cliente' => $cnpj,
                'cep_cliente' => $cep,
                'endereco_cliente' => $endereco,
                'numero_cliente' => $numero,
                'complemento_cliente' => $complemento,
                'cidade_cliente' => $cidade,
                'estado_cliente' => $estado
            ]);
            session_start();
            if ($id) {
                $_SESSION['success'] = "Cliente cadastrado Com Sucesso!!";
                header('Location:../listar-clientes.php');
            }else {
                $_SESSION['danger'] = "Erro ao cadastrar Cliente";
                header('Location:../listar-clientes.php');
            }

        } catch (Exception $e) {
            echo $e->getMessege();
        }

    }

    public function lista_clientes()
    {
        $lista_clientes = $this->conexao()->select('SELECT * FROM clientes');
        return $lista_clientes;
    }

    public function seleciona_cliente($id)
    {
        $cliente = $this->conexao()->select('SELECT * FROM clientes WHERE id_cliente = :id', ['id' => $id]);
        return $cliente;
    }

    public function atualizar($id, $nome, $email, $data_nascimento, $telefone, $tipo, $cpf, $cnpj, $cep, $endereco, $numero, $complemento, $cidade, $estado)
    {

        try {
            $id = $this->conexao()->update('clientes', [
                'nome_cliente' => $nome,
                'email_cliente' => $email,
                'dataNasc_cliente' => $data_nascimento,
                'telefone_cliente' => $telefone,
                'tipo_cliente' => $tipo,
                'cpf_cliente' => $cpf,
                'cnpj_cliente' => $cnpj,
                'cep_cliente' => $cep,
                'endereco_cliente' => $endereco,
                'numero_cliente' => $numero,
                'complemento_cliente' => $complemento,
                'cidade_cliente' => $cidade,
                'estado_cliente' => $estado
            ], 'id_cliente='.$id );

            session_start();
            if ($id) {
                $_SESSION['success'] = "Cliente atualizado Com Sucesso!!";
                header('Location:../listar-clientes.php');
            }else {
                $_SESSION['danger'] = "Erro ao atualizar Cliente";
                header('Location:../listar-clientes.php');
            }

        } catch (Exception $e) {
            echo $e->getMessege();
        }
    }

    public function deletar($id)
    {
        try {
            
            $cliente = $this->conexao()->delete('clientes', 'id_cliente='.$id);
            session_start();
            if ($cliente) {
                $_SESSION['success'] = "Cliente Deletado Com Sucesso!!";
                header('Location:../listar-clientes.php');
            }else {
                $_SESSION['danger'] = "Erro ao Deletar Cliente";
                header('Location:../listar-clientes.php');
            }

        } catch (Exception $e) {
            echo $e->getMessege();
        }
        
    }

}