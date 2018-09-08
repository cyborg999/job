<?php include_once "model.php"; ?>
<?php $model = new Model(); 
  $employment = $model->getEmploymentHistoryByUserId($_GET['id']);
  $education = $model->getEducationByUserId($_GET['id']);
  $skills = $model->getSkillsByUserId($_GET['id']);
  $social = $model->getSocialMediaByUserId($_GET['id']);
  $personal = $model->getUserById($_GET['id']);
?>

<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">
    <!-- <link rel="icon" href="bootstrap-4.0.0/favicon.ico"> -->

    <title>Profile</title>

    <!-- Bootstrap core CSS -->
    <link href="bootstrap-4.0.0/dist/css/bootstrap.min.css" rel="stylesheet">

    <!-- Custom styles for this template -->
    <link href="css/dashboard.css" rel="stylesheet"/>
    </style>
</head>
    <div class="container">
      <style type="text/css">
        .left {
          /*background: lime;*/
        }
        .right {
          padding: 20px;
        }
        .right label {
            font-size: 25px;
            font-weight: 600;
        }
        .personal {
          padding: 20px 0;
        }
        .me {
          /*background: blue;*/
        }
        #photo {
          width: 140px;
          height: 140px;
          border-radius: 10px;
        } 
        .address * {
          margin: 5px 0 0;
          padding: 0;
          line-height: 1;
        }
      </style>
      <div class="row ">
          <div class="col left">
            <div class="row personal">
              <div class="col-3">
                <img id="photo" src="uploads/<?=$_GET['id']."/".$personal['photo'];?>"/>
              </div>
              <div class="col me">
                <h1 class="display-4"><?= $personal['firstname'] ." " . $personal['lastname']; ?></h1>
                <h2 class="display-5"><?= $personal['position']; ?></h2>
                <a href="uploads/<?=$_GET['id']."/".$personal['resume'];?>"><span data-feather="download-cloud"></span> Curriculum Vitae</a>
              </div>
            </div>
          </div>
          <div class="col-4 right address">
              <label >Details</label>
                <address><span data-feather="map-pin"></span>
                 <?= $personal['address']; ?></address>
              <p><span data-feather="phone-call"></span> <?= $personal['mobile']; ?></p>
              <p>
                <span data-feather="mail"></span> <a href=" "><?= $personal['email']; ?></a>
              </p>
              <p><span data-feather="gift"></span> <?= $personal['dob']; ?></p>
          </div>
      </div>
      <hr>
      <div class="row">
        <style type="text/css">
          .borderp {
            border: none;
            border-left: 5px solid #eee;
            padding-left: 10px;
            margin: 0;

            /*background: orange;*/
            clear: both;
            display: block;
            margin-bottom: 20px!important;
          }
        </style>
        <div class="col left">
          <h5  class="display-4">Profile</h5>
          <div class="borderp">
            <p><?= $personal['intro']; ?></p>
          </div>

          <h5  class="display-4">Employment History</h5>
          <div class="borderp">
            <?php foreach($employment as $idx => $e): ?>
              <h5 class="display-8"><?= $e['companyname']; ?> <small><?= $e['interval']; ?></small></h5>
              <b><?= $e['jobrole']; ?></b>
              <p><?= $e['jobdesc']; ?></p>
              <hr>
            <?php endforeach; ?>  
          </div>
          
          <h5  class="display-4">Education</h5>
          <div class="borderp">
            <?php foreach($education as $idx => $e): ?>
              <blockquote class="blockquote text-center">
              <p class="mb-0"><?= $e['school']; ?></p>
              <footer class="blockquote-footer"><?= $e['level']; ?> <cite title="Source Title"><?= $e['datestart']; ?>-<?= $e['dateend']; ?></cite></footer>
            </blockquote>
              <hr>
            <?php endforeach; ?>
          </div>
           
        </div>
        <div class="col-4 right">
          <div class="row">
            <style type="text/css">
              #allskills {
                display: block;
                clear: both;
                width: 100%;
              }
              #allskills p {
                background: #c1e1fd;
                  padding: 3px 10px;
                  margin: 3px;
                  border-radius: 15px;
                  font-size: 12px;
                  font-weight: 600;
                  display: initial;
                  display: block;
                  width: initial;
                  float: left;
                  line-height: 2;
              }
              .rate {
                font-size: 12px;
                  color: #ff2419;
              }
            </style>
              <label >Skills</label>
            <div id="allskills">
              <?php foreach($skills as $idx => $e): ?>
                <p class="li"><?= $e['name']; ?><span class="rate <?= $e['level']; ?>"></span></p>
              <?php endforeach ?>
            </div>
          </div>
          <br>
          <div class="row">
            <style type="text/css">
              #social {
                display: block;
                clear: both;
              }
             
              #social li {
                list-style-type: none;
                margin: 0 ;
                padding: 0;
              }
              .soc *{
                padding: 0;
                margin: 0;
              }
             
            </style>
            <label>Social Media</label>
            <br>
            <div class="col-12 soc">
              <ul id="social">
              <?php foreach($social as $idx => $e): ?>
                <li class=""><span data-feather="<?= $e['name']; ?>"></span>
                  <a href="<?= $e['link']; ?>"><?= $e['link']; ?></a>
                </li>
              <?php endforeach ?>
            </ul>    
            </div>
            
          </div>          
        </div>
      </div>
    </div>

 <!-- Bootstrap core JavaScript
    ==================================================
    <!-- Placed at the end of the document so the pages load faster -->
    <!-- Icons -->
    <script src="https://unpkg.com/feather-icons/dist/feather.min.js"></script>
    <script>
      feather.replace()
    </script>
  </body>
</html>
