<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0/dist/css/bootstrap.min.css">
    <script src="https://cdn.jsdelivr.net/npm/codeigniter4/dist/script.js"></script>
    <title>Veiculos</title>
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
    <div class="container mt-5">
        <?php echo anchor(base_url('veiculos/create'), 'Novo Veículo', ['class' => 'btn btn-success mb-3']); ?>
        <table class="table table-striped table-hover">
            <thead>
                <tr class="text-white">
                    <th>ID</th>
                    <th>Marca</th>
                    <th>Modelo</th>
                    <th>Placa</th>
                    <th>Cliente</th>
                    <th>Ações</th>
                </tr>
            </thead>
            <tbody >
                <?php foreach($veiculos as $veiculo): ?>
                    <tr class="text-white">
                        <td><?php echo $veiculo['id']; ?></td>
                        <td><?php echo $veiculo['marca']; ?></td>
                        <td><?php echo $veiculo['modelo']; ?></td>
                        <td><?php echo $veiculo['placa']; ?></td>
                        <td><?php echo $veiculo['nome_cliente']; ?></td>
                        <td>
                            <a href="<?php echo base_url('veiculos/edit/' . $veiculo['id']); ?>" class="btn btn-warning">Editar</a>
                            <a href="<?php echo base_url('veiculos/delete/' . $veiculo['id']); ?>" class="btn btn-danger" onclick="return confirma()">Excluir</a>
                        </td>
                    </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
        <?php echo $pager->links(); ?>
    </div>
</body>
</html>
