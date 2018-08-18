<style type="text/css">
  #account-logo {
    width: 200px;
    height: auto;
    display: block;
    margin: 20px auto 10px;
  }
</style>
<nav class="col-md-2 d-none d-md-block bg-light sidebar">
  <div class="sidebar-sticky">
    <div class="img-container">
      <img id="account-logo" src="<?= $_SESSION['photo'];?>">
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
        <a class="nav-link" href="profile.php">
          <span data-feather="users"></span>
          Browse Job
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
