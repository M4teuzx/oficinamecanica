<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0/dist/css/bootstrap.min.css">
    <script src="https://cdn.jsdelivr.net/npm/codeigniter4/dist/script.js"></script>
    <title>Edição de Equipe</title>
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
        <?php echo form_open('equipe/store') ?>
        <div class="form-group">
            <label for="nome">Nome da Equipe</label>
            <input type="text" name="nome" value="<?php echo isset($equipe['nome']) ? $equipe['nome'] : '' ?>" id="nome" class="form-control">
        </div>
        <div class="form-group">
            <label for="servico">Serviço</label>
            <select name="servico" id="servico" class="form-control">
                <?php foreach ($servico as $servico): ?>
                    <option value="<?php echo $servico['id']; ?>" <?php echo (isset($equipe['servico']) && $equipe['servico'] == $servico['id']) ? 'selected' : ''; ?>>
                        <?php echo $servico['tipo']; ?>
                    </option>
                <?php endforeach; ?>
            </select>
        </div>
        <input type="submit" value="Salvar" class="btn btn-primary">
        <?php echo form_close() ?>
    </div>
</body>
</html>
