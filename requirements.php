<?php include_once "model.php"; ?>
<?php $model = new Model(); 

$requirements = $model->getAllAdminRequirements();
?>
<?php include_once "header2.php"; ?>

  <style type="text/css">

  </style>
    <div class="container-fluid">
      <div class="row">
        <?php include_once "admin-nav.php"; ?>

        <main role="main" class="col-md-9 ml-sm-auto col-lg-10 px-4">
          <br>
          <div class="container">
            <div class="img-container profile-banner">
              <h2 class="compname display-2">Required Forms</h2>
            </div>
          </div>
          <br>
          <div class="container">
            <div class="row">
              <div class="table-responsive">
                <table class="table">
                  <tr>
                    <th>Name</th>
                    <th>Action</th>
                  </tr>
                  <tr id="addreq">
                    <td>
                      <input type="text" class="form-control" required id="requirement" placeholder="Form Name"/>
                    </td>
                    <td>
                      <a href="" class="btn btn-sucess" id="addnew">Add New</a>
                    </td>
                  </tr>
                  <?php foreach($requirements as $idx => $r): ?>
                    <tr>
                      <td><?= $r['name'];?></td>
                      <td>
                        <a href="" data-id="<?= $r['id'];?>" class="btn btn-danger remove">Remove</a>
                      </td>
                    </tr>  
                  <?php endforeach; ?>
                  
                </table>
                <script type="text/html" id="newreq">
                  <tr>
                    <td>[NAME]</td>
                    <td>
                      <a href="" data-id="[ID]" class="btn btn-danger remove">Remove</a>
                    </td>
                  </tr>
                </script>
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
          function __listen(){
            $(".remove").off().on("click", function(e){
              e.preventDefault();

              var me = $(this);
              var id = me.data("id");

              $.ajax({
                url : "process.php",
                data : { deleteReq : true, id : id},
                type : "POST",
                dataType : "JSON",
                success : function(res){
                  console.log(res);

                  me.parents("tr").remove();
                 
                }
              });
            });
          }

          __listen();

          $("#addnew").on("click", function(e){
            e.preventDefault();

            var txt = $("#requirement").val();

            $.ajax({
              url : "process.php",
              data : { addReq : true, txt : txt},
              type : "POST",
              dataType : "JSON",
              success : function(res){
                console.log(res);
                if(res.id === false){
                  alert(res.errors);
                } else {
                  var html = $("#newreq").html();
                  var target = $("#addreq");

                  html = html.replace("[NAME]", txt).
                    replace("[ID]", res.id);
                  target.after(html);
        
                  __listen();

                }
              }
            });
          });
         
        });

      })(jQuery);
    </script>
  </body>
</html>
