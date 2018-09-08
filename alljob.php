<?php include_once "model.php"; ?>
<?php $model = new Model(); 
  $model->restrictAccessByLevel(2);
$data = $model->getAllJobByUserId();
// opd($data);
?>
<?php include_once "header2.php"; ?>
    <div class="container-fluid">
      <div class="row">
        <?php include_once "side-nav.php"; ?>

        <main role="main" class="col-md-9 ml-sm-auto col-lg-10 px-4">
          <br/>
          <br/>
          <div class="container">
              <h2 class="display-6">All Job Openings</h2>
          </div>
          <br/>
          <div class="container">
            <div class="row">
              <table class="table table-hover">
                <thead>
                  <tr>
                    <th scope="col">Job Title</th>
                    <th scope="col">Description</th>
                    <th scope="col">Open Until</th>
                    <th scope="col">Action</th>
                  </tr>
                </thead>
                <tbody>
                  <?php foreach($data as $idx => $d) : ?>
                    <tr>
                      <th scope="rosw"><?= $d['title'];?></th>
                      <td><?= $d['description'];?></td>
                      <td><?= $d['expire_date'];?></td>
                      <td><a href="viewjob.php?id=<?= $d['id'];?>" class="btn btn-primary">view</a></td>
                    </tr>
                    <tr class="applicants"> 
                      <td><span class="badge badge-primary">Applicants</span></td>
                      <td colspan="3">
                        <?php 
                        $applicants = $model->getApplicantsByJobId($d['id']);
                        ?>
                          <table class="table">
                            <tr>
                              <th scope="col">Photo</th>
                              <th scope="col">Name</th>
                              <th scope="col">Gender</th>
                              <th scope="col">Action</th>
                            </tr>
                            <?php foreach($applicants as $c => $a): ?>
                                <tr> 
                                  <td>
                                      <img height="50" width="50" src="uploads/<?= $a['userid']."/".$a['photo'];?>">
                                    </td>
                                  <td><?= $a['firstname'];?></td>
                                  <td><?= $a['gender'];?></td>
                                  <td>
                                    <input type="submit" data-toggle="modal" data-target="#previewmodal" data-id="preview.php?id=<?= $a['userid'];?>" class="btn previewApplicant btn-succes btn-sm" value="preview" name="">
                                  </td>
                              </tr>
                            <?php endforeach; ?>
                            

                          </table>
                      </td>
                    </tr>
                  <?php endforeach; ?>
                  
                 
                </tbody>
              </table>
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
    <script type="text/javascript">
      
      (function($){
          $(document).ready(function(){
              $(".previewApplicant").on("click", function(e){
                  e.preventDefault();

                  var id = $(this).data("id");
                
                $("#previewmodal").find("iframe").attr("src", id);

              });

          });
      })(jQuery);
    </script>
  </body>
</html>
