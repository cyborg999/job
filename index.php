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
          <ul class="nav nav-pills hidden">
            <li class="nav-item">
              <a class="nav-link active" href="#">Jobs</a>
            </li>
            <li class="nav-item dropdown">
              <a class="nav-link dropdown-toggle" data-toggle="dropdown" href="#" role="button" aria-haspopup="true" aria-expanded="false">Industries</a>
              <div class="dropdown-menu">
                <a class="dropdown-item" href="#">Computer Programming</a>
                <a class="dropdown-item" href="#">Education</a>
                <a class="dropdown-item" href="#">Nursing</a>
                <div class="dropdown-divider"></div>
                <a class="dropdown-item" href="#">Engineering</a>
              </div>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="#">Skills</a>
            </li>
             <li class="nav-item">
              <a class="nav-link" href="#">Companies</a>
            </li>
            <li class="nav-item">
              <a class="nav-link disabled" href="#">Industries</a>
            </li>
          </ul>
          <style type="text/css">
            .carousel-item {
              height: 500px;
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
              margin-top: -35px;
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
             <div class="container search">
                <form class="form-inline hidden">
                <div class="form-group mx-sm-3 mb-2">
                  <label for="inputPassword2" class="sr-only">Search</label>
                  <input type="text" class="form-control search2" id="inputPassword2" placeholder="Type here..">
                </div>
                <button type="submit" class="btn btn-primary mb-2">Search</button>
              </form>
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
                        <a href="viewjob.php?id=<?= $job['id']; ?>" class="btn btn-success">Apply</a>
                      </div>
                    </div>
                  </div>
                 <?php endforeach; ?>
                </div>
              </div>
          </div>
          <br/>
          <br/>
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
        </main>

        <footer class="pt-4 my-md-5 pt-md-5">
          <div class="row">
            <div class="col-3">
              <img class="mb-2" src="img/logo.png" alt="" >
              <small class="d-block mb-3 text-muted">&copy; 2017-2018</small>
            </div>
            
            <div class="col-8">
              <h5>About</h5>
              <ul class="list-unstyled text-small">
                <li><a class="text-muted" data-toggle="modal" data-target="#termsModal" href="#">Terms & Conditions</a></li>
                <li><a data-toggle="modal" data-target="#contactModal" class="text-muted" href="#">Contact Us</a></li>
                <li><a data-toggle="modal" data-target="#privacyModal" class="text-muted" href="#">Privacy & Policies</a></li>
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
         
        });

      })(jQuery);
    </script>
  </body>
</html>
