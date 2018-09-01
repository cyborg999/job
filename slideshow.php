<?php include_once "model.php"; ?>
<?php $model = new Model(); 
?>
<?php include_once "header2.php"; ?>

  <style type="text/css">
.jumbotron { border:5px dashed white;}
#filedrag.hover { border: 3px dashed red!important; }
#progress { position: absolute; float: left; top: 10px; width: 97%; left: 10px; z-index: 10; }
#messages { width: 100%; overflow: hidden; }
#progress p { display: block; width: 100%; padding: 2px 5px; margin: 2px 0; border-radius: 5px; background: #eee url("img/progress.png");
background-repeat: repeat-y; }
#progress p.failed { background: #c00 none 0 0 no-repeat; }

  </style>
    <div class="container-fluid">
      <div class="row">
        <?php include_once "admin-nav.php"; ?>

        <main role="main" class="col-md-9 ml-sm-auto col-lg-10 px-4">
          <br>
          <br>
          <div class="container">
            <div class="row">
              <div class="col-12">
                  <h1 class="display-4">Banner</h1>

                <a href="addnewslide.php" class="  page-header btn btn-md btn-success">Add New</a>
              </div>
            </div>
            <br>
            <div class="row">
              <div class="col-12">
                <?php foreach($model->getAllSlider() as $idx => $slide): ?>
                <div class="card mb-3 slide">
                  <img class="card-img-top" src="uploads/photos/<?= $slide['filename'];?>" alt="<?= $slide['title'];?>">
                  <div class="card-body">
                    <h5 class="card-title"><?= $slide['title'];?></h5>
                    <p class="card-text"><?= $slide['description'];?></p>
                    <button class="btn btn-primary glyphicon-remove-sign"  data-id="<?= $slide['id'];?>">
                      Delete
                    </button>
                  </div>
                </div>
              <?php endforeach ?>
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
    <script type="text/javascript" src="js/slide.js"></script>

    <!-- Icons -->
    <script src="https://unpkg.com/feather-icons/dist/feather.min.js"></script>
    <script>
      feather.replace()
    </script>
    <script type="text/javascript">
    (function($){
      var slideShow = {
        __init : function(){
          this.__listen();
        },
        __listen : function(){
          $("#saveSlide").on("click", function(e){
            var title = $("#title");
            var desc = $("#description");
            var id = $("#addAttachment_form").data("id");

            // if(id == null){
            //   // alert()
            //   $(".modal-title").html("Upload an image first!");
            //   $("#info").modal("show");
            //   return false;
            // }
            alert("d2");
            $.ajax({
              url   : 'process.php',
              data  : {title:title, desc:desc, id:id, addSlide:true},
              type  : 'POST',
              dataType  :'JSON', 
              success   : function(res){
                console.log(res);
                alert("d2");
              },
              error   : function(){
                console.log("err");
              }
            });

            e.preventDefault();
          });

          $(".glyphicon-remove-sign").on("click", function(){
            var ele = $(this);
            var id = ele.data("id");

             $.ajax({
              url   : 'process.php',
              data  : {id:id, deleteSlide:true},
              type  : 'POST',
              dataType  :'JSON', 
              success   : function(res){
                console.log(res);
                ele.parents(".slide").fadeOut("slow", function(){
                  $(this).remove();
                });
              },
              error   : function(){
                console.log("err");
              }
            });
          });
        }

      }
        slideShow.__init();

    })(jQuery);
    </script>

  </body>
</html>
