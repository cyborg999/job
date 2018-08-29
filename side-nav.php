<style type="text/css">
  #account-logo {
    width: 95%;
    max-height: 200px;
    height: auto;
    display: block;
    margin: 20px auto 10px;
  }
</style>
<nav class="col-md-2 d-none d-md-block bg-light sidebar">
  <div class="sidebar-sticky">
    <div class="img-container">
      <br>  
      <br>  
      <?php
      $valid = strpos($_SESSION['photo'], ".");
      $photo = (!$valid) ? "./img/default.jpg" : $_SESSION['photo'];

      ?>
      <img id="account-logo" src="<?= $photo;?>">
    </div>
    <ul class="nav flex-column">
      <?php if($_SESSION['usertype'] == "employer"): ?>
        <li class="nav-item">
          <a class="nav-link" href="profile.php">
            <span data-feather="users"></span>
            Account
          </a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="updaterequirements.php">
            <span data-feather="file"></span>
            Requirements
          </a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="newjob.php">
            <span data-feather="file"></span>
            Post New Job
          </a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="alljob.php">
            <span data-feather="clipboard"></span>
            View All Jobs
          </a>
        </li>
      <?php else: ?>
      <li class="nav-item">
        <a class="nav-link" data-toggle="modal" data-target="#previewmodal" href="myprofile.php">
          <span data-feather="users"></span>
          View Online Profile
        </a>
        <a class="nav-link" href="browse.php">
          <span data-feather="users"></span>
          Browse Job
        </a>
        <a class="nav-link" href="myprofile.php">
          <span data-feather="users"></span>
          Update Profile
        </a>
      </li>
      <?php endif; ?>

   <!--    <li class="nav-item">
        <a class="nav-link active" href="#">
          <span data-feather="home"></span>
          Dashboard <span class="sr-only">(current)</span>
        </a>
      </li> -->
      

      <!-- <li class="nav-item">
        <a class="nav-link" href="#">
          <span data-feather="bar-chart-2"></span>
          Reports
        </a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="#">
          <span data-feather="layers"></span>
          Integrations
        </a>
      </li> -->
    </ul>

    <!-- <h6 class="sidebar-heading d-flex justify-content-between align-items-center px-3 mt-4 mb-1 text-muted">
      <span>Saved reports</span>
      <a class="d-flex align-items-center text-muted" href="#">
        <span data-feather="plus-circle"></span>
      </a>
    </h6> -->
  <!--   <ul class="nav flex-column mb-2">
      <li class="nav-item">
        <a class="nav-link" href="#">
          <span data-feather="file-text"></span>
          Current month
        </a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="#">
          <span data-feather="file-text"></span>
          Last quarter
        </a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="#">
          <span data-feather="file-text"></span>
          Social engagement
        </a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="#">
          <span data-feather="file-text"></span>
          Year-end sale
        </a>
      </li>
    </ul> -->
  </div>
</nav>

<div class="modal container" tabindex="-1" id="previewmodal" role="dialog">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title">Preview</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <iframe id="preview" frameborder="0" src="preview.php?id=<?= $_SESSION['id'];?>"></iframe>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
      </div>
    </div>
  </div>
</div>

<style type="text/css">
  .modal-dialog {
    max-width: 100%!important;
    width: 100%!important;
  }
  #preview {
    width: 100%;   
    min-height: 500px; 
  }
</style>
    <script src="js/jquery.js"></script>
    <script src="bootstrap-4.0.0/dist/js/bootstrap.min.js"></script>

<script type="text/javascript">
  (function($){
    $('#previewmodal').on('shown.bs.modal', function () {
      $('#myInput').trigger('focus')
    });
  })(jQuery);
</script>
