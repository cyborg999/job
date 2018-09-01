<style type="text/css">
  #account-logo {
    width: auto;
    max-height: 200px;
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
      $valid = false;
      $photo = (!$valid) ? "./img/default.jpg" : $_SESSION['photo'];

      ?>
      <img id="account-logo" src="<?= $photo;?>">
        
    </div>

    <ul class="nav flex-column">
      <li class="nav-item">
       
        <!-- <a class="nav-link" href="browse.php">
          <span data-feather="users"></span>
          Settings
        </a>
        <a class="nav-link" href="myprofile.php">
          <span data-feather="users"></span>
          Banner
        </a> -->
        <a class="nav-link" href="requirements.php">
          <span data-feather="users"></span>
          Requirements
        </a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="slideshow.php">
          <span data-feather="users"></span>
          Banner
        </a>
      </li>
      <li class="nav-item">
         <a class="nav-link" href="companies.php">
          <span data-feather="users"></span>
          Companies
        </a>
      </li>
      <li class="nav-item">
         <a class="nav-link" href="setting.php">
          <span data-feather="users"></span>
          Settings
        </a>
      </li>
       <li class="nav-item">
          <a class="nav-link" href="adminpw.php">
            <span data-feather="clipboard"></span>
            Change Password
          </a>
        </li>
    </ul>
  </div>
</nav>

<div class="modal container" tabindex="-1" id="adminModal" role="dialog">
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
    $('#adminModal').on('shown.bs.modal', function () {
      $('#myInput').trigger('focus')
    });
  })(jQuery);
</script>
