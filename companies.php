<?php include_once "model.php"; ?>
<?php $model = new Model(); 

$requirements = $model->getAllAdminRequirements();
$companies = $model->getCompanyByApproved(0);

// opd($list);
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
              <h2 class="compname display-5">Companies</h2>
            </div>
          </div>
          <br>
          <div class="container">
            <div class="row">
              <div class="table-responsive">
                <table class="table table-hover">
                  <tr>
                    <th>Logo</th>
                    <th>Name</th>
                    <th>Action</th>
                  </tr>
                  <style type="text/css">
                    .hidden {
                      display: none;
                    }
                  </style>
                  <?php foreach ($companies as $key => $value): ?>
                    <tr>
                      <td>
                        <img width="30" height="auto" src="uploads/<?= $value['userid'].'/'.$value['photo'];?>"/>
                      </td>
                      <td><?= $value['name'];?></td>
                      <td>
                          <a href="" class="btn view">view requirements</a>
                          <a href="" data-id="<?= $value['id'];?>" data-userid="<?= $value['userid'];?>" class="btn btn-primary approve">Approve</a>
                      </td>
                    </tr> 
                    <tr class="req hidden">
                      <td colspan="3">
                        <span class="badge badge-primary">Requirements</span>
                        <div class="table-responsive">
                          <table class="table">
                            <tr>
                            <?php foreach($requirements as $idx => $r): ?>
                                <td><?= $r['name'];?></td>
                            <?php endforeach; ?>
                            </tr>
                            <tr>
                            <?php 
                              $req = $model->getAllAdminRequirementsByUserId($value['userid']);
                            ?>
                            <?php foreach($req as $idx => $r): ?>
                                <td>
                                  <a href="<?= $r['uploaded'];?>" target="_blank"><?= $r['name'];?></a>
                                </td>
                            <?php endforeach; ?>
                            </tr>  


                          </table>
                        </div>
                        <hr>
                      </td>
                    </tr> 
                  <?php endforeach ?>
                </table>
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
            $(".view").on("click", function(e){
              e.preventDefault();

              $(this).parents("tr").next("tr.req").toggleClass("hidden");
            });

            $(".approve").on("click", function(e){
              e.preventDefault();

              var me = $(this);
              var id = me.data("id");
              var userid = me.data("id");

              $.ajax({
                url : "process.php",
                data : { approveCompany : true, id:id, userid:userid},
                type : 'POST',
                dataType : 'JSON',
                success : function(res){
                  console.log(res);

                  me.parents("tr").remove();
                }
              });
            });
          }

          __listen();
         
        });

      })(jQuery);
    </script>
  </body>
</html>
