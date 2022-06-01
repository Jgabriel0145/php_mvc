<?php

class ProdutoDAO{

    private $conexao;

    function __construct()
    {
        $dsn = "mysql:host=localhost:3307;dbname=db_sistema";
        $user = "root";
        $pass = "etecjau";
        
        // Criando a conexão e armazenado na propriedade definida para tal.
        $this->conexao = new PDO($dsn, $user, $pass);
        
    }

    function insert(ProdutoModel $model){

        $sql = "INSERT INTO produto 
        (nome, descricao, preco, id_categoria_produto) 
        VALUES (?, ?, ?, ?)";

        $stmt=$this->conexao->prepare($sql);


        $stmt->bindValue(1, $model->nome);
        $stmt->bindValue(2, $model->descricao);
        $stmt->bindValue(3, $model->preco);
        $stmt->bindValue(4, $model->id_categoria_produto);

        $stmt->execute();

    }

    public function getAllRows()
    {
        $sql = "SELECT * FROM produto";
        $stmt=$this->conexao->prepare($sql);
        $stmt->execute();

        return $stmt->fetchAll();
    } 

    public function update(ProdutoModel $model)
    {
        $sql = "UPDATE produto SET nome=?, descricao=?, preco=?, id_categoria_produto=? WHERE id=? ";

        $stmt = $this->conexao->prepare($sql);
        $stmt->bindValue(1, $model->nome);
        $stmt->bindValue(2, $model->descricao);
        $stmt->bindValue(3, $model->preco);
        $stmt->bindValue(4, $model->id_categoria_produto);
        $stmt->bindValue(5, $model->id);
        $stmt->execute();
    }

    public function select()
    {
        $sql = "SELECT * FROM produto";

        $stmt = $this->conexao->prepare($sql);
        $stmt->execute();

        return $stmt-> fetchAll(PDO::FETCH_CLASS);
    }

    public function selectById(int $id)
    {
        $sql = "SELECT * FROM produto WHERE id=?";

        $stmt = $this->conexao->prepare($sql);
        $stmt->bindValue(1, $id);
        $stmt->execute();

        return $stmt->fetchObject("ProdutoModel");
    }

    public function delete(int $id)
    {
        $sql = "DELETE FROM produto WHERE id = ? ";

        $stmt = $this->conexao->prepare($sql);
        $stmt->bindValue(1, $id);
        $stmt->execute();
    }
} 