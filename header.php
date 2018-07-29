
<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">
    <!-- <link rel="icon" href="bootstrap-4.0.0/favicon.ico"> -->

    <title>Jobsearch</title>

    <!-- Bootstrap core CSS -->
    <link href="bootstrap-4.0.0/dist/css/bootstrap.min.css" rel="stylesheet">

    <!-- Custom styles for this template -->
    <link href="css/default.css" rel="stylesheet">
    <link rel="stylesheet" href="js/jQuery-File-Upload-master/css/jquery.fileupload.css">


</head>

<body>
    <div class="d-flex flex-column flex-md-row align-items-center p-3 px-md-4 mb-3 bg-white border-bottom box-shadow">
          <h5 class="my-0 mr-md-auto font-weight-normal">Company name</h5>
          <?php if(isset($_SESSION['id'])) : ?>
            <nav class="my-2 my-md-0 mr-md-3">
              <a class="p-2 text-dark" href="logout.php">Logout</a>
            </nav>
          <?php else : ?>
            <nav class="my-2 my-md-0 mr-md-3">
              <a class="p-2 text-dark" href="login.php">Login</a>
            </nav>
            <a class="btn btn-outline-success" href="signup.php">Sign up</a>
          <?php endif ?>

          
        </div>
      
