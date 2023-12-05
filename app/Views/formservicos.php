<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0/dist/css/bootstrap.min.css">
    <script src="https://cdn.jsdelivr.net/npm/codeigniter4/dist/script.js"></script>
    <title>criar/editar</title>
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
    <?php echo form_open('servicos/store') ?>
    <input type="hidden" name="id" value="<?php echo isset($servicos['id']) ? $servicos['id'] : ''; ?>">

    <div class="form-group">
        <label for="tipo">tipo</label>
        <input type="text" name="tipo" value="<?php echo isset($servicos['tipo']) ? $servicos['tipo'] : ''; ?>" id="tipo" class="form-control">
    </div>
    <div class="form-group">
        <label for="preco">preço</label>
        <input type="text" name="preco" value="<?php echo isset($servicos['preco']) ? $servicos['preco'] : ''; ?>" id="preco" class="form-control">
    </div>
    <input type="submit" value="Salvar" class="btn btn-primary">
    <?php echo form_close() ?>
    </div>
</body>
</html>