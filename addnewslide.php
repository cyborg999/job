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
              <div class="col main">
                <h1 class="page-header">Add New Banner</h1>
                <form  id="frmUpdate" class="form-horizontal">
                  <div class="form-group form-group-md">
                    <label class="col-sm-2 control-label" for="title">Title</label>
                    <div class="col-sm-10">
                      <input class="form-control" type="text" id="title" name="title" value=""  placeholder="title...">
                    </div>
                  </div>
                  <div class="form-group form-group-md">
                    <label class="col-sm-2 control-label" for="description">Description</label>
                    <div class="col-sm-10">
                      <textarea class="form-control" name="description" id="description" placeholder="description"></textarea>
                    </div>
                  </div>
                </form>

                  <div class="form-group form-group-md">
                    <label class="col-sm-2 control-label" for="description">Upload Pic</label>
                    <div class="col-sm-10">
                      <div class="row jumbotron">
                        <div id="filedrag">
                          <form class="form-horizontal" role="form" id="addAttachment_form" method="post" action="process.php">
                            <div class="columns col-lg-12 col-md-12 col-sm-12">
                              <div class="row">
                                <div class="columns col-lg-12 col-md-12 col-sm-12">
                                  <div class="columns col-lg-12 col-md-12 col-sm-12">
                                    <h1>Drag and Drop files here</h1>
                                    <p class="lead">
                                      Upload/Drag&Drop a html file first to add a new record.
                                    </p>
                                  </div>
                                </div>
                              </div>
                              <div class="row">
                                <div class="columns col-lg-12 col-md-12 col-sm-12">
                                  <div class="active-drag">
                                    <div id="progress"></div>
                                    <div class="form-group hide-label">
                                        <input type="file" id="fileselect" name="fileselect[]" multiple="multiple">
                                    </div>
                                  </div>
                                </div>
                              </div>
                            </div>
                          </form>
                        </div>
                      </div>
                      <div class="row">
                        <div class="columns col-lg-12 col-md-12 col-sm-12">
                          <div id="messages"></div>
                        </div>
                      </div>
                    </div>
                  </div>
                  <div class="form-group form-group-md">
                    <input type="submit" value="save" id="saveSlide" class="btn btn-md pull-right active  btn-success">
                  </div>
              </div>
            </div>
          </div>
          <div class="container">
            <div class="col-2"></div>
            <div class="col">
               <div id="info" class="modal fade">
                <div class="modal-dialog">
                  <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">×</span></button>
                        <br>
                    </div>
                    <div class="modal-body">
                       <div class="alert alert-success" role="alert">You have succesfully saved the slideshow</div>
                        <div class="alert alert-warning" role="alert">You have to upload a picture before saving..</div>
                    </div>
                  </div><!-- /.modal-content -->
                </div><!-- /.modal-dialog -->
              </div><!-- /.modal -->
            </div>
            <div class="col-2"></div>
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
            var title = $("#title").val();
            var desc = $("#description").val();
            var id = $("#addAttachment_form").data("id");

            if(id == null){
              // alert()

              $(".alert-success").hide();
              $(".alert-warning").show();
              $("#info").modal("show");
              return false;
            }

            $.ajax({
              url   : 'process.php',
              data  : {title:title, description:desc, id:id, addSlider:true},
              type  : 'POST',
              dataType : 'JSON',
              success : function(res){
                 $(".alert-success").show();
              $(".alert-warning").hide();
              $("#info").modal("show");

              },
              error   : function(){

              }
            });

            e.preventDefault();
          });
        }

      }
        slideShow.__init();

    })(jQuery);
    </script>
  </body>
</html>
