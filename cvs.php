<?php include_once "model.php"; ?>
<?php $model = new Model(); 
  $model->restrictAccessByLevel(3);
  $users = $model->getAllUser();

  // opd($users);
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
              <div class="table-responsive">
                <style type="text/css">
                  .photo {
                    height: 50px;
                    max-width: 50px;
                    vertical-align: center;
                    display: block;
                    margin: 0 auto;
                  }
                </style>
                <table class="table">
                  <thead>
                    <th>Photo</th>
                    <th>Full Name</th>
                    <th>Position</th>
                    <th>CV</th>
                    <th>Action</th>
                  </thead>
                  <tr>
                    <td>
                      <label>Name</label>
                    </td>
                    <td>
                      <input type="text" name=""  id="searchtxt" class="form-control" placeholder="search...">
                    </td>
                    <td>
                      <button id="search" class="btn btn-primary">Search</button>
                    </td>
                    <td></td>
                    <td></td>
                  </tr>
                  <tbody id="tbody">
                    <?php foreach ($users as $key => $value): ?>
                      <tr>
                        <td><img class="photo" src="uploads/<?= $value['userid'].'/'.$value['photo'];?>"></td>
                        <td><?= $value['lastname']. " " . $value['firstname'];?></td>
                        <td><?= $value['position']?></td>
                        <td>
                          <?php if ($value['resume'] ==""): ?>
                            <label>No CV</label>
                          <?php else : ?>
                          <a href="uploads/<?= $value['userid'].'/'.$value['resume'];?>">Download CV</a></td>
                            <?php endif ?>
                        <td>
                          <input type="submit" data-toggle="modal" data-target="#adminModal" data-id="preview.php?id=<?= $value['userid'];?>" class="btn previewApplicant btn-succes btn-sm" value="preview" name="">
                        </td>
                      </tr>
                    <?php endforeach ?>
                  </tbody>
                </table>
              </div>
            </div>
          </div>
          <script type="text/html" id="user">
            <tr>
              <td><img class="photo" src="uploads/[USERID]/[PHOTO]"></td>
              <td>[LASTNAME] [FIRSTNAME]</td>
              <td>[POSITION]</td>
              <td>
                [CV]
              <td>
                <input type="submit" data-toggle="modal" data-target="#adminModal" data-id="preview.php?id=[USERID]" class="btn previewApplicant btn-succes btn-sm" value="preview" name="">
              </td>
            </tr>
          </script>
        </main>
      </div>
    </div>
 <!-- Bootstrap core JavaScript
    ================================================== -->
    <!-- Placed at the end of the document so the pages load faster -->
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
          function listen(){
            $(".previewApplicant").off().on("click", function(e){
              e.preventDefault();

              var id = $(this).data("id");
              $("#adminModal").find("iframe").attr("src", id);
            });  
          }

          listen();

          $("#search").on("click", function(e){
            e.preventDefault();

            var txt = $("#searchtxt").val();
            var body = $("#tbody");

            body.html("");
            $.ajax({
              url : "process.php",
              data : { searchUser : true, txt : txt},
              type : "POST",
              dataType : "JSON",
              success : function(res){
                for(var i in res){
                  console.log(res[i]);
                  var html = $("#user").html();
                  var cv = res[i].resume;

                  if(cv == null){
                    cv = "No CV";
                  } else {
                    cv = '<a href="uploads/'+res[i].userid+'/'+res[i].resume+'">Download CV</a>';
                  }

                  html = html.replace("[USERID]", res[i].userid).
                              replace("[PHOTO]", res[i].photo).
                              replace("[LASTNAME]", res[i].lastname).
                              replace("[FIRSTNAME]", res[i].firstname).
                              replace("[POSITION]", res[i].position).
                              replace("[CV]", cv).
                              replace("[USERID]", res[i].userid);

                  body.append(html);

                  listen();

                }
              }
            });
          });
         
        });

      })(jQuery);
    </script>
  </body>
</html>
