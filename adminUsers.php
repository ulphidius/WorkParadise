<!doctype php>

<?php 
  session_start();  

  include('utilities_functions.php');
  $db = connectDb();

  $query = $db->prepare("SELECT * FROM users WHERE admin=:admin");
  $query->execute([
    "admin"=>"0"]);

  $listOfUsers = $query->fetchAll(PDO::FETCH_ASSOC);

?>

<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="icon" href="../../../../favicon.ico">


    <title>Starter Template for Bootstrap</title>

    <!-- Bootstrap core CSS -->
    <link href="../../../../dist/css/bootstrap.min.css" rel="stylesheet">

    <!-- Custom styles for this template -->
    <link href="starter-template.css" rel="stylesheet">
  </head>

  <body>

    <nav class="navbar navbar-expand-md navbar-dark bg-dark fixed-top">
      <a class="navbar-brand" href="#"><img src=""></a>
      <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarsExampleDefault" aria-controls="navbarsExampleDefault" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>

      <div class="collapse navbar-collapse" id="navbarsExampleDefault">
        <ul class="navbar-nav mr-auto">
          <li class="nav-item active">
            <a class="nav-link" href="#">Home <span class="sr-only">(current)</span></a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="#">Link</a>
          </li>
          <li class="nav-item">
            <a class="nav-link disabled" href="#">Disabled</a>
          </li>
          <li class="nav-item dropdown">
            <a class="nav-link dropdown-toggle" href="http://example.com" id="dropdown01" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Dropdown</a>
            <div class="dropdown-menu" aria-labelledby="dropdown01">
              <a class="dropdown-item" href="#">Action</a>
              <a class="dropdown-item" href="#">Another action</a>
              <a class="dropdown-item" href="#">Something else here</a>
            </div>
          </li>
        </ul>
        <form class="form-inline my-2 my-lg-0">
          <input class="form-control mr-sm-2" type="text" placeholder="Search" aria-label="Search">
          <button class="btn btn-outline-success my-2 my-sm-0" type="submit">Search</button>
        </form>
      </div>
    </nav>


    <main role="main" class="container">
    <a href="administration.php" class="btn btn-outline-info">Administration</a>
      <div class="starter-template">
        
          <table class="table table-hover table-responsive">
     <thead class="thead-inverse">
      <tr>
        <th style="text-align: center;">#</td>
        <th style="text-align: center;">first name</th>
        <th style="text-align: center;">last name</th>
        <th style="text-align: center;">email</th>
        <th style="text-align: center;">statut</th>
        <th style="text-align: center;">secret</th>
        <th></th>
        <th></th>
      </tr>
       </thead>
        <tbody>
      <?php
            foreach( $listOfUsers as $key=>$user) {
              if($user["statut"] == 0){
                $statut="<button type='button' class='btn btn-success' disabled>validate</button>"; 
              }else{
                $statut="<button type='button' class='btn btn-danger' disabled>not validate</button>";
              }

              echo '<tr><td>'.$user['id'].'</td>';
              echo '<td style="text-align: center;">'.$user["firstname"].'</td>';
              echo '<td style="text-align: center;">'.$user["lastname"].'</td>';
              echo '<td style="text-align: center;">'.$user["email"].'</td>';
              echo '<td style="text-align: center;">'.$statut.'</td>';
              echo '<td style="text-align: center;">'.$user["secret"].'</td>';              
              echo '<td><a href="./adminUsersModif.php?id='.$user["id"].'" class="btn btn-outline-info">modify</a></td>';
              echo '<td><button onclick="confirmDelete('.$user["id"].')" class="btn btn-outline-danger">Delete</button></td></tr>';
    }
    ?>
      </tbody>
      </table>
      <a href="./adminUsersAdd.php" class="btn btn-outline-primary">Add User</a>
  

      </div>
    </main><!-- /.container -->

    <!-- Bootstrap core JavaScript
    ================================================== -->
    <!-- Placed at the end of the document so the pages load faster -->
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script>window.jQuery || document.write('<script src="../../../../assets/js/vendor/jquery-slim.min.js"><\/script>')</script>
    <script src="../../../../assets/js/vendor/popper.min.js"></script>
    <script src="../../../../dist/js/bootstrap.min.js"></script>
    <script src="scriptAdminUsers.js"></script>
  </body>
</html>
