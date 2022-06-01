<?php

/**
 * Classes Controller são responsáveis por processar as requisições do usuário.
 * Isso significa que toda vez que um usuário chama uma rota, um método (função)
 * de uma classe Controller é chamado.
 * O método poderá devolver uma View (fazendo um include), acessar uma Model (para
 * buscar algo no banco de dados), redirecionar o usuário de rota, ou mesmo,
 * chamar outra Controller.
 */
class FuncionarioController 
{
    /**
     * Os métodos index serão usados para devolver uma View.
     */
    public static function index() 
    {
        include 'Model/FuncionarioModel.php';
        $model = new FuncionarioModel();
        $model->getAllRows();

        include 'View/modules/Funcionario/ListaFuncionario.php';
    }

   /**
     * Devolve uma View contendo um formulário para o usuário.
     */
    public static function form()
    {
        include 'Model/FuncionarioModel.php';

        $model = new FuncionarioModel();

        if (isset($_GET['id']))
            $model = $model->getById((int)$_GET['id']);

        include 'View/modules/Funcionario/FormFuncionario.php';


    }

    /**
     * Preenche um Model para que seja enviado ao banco de dados para salvar.
     */
    public static function save() {

        include 'Model/FuncionarioModel.php'; // inclusão do arquivo model.

        // Abaixo cada propriedade do objeto sendo abastecida com os dados informados
        // pelo usuário no formulário (note o envio via POST)
        $model = new FuncionarioModel();
        $model->id = $_POST['id'];
        $model->nome = $_POST['nome'];
        $model->rg = $_POST['rg'];
        $model->cpf = $_POST['cpf'];
        $model->data_nascimento = $_POST['data_nascimento'];
        $model->salario = $_POST['salario'];

        $model->save();  // chamando o método save da model.

        header("Location: /funcionario"); // redirecionando o usuário para outra rota.
    }

    public static function delete()
    {
        include 'Model/FuncionarioModel.php'; // inclusão do arquivo model.

        $model = new FuncionarioModel();

        $model->delete( (int) $_GET['id'] ); // Enviando a variável $_GET como inteiro para o método delete

        header("Location: /funcionario"); // redirecionando o usuário para outra rota.
    }
}