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
        <?php echo form_open('user/store') ?>
        <div class="form-group">
            <label for="id">ID</label>
            <input type="hidden" name="id" value="<?php echo isset($user['id']) ? $user['id'] : ''; ?>">
        </div>
        <div class="form-group">
            <label for="name">apelido</label>
            <input type="text" name="name" value="<?php echo isset($user['name']) ? $user['name'] : ''; ?>" id="username" class="form-control">
        </div>
        <div class="form-group">
            <label for="username">primeiro nome</label>
            <input type="text" name="username" value="<?php echo isset($user['username']) ? $user['username'] : ''; ?>" id="username" class="form-control">
        </div>
        <div class="form-group">
            <label for="lastname">ultimo nome</label>
            <input type="text" name="lastname" value="<?php echo isset($user['lastname']) ? $user['lastname'] : ''; ?>" id="username" class="form-control">
        </div>
        <div class="form-group">
            <label for="email">Email</label>
            <input type="text" name="email" value="<?php echo isset($user['email']) ? $user['email'] : ''; ?>" id="username" class="form-control">
        </div>
        <div class="form-group">
            <label for="equipe">Equipe</label>
            <select name="equipe" id="equipe" class="form-control">
                <?php foreach ($equipe as $equipeItem): ?>
                    <option value="<?php echo $equipeItem['id']; ?>" <?php echo (isset($user['equipe']) && $user['equipe'] == $equipeItem['id']) ? 'selected' : ''; ?>>
                        <?php echo $equipeItem['nome']; ?>
                    </option>
                <?php endforeach; ?>
            </select>
        </div>
        <input type="submit" value="Salvar" class="btn btn-primary">
        <?php echo form_close() ?>
    </div>
</body>
</html>
