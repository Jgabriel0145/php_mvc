<?php 

class CategoriaProdutoModel{
    public $id, $categoria, $rows;



    public function save()
    {
        include 'DAO/CategoriaProdutoDAO.php'; // Incluíndo o arquivo DAO

        // Instância do objeto e conexão no banco de dados via construtor
        $dao = new CategoriaProdutoDAO(); 

        // Verificando se a propriedade id foi preenchida no model
        // Para saber mais sobre a palavra-chave this, leia: https://pt.stackoverflow.com/questions/575/quando-usar-self-vs-this-em-php
        if(empty($this->id))
        {
            // Chamando o método insert que recebe o próprio objeto model
            // já preenchido
            $dao->insert($this);

        } else {

            $dao->update($this); // Como existe um id, passando o model para ser atualizado.
        }        
    }

    public function getAllRows()
    {
        include 'DAO/CategoriaProdutoDAO.php'; // Incluíndo o arquivo DAO
        
        // Instância do objeto e conexão no banco de dados via construtor
        $dao = new CategoriaProdutoDAO();

        // Abastecimento da propriedade $rows com as "linhas" vindas do MySQL
        // via camada DAO.
        $this->rows = $dao->select();
    }

    public function getById(int $id)
    {
        include 'DAO/CategoriaProdutoDAO.php';

        $dao = new CategoriaProdutoDAO;

        $obj = $dao->selectById($id);

        return ($obj) ? $obj : new CategoriaProdutoModel();
        /* if ($obj) {return $obj;} 
        else {return new ProdutoModel();}*/
    }

    public function delete(int $id)
    {
        include 'DAO/CategoriaProdutoDAO.php'; // Incluíndo o arquivo DAO

        $dao = new CategoriaProdutoDAO();

        $dao->delete($id);
    }

}