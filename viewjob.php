<?php include_once "model.php"; ?>
<?php $model = new Model(); 
  $data = $model->getJobById($_GET['id']);
?>
<?php include_once "header2.php"; ?>

  <style type="text/css">
    .profile-banner {
      width: 100%;
      height: 300px;
      background: #eee url(uploads/<?= $data['userid'];?>/<?= $data['banner'];?>);
      background-size: cover;
      margin-top: 20px;
      position: relative;
    }
    .compname {
      color: white;
      position: absolute;
      bottom: 20px;
      left: 20px;
    }
    .compemail {
      position: absolute;
      bottom: 10px;
      left: 120px;
      font-size: 20px;
      text-shadow: 1px 1px 10px black;
    }
    .li {
      margin: 5px auto;
    }

  </style>
    <div class="container-fluid">
      <div class="row">
        <?php include_once "side-nav.php"; ?>

        <main role="main" class="col-md-9 ml-sm-auto col-lg-10 px-4">
          <br/>
          <br/>
          <div class="container">
              <?php
                $msg = $model->getMessages();
                if(count($msg)){
                  echo '<div class="alert alert-success alert-dismissible fade show" role="alert"><strong>Success</strong>';
                    foreach($msg as $idx => $e) {
                      echo ' <br/>'.$e;
                    }
                    echo '<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button></div>';
                }
              ?>  
           
          </div>
          <div class="container">
            <style type="text/css">
              .job-banner {
              background: #eee url(uploads/<?= $data['userid'];?>/<?= $data['banner'];?>);
                height: 200px;
                width: 100%;
                background-size: contain;
                margin-bottom: 10px;
              }
              .logo {
                vertical-align: middle;
                display: block;
                max-width: 100%;
                height: auto;
                margin-top: 20px;
              }
              .detail {
                float: right;
                list-style-type: none;
              }
            </style>
            <div class="img-container job-banner">
              
            </div>
          </div>
          <div class="container">
            <div class="row">
              <div class="col">
                <div class="row">
                  <div class="col-4">
                    <div class="img-container ">
                      <img class="logo" src="uploads/<?= $data['userid'];?>/<?= $data['photo'];?>">
                    </div>
                  </div>
                  <div class="col">
                    <h1 class="display-5"><?= $data['title'];?></h1>
                    <a href="" class="display-7"><?= $data['name'];?></a>
                  </div>
                </div>
              </div>
            </div>
          </div>
          <br/>
          <div class="container">
            <div class="row">
              <div class="col-8">
                <h3 class="display-6">Job Description</h3>
                <p><?= $data['description'];?></p>
                <hr>
                <b class="display-7"><?= $data['otherdesc'];?></b>
                <br/>
                <br/>
                <ul>
                  <?php 
                  $list = explode("]", $data['desclist']);
                    foreach($list as $idx => $i){
                      echo "<li>".$i."</li>";
                    }
                  ?>
                </ul>
              </div>
              <div class="col">
                  <h5>Other Details</h5>
                  <ul class="dsetail">
                    <li><em>Open Until: </em><?= $data['expire_date'];?></li>
                    <li><em>Minimum Experience: </em><?= $data['min_experience'];?></li>
                    <li><em>Salary: </em><?= $data['salary'];?></li>
                    <li><em>Processing Time: </em><?= $data['processing_time'];?></li>
                  </ul>
              </div>
            </div>
          </div>
        </main>
      </div>
    </div>

    <!-- Bootstrap core JavaScript
    ================================================== -->
    <!-- Placed at the end of the document so the pages load faster -->
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script>window.jQuery || document.write('<script src="bootstrap-4.0.0/assets/js/vendor/jquery-slim.min.js"><\/script>')</script>
    <script src="bootstrap-4.0.0/assets/js/vendor/popper.min.js"></script>
    <script src="bootstrap-4.0.0/dist/js/bootstrap.min.js"></script>

    <!-- Icons -->
    <script src="https://unpkg.com/feather-icons/dist/feather.min.js"></script>
    <script>
      feather.replace()
    </script>
  </body>
</html>
