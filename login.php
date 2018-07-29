<?php include_once "model.php"; ?>
<?php $model = new Model(); ?>
<?php include_once "header.php"; ?>
	<style type="text/css">
		:root {
		  --input-padding-x: .75rem;
		  --input-padding-y: .75rem;
		}

		html,
		body {
		  height: 100%;
		}
		body {
		  padding-bottom: 40px;
		  background-color: #f5f5f5;
		}
		.loginfrm {
		  display: -ms-flexbox;
		  display: -webkit-box;
		  display: flex;
		  -ms-flex-align: center;
		  -ms-flex-pack: center;
		  -webkit-box-align: center;
		  align-items: center;
		  -webkit-box-pack: center;
		  justify-content: center;
		}

		.form-signin {
		  width: 100%;
		  max-width: 420px;
		  padding: 15px;
		  margin: 0 auto;
		}

		.form-label-group {
		  position: relative;
		  margin-bottom: 1rem;
		}

		.form-label-group > input,
		.form-label-group > label {
		  padding: var(--input-padding-y) var(--input-padding-x);
		}

		.form-label-group > label {
		  position: absolute;
		  top: 0;
		  left: 0;
		  display: block;
		  width: 100%;
		  margin-bottom: 0; /* Override default `<label>` margin */
		  line-height: 1.5;
		  color: #495057;
		  border: 1px solid transparent;
		  border-radius: .25rem;
		  transition: all .1s ease-in-out;
		}

		.form-label-group input::-webkit-input-placeholder {
		  color: transparent;
		}

		.form-label-group input:-ms-input-placeholder {
		  color: transparent;
		}

		.form-label-group input::-ms-input-placeholder {
		  color: transparent;
		}

		.form-label-group input::-moz-placeholder {
		  color: transparent;
		}

		.form-label-group input::placeholder {
		  color: transparent;
		}

		.form-label-group input:not(:placeholder-shown) {
		  padding-top: calc(var(--input-padding-y) + var(--input-padding-y) * (2 / 3));
		  padding-bottom: calc(var(--input-padding-y) / 3);
		}

		.form-label-group input:not(:placeholder-shown) ~ label {
		  padding-top: calc(var(--input-padding-y) / 3);
		  padding-bottom: calc(var(--input-padding-y) / 3);
		  font-size: 12px;
		  color: #777;
		}	
	</style>
    <main class="container-fluid">
	<section class="container loginfrm">
	    <form class="form-signin" method="post">
	    	<input type="hidden" name="login" value="1">
	      <div class="text-center mb-4">
	        <img class="mb-4" src="https://getbootstrap.com/docs/4.0/assets/brand/bootstrap-solid.svg" alt="" width="72" height="72">
	        <h1 class="h3 mb-3 font-weight-normal">Login</h1>
	      </div>

	      <div class="form-label-group">
	        <input type="text"  name="username" class="form-control" placeholder="Username..." required autofocus>
	        <label for="inputEmail">Username</label>
	      </div>

	      <div class="form-label-group">
	        <input type="password" name="password" class="form-control" placeholder="Password" required>
	        <label for="inputPassword">Password</label>
	      </div>

	      <div class="checkbox mb-3">
	        <label>
	          <input type="checkbox" value="remember-me"> Remember me
	        </label>
	      </div>
	      <button class="btn btn-lg btn-primary btn-block" type="submit">Sign in</button>
	    </form>
	</section>
    <script src="js/jquery.js"></script>
    <script type="text/javascript">
      (function($){
        $(document).ready(function(){
        	
        });
      })(jQuery);
    </script>

<?php include_once "footer.php"; ?>
