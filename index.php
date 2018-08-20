<?php include_once "model.php"; ?>
<?php $model = new Model(); 
  $featuredJobs = $model->getFeaturedJobs();
?>
<?php include_once "header.php"; ?>
    <div class="container idx">
        <main role="main">
          <ul class="nav nav-pills">
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
          <br/>
          
          <!-- Main jumbotron for a primary marketing message or call to action -->
          <div class=" banner">
            <div class="container jumbotron">
              <h1 class="display-3">FIND BETTER JOBS</h1>
              <p class="increase">Increase your chances of receiving relevant jobs from recruiters. Apply to jobs on the go Discover connections who can refer you for jobs</p>
              <p><a class="btn btn-primary btn-lg custom" href="#" role="button">Learn more &raquo;</a></p>
            </div>
             <div class="container search">
                <form class="form-inline">
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
                        <a href="#" class="btn btn-success">Apply</a>
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
             <li>
               <img src="img/logo1.png">
             </li>
             <li>
               <img src="img/logo2.png">
             </li>
             <li>
               <img src="img/logo3.png">
             </li>
             <li>
               <img src="img/logo4.png">
             </li>
           </ul>
        </main>

        <footer class="pt-4 my-md-5 pt-md-5">
          <div class="row">
            <div class="col-12 col-md">
              <img class="mb-2" src="img/logo.png" alt="" >
              <small class="d-block mb-3 text-muted">&copy; 2017-2018</small>
            </div>
            <div class="col-6 col-md">
              <h5>Features</h5>
              <ul class="list-unstyled text-small">
                <li><a class="text-muted" href="#">Cool stuff</a></li>
                <li><a class="text-muted" href="#">Random feature</a></li>
                <li><a class="text-muted" href="#">Team feature</a></li>
                <li><a class="text-muted" href="#">Stuff for developers</a></li>
                <li><a class="text-muted" href="#">Another one</a></li>
                <li><a class="text-muted" href="#">Last time</a></li>
              </ul>
            </div>
            <div class="col-6 col-md">
              <h5>Resources</h5>
              <ul class="list-unstyled text-small">
                <li><a class="text-muted" href="#">Resource</a></li>
                <li><a class="text-muted" href="#">Resource name</a></li>
                <li><a class="text-muted" href="#">Another resource</a></li>
                <li><a class="text-muted" href="#">Final resource</a></li>
              </ul>
            </div>
            <div class="col-6 col-md">
              <h5>About</h5>
              <ul class="list-unstyled text-small">
                <li><a class="text-muted" href="#">Team</a></li>
                <li><a class="text-muted" href="#">Locations</a></li>
                <li><a class="text-muted" href="#">Privacy</a></li>
                <li><a class="text-muted" href="#">Terms</a></li>
              </ul>
            </div>
          </div>
        </footer>
    </div>

    <!-- Bootstrap core JavaScript
    ================================================== -->
    <!-- Placed at the end of the document so the pages load faster -->
<script src="https://code.jquery.com/jquery-3.3.1.min.js" integrity="sha384-tsQFqpEReu7ZLhBV2VZlAu7zcOV+rXbYlF2cqB8txI/8aZajjp4Bqd+V6D5IgvKT" crossorigin="anonymous"></script> 
    <!-- <script src="js/jquery-3.2.1.slim.min.js"></script> -->
    <script>window.jQuery || document.write('<script src="bootstrap-4.0.0/assets/js/vendor/jquery-slim.min.js"><\/script>')</script>
    <script src="bootstrap-4.0.0/assets/js/vendor/popper.min.js"></script>
    <script src="bootstrap-4.0.0/dist/js/bootstrap.min.js"></script>
    <script src="bootstrap-4.0.0/assets/js/vendor/holder.min.js"></script>
    <script>
      Holder.addTheme('thumb', {
        bg: '#55595c',
        fg: '#eceeef',
        text: 'Thumbnail'
      });

    </script>
  </body>
</html>
