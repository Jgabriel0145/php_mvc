<?php

class FuncionarioModel
{
    /**
     * Declaração das propriedades conforme campos da tabela no banco de dados.
     */
    public $id, $nome, $rg, $cpf;
    public $data_nascimento, $salario, $rows;


    /**
     * Declaração do método save que chamará a DAO para gravar no banco de dados
     * o model preenchido.
     */
    public function save()
    {
        include 'DAO/FuncionarioDAO.php'; // Incluíndo o arquivo DAO

        // Instância do objeto e conexão no banco de dados via construtor
        $dao = new FuncionarioDAO(); 

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
        include 'DAO/FuncionarioDAO.php'; // Incluíndo o arquivo DAO
        
        // Instância do objeto e conexão no banco de dados via construtor
        $dao = new FuncionarioDAO();

        // Abastecimento da propriedade $rows com as "linhas" vindas do MySQL
        // via camada DAO.
        $this->rows = $dao->select();
    }

    public function getById(int $id)
    {
        include 'DAO/FuncionarioDAO.php';

        $dao = new FuncionarioDAO;

        $obj = $dao->selectById($id);

        return ($obj) ? $obj : new FuncionarioDAO();
        /* if ($obj) {return $obj;} 
        else {return new PessoaModel();}*/
    }

    public function delete(int $id)
    {
        include 'DAO/FuncionarioDAO.php'; // Incluíndo o arquivo DAO

        $dao = new FuncionarioDAO();

        $dao->delete($id);
    }
}