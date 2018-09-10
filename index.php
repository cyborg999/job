<?php include_once "model.php"; ?>
<?php $model = new Model(); 
  $featuredJobs = $model->getFeaturedJobs();
  $sliders = $model->getAllSlider();
  $featuredCompanies = $model->getFeaturedCompanies();
  $settings = $model->getSettings();

?>
<?php include_once "header.php"; ?>
    <div class="container-fluid idx bg bg0">
        <main role="main">
          
          <style type="text/css">
            .carousel-item {
              height: 400px;
            }
            .carousel-inner {
              background: black;
            }
            .carousel h5,
            .carousel p {
              text-shadow: 1px 1px 10px #6b6969;
            }
            .bg {
              padding: 0;
              position: relative;
              overflow: hidden;
            }
            .bg {
              /*margin-top: -110px;*/
            }
            .bg1::after {
              content: "";
              position: absolute;
              width: 100%;
              height: 100%;
              background: url(./img/bg.svg) no-repeat;
              background-size: cover;
              bottom: -20px;
              left: 0;
            }
          </style>

          <div class="container-fluid bg bg1">
              <div class="row">
                <div class="col">
                  <div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel">
                  <ol class="carousel-indicators">
                    <?php foreach ($sliders as $key => $value): ?>
                      <li data-target="#carouselExampleIndicators" data-slide-to="<?= $idx; ?>" class="<?= ($key==0) ? 'active' : '';?>"></li>
                    <?php endforeach ?>
                  </ol>
                  
                  <div class="carousel-inner">

                    <?php foreach ($sliders as $key => $slide): ?>
                      <div style="background-image: url(./uploads/photos/<?= $slide['filename'];?>);background-size:cover;" class="carousel-item <?= ($key==0) ? 'active' : '';?>">
                         <div class="carousel-caption d-none d-md-block">
                          <h5><?= $slide['title'];?></h5>
                          <p><?= $slide['description'];?></p>
                        </div>
                      </div>  
                    <?php endforeach ?>
                    
                  </div>
                  <a class="carousel-control-prev" href="#carouselExampleIndicators" role="button" data-slide="prev">
                    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                    <span class="sr-only">Previous</span>
                  </a>
                  <a class="carousel-control-next" href="#carouselExampleIndicators" role="button" data-slide="next">
                    <span class="carousel-control-next-icon" aria-hidden="true"></span>
                    <span class="sr-only">Next</span>
                  </a>
                </div> 
                </div>
              </div>
            
          </div>
          <div class=" bansner">
              <br>
              <br>
            <div class="container">
            <div class="row">
              <ul class="nav nav-pills hiddsen">
                <li class="nav-item">
                  <a class="nav-link active" href="#">Jobs</a>
                </li>
                <li class="nav-item">
                  <a class="nav-link" href="#">Skills</a>
                </li>
                 <li class="nav-item">
                  <a class="nav-link" href="#">Companies</a>
                </li>
              </ul>
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
                          <?php if (isset($_SESSION['id'])):  ?>
                            <input type="submit" data-id="[ID]" class="btn btn-success apply  btn-lg" value="Apply" name="">
                          <?php else: ?>
                            <a href="login.php" class="btn btn-danger btn-sm">You need to login first in order to apply for this job</a>

                          <?php endif ?>
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
             <div class="container search">
              
                <hr>
                <br/>
                <h2 class="display-7">Jobs you may be interested in</h2>
                <br/>
                <div class="row">
                  <?php
                    // opd($featuredJobs);
                  ?>
                  <style type="text/css">
                    .desc {
                      white-space: nowrap; 
                      overflow: hidden;
                      text-overflow: ellipsis;
                    }
                  </style>
                  <?php foreach($featuredJobs as $idx => $job): ?>
                  <div class="col-sm-4">
                    <div class="card">
                      <div class="card-body">
                        <h5 class="card-title"><?= $job['title']; ?></h5>
                        <a href=""><?= $job['company']; ?></a>
                        <p class="card-text">Salary : <?= $job['salary']; ?></p>
                        <p class="card-text desc"><?= $job['description']; ?></p>
                        <a href="viewjob.php?id=<?= $job['id']; ?>" class="btn btn-success custom">Apply</a>
                      </div>
                    </div>
                  </div>
                 <?php endforeach; ?>
                </div>
              </div>
              <div class="container">
                <div class="row">
                  <div class="col hidden">
                     <h3 class="display-6">Employer by choice</h3>
                     <!-- slider -->
                     <ul class="bychoice">
                      <?php foreach ($featuredCompanies as $key => $value): ?>
                       <li>
                        <a href="">
                         <img width="100" height="auto" src="uploads/<?= $value['userid'].'/'.$value['photo'];?>" alt="<?= $value['name']; ?>">
                        </a>
                       </li> 
                      <?php endforeach ?>
                     </ul>
                  </div>
                </div>
              </div>
          </div>
         
        </main>

        <footer class="container">
          <div class="row">
          <!--   <div class="col-3">
              <img class="mb-2" src="img/logo.png" alt="" >
              <small class="d-block mb-3 text-muted">&copy; 2017-2018</small>
            </div> -->
            
            <div class="col">
              <style type="text/css">
                .footer-links {
                  text-align: center;
                  margin: 120px auto 20px;
                }
                .footer-links li {
                  list-style-type: none;
                  display: inline;
                }
              </style>
              <ul class="list-unstyled footer-links text-small">
                <li><a class="text-muted" data-toggle="modal" data-target="#termsModal" href="#">Terms & Conditions</a></li>
                <li><a data-toggle="modal" data-target="#contactModal" class="text-muted" href="#">| Contact Us |</a></li>
                <li><a data-toggle="modal" data-target="#privacyModal" class="text-muted" href="#">Privacy & Policies |</a></li>
                <li><a data-toggle="modal" data-target="#aboutModal" class="text-muted" href="#">About Us</a></li>
              </ul>
            </div>
          </div>
        </footer>
    </div>

