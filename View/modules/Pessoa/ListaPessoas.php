<!DOCTYPE html>
<html lang="br">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <?php include 'View/css/lista_form_css.php'; ?>
    <title>Lista de pessoas</title>
</head>
<body>
    <h1>Lista de Pessoas</h1>
    
    <table>
        <tr>
            <th style="background-color: rgba(0,0,0,0);"></th>
            <th>Id</th>
            <th>Nome</th>
            <th>RG</th>
            <th>CPF</th>
            <th>Data de nascimento</th>
            <th>Email</th>
            <th>Telefone</th>
            <th>Endereço</th>
        </tr>

        <?php

            //var_dump($model->rows);

        ?>

        <?php foreach($model->rows as $item): 
            ?>
        <tr>
            <td>
                <a href="/pessoa/delete?id=<?= $item->id ?>" class="botao_excluir">X</a>
            </td>

            <td><?= $item->id ?></td>

            <td>
                <a href="/pessoa/form?id=<?= $item->id ?>"><?= $item->nome ?></a>
            </td>


            <td><a href="/pessoa/form?id=<?= $item->id ?>"><?= $item->rg ?></a></td>

            <td><a href="/pessoa/form?id=<?= $item->id ?>"><?= $item->cpf ?></a></td>

            <td><a href="/pessoa/form?id=<?= $item->id ?>"><?= $item->data_nascimento ?></a></td>

            <td><a href="/pessoa/form?id=<?= $item->id ?>"><?= $item->email ?></a></td>

            <td><a href="/pessoa/form?id=<?= $item->id ?>"><?= $item->telefone ?></a></td>

            <td><a href="/pessoa/form?id=<?= $item->id ?>"><?= $item->endereco ?></a></td>


        </tr>
        
        <?php endforeach ?>

        <?php if (count($model->rows) == 0):?>
            <tr>
                <td colspan="5">Nenhum registro foi encontrado.</td>
            </tr>
        <?php endif?>

    </table>

    <br><br>
    <button onclick="document.location='/'" id="voltar"><strong>Voltar</strong></button>
</body>
</html>