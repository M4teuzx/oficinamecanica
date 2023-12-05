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
        <?php echo form_open('ordem/store', ['method' => 'post', 'id' => 'myForm']); ?>
        <input type="hidden" name="id" value="<?php echo isset($ordem['id']) ? $ordem['id'] : ''; ?>">
        <div class="form-group">
            <label for="carro">Placa do Carro</label>
            <input type="text" name="carro" value="<?php echo isset($ordem['carro']) ? $ordem['carro'] : ''; ?>" id="carro" class="form-control">
        </div>

        <div class="form-group">
            <label for="descricao">Descrição</label>
            <input type="text" name="descricao" value="<?php echo isset($ordem['descricao']) ? $ordem['descricao'] : ''; ?>" id="descricao" class="form-control">
        </div>

        <?php if (isset($ordem['id'])): ?>
            <div class="form-group">
                <label for="pecas">Peças Utilizadas</label>
                <?php if (isset($pecas)): ?>
                    <?php foreach ($pecas as $peca): ?>
                        <div class="input-group mb-3">
                            <div class="input-group-prepend">
                                <div class="input-group-text">
                                    <input type="checkbox" name="pecas[]" value="<?php echo $peca['id']; ?>" <?php echo (in_array($peca['id'], $pecasSelecionadas)) ? 'checked' : ''; ?>>
                                </div>
                            </div>
                            <input type="text" name="quantidade_peca[<?php echo $peca['id']; ?>]" value="<?php echo isset($quantidadesPecas[$peca['id']]) ? $quantidadesPecas[$peca['id']] : ''; ?>" class="form-control" placeholder="Quantidade">
                            <span class="input-group-text"><?php echo $peca['nome']; ?></span>
                        </div>
                    <?php endforeach; ?>
                <?php endif; ?>
            </div>

            <div class="form-group">
                <label for="servicos">Serviços Realizados</label>
                <?php foreach ($servicos as $servico): ?>
                    <div class="form-check">
                        <input class="form-check-input" type="checkbox" name="servicos[]" value="<?php echo $servico['id']; ?>" <?php echo (in_array($servico['id'], $servicosSelecionados)) ? 'checked' : ''; ?>>
                        <label class="form-check-label">
                            <?php echo $servico['tipo']; ?>
                        </label>
                    </div>
                <?php endforeach; ?>
            </div>
        <?php endif; ?>

        <input type="submit" value="Salvar" class="btn btn-primary">
        <?php echo form_close() ?>
    </div>
</body>
</html>
