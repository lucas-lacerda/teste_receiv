<?php 

namespace App\Models;
use App\DB\DB;

class Divida {

    protected $id;
    protected $descricao;
    protected $valor;
    protected $vencimento;
    protected $updated;
    protected $id_cliente;

    public function setDescricao($descricao)
    {
        $this->descricao = $descricao;
    }
    public function getDescricao()
    {
        return $this->descricao;
    }

    public function setValor($valor)
    {
        $this->valor = $valor;
    }
    public function getValor()
    {
        return $this->valor;
    }

    public function setVenc($vencimento)
    {
        $venc = explode('/', $vencimento);
        $vencimento = $venc[2]."-".$venc[1]."-".$venc[0];
        $this->vencimento = $vencimento;
    }
    public function getVenc()
    {
        return $this->vencimento;
    }

    public function setUpdated($updated)
    {
        $this->updated = $updated;
    }
    public function getUpdated()
    {
        return $this->updated;
    }

    public function setIdCliente($id_cliente)
    {
        $this->id_cliente = $id_cliente;
    }
    public function getIdCliente()
    {
        return $this->id_cliente;
    }

    public function conexao()
    {
        $this->db = new DB('mysql', 'localhost', 'receiv_devedores', 'root', '');
        return $this->db;
    }

    public function inserir($descricao, $valor, $vencimento, $id_cliente, $updated)  {

        try {

            $id = $this->conexao()->insert('dividas', [
                'descricao_divida' => $descricao,
                'valor_divida' => $valor,
                'vencimento_divida'	=> $vencimento,
                'id_cliente' => $id_cliente,
                'updated_divida' => $updated,
                
            ]);

            session_start();
            if ($id) {
                $_SESSION['success'] = "Divida adicionada com Sucesso!!";
                header('Location:../listar-devedores.php');
            }else {
                $_SESSION['danger'] = "Erro ao adicionar divida";
                header('Location:../listar-devedores.php');
            }

        } catch (Exception $e) {
            echo $e->getMessege();
        }

    }

    public function seleciona_divida($id)
    {
        $divida = $this->conexao()->select('SELECT * FROM dividas WHERE id_divida = :id', ['id' => $id]);
        return $divida;
    }

    public function detalhe_divida($id)
    {

        $dividas = $this->conexao()->select('SELECT * FROM dividas WHERE dividas.id_cliente= :id', ['id' => $id]);
        return $dividas;

    }

    public function atualizar($id, $descricao, $valor, $vencimento, $id_cliente, $updated)
    {
        try {

            $id = $this->conexao()->update('dividas', [
                'descricao_divida' => $descricao,
                'valor_divida' => $valor,
                'vencimento_divida'	=> $vencimento,
                'id_cliente' => $id_cliente,
                'updated_divida' => $updated, 
            ], 'id_divida='.$id);

            session_start();
            if ($id) {
                $_SESSION['success'] = "Divida atualizada com Sucesso!!";
                header('Location:../listar-devedores.php');
            }else {
                $_SESSION['danger'] = "Erro ao atualizar divida";
                header('Location:../listar-devedores.php');
            }

        } catch (Exception $e) {
            echo $e->getMessege();
        }
    }

    public function deletar($id)
    {
        try {
            
            $cliente = $this->conexao()->delete('dividas', 'id_divida='.$id);
            session_start();
            if ($cliente) {
                $_SESSION['success'] = "Divida deletada Com Sucesso!!";
                header('Location:../listar-devedores.php');
            }else {
                $_SESSION['danger'] = "Erro ao Deletar Divida";
                header('Location:../listar-devedores.php');
            }

        } catch (Exception $e) {
            echo $e->getMessege();
        }
        
    }

}