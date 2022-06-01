<!DOCTYPE html>
<html lang="br">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <?php include 'View/css/lista_form_css.php'; ?>
    <title>Categoria de produtos</title>
</head>
<body>
    <h1>Categoria de Produtos</h1>
    
    <table>
        <tr>
            <th></th>
            <th>Categoria</th>
        </tr>

        <?php

            //var_dump($model->rows);

        ?>

        <?php foreach($model->rows as $item): ?>
        <tr>

            <td>
                <a href="/categoriaproduto/delete?id=<?= $item->id ?>" class="botao_excluir">X</a>
            </td>

            <!--<td><?//= $item->id ?></td>-->

            <td>
                <a href="/categoriaproduto/form?id=<?= $item->id ?>"><?= $item->categoria ?></a>
            </td>

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