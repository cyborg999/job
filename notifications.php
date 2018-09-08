<?php include_once "model.php"; ?>
<?php $model = new Model(); 
  $model->restrictAccessByLevel(2);
?>
<?php include_once "header2.php";

 ?>

  <style type="text/css">

  </style>
    <div class="container-fluid">
      <div class="row">
        <?php include_once "side-nav.php"; 

  $notif = $model->getNotification();
        ?>

        <main role="main" class="col-md-9 ml-sm-auto col-lg-10 px-4">
          <br>
          <br>
          <div class="container">
            <div class="img-container profile-banner">
              <h2 class="compname display-7">Messages from Admin</h2>
            </div>
          </div>
          <br>
          <div class="container">
            <div class="row">
              <div class="col">
                <?php foreach ($notif as $key => $value): ?>
                  <div class="notif">
                     <span class="float-lesft badge-primary badge">admin</span>
                     <p class="msg float-risght"><?= $value['content'];?></p>
                     <hr>
                   </div>   

                <?php endforeach ?>
                <?php if (count($notif)> 0): ?>
                  <a href="" class="btn btn-primary seen">Mark as Read</a>
                <?php endif ?>
               

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
          $(".seen").on("click", function(e){
            e.preventDefault();

            $.ajax({
              url : "process.php",
              data : { markSeen : true},
              type : 'POST',
              dataType : 'JSON',
              success : function(res){
                console.log(res);
              }
            });
          });
        });

      })(jQuery);
    </script>
  </body>
</html>
