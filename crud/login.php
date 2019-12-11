<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>CRUD - Login</title>
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <link rel="stylesheet" href="css/fontawesome-all.min.css">
    <link rel="stylesheet" href="css/login.css">
</head>
<body>


<div class="container">
    <div class="row">
        <div class="col-md-4"></div>

        <div class="col-md-4">
            <div class="panel panel-info">
                <div class="panel-heading text-center">
                <b>LOGIN</b>
                </div>
                <div class="panel-body">
                    <form method="POST" action="autentica.php" class="form">
                        <div class="form-group">
                        <!-- autofocus é para colocar o foco onde quer -->
                            <input autofocus type="text" name="user" placeholder="Usuário" class="form-control">
                        </div>
                        <div class="form-group">
                            <input type="password" name="pass" placeholder="Senha" class="form-control">
                        </div>
                        <div class="form-group text-center">
                            <button type="submit" class="btn btn-primary">ENTRAR</button>
                        </div>
                        <?php
                        if (isset($_GET['falhou'])) {
                        ?>
                        <div class="alert alert-danger" id="erro">
                            <i class="glyphicon glyphicon-alert"></i> Usuário ou senha inválido!
                        </div>
                        <?php
                        } else {
                            
                        }
                        ?>

                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
<div class="col-md-4"></div>



<script src="js/jquery.js"></script>
<script src="js/bootstrap.min.js"></script>
</body>
</html>