<!doctype php>

<?php 
  session_start();  

  include('utilities_functions.php');
  $db = connectDb();

  $query = $db->prepare("SELECT * FROM subscription");
  $query->execute();

  $listOfAbonnements = $query->fetchAll(PDO::FETCH_ASSOC);

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

      <div class="starter-template">


      <?php 

      foreach ($listOfAbonnements as $key => $abonnement) {
                echo '
                  <form id="form'.$abonnement['id'].'">
                    <div class="form-row">
                      <div class="form-group col-md-6">
                        <label for="inputName">Name</label>
                        <input type="text" class="form-control" id="inputName'.$abonnement['id'].'" value="'.$abonnement['name'].'">
                      </div>
                    </div>

                    <div class="form-group">
                      <label for="inputDescription">Description</label>
                      <textarea class="form-control" id="inputDescription'.$abonnement['id'].'" rows="10">'.$abonnement['description'].'</textarea>
                    </div>

                    <div class="form-row">
                      <div class="form-group col-md-4">
                        <label for="inputDayRate">Day Rate</label>
                        <input type="number" step="0.01" class="form-control" id="inputDayRate'.$abonnement['id'].'" value="'.$abonnement['dayRate'].'">
                      </div>
                      <div class="form-group col-md-4">
                        <label for="inputHourRate">Hour Rate</label>
                        <input type="number" step="0.01" class="form-control" id="inputHourRate'.$abonnement['id'].'" value="'.$abonnement['hourRate'].'">
                      </div>
                      <div class="form-group col-md-4">
                        <label for="inputStudentRate">Student Rate(day)</label>
                        <input type="number" step="0.01" class="form-control" id="inputStudentRate'.$abonnement['id'].'" value="'.$abonnement['studentRate'].'">
                      </div>
                    </div>

                     <div class="form-row">
                      <div class="form-group col-md-4">
                        <label for="inputEngagementRate">Engagement Rate</label>
                        <input type="number" step="0.01" class="form-control" id="inputEngagementRate'.$abonnement['id'].'" value="'.$abonnement['engagementRate'].'">
                      </div>
                      <div class="form-group col-md-4">
                        <label for="inputNoEngagementRate">No Engagement Rate</label>
                        <input type="number" step="0.01" class="form-control" id="inputNoEngagementRate'.$abonnement['id'].'" value="'.$abonnement['notEngagementRate'].'">
                      </div>
                      <div class="form-group col-md-4">
                        <label for="inputEngagementTime">Engagement Time (month)</label>
                        <input type="number" class="form-control" id="inputEngagementTime'.$abonnement['id'].'" value="'.$abonnement['engagementTime'].'">
                      </div>
                    </div>

                    <button type="button" onclick="verifForm('.$abonnement['id'].')" class="btn btn-outline-danger">Modify</button>
                  </form>
                  <br/><br/><br/><br/>
                ';
             }
        ?>

        <form id="formNew">
          <div class="form-row">
            <div class="form-group col-md-6">
              <label for="inputName">Name</label>
              <input type="text" class="form-control" id="inputName0">
            </div>
          </div>

          <div class="form-group">
            <label for="inputDescription">Description</label>
            <textarea class="form-control" id="inputDescription0" rows="10"></textarea>
          </div>

          <div class="form-row">
            <div class="form-group col-md-4">
              <label for="inputDayRate">Day Rate</label>
              <input type="number" step="0.01" class="form-control" id="inputDayRate0">
            </div>
            <div class="form-group col-md-4">
              <label for="inputHourRate">Hour Rate</label>
              <input type="number" step="0.01" class="form-control" id="inputHourRate0">
            </div>
            <div class="form-group col-md-4">
              <label for="inputStudentRate">Student Rate(day)</label>
              <input type="number" step="0.01" class="form-control" id="inputStudentRate0">
            </div>
          </div>

           <div class="form-row">
            <div class="form-group col-md-4">
              <label for="inputEngagementRate">Engagement Rate</label>
              <input type="number" step="0.01" class="form-control" id="inputEngagementRate0">
            </div>
            <div class="form-group col-md-4">
              <label for="inputNoEngagementRate">No Engagement Rate</label>
              <input type="number" step="0.01" class="form-control" id="inputNoEngagementRate0">
            </div>
            <div class="form-group col-md-4">
              <label for="inputEngagementTime">Engagement Time (month)</label>
              <input type="number" class="form-control" id="inputEngagementTime0">
            </div>
          </div>

          <button type="button" onclick="verifForm(0)" class="btn btn-outline-info">Add Engagement</button>
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
    <script src="script.js"></script>
  </body>
</html>
