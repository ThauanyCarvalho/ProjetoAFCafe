<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <title>Novo Produto</title>
</head>
<body>
    <header>

    </header>
    <main>

        <?php
        spl_autoload_register(function($class){
            require_once "Classes/{$class}.class.php";
        });
        if(filter_has_var(INPUT_GET, "id")){
            $produtoEdt =  new Produtos;
            $id = intval(filter_input(INPUT_GET,"id"));
            $produto = $produtoEdt->search("idProduto", $id);
        }
        ?>

        <div class="container">
            <form action="<?php htmlspecialchars($_SERVER["PHP_SELF"]) ?>" method="post" class="row g3" enctype="multipart/form-data">
            <input type="hidden" name="id" value="<?php echo $aluno->idProduto?>">
                <div class="col-12 mb-3">
                    <label for="nome" class="form-label">Nome</label>
                    <input type="text" name="nome" id="nome" placeholder="" class="form-control" value="<?php echo $produto->nomeProduto?>">
                </div>
                <div class="col-md-4 mb-3">
                    <label for="descricao" class="form-label">Descrição</label>
                    <input type="text" name="descricao" id="descricao" placeholder="" class="form-control" value="<?php echo $produto->descricaoProduto?>">
                </div>
                <div class="col-12 mb-3">
                    <label for="preco" class="form-label">Preço</label>
                    <input type="preco" name="preco" id="preco" placeholder="" class="form-control" value="<?php echo $produto->precoProduto?>">
                </div>               
                <div class="col-12 mb-3">
                    <label for="imagem" class="form-label">Imagem</label>
                    <input type="file" name="imagem" id="imagem" placeholder="" class="form-control">
                </div>
                <div class="col-12 mb-3">
                    <button type="submit" class="btn btn-primary" name="salvar">Salvar</button>
                </div>
            </form>
        </div>
    </main>
    <footer>

    </footer>
</body>
</html>