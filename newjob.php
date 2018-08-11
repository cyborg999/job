<?php include_once "model.php"; ?>
<?php $model = new Model(); 
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
    .li {
      margin: 5px auto;
    }

  </style>
    <div class="container-fluid">
      <div class="row">
        <?php include_once "side-nav.php"; ?>

        <main role="main" class="col-md-9 ml-sm-auto col-lg-10 px-4">
          <br/>
          <br/>
          <div class="container">
              <h2 class="display-6">Post New Job</h2>
          </div>
          <br/>
          <div class="container">
              <?php
                $msg = $model->getMessages();
                if(count($msg)){
                  echo '<div class="alert alert-success alert-dismissible fade show" role="alert"><strong>Success</strong>';
                    foreach($msg as $idx => $e) {
                      echo ' <br/>'.$e;
                    }
                    echo '<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button></div>';
                }
              ?>  
            <form class="form"  method="post" id="newpost">  
              <input type="hidden" name="addnewjob" value="true">
                  <label> Job Title
                      <input type="text" required class="form-control" name="title" placeholder="Job Title..."/>
                  </label>
                  <label>Industry 
                      <input type="text" required class="form-control" name="industry" placeholder="Industry..."/>
                  </label>
                   <label>Salary Range
                      <input type="text" required  class="form-control" name="salary" placeholder="Salary Range..."/>
                  </label>
                <hr>  
                  <label>Processing Time
                      <input type="text" required  class="form-control" name="processing" placeholder="Processing Time..."/>
                  </label>
                  <label>Available Until
                      <input type="date" required  class="form-control" name="expirationdate" placeholder="Expiration..."/>
                  </label>
                   <label> Minimum Experience
                      <input type="text" required  class="form-control" name="minex" placeholder="Minimum Experience..."/>
                  </label>
                <hr>  
                <div class="form-group"> 
                  <h5 class="display-7">Job Description</h5>
                    <label> 
                          <textarea rows="2" required  cols="100" class="form-control" name="description" placeholder="Job Description..."></textarea>
                    </label>
                </div>
                <hr>  
                <div class="form-group"> 
                  <h5 class="display-7">List Description</h5>
                    <label>Header
                          <textarea rows="2" cols="100" class="form-control" name="header" placeholder="Header..."></textarea>
                    </label>
                </div>
                <div class="form-group list-desc"> 
                    <input type="text" name="list[]" class="form-control li" placeholder="Header Description..."/>
                </div>
                <div class="form-group "> 
                    <a href=" " id="add" class="btn btn-success">+</a>
                </div>
                <hr>  
                <input type="submit" class="btn btn-primary" value="Post"/>
            </form>
          </div>
        </main>
      </div>
    </div>

    <script type="text/html" id="list">

        <input type="text" name="list[]" class="form-control li" placeholder="List Description..."/>
    </script>

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
              var add = $("#add");
              var target = $(".list-desc").first();
              var li = $("#list").html();

              add.on("click", function(e){
                e.preventDefault();

                target.append(li);
              });

              // $("#newpost").on("submit", function(e){
              //     e.preventDefault();

              //     var data = $(this).serialize();
              // });   
          });
      })(jQuery);
    </script>
  </body>
</html>
