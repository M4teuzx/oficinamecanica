
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0/dist/css/bootstrap.min.css">
    <script src="https://cdn.jsdelivr.net/npm/codeigniter4/dist/script.js"></script>
    <title>Equipes</title>
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
    <div class="row">
            <h1 class="text-white col-md-11">Equipes</h1>
            <div class="col-md-1">
            <a href="<?php echo base_url('equipe/create'); ?>" class="btn btn-danger rounded-circle">+</a>
            </div>
        </div>
        <table class="table table-striped table-hover">
            <thead>
                <tr class="text-white">
                    <th>ID</th>
                    <th>Nome da Equipe</th>
                    <th>Serviço prestado</th>
                    <th>Ações</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach($equipe as $equipe): ?>
                    <tr class="text-white">
                        <td><?php echo $equipe['id']; ?></td>
                        <td><?php echo $equipe['nome']; ?></td>
                        <td><?php echo $equipe['nome_servico']; ?></td>
                        <td>
                        <a href="<?php echo base_url('equipe/edit/' . $equipe['id']); ?>" class="btn btn-warning">Editar</a>
                        <a href="<?php echo base_url('equipe/delete/' . $equipe['id']); ?>" class="btn btn-danger" onclick="return confirma()">Excluir</a>
                        </td>
                    </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
        <?php echo $pager->links(); ?>
    </div>
</body>
</html>
