<!doctype php>

<?php 
  session_start();  

  include('utilities_functions.php');
  $db = connectDb();

  $query = $db->prepare("SELECT * FROM users");
  $query->execute();

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
    <a href="adminUsers.php" class="btn btn-outline-info">Cancel</a>
      <div class="starter-template">

        <?php 
          // On place dans une variable l'id transmit dans l'url
          $_SESSION["id"] = $_GET["id"];
          // on se connecte à la base de données
          $db=connectDb();
           
          //On sélectionne tout dans la table correspondant à l'id
          $result = $db->prepare("SELECT * FROM users WHERE id=:id");
          $result->execute([
             "id"=>$_SESSION["id"]
            ]);

          $data = $result->fetch(PDO::FETCH_ASSOC);

        ?>
        <form id="formNew">
          <div class="form-row">
            <div class="form-group col-md-6">
              <label for="inputName">Firstname</label>
              <input type="text" class="form-control" id="inputFirstname" value="<?php echo $data["firstname"]; ?>">
              <small id="HelpBlock" class="form-text text-muted"></small>
            </div>
            <div class="form-group col-md-6">
              <label for="inputDescription">Lastname</label>
              <input type="text" class="form-control" id="inputLastname" value="<?php echo $data["lastname"]; ?>">
              <small id="HelpBlock" class="form-text text-muted"></small>
            </div>
          </div>

          <div class="form-row">
            <div class="form-group col-md-8">
              <label for="inputDayRate">Email</label>
              <input type="email" class="form-control" id="inputMail" value="<?php echo $data["email"]; ?>">
              <small id="HelpBlock" class="form-text text-muted"></small>
            </div>
            <div class="form-group col-md-2">
              <label for="inputHourRate">Phone Number</label>
              <input type="text" class="form-control" id="inputPhone" value="<?php echo $data["phoneN"]; ?>">
              <small id="HelpBlock" class="form-text text-muted"></small>
            </div>
            <div class="form-group col-md-2">
              <label for="inputEngagementRate">Account Statut</label>
              <select class="form-control" id="inputStatut">
                <option value="0"  <?php if($data["statut"] == 0){echo "selected";} ?> >Validate</option>
                <option value="1"  <?php if($data["statut"] == 1){echo "selected";} ?> >Not Validate</option>
              </select>
              <small id="HelpBlock" class="form-text text-muted"></small>
            </div>
          </div>

           <div class="form-row">
            
            <div class="form-group col-md-6">
              <label for="inputNoEngagementRate">Secret Answer</label>
              <input type="text" class="form-control" id="inputSecret" value="<?php echo $data["secret"]; ?>" >
              <small id="HelpBlock" class="form-text text-muted"></small>
            </div>
            <div class="form-group col-md-6">
              <label for="inputStudentRate">Password</label>
              <input type="password" class="form-control" id="inputPwd" value="<?php echo $data["pwd"]; ?>">
              <small id="HelpBlock" class="form-text text-muted"></small>
            </div>
          </div>

          <button type="button" onclick="verifFormUser(<?php echo $data['id']; ?>)" class="btn btn-outline-info">modify user</button>
        </form>

      </div>
      
    </main><!-- /.container -->

    <!-- Bootstrap core JavaScript
    ================================================== -->
    <!-- Placed at the end of the document so the pages load faster -->
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script>window.jQuery || document.write('<script src="../../../../assets/js/vendor/jquery-slim.min.js"><\/script>')</script>
    <script src="../../../../assets/js/vendor/popper.min.js"></script>
    <script src="../../../../dist/js/bootstrap.min.js"></script>
    <script src="scriptAdminUsersModif.js"></script>
  </body>
</html>
