<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0/dist/css/bootstrap.min.css">
    <script src="https://cdn.jsdelivr.net/npm/codeigniter4/dist/script.js"></script>
    <title>peças</title>
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
    } return true;
    } 

</script>
</head>
<body>
<a href="<?php echo base_url('/home'); ?>" class="btn btn-primary">voltar</a>
    <div class="container mt-5">
    <div class="row">
            <h1 class="text-white col-md-11">Serviços</h1>
            <div class="col-md-1">
            <a href="<?php echo base_url('servicos/create'); ?>" class="btn btn-danger rounded-circle">+</a>
            </div>
        </div>
        <table class="table table-striped">
            <thead>
                <tr class="text-white">
                    <th>Id</th>
                    <th>tipo</th>
                    <th>preço</th>
                    <th>Ações</th>
                </tr>
            </thead>
            <tbody class="text-white">
                <?php foreach($servicos as $servicos): ?>
                    <tr class="text-white">
                        <td><?php echo $servicos['id']; ?></td>
                        <td><?php echo $servicos['tipo']; ?></td>
                        <td><?php echo $servicos['preco']; ?></td>
                        <td>
                            <a href="<?php echo base_url('servicos/edit/' . $servicos['id']); ?>" class="btn btn-warning">Editar</a>
                            <a href="<?php echo base_url('servicos/delete/' . $servicos['id']); ?>" class="btn btn-danger" onclick="return confirma()">Excluir</a>
                        </td>
                    </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
        <?php echo $pager->links(); ?>
    </div>
</body>
</html>