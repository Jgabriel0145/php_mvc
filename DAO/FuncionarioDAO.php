<?php

class FuncionarioDAO{

    private $conexao;

    function __construct()
    {
        $dsn = "mysql:host=localhost:3307;dbname=db_sistema";
        $user = "root";
        $pass = "etecjau";
        
        // Criando a conexão e armazenado na propriedade definida para tal.
        $this->conexao = new PDO($dsn, $user, $pass);
        
    }

    function insert(FuncionarioModel $model){

        $sql = "INSERT INTO funcionario 
        (nome, rg, cpf, data_nascimento, salario) 
        VALUES (?, ?, ?, ?, ?)";

        $stmt=$this->conexao->prepare($sql);


        $stmt->bindValue(1, $model->nome);
        $stmt->bindValue(2, $model->rg);
        $stmt->bindValue(3, $model->cpf);
        $stmt->bindValue(4, $model->data_nascimento);
        $stmt->bindValue(5, $model->salario);

        $stmt->execute();

    }

    public function getAllRows()
    {
        $sql = "SELECT * FROM funcionario";
        $stmt=$this->conexao->prepare($sql);
        $stmt->execute();

        return $stmt->fetchAll();
    } 

    public function update(FuncionarioModel $model)
    {
        $sql = "UPDATE funcionario SET nome=?, rg=?, cpf=?, data_nascimento=?, salario=? WHERE id=? ";

        $stmt = $this->conexao->prepare($sql);
        $stmt->bindValue(1, $model->nome);
        $stmt->bindValue(2, $model->rg);
        $stmt->bindValue(3, $model->cpf);
        $stmt->bindValue(4, $model->data_nascimento);
        $stmt->bindValue(5, $model->salario);
        $stmt->bindValue(6, $model->id);
        $stmt->execute();
    }

    public function select()
    {
        $sql = "SELECT * FROM funcionario";

        $stmt = $this->conexao->prepare($sql);
        $stmt->execute();

        return $stmt-> fetchAll(PDO::FETCH_CLASS);
    }

    public function selectById(int $id)
    {
        $sql = "SELECT * FROM funcionario WHERE id=?";

        $stmt = $this->conexao->prepare($sql);
        $stmt->bindValue(1, $id);
        $stmt->execute();

        return $stmt->fetchObject("FuncionarioModel");
    }

    public function delete(int $id)
    {
        $sql = "DELETE FROM funcionario WHERE id = ? ";

        $stmt = $this->conexao->prepare($sql);
        $stmt->bindValue(1, $id);
        $stmt->execute();
    }
} 