<style type="text/css">
  .modal-dialog {
    max-width: 80%;
  }
</style>

<div class="container-fluid">
  <div class="row">
    <div class="col">
      <div class="modal fade" id="termsModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
          <div class="modal-content">
            <div class="modal-header">
              <h5 class="modal-title" id="exampleModalLabel">Terms & Conditions</h5>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
            <div class="modal-body">
              <p><?= $settings['terms']; ?></p>
              <p><?= $settings['contact']; ?></p>
              <p><?= $settings['privacy']; ?></p>
              <p><?= $settings['about']; ?></p>
            </div>
            <div class="modal-footer">
              <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
            </div>
          </div>
        </div>
      </div>   

      <div class="modal fade" id="contactModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
          <div class="modal-content">
            <div class="modal-header">
              <h5 class="modal-title" id="exampleModalLabel">Contact Us</h5>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
            <div class="modal-body">
              <p><?= $settings['contact']; ?></p>
            </div>
            <div class="modal-footer">
              <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
            </div>
          </div>
        </div>
      </div>   

      <div class="modal fade" id="privacyModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
          <div class="modal-content">
            <div class="modal-header">
              <h5 class="modal-title" id="exampleModalLabel">Privacy & Policy</h5>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
            <div class="modal-body">
              <p><?= $settings['privacy']; ?></p>
            </div>
            <div class="modal-footer">
              <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
            </div>
          </div>
        </div>
      </div>   

      <div class="modal fade" id="aboutModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
          <div class="modal-content">
            <div class="modal-header">
              <h5 class="modal-title" id="exampleModalLabel">About Us</h5>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
            <div class="modal-body">
              <p><?= $settings['about']; ?></p>
            </div>
            <div class="modal-footer">
              <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
            </div>
          </div>
        </div>
      </div>      
    </div>
  </div>
</div>


    <!-- Bootstrap core JavaScript
    ================================================== -->
    <!-- Placed at the end of the document so the pages load faster -->
<script src="https://code.jquery.com/jquery-3.3.1.min.js" integrity="sha384-tsQFqpEReu7ZLhBV2VZlAu7zcOV+rXbYlF2cqB8txI/8aZajjp4Bqd+V6D5IgvKT" crossorigin="anonymous"></script> 
    <!-- <script src="js/jquery-3.2.1.slim.min.js"></script> -->
    <script>window.jQuery || document.write('<script src="bootstrap-4.0.0/assets/js/vendor/jquery-slim.min.js"><\/script>')</script>
    <script src="bootstrap-4.0.0/assets/js/vendor/popper.min.js"></script>
    <script src="bootstrap-4.0.0/assets/js/vendor/holder.min.js"></script>
    <script src="bootstrap-4.0.0/dist/js/bootstrap.min.js"></script>
    <script>
      Holder.addTheme('thumb', {
        bg: '#55595c',
        fg: '#eceeef',
        text: 'Thumbnail'
      });

    </script>
    <script type="text/javascript">
      (function($){
        $(document).ready(function(){
          $('.carousel').carousel();
          
          $(".nav-link").on("click", function(e){
            e.preventDefault();
            var me = $(this);

            $(".nav-link.active").removeClass("active");

            me.addClass("active");
          });

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
          
          $("#btnsearch").on("submit", function(e){
            e.preventDefault();
            var searchtext = $("#searchtext").val();
            var cat = $(".nav-link.active").html();

            var jobprev = $("#list-home");

            jobprev.html("");

            $.ajax({
              url : "process.php",
              data : { browse : true, searchtext : searchtext, category : cat},
              type : 'POST',
              dataType : 'JSON',
              success : function(res){
                console.log(res);
                var x  = 0;
                var target = $("#jobs");
                
                target.html("");

                for(var i in res){
                  var html = $("#job").html();

                  html = html.replace("[ACTIVE]" , (x==0) ? 'active' : '').
                    replace("[DATE]", res[i].date_added).
                    replace("[TITLE]", res[i].title).
                    replace("[ID]", res[i].id).
                    replace("[COMPANY]", res[i].name);

                    x++;

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
