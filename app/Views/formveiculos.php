<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0/dist/css/bootstrap.min.css">
    <script src="https://cdn.jsdelivr.net/npm/codeigniter4/dist/script.js"></script>
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
    <title>criar/editar</title>
</head>
<body>
    <div class="container">
        <?php echo form_open('veiculos/store') ?>
        <input type="hidden" name="id" value="<?php echo isset($veiculos['id']) ? $veiculos['id'] : ''; ?>">

        <div class="form-group">
            <label for="marca">Marca</label>
            <input type="text" name="marca" value="<?php echo isset($veiculos['marca']) ? $veiculos['marca'] : ''; ?>" id="marca" class="form-control">
        </div>
        <div class="form-group">
            <label for="modelo">Modelo</label>
            <input type="text" name="modelo" value="<?php echo isset($veiculos['modelo']) ? $veiculos['modelo'] : ''; ?>" id="modelo" class="form-control">
        </div>
        <div class="form-group">
            <label for="placa">Placa</label>
            <input type="text" name="placa" value="<?php echo isset($veiculos['placa']) ? $veiculos['placa'] : ''; ?>" id="placa" class="form-control">
        </div>
        <div class="form-group">
            <label for="cliente">Cliente</label>
            <select name="cliente" id="cliente" class="form-control">
                <?php foreach ($cliente as $cliente): ?>
                    <option value="<?php echo $cliente['id']; ?>" <?php echo (isset($veiculos['cliente']) && $veiculos['cliente'] == $cliente['id']) ? 'selected' : ''; ?>>
                        <?php echo $cliente['nome']; ?>
                    </option>
                <?php endforeach; ?>
            </select>
        </div>
        <input type="submit" value="Salvar" class="btn btn-primary">
        <?php echo form_close() ?>
    </div>
</body>
</html>
