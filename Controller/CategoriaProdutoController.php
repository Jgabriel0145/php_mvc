<?php

/**
 * Classes Controller são responsáveis por processar as requisições do usuário.
 * Isso significa que toda vez que um usuário chama uma rota, um método (função)
 * de uma classe Controller é chamado.
 * O método poderá devolver uma View (fazendo um include), acessar uma Model (para
 * buscar algo no banco de dados), redirecionar o usuário de rota, ou mesmo,
 * chamar outra Controller.
 */
class CategoriaProdutoController 
{
    /**
     * Os métodos index serão usados para devolver uma View.
     */
    public static function index() 
    {
        include 'Model/CategoriaProdutoModel.php';
        $model = new CategoriaProdutoModel();
        $model->getAllRows();

        include 'View/modules/CategoriaProduto/CategoriaProdutoLista.php';
    }

   /**
     * Devolve uma View contendo um formulário para o usuário.
     */
    public static function form()
    {
        include 'Model/CategoriaProdutoModel.php';

        $model = new CategoriaProdutoModel();

        if (isset($_GET['id']))
            $model = $model->getById((int)$_GET['id']);

        include 'View/modules/CategoriaProduto/CategoriaProdutoForm.php';


    }

    /**
     * Preenche um Model para que seja enviado ao banco de dados para salvar.
     */
    public static function save() {

        include 'Model/CategoriaProdutoModel.php'; // inclusão do arquivo model.

        // Abaixo cada propriedade do objeto sendo abastecida com os dados informados
        // pelo usuário no formulário (note o envio via POST)
        $model = new CategoriaProdutoModel();
        $model->id = $_POST['id'];
        $model->categoria = $_POST['categoria'];

        $model->save();  // chamando o método save da model.

        header("Location: /categoriaproduto"); // redirecionando o usuário para outra rota.
    }

    public static function delete()
    {
        include 'Model/CategoriaProdutoModel.php'; // inclusão do arquivo model.

        $model = new CategoriaProdutoModel();

        $model->delete( (int) $_GET['id'] ); // Enviando a variável $_GET como inteiro para o método delete

        header("Location: /categoriaproduto"); // redirecionando o usuário para outra rota.
    }
}