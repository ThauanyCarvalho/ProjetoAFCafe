<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">

    <link rel="stylesheet" href="css/alunos.css">

    <title>Lista de Alunos</title>
</head>

<body>
    <header>
        <nav class="navbar navbar-expand-lg bg-body-tertiary">
            <div class="container-fluid">
                <a class="navbar-brand" href="#">
                    <img src="imagensAlunos/download.png" alt="" width="120" height="72" class="d-inline-block align-text-top">
                    IFRO - Cacoal</a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse"
                    data-bs-target="#navbarNavDropdown" aria-controls="navbarNavDropdown" aria-expanded="false"
                    aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse" id="navbarNavDropdown">
                    <ul class="navbar-nav">
                        <li class="nav-item">
                            <a class="nav-link" href="index.php">Home</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link active" aria-current="page" href="#">Alunos</a>
                        </li>
                    </ul>
                </div>
            </div>
        </nav>
    </header>
    <main class="container mt-3">
        <div class="mb-3">
            <a href="cadProduto.php" class="btn btn-warning">Novo Aluno</a>
        </div>

        <div class="linha">
            <!-- Código php inicio -->
            <?php 
             spl_autoload_register(function ($class) {require_once "classes/{$class}.class.php";});   
             

             $nome = new nomeProduto;
             $nomes = $nome->all();
             foreach($nomes as $umProduto) {
                ?>
                <div class="item-linha">
                <h1><?php echo $umAluno-> nomeAluno ?></h1>
                <img src="imagensAlunos/<?php echo $umAluno-> foto ?>" alt="imagens">
                <p><?php echo $umAluno-> emailAluno ?></p>
                <p><a href="edtAluno.php?id=<?php echo $umAluno-> idAluno ?>" class="btn btn-primary btn-sm"><i class="bi bi-pencil-square"></i></a>
                    <a href="#" class="btn btn-danger btn-sm"><i class="bi bi-trash"></i></a>
                </p>
            </div>
                <?php
             }

            ?>
            <!-- Inicio apagar -->
            
            <!-- fim apagar -->
        </div>
    </main>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz"
        crossorigin="anonymous"></script>
</body>

</html>