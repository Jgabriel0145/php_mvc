<?php

class ProdutoController {

    public static function index()
    {
        include 'Model/ProdutoModel.php';
        $model = new ProdutoModel;
        $model->getAllRows();

        include 'View/modules/Produto/ProdutoListar.php';
    }

    public static function form(){
        include 'Model/ProdutoModel.php';

        include 'Model/CategoriaProdutoModel.php';
        $model_categoria = new CategoriaProdutoModel();
        if (isset($_GET['id']))
            $model_categoria = $model_categoria->getById((int)$_GET['id']);

        $model = new ProdutoModel();

        if (isset($_GET['id']))
            $model = $model->getById((int)$_GET['id']);

        include 'View/modules/Produto/ProdutoCadastro.php';
    }

    public static function save(){
        include 'Model/ProdutoModel.php';

        $model = new ProdutoModel();
        $model->id = $_POST['id'];
        $model->nome = $_POST['nome'];
        $model->descricao = $_POST['descricao'];

        $preco = $_POST['preco'];
        $preco=str_replace(',','.',$preco);
        $preco=floatval($preco);       

        $model->preco=$preco;
        $model->id_categoria_produto = $_POST['id_categoria_produto'];

        $model->save();
        header("Location: /produto");
    }

    public static function delete()
    {
        include 'Model/ProdutoModel.php'; // inclusão do arquivo model.

        $model = new ProdutoModel();

        $model->delete( (int) $_GET['id'] ); // Enviando a variável $_GET como inteiro para o método delete

        header("Location: /produto"); // redirecionando o usuário para outra rota.
    }
}