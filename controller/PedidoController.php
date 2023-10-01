<?php
include "../model/BD.class.php";

class PedidoController {

    private $model;
    private $table = "pedido";

    public function __construct(){
        $this->model = new BD();
    }

    public function salvar($dados){

        try {

            /*if (!preg_match("/^[a-zA-Z-' ]*$/", $dados['nome'])) {
                throw new Exception(" Somente letras e espaços em branco são permitidos. ");
            }*/
            
            // var_dump($dados);
            //exit;
            $this->model->inserir($this->table, $dados);

            $_SESSION['url'] ="PedidoList.php";
            $_SESSION['msg'] ="Registro Salvo com sucesso!";
    
        } catch (Exception $e){
            $_SESSION['dados'] = $dados;
            $_SESSION['url'] = 'PedidoForm.php';
            $_SESSION['msg'] = $e->getMessage();
        }
    }
    public function atualizar($dados){
        
        try {

            if (!preg_match("/^[a-zA-Z-' ]*$/", $dados['nome'])) {  
                throw new Exception(" Somente letras e espaços em branco são permitidos. ");
            }
          
            $this->model->atualizar($this->table, $dados);
          
            $_SESSION['url'] ="PedidoList.php";
            $_SESSION['msg'] ="Registro atualizado com sucesso!";
    
        } catch (Exception $e){
            $_SESSION['dados'] = $dados;
            $_SESSION['url'] = 'PedidoForm.php?id='.$dados['id'];
            $_SESSION['msg'] = $e->getMessage();
    
        }
    }
    public function carregar(){
        
       return $this->model->select($this->table);
    }
    public function pesquisar($dados){
        
        return $this->model->pesquisar($this->table, $dados);
    }
    public function deletar($id){
        
        $this->model->deletar($this->table, $id);
    }
    public function buscar($id){
        
        return $this->model->buscar($this->table, $id);
    }

    public function buscarContato($id){
        
        return $this->model->buscar("usuario", $id);
    }
}