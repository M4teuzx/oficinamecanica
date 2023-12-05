<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0/dist/css/bootstrap.min.css">
    <script src="https://cdn.jsdelivr.net/npm/codeigniter4/dist/script.js"></script>
    <title>Edição</title>
    <style>
        .container {
            margin-top: 50px; /
        }

        input[type="text"],
        select {
            width: 100%; 
            margin-bottom: 10px; 
        }

        input[type="submit"] {
            width: 100%; 
        }
    </style>
</head>
<body>
    <div class="container">
        <?php echo form_open('cliente/store') ?>
        <input type="hidden" name="id" value="<?php echo isset($cliente['id']) ? $cliente['id'] : ''; ?>">

        <div class="form-group">
            <label for="nome">Nome</label>
            <input type="text" name="nome" value="<?php echo isset($cliente['nome']) ? $cliente['nome'] : ''; ?>" id="nome" class="form-control">
        </div>
        <div class="form-group">
            <label for="cpf">CPF</label>
            <input type="text" name="cpf" value="<?php echo isset($cliente['cpf']) ? $cliente['cpf'] : ''; ?>" id="cpf" class="form-control">
        </div>
        <div class="form-group">
            <label for="endereco">Endereço</label>
            <input type="text" name="endereco" value="<?php echo isset($cliente['endereco']) ? $cliente['endereco'] : ''; ?>" id="endereco" class="form-control">
        </div>
        <div class="form-group">
            <label for="telefone">Telefone</label>
            <input type="text" name="telefone" value="<?php echo isset($cliente['telefone']) ? $cliente['telefone'] : ''; ?>" id="telefone" class="form-control">
        </div>
        <div class="form-group">
            <label for="email">E-mail</label>
            <input type="email" name="email" value="<?php echo isset($cliente['email']) ? $cliente['email'] : ''; ?>" id="email" class="form-control">
        </div>
        <input type="submit" value="Salvar" class="btn btn-primary">
        <?php echo form_close() ?>
    </div>
</body>
</html>
