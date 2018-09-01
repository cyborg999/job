<?php include_once "model.php"; ?>
<?php $model = new Model(); 
?>
<?php include_once "header2.php"; ?>

  <style type="text/css">

  </style>
    <div class="container-fluid">
      <div class="row">
        <?php include_once "admin-nav.php"; ?>

        <main role="main" class="col-md-9 ml-sm-auto col-lg-10 px-4">
 <br>
          <br>
          <div class="container">
            <div class="img-container profile-banner">
              <h2 class="compname display-5">Change Password</h2>
            </div>
          </div>
          <br>
          <div class="row">
            <div class="col">
              <?php
                $error = $model->getErrors();
                if(count($error)){
                  echo '<div class="alert alert-warning alert-dismissible fade show" role="alert"><strong>Change Password Failed</strong>';
                    foreach($error as $idx => $e) {
                      echo ' <br/>'.$e;
                    }
                    echo '<br/>You should check in on some of those fields below.<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button></div>';
                } else {
                  echo '<div class="alert alert-success alert-dismissible fade show" role="alert"><strong>You have succesfully updated your password.</strong>';
                    echo '<br/><button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button></div>';

                }
              ?>  
            </div>
          </div>
          <div class="container">
            <div class="row">
              <div class="col">
                <form method="post" action="">
                  <input type="hidden" name="changepw" value="true">
                  <label>Username
                    <input type="text"  class="form-control" name="username" placeholder="username..." value="<?= (isset($_POST['username']) ? $_POST['username'] : '')?>" />
                  </label>
                  <hr>
                  <label>Old Password
                    <input type="password" class="form-control" name="password1" placeholder="password..." value="<?= (isset($_POST['username']) ? $_POST['password1'] : '')?>"/>
                  </label>
                  <hr>
                  <label>New Password
                    <input type="password" class="form-control" name="password2" placeholder="password..." value="<?= (isset($_POST['username']) ? $_POST['password2'] : '')?>"/>
                  </label>
                  <hr>
                  <label>Retype New Password
                    <input type="password" class="form-control" name="password3" placeholder="password..." value="<?= (isset($_POST['username']) ? $_POST['password3'] : '')?>"/>
                  </label>
                  <hr>
                  <input type="submit" class="btn btn-primary" value="Save" name="">
                </form>
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
    <script src="js/jquery.js"></script>
    <script src="bootstrap-4.0.0/dist/js/bootstrap.min.js"></script>

    <!-- Icons -->
    <script src="https://unpkg.com/feather-icons/dist/feather.min.js"></script>
    <script>
      feather.replace()
    </script>

    <script type="text/javascript">
      (function($){
        $(document).ready(function(){

         
        });

      })(jQuery);
    </script>
  </body>
</html>
