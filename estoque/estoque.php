


<!DOCTYPE html>
<html lang="pt-BR">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Estoque</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css"
        integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">

</head>

<body>



    <nav class="navbar navbar-light bg-light">
        <div class="container">
            <a class="navbar-brand" href="../home.php" style="font-weight: 700;"><i class="fab fa-php"></i>&nbsp; Controle de estoque</a>
        </div>
    </nav>

    <div class="container" style="margin-top:25px;">
        <div class="row">
            

            <div class="col-sm-6" style="margin-top: 25px;">
                <div class="card">
                    <div class="card-body">
                        <h5 class="card-title"><i class="fas fa-clipboard-list"></i>&nbsp;Lista de produtos</h5>
                        <p class="card-text">Edite, liste e adicione exclua seus produtos.</p>
                        <a href="listar_produtos.php" class="btn btn-sm btn-primary">Listar produtos</a>
                    </div>
                </div>
            </div>
           
           
          
            <div class="col-sm-6" style="margin-top: 25px;">
                <div class="card">
                    <div class="card-body">
                        <h5 class="card-title"><i class="fas fa-pencil-alt"></i>&nbsp Listar categorias</h5>
                        <p class="card-text">Edite, liste e adicione exclua suas categorias cadastradas.</p>
                        <a href="listar_categorias.php" class="btn btn-sm btn-primary">Listar categorias</a>
                    </div>
                </div>
            </div>
            <div class="col-sm-6" style="margin-top: 25px;">
                <div class="card">
                    <div class="card-body">
                        <h5 class="card-title"><i class="fas fa-user-edit"></i>&nbsp Lista de fornecedores</h5>
                        <p class="card-text">Edite, liste e adicione exclua seus fornecedores ja cadastrados.</p>
                        <a href="listar_fornecedor.php" class="btn btn-sm btn-primary" aria-disabled="true">Listar fornecedores</a>
                    </div>
                </div>
            </div>
           
            <div class="col-sm-6" style="margin-top: 25px;">
                <div class="card">
                    <div class="card-body">
                        <h5 class="card-title"><i class="fas fa-user-check"></i>&nbsp Cadastrar Funcionarios</h5>
                        <p class="card-text">Cadastre novos funcionarios  no sistema.</p>
                        <a href="cadastro_super_usuario.php" class="btn btn-sm btn-primary">Novo funcionario</a>
                    </div>
                </div>
            </div>
           
          
           
        </div>
    </div>
    <script src="https://kit.fontawesome.com/cae6919cdb.js" crossorigin="anonymous"></script>

    <script src="https://code.jquery.com/jquery-3.4.1.slim.min.js"
        integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous">
    </script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js"
        integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous">
    </script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js"
        integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous">
    </script>
</body>

</html>