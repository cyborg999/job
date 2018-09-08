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
        <?php 
        $notif = $model->getNotification();

        ?>
        <li>
          <a class="nav-link" href="notifications.php">
            <span data-feather="inbox"></span>
              Unread Messages<span class="badge badge-danger"><?= count($notif);?></span>
          </a>
        </li>
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
            <span data-feather="plus-square"></span>
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
      </li>
      <li class="nav-item">
        <a class="nav-link" href="browse.php">
          <span data-feather="search"></span>
          Browse Job
        </a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="myprofile.php">
          <span data-feather="edit-2"></span>
          Update Profile
        </a>
      </li>
      <?php endif; ?>
     <li class="nav-item">
          <a class="nav-link" href="password.php">
            <span data-feather="settings"></span>
            Change Password
          </a>
        </li>
    </ul>
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
