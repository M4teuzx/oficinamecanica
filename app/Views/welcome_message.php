<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
    <title>Oficina Mecânica</title>
    <style>
        body {
            background-color: black;
            margin: 0;
            padding: 0;
            overflow-x: hidden;
        }

        .hero {
            position: relative;
            color: #ffffff;
            margin-bottom: 255px;
        }

        .hero img {
            position: absolute;
            top: 0;
            right: 0;
            height: 500px; 
            object-fit: cover;
        }

        .container {
            background-color: black;
        }

        h2 {
            margin-bottom: 0; 
        }

        .btn {
            margin: 10px;
            text-align: center;
            display: block;
            width: calc(100% - 20px); 
            height: 200px;
            line-height: 300px;
            position: relative;
            overflow: hidden;
            border-radius: 8px;
            background-size: cover;
            color: #fff;
        }

        .btn span {
            background-color: rgba(0, 0, 0, 0.6);
            display: block;
            position: absolute;
            top: 50%;
            left: 0;
            width: 100%;
            padding: 10px;
            box-sizing: border-box;
            transform: translateY(-50%);
        }

        .navbar {
            background-color: #000;
        }

        .navbar-nav {
            margin-left: auto; 
        }

        .nav-link {
            color: #fff !important; 
        }

        .logout-btn {
            background-color: #dc3545;
            border: none;
            border-radius: 8px;
            color: #fff;
            padding: 10px 20px;
        }

        .text-hero {
            margin-top: 190px;
        }

        .text-h {
            font-size: 70px;
            font-weight: bold;
            margin-left: 20px;
        }

        .btn-style
        {
            box-shadow: 0px 0px 105px -22px rgba(248, 248, 248, 0.25);
        }
        .btn-style:hover
        {
            scale: 1.01;
            transition: 0.1s;
        }
    </style>
</head>
<body>
<nav class="navbar navbar-expand-lg bg-DARK">
    <div class="container-fluid">
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavAltMarkup" aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNavAltMarkup">
            <div class="navbar-nav">
                <a class="nav-link text-white logout-btn" href="<?php echo base_url('/'); ?>">Logout</a>
            </div>
        </div>
    </div>
</nav>
<div class="hero">
    <div class="container">
        <div class="row">
            <div class="col-md-8 text-hero">
                <h2 class="text-h">Oficina Mecânica</h2>
            </div>
            <div class="col-md-6">
                <img src="./heroimg.png" alt="Hero Image" class="img-fluid img-style">
            </div>
        </div>
    </div>
</div>

    <div class="container mt-5">
        <div class="row">
            <div class="col-md-4">
                <a href="<?php echo base_url('users'); ?>" class="btn btn-dark btn-style" style="background-image: url('./funcionarios.png');">
                    <span>Cadastrar Funcionário</span>
                </a>
            </div>
            <div class="col-md-4">
                <a href="<?php echo base_url('pecas'); ?>" class="btn btn-dark btn-style" style="background-image: url('./pecas.png');">
                    <span>Cadastrar Peças</span>
                </a>
            </div>
            <div class="col-md-4">
                <a href="<?php echo base_url('servicos'); ?>" class="btn btn-dark btn-style" style="background-image: url('./servicos.png');">
                    <span>Cadastrar Serviços</span>
                </a>
            </div>
        </div>

        <div class="row">
            <div class="col-md-4">
                <a href="<?php echo base_url('veiculos'); ?>" class="btn btn-dark btn-style" style="background-image: url('./veiculos.png');">
                    <span>Cadastrar Veículos</span>
                </a>
            </div>
            <div class="col-md-4">
                <a href="<?php echo base_url('cliente'); ?>" class="btn btn-dark btn-style" style="background-image: url('./clientes.png');">
                    <span>Cadastrar Clientes</span>
                </a>
            </div>
            <div class="col-md-4">
                <a href="<?php echo base_url('equipe'); ?>" class="btn btn-dark btn-style" style="background-image: url('./equipes.png');">
                    <span>Cadastrar Equipes</span>
                </a>
            </div>
        </div>

        <div class="row">
            <div class="col-md-12">
                <a href="<?php echo base_url('ordem'); ?>" class="btn btn-dark btn-style" style="background-image: url('./ordens.png');">
                    <span>Ordem de serviço</span>
                </a>
            </div>
        </div>

    </div>
</body>
</html>
