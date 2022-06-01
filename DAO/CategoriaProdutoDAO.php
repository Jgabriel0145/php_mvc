<?php

class CategoriaProdutoDAO{

    private $conexao;

    function __construct()
    {
        $dsn = "mysql:host=localhost:3307;dbname=db_sistema";
        $user = "root";
        $pass = "etecjau";
        
        // Criando a conexão e armazenado na propriedade definida para tal.
        $this->conexao = new PDO($dsn, $user, $pass);
        
    }

    function insert(CategoriaProdutoModel $model){

        $sql = "INSERT INTO categoria_produto 
        (categoria) 
        VALUES (?)";

        $stmt=$this->conexao->prepare($sql);


        $stmt->bindValue(1, $model->categoria);

        $stmt->execute();

    }

    public function getAllRows()
    {
        $sql = "SELECT * FROM categoria_produto";
        $stmt=$this->conexao->prepare($sql);
        $stmt->execute();

        return $stmt->fetchAll();
    } 

    public function update(CategoriaProdutoModel $model)
    {
        $sql = "UPDATE categoria_produto SET categoria=? WHERE id=? ";

        $stmt = $this->conexao->prepare($sql);
        $stmt->bindValue(1, $model->categoria);
        $stmt->bindValue(5, $model->id);
        $stmt->execute();
    }

    public function select()
    {
        $sql = "SELECT * FROM categoria_produto";

        $stmt = $this->conexao->prepare($sql);
        $stmt->execute();

        return $stmt-> fetchAll(PDO::FETCH_CLASS);
    }

    public function selectById(int $id)
    {
        $sql = "SELECT * FROM categoria_produto WHERE id=?";

        $stmt = $this->conexao->prepare($sql);
        $stmt->bindValue(1, $id);
        $stmt->execute();

        return $stmt->fetchObject("CategoriaProdutoModel");
    }

    public function delete(int $id)
    {
        $sql = "DELETE FROM categoria_produto WHERE id = ? ";

        $stmt = $this->conexao->prepare($sql);
        $stmt->bindValue(1, $id);
        $stmt->execute();
    }
} 