
<!doctype html>
  <?php
  $name = $model->getSettings();
  ?>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">
    <!-- <link rel="icon" href="bootstrap-4.0.0/favicon.ico"> -->

    <title><?= $name['name'];?></title>

    <!-- Bootstrap core CSS -->
    <link href="bootstrap-4.0.0/dist/css/bootstrap.min.css" rel="stylesheet">

    <!-- Custom styles for this template -->
    <link href="css/dashboard.css" rel="stylesheet"/>
    <link rel="stylesheet" href="js/jQuery-File-Upload-master/css/jquery.fileupload.css"/>
    </style>
</head>

  <body>
    <nav class="navbar navbar-dark fixed-top bg-dark flex-md-nowrap p-0 shadow">
      <style type="text/css">
        #complogo {
          max-width: 100%;
          max-height: 50px;
          margin: 0 auto;
          display: block;
        }
      </style>
      <a class="navbar-brand col-sm-3 col-md-2 mr-0" href="index.php"><img id="complogo" src="img/<?= $name['logo'];?>"/></a>
      <ul class="navbar-nav px-3">
        <li class="nav-item text-nowrap">
          <a class="nav-link" href="logout.php">Logout</a>
        </li>
      </ul>
    </nav>