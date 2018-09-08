<?php include_once "model.php"; ?>
<?php $model = new Model(); 
  $model->restrictAccessByLevel(1);
  $data = $model->getCompanyBySessionId();
?>
<?php include_once "header2.php"; ?>

  <style type="text/css">

  </style>
    <div class="container-fluid">
      <div class="row">
        <?php include_once "side-nav.php"; ?>

        <main role="main" class="col-md-9 ml-sm-auto col-lg-10 px-4">
          <div class="container">
            <div class="img-container profile-banner">
              <h2 class="compname display-2"><?= $data['name'];?></h2>
            </div>
          </div>
          <br>
          <div class="container">
            <div class="row">
              <form id="btnsearch" class="form-inline">
                
                  <div class="col">
                    <input type="text" class="form-control" id="searchtext" placeholder="Search Here">
                  </div>
                  <div class="col">
                    <input type="submit" value="search"  class="btn btn-primary"/>
                </div>
              </form>
            </div>
          </div>
          <br>
          <script type="text/html" id="job">
            <a href="#" data-id=[ID] class="viewjob list-group-item list-group-item-action flex-column align-items-start [ACTIVE]">
                <div class="d-flex w-100 justify-content-between">
                  <h5 class="mb-1">[TITLE]</h5>
                </div>
                  <small>[DATE]</small>
                <p class="mb-1">[COMPANY]</p>
              </a>
          </script>
          <div class="container">
            <div class="row">
              <div class="col-3">
                <div id="jobs" class="list-group">

                  
                </div>
              </div>


              <style type="text/css">
                .logo {
                  vertical-align: middle;
                  display: block;
                  max-width: 100%;
                  height: auto;
                  margin-top: 20px;
                }
                .detail {
                  float: right;
                  list-style-type: none;
                }
                .hidden {
                  display: none;
                }
              </style>
              <script type="text/html" id="previewprof">
                <div class="container_parent">
                  <div class="alert hidden alert-success alert-dismissible fade show" role="alert">
                    <strong>You have successfully applied to this job.</strong>
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                      <span aria-hidden="true">&times;</span>
                    </button>
                  </div>
                  <div class="container">
                    <style type="text/css">
                      .job-banner {
                      background: #eee url(uploads/[BANNER]) no-repeat;
                        height: 100px;
                        width: 100%;
                        background-size: cover;
                        margin-bottom: 10px;
                      }
                    </style>
                    <div class="img-container job-banner"> </div>
                  </div>
                  <div class="container">
                    <div class="row">
                      <div class="col">
                        <div class="row">
                          <div class="col-4">
                            <div class="img-container ">
                              <img class="logo" src="uploads/[LOGO]">
                            </div>
                          </div>
                          <div class="col">
                            <h1 class="display-5">[TITLE]</h1>
                            <a href="" class="display-7">[COMPANY]</a>
                          </div>
                        </div>
                      </div>
                    </div>
                  </div>
                  <br/>
                  <div class="container">
                    <div class="row">
                      <div class="col-8">
                        <h3 class="display-6">Job Description</h3>
                        <p>[DESC]</p>
                        <hr>
                        <b class="display-7">[OTHERDESC]</b>
                        <br/>
                        <br/>
                        <div>[LIST]
                        </div>
                      </div>
                      <div class="col">
                          <h5>Other Details</h5>
                          <ul class="dsetail">
                            <li><em>Open Until: </em>[EXPIRE]</li>
                            <li><em>Minimum Experience: </em>[MINEXP]</li>
                            <li><em>Salary: </em>[SALARY]</li>
                            <li><em>Processing Time: </em>[PROCESSINGTIME]</li>
                          </ul>
                          <br>
                          <input type="submit" data-id="[ID]" class="btn btn-success apply  btn-lg" value="Apply" name="">
                      </div>
                    </div>
                </div>
              </div>

              </script>
              <div class="col">
                <div class="tab-content" id="nav-tabContent">
                  <div class="tab-pane fade show active" id="list-home" role="tabpanel" aria-labelledby="list-home-list"></div>
                </div>
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

          $("#btnsearch").on("submit", function(e){
            e.preventDefault();
            var searchtext = $("#searchtext").val();


            function listen(){
              $('.alert').alert();

              $(".apply").off().on("click", function(e){
                e.preventDefault();

                var me = $(this);
                var id = me.data("id");

                $.ajax({
                  url : "process.php",
                  data : { apply : true, id : id},
                  type : 'POST',
                  dataType : 'JSON',
                  success :  function(res){
                    console.log(res);
                    me.parents(".container_parent").find(".alert").removeClass("hidden");
                  }
                });

              });

              $(".viewjob").off().on("click", function(e){
                e.preventDefault();
                var me = $(this);

                $(".viewjob").removeClass("active");

                me.addClass("active");
                console.log(me.data("id"));

                $.ajax({
                  url : "process.php",
                  data : { viewjob : true, id : me.data("id")},
                  type : 'POST',
                  dataType : 'JSON',
                  success : function(res){
                    var html = $("#previewprof").html();
                    var target = $("#list-home");
                    var list = res.desclist;
                    var li = "";

                    list = list.split("]");

                    for(var i in list) {
                      li += "<p>"+list[i]+"</p>";
                    }
                    console.log(html);

                    console.log(target.length);
                    target.html("");
                    html = html.replace("[LOGO]", (res.userid + "/" + res.photo)).
                      replace("[BANNER]", (res.userid + "/" + res.banner)).
                      replace("[TITLE]", res.title).
                      replace("[DESC]", res.description).
                      replace("[OTHERDESC]", res.otherdesc).
                      replace("[EXPIRE]", res.title).
                      replace("[ID]", res.id).
                      replace("[MINEXP]", res.min_experience).
                      replace("[SALARY]", res.salary).
                      replace("[PROCESSINGTIME]", res.processing_time).
                      replace("[LIST]", li).
                      replace("[COMPANY]", res.name);
                    target.append(html);

                    listen();
                  }
                });
              });
            }

            listen();

            $.ajax({
              url : "process.php",
              data : { browse : true, searchtext : searchtext},
              type : 'POST',
              dataType : 'JSON',
              success : function(res){
                console.log(res);
                var x  = 0;
                var target = $("#jobs");
                for(var i in res){
                  var html = $("#job").html();

                  html = html.replace("[ACTIVE]" , (x==0) ? 'active' : '').
                    replace("[DATE]", res[i].date_added).
                    replace("[TITLE]", res[i].title).
                    replace("[ID]", res[i].id).
                    replace("[COMPANY]", res[i].name);

                    x++;

                    target.html("");
                    target.append(html);
                }

                listen();
              }
            });
          });
        });

      })(jQuery);
    </script>
  </body>
</html>
