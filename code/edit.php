<?php

require "util/db.php";

if (isset($_POST["guardarcambios"])) {
   	$nombre_gar = $_POST['name'];
	$email_gar = $_POST['email'];
    $usuario_gar = $_POST['usuario'];    

	$sql ="UPDATE users SET full_name = :full_name, email = :email, user_name = :user_name WHERE ID = :id";

// stament
$db = connectDB();
$stmt = $db->prepare($sql);

$stmt->bindParam(':full_name', $nombre_gar);
$stmt->bindParam(':email', $email_gar);
$stmt->bindParam(':user_name', $usuario_gar);
$stmt->bindParam(':id', $_GET['v4']);
                     
$stmt->execute();

echo "Info de Usuario Actualizada !!!";

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

    <title>List of User</title>
   
  </head>
  <body class="d-flex flex-column h-100">
    
    <div class="container pt-4 pb-4">
        <nav class="navbar navbar-expand-lg navbar-light bg-light rounded">
            <a class="navbar-brand" href="#">HTML CRUD Template</a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarsExample09" aria-controls="navbarsExample09" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
    
            <div class="collapse navbar-collapse" id="navbarsExample09">
                <ul class="navbar-nav mr-auto">
                    <li class="nav-item">
                        <a class="nav-link" href="index.html">Home <span class="sr-only">(current)</span></a>
                    </li>
                    <li class="nav-item">
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
            <h1>Modificar Usuarios GAR</h1>
            <form action="" method="POST">
                <div class="form-group">
                    <label for="name">Nombre</label>
                    <input type="text" class="form-control" id="name" name="name" value=<?= $_GET['v1'] ?> placeholder="Ingrese Nombre">
                    <small class="form-text text-muted">Modifique nombre aquí.</small>

                    <label for="email">Email</label>
                    <input type="text" class="form-control" id="email" name="email" value=<?= $_GET['v2'] ?> placeholder="Ingrese Email">
                    <small class="form-text text-muted">Modifique email aquí.</small>

                    <label for="usuario">Usuario</label>
                    <input type="text" class="form-control" id="usuario" name="usuario" value=<?= $_GET['v3'] ?> placeholder="Ingrese Usuario">
                    <small class="form-text text-muted">Modifique usuario.</small>
                </div>               

                <button type="submit" class="btn btn-primary" name = "guardarcambios">Guardar Cambios</button>
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