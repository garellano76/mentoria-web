<?php

require "util/db.php";

if (isset($_POST["crear_gar"])) {    
   	$nombre_gar = $_POST['name'];
	$email_gar = $_POST['email'];
    $usuario_gar = $_POST['usuario'];    
    $pass = $_POST['pass'];    
    $pass_1 = password_hash($pass, PASSWORD_DEFAULT);

    $sql = "INSERT INTO  users 
            (full_name, email, user_name, password)
          VALUES
            (:full_name, :email, :user_name, :password)";

	

// stament
$db = connectDB();
$stmt = $db->prepare($sql);

$stmt->bindParam(':full_name', $nombre_gar);
$stmt->bindParam(':email', $email_gar);
$stmt->bindParam(':user_name', $usuario_gar);
$stmt->bindParam(':id', $pass_1);
                     
$stmt->execute();

header("Location: index.php");

}

?>


<!doctype html>
<html lang="en" class="h-100">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="assets/css/bootstrap.min.css">
    <link rel="stylesheet" href="assets/css/style.css">
    <link rel="shortcut icon" href="assets/img/favicon.ico" type="image/x-icon">

    <title>Creación Usuarios Nuevos - GAR</title>
   
  </head>
  <body class="d-flex flex-column h-100">
    
    <div class="container pt-4 pb-4">
        <nav class="navbar navbar-expand-lg navbar-light bg-light rounded">
            <a class="navbar-brand" href="#">HTML CRUD Template - GAR</a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarsExample09" aria-controls="navbarsExample09" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
    
            <div class="collapse navbar-collapse" id="navbarsExample09">
                <ul class="navbar-nav mr-auto">
                    <li class="nav-item">
                        <a class="nav-link" href="index.html">Home <span class="sr-only">(current)</span></a>
                    </li>
                    <li class="nav-item active">
                        <a class="nav-link" href="create.html">Create</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#">FAQ</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="https://pisyek.com/contact">Help</a>
                    </li>
                </ul>
                <form class="form-inline my-2 my-md-0">
                <input class="form-control" type="text" placeholder="Search" aria-label="Search">
                </form>
            </div>
        </nav>
    </div>
        
    <main role="main" class="flex-shrink-0">
        <div class="container">
            <h1>Creación Usuarios Nuevos - GAR</h1>
            <form action="" method="POST">
                <div class="form-group">                 

                    <label for="name">Nombre</label>
                    <input type="text" name = "name" class="form-control" id="nombre" placeholder="Ingrese Nombre">
                    <small class="form-text text-muted">Ingrese Nombre aquí.</small>

                    <label for="email">Email</label>
                    <input type="text" name = "email" class="form-control" id="email" placeholder="Ingrese Email">
                    <small class="form-text text-muted">Ingrese Email aquí</small>

                    <label for="usuario">Usuario</label>
                    <input type="text" name = "usuario" class="form-control" id="usuario" placeholder="Ingrese Usuario">
                    <small class="form-text text-muted">Ingrese Usuario aquí</small>

                    <label for="pass">Password</label>
                    <input type="text" name = "pass" class="form-control" id="pass" placeholder="Ingrese Password">
                    <small class="form-text text-muted">Ingrese Password aquí</small>

                </div>
                <button type="submit" name = "crear_gar" class="btn btn-primary">Crear</button>
            </form>
        </div>
    </main>
      
    <footer class="footer mt-auto py-3">
        <div class="container pb-5">
            <hr>
            <span class="text-muted">
                    Copyright &copy; 2019 | <a href="https://pisyek.com">Pisyek.com</a>
            </span>
        </div>
    </footer>

    
    <script src="assets/js/jquery-3.3.1.slim.min.js"></script>
    <script src="assets/js/popper.min.js"></script>
    <script src="assets/js/bootstrap.min.js"></script>
  </body>
</html>