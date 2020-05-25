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
        $data_nasc = explode('/', $data_nascimento);
        $data_nasc = $data_nasc[2]."-".$data_nasc[1]."-".$data_nasc[0];

        $this->data_nascimento = $data_nasc;
    }
    public function getDataNasc()
    {
        return $this->data_nascimento;
    }

    public function setTelefone($telefone)
    {
        $telSemParentE = explode('(', $telefone);
        $telSemParentD = explode(') ', $telSemParentE[1]);
        $telSemTraco = explode('-', $telSemParentD[1]);
        $tel = $telSemParentE[0].$telSemParentD[0].$telSemTraco[0].$telSemTraco[1];
        $this->telefone = $tel;
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
        $cpf = explode('.', $cpf);
        $cpf2 = explode('-', $cpf[2] );
        $cpfFinal = $cpf[0].$cpf[1].$cpf2[0].$cpf2[1];

        if ($cpfFinal == '') {
            $this->cpf = NULL;
        } else {
            $this->cpf = $cpfFinal;
        }

        
    }
    public function getCPF()
    {
        return $this->cpf;
    }

    public function setCNPJ($cnpj)
    {
        $cnpjSemPonto = explode('.', $cnpj);
        $cnpjSemBarra = explode('/', $cnpjSemPonto[2]);
        $cnpjSemTraco = explode('-', $cnpjSemBarra[1]);
        $cnpjFinal = $cnpjSemPonto[0].$cnpjSemPonto[1].$cnpjSemBarra[0].$cnpjSemTraco[0].$cnpjSemTraco[1];

        if ($cnpjFinal == '') {
            $this->cnpj = NULL;
        } else {
            $this->cnpj = $cnpjFinal;
        }
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