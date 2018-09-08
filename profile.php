<?php include_once "model.php"; ?>
<?php $model = new Model(); 
  $model->restrictAccessByLevel(2);
  $data = $model->getCompanyBySessionId();
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

  </style>
    <div class="container-fluid">
      <div class="row">
        <?php include_once "side-nav.php"; ?>

        <main role="main" class="col-md-9 ml-sm-auto col-lg-10 px-4">
          <div class="container">
            <div class="img-container profile-banner">
              <h2 class="compname display-2"><?= $data['name'];?></h2>
            </div>
          </div>
          <div class="container">
            <div class="jumbotron">
              <p class="lead"><?= $data['overview'];?></p>
              <hr class="my-4">
              <div class="bd-example">
                <address>
                  <strong><?= $data['name'];?></strong><br>
                  <?= $data['industry'];?><br>
                  <?= $data['address'];?><br>
                  <abbr title="Phone">P:</abbr> <?= $data['telephone'];?><br>
                  <abbr title="Mobile">M:</abbr> <?= $data['mobile'];?><br>
                </address>

                <address>
                  <strong>Email</strong><br>
                  <a href="mailto:#"><?= $data['email'];?></a>
                </address>
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
