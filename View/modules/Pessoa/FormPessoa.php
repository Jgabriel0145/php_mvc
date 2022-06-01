<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cadastro de Pessoa</title>
    <?php include "View/css/FormPessoa_css.php"; ?>
</head>
<body>
    <form action="/pessoa/save" method="post">
        <fieldset>
            <h2>Cadastro de Pessoa</h2>

            <input type="hidden" value="<?= $model->id ?>" name="id" />

            <label for="nome"><strong>Nome:</strong></label>
            <input name="nome" id="nome" type="text" required placeholder="Digite seu nome..." value="<?= $model->nome ?>" />

            <label for="rg"><strong>RG:</strong></label>
            <input name="rg" id="rg" type="number" required placeholder="Digite seu RG, não utilize pontos..." value="<?= $model->rg ?>" />

            <label for="cpf"><strong>CPF:</strong></label>
            <input name="cpf" id="cpf" type="number" required placeholder="Digite seu CPF, não utilize pontos..." value="<?= $model->cpf ?>" />

            <label for="data_nascimento"><strong>Data de Nascimento:</strong></label>
            <input name="data_nascimento" id="data_nascimento" type="date" required value="<?= $model->data_nascimento ?>" />

            <label for="email"><strong>E-mail:</strong></label>
            <input name="email" id="email" type="email" required placeholder="Digite seu melhor e-mail..." value="<?= $model->email ?>" />

            <label for="telefone"><strong>Telefone:</strong></label>
            <input name="telefone" id="telefone" type="numer" required placeholder="Digite seu telefone, não utilize pontos..." value="<?= $model->telefone ?>" />

            <label for="endereco"><strong>Endereço:</strong></label>
            <input name="endereco" id="endereco" type="text" required placeholder="Digite seu endereço completo..." value="<?= $model->endereco ?>" /><br>

            <button type="submit" id="enviar"><strong>Enviar</strong></button>
            

        </fieldset>
    </form>    

    <br><br>
    <button onclick="document.location='/'" id="voltar"><strong>Voltar</strong></button>
    
</body>
</html>