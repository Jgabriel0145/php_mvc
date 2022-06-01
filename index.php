<?php

//php -S localhost:8000

$uri_parse = parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH);


include 'Controller/PessoaController.php';
include 'Controller/ProdutoController.php';
include 'Controller/FuncionarioController.php';
include 'Controller/CategoriaProdutoController.php';


switch($uri_parse)
{
    case '/pessoa':
        PessoaController::index();
    break;

    case '/pessoa/form':
        PessoaController::form();
    break;

    case '/pessoa/save':
        PessoaController::save();
    break;

    case '/pessoa/delete':
        PessoaController::delete();
    break;
    


    case '/produto':
        ProdutoController::index();
    break;

    case '/produto/form':
        ProdutoController::form();
    break;

    case '/produto/save':
        ProdutoController::save();
    break;

    case '/produto/delete':
        ProdutoController::delete();
        break;

    

    case '/funcionario':
        FuncionarioController::index();
    break;
    
    case '/funcionario/form':
        FuncionarioController::form();
    break;
    
    case '/funcionario/save':
        FuncionarioController::save();
    break;
    
    case '/funcionario/delete':
        FuncionarioController::delete();
    break;



    case '/categoriaproduto':
        CategoriaProdutoController::index();
    break;

    case '/categoriaproduto/form':
        CategoriaProdutoController::form();
    break;

    case '/categoriaproduto/save':
        CategoriaProdutoController::save();
    break;

    case '/categoriaproduto/delete':
        CategoriaProdutoController::delete();
    break;



    default:
        include 'View/inicio.php';
    break;
}

