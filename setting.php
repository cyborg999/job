<?php include_once "model.php"; ?>
<?php $model = new Model(); 
  $model->restrictAccessByLevel(3);
$setting = $model->getSettings();
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
           
            <div class="row">
              
              <div class="col">
                <form method="post" action="">
                  <input type="hidden" name="setting" value="true">
                  <label><span class="badge badge-info">Name</span>
                    <input type="text" name="name" class="form-control" placeholder="company name..." value="<?= (isset($setting['name']) ? $setting['name'] : '');?>" />
                  </label>
                  <hr>
                  <label><span class="badge badge-info">Terms & Conditions</span>
                    <textarea cols="130" class="form-control" name="terms"><?= (isset($setting['terms']) ? $setting['terms'] : '');?></textarea>
                  </label>
                  <hr>
                  <label><span class="badge badge-info">Privacy & Policies</span>
                    <textarea cols="130" class="form-control" name="privacy"><?= (isset($setting['privacy']) ? $setting['privacy'] : '');?></textarea>
                  </label>
                  <hr>
                  <label><span class="badge badge-info">About Us</span>
                    <textarea cols="130"  class="form-control" name="about"><?= (isset($setting['about']) ? $setting['about'] : '');?></textarea>
                  </label>
                  <hr>
                  <label><span class="badge badge-info">Contact</span>
                    <textarea cols="130" class="form-control" name="contact"><?= (isset($setting['contact']) ? $setting['contact'] : '');?></textarea>
                  </label>
                  <hr>
                  <input type="submit" class="btn btn-success" value="Save" name="">
                </form>
                
              </div>
            </div>

             <div class="row">
              <div class="col">
                <br>
                <br>
                <h4>Upload New Logo</h4>
                <iframe src="logo.php" width="100%;" frameborder="0" style="overflow: hidden;margin: 0;padding: 0; height: 500px;">
                  
                </iframe>
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
