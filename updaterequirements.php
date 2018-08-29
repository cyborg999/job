<?php include_once "model.php"; ?>
<?php $model = new Model(); 
$requirements = $model->getAllAdminRequirements();
?>
<?php include_once "header2.php"; ?>

  <style type="text/css">

  </style>
    <div class="container-fluid">

      <div class="row">
        <?php include_once "side-nav.php"; ?>
        <main role="main" class="col-md-9 ml-sm-auto col-lg-10 px-4">
          <br>
          <br>
          <br>
          <div class="container">
            <div class="img-container profile-banner">
              <h2 class="compname display-5">Upload Requirements</h2>
            </div>
          </div>
          <br>
          <div class="container">
            <div class="row">
              <div class="col">
                <?php
                  $error = $model->getErrors();
                  if (!empty($_FILES)) {
                    if(count($error)){
                      echo '<div class="alert alert-danger alert-dismissible fade show" role="alert"><strong>Error</strong>';
                        foreach($error as $idx => $e) {
                          echo ' <br/>'.$e;
                        }
                        echo '<br/>You should check in on some of those fields below.<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button></div>';
                    } else {
                      echo '<div class="alert alert-success alert-dismissible fade show" role="alert"><strong>Success</strong>';
                        
                        echo '<br/>You have successfully uploaded the needed files.<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button></div>';
                    }
                  }
                  
                ?>  
              </div>
            </div>
            <div class="row">
              <form action="" method="post" enctype="multipart/form-data">
                <?php foreach($requirements as $idx =>$r): ?>
                  <label>Select file to upload for <?= $r['name'];?>:</label>
                  <br>
                  <input type="file" name="file[<?= $r['id'];?>]" id="fileToUpload<?= $r['name'];?>">
                  <hr>
                <?php endforeach; ?>
                  <input type="submit" value="Upload Files" class="btn btn-primary"  name="submit">
              </form>
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
