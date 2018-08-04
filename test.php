
<!DOCTYPE HTML>
<html lang="en">
<head>
    <!--[if IE]><meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1"><![endif]-->
    <meta charset="utf-8">
    <title>Fancy Input - CSS3 text typing effects for input fields</title>
    <meta name="description" content="Makes HTML input field typing fun with some CSS3 effects">
    <meta name="viewport" content="width=device-width">
    <link rel="shortcut icon" href="favicon.ico">
    <!--[if lt IE 9]><script src="http://html5shim.googlecode.com/svn/trunk/html5.js"></script><![endif]-->
    <link href="bootstrap-4.0.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
    <div id="carouselExampleSlidesOnly" class="carousel slide" data-ride="carousel">
      <div class="carousel-inner">
      <style type="text/css">
          .carousel-item img {
            width: 70px;
            height: 70px;
          }
      </style>
        <div class="carousel-item active">
          <img class="d-block w-100" src="img/logo1.png" alt="Third slide">
          <div class="carousel-caption d-none d-md-block">
            <h5>Sample1</h5>
            <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod
            tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,
            quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo
            consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse
            cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non
            proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</p>
          </div>
        </div>
        <div class="carousel-item">
          <img class="d-block w-100" src="img/logo1.png" alt="Third slide">
          <div class="carousel-caption d-none d-md-block">
            <h5>Sample2</h5>
            <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod
            tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,
            quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo
            consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse
            cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non
            proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</p>
          </div>
        </div>
        <div class="carousel-item">
          <img class="d-block w-100" src="img/logo1.png" alt="Third slide">
          <div class="carousel-caption d-none d-md-block">
            <h5>Sample3</h5>
            <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod
            tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,
            quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo
            consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse
            cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non
            proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</p>
          </div>
        </div>
      </div>
    </div>
    <script src="js/jquery.js"></script>
    <script src="bootstrap-4.0.0/dist/js/bootstrap.min.js"></script>
    <script type="text/javascript">
        (function($){
            $('.carousel').carousel({
              interval: 2000
            })
        })(jQuery);
    </script>
</body> 
</html>
