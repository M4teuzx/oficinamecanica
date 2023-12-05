<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0/dist/css/bootstrap.min.css">
    <script src="https://cdn.jsdelivr.net/npm/codeigniter4/dist/script.js"></script>
    <title>ordem</title>
    <style>
        body {
            background-image: url('./background.png');
        }

        .container {
            background-color: rgba(255, 255, 255, 0.1); 
            padding: 20px;
            border-radius: 8px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            backdrop-filter: blur(10px); 
        }

        .card {
            margin-bottom: 20px;
        }


    </style>
    <script>
        function confirma() {
            if (!confirm("Deseja realmente excluir?")) {
                return false;
            }
            return true;
        }
    </script>
</head>
<body>
    <a href="<?php echo base_url('/home'); ?>" class="btn btn-primary">Voltar</a>
    <div class="container">
        <div class="row">
            <h1 class="text-white col-md-11">Ordens de Serviço</h1>
            <div class="col-md-1">
            <a href="<?php echo base_url('ordem/create'); ?>" class="btn btn-danger rounded-circle">+</a>
            </div>
        </div>
        <!-- Lista de Ordens Não Finalizadas -->
        <h2 class="text-white">Ordens Não Finalizadas</h2>
        <div class="row">
            <?php $count = 0; ?>
            <?php foreach ($ordem as $pedido): ?>
                <?php if (empty($pedido['servicos']) && empty($pedido['pecas'])): ?>
                    <div class="col-md-4">
                        <div class="card">
                            <div class="card-body">
                                <h5 class="card-title">ID: <?php echo $pedido['id']; ?></h5>
                                <p class="card-text">Carro: <?php echo $pedido['carro']; ?></p>
                                <p class="card-text">Descrição: <?php echo $pedido['descricao']; ?></p>
                                <p class="card-text">Serviços: Não concluído</p>
                                <p class="card-text">Peças: Não concluído</p>
                                <a href="<?php echo base_url('ordem/edit/' . $pedido['id']); ?>" class="btn btn-warning">Finalizar</a>
                                <a href="<?php echo base_url('ordem/delete/' . $pedido['id']); ?>" class="btn btn-danger" onclick="return confirma()">Excluir</a>
                            </div>
                        </div>
                    </div>
                    <?php $count++; ?>
                    <?php if ($count % 3 == 0): ?>
                        </div><div class="row">
                    <?php endif; ?>
                <?php endif; ?>
            <?php endforeach; ?>
        </div>

        <!-- Lista de Ordens Finalizadas -->
        <h2 class="text-white">Ordens Finalizadas</h2>
        <div class="row">
            <?php foreach ($ordem as $pedido): ?>
                <?php if (!empty($pedido['servicos']) || !empty($pedido['pecas'])): ?>
                    <div class="col-md-4">
                        <div class="card">
                            <div class="card-body">
                                <h5 class="card-title">ID: <?php echo $pedido['id']; ?></h5>
                                <p class="card-text">Carro: <?php echo $pedido['carro']; ?></p>
                                <p class="card-text">Descrição: <?php echo $pedido['descricao']; ?></p>
                                <p class="card-text">Serviços: <?php echo empty($pedido['servicos']) ? 'Não concluído' : implode('<br>', array_column($pedido['servicos'], 'tipo')); ?></p>
                                <p class="card-text">Peças: 
                                <?php 
                                if (empty($pedido['pecas'])) {
                                    echo 'Não concluído';
                                } else {
                                    foreach ($pedido['pecas'] as $peca) {
                                        echo '<br>' . $peca['nome'] . ': ' . 'R$' . $peca['preco'] ;
                                    }
                                }
                                ?>
                                </p>
                                <p class="card-text">Preço total: NAO SEI KKKK</p>
                            </div>
                        </div>
                    </div>
                <?php endif; ?>
            <?php endforeach; ?>
        </div>
    </div>
</body>
</html>
