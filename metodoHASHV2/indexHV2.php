<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="//maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
    <script src="//maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>
    <script src="//cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.0.8/css/all.css">
    
    <title>Cifrado Hash V2</title>
</head>
<body>
<nav class="navbar navbar-expand-lg navbar-dark bg-dark justify-content-center">
        <div class="collapse navbar-collapse" id="navbarNavAltMarkup">
        <div class="navbar-nav">
            <a class="nav-link active" href="../index.php">Inicio</a>
            <a class="nav-link active" href="../metodoAES/indexAES.php">Cifrado AES</a>
            <a class="nav-link active" href="../metodoRSA/indexRSA.php">Cifrado RSA</a>
            <a class="nav-link active" href="../metodoHASHV1/indexHV1.php">Encriptamiento HASH V1</a>
            <a class="nav-link active" href="../metodoHASHV2/indexHV2.php">Encriptamiento HASH V2</a>
            <a class="nav-link active" href="../metodoPropio/indexPropio.php">Método Propio</a>
            <a class="nav-link active" href="../acuerdos.html">Acuerdos de Privacidad</a>
        </div>
        </div>
    </nav>
    <div class="container">
        <h3 class="display-4">Practica cifrado Hash V2</h3>
    <hr>
    <div class="card bg-light">
    <article class="card-body mx-auto" style="max-width: 400px;">
        <form action="registro.php" method="post">
        <div class="form-group input-group">
            <div class="input-group-prepend">
                <span class="input-group-text"> <i class="fa fa-user"></i> </span>
            </div>
            <input name="name" class="form-control" placeholder="Nombre Completo" type="text">
        </div> <!-- form-group// -->
        <div class="form-group input-group">
            <div class="input-group-prepend">
                <span class="input-group-text"> <i class="fa fa-user"></i> </span>
            </div>
            <input name="edad" class="form-control" placeholder="Edad" type="number">
        </div>
        <div class="form-group input-group">
            <div class="input-group-prepend">
                <span class="input-group-text"> <i class="fa fa-envelope"></i> </span>
            </div>
            <input name="email" class="form-control" placeholder="Email" type="email">
        </div> <!-- form-group// -->
        <div class="form-group input-group">
            <div class="input-group-prepend">
                <span class="input-group-text"> <i class="fa fa-lock"></i> </span>
            </div>
            <input name="contraseña" class="form-control" placeholder="Contraseña" type="password">
        </div> <!-- form-group// -->
                                        
        <div class="form-group">
            <button name="btnRegistro" type="submit" class="btn btn-primary btn-block"> Enviar  </button>
        </div> <!-- form-group// -->      
        <p class="text-center">Aceptas los <a href="../Aviso de Privacidad.pdf">Acuerdos de Privacidad</a> </p>                                                                 
    </form>
</body>
</html>