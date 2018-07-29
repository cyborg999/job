<?php include_once "model.php"; ?>
<?php $model = new Model(); ?>
<?php include_once "header.php"; ?>

    <main class="container-fluid">

	<section class="container">

		<div class="row">
    		<div class="col">
	    		<?php
			    	$error = $model->getErrors();
			    	if(count($error)){
			    		echo '<div class="alert alert-warning alert-dismissible fade show" role="alert"><strong>Login Failed</strong>';
			    			foreach($error as $idx => $e) {
			    				echo ' <br/>'.$e;
			    			}
			    			echo '<br/>You should check in on some of those fields below.<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button></div>';
			    	}
			    ?>	
    		</div>
    	</div>
    		<form method="post" id="signup" action="">
				<input type="hidden" name="signup" value="1">
		      	<div class="form-group">
					<label>Username</label>
					<input type="text" value="<?= isset($_POST['username']) ? $_POST['username'] : '';?>" class="form-control" name="username" required placeholder="Username..."/>
				</div>
		      	<div class="form-group">
					<label>Password</label>
					<input type="password" value="<?= isset($_POST['password1']) ? $_POST['username'] : '';?>" class="form-control" name="password1" required placeholder="Password..."/>
				</div>
		      	<div class="form-group">
					<label>Retype Password</label>
					<input type="password" value="<?= isset($_POST['password2']) ? $_POST['username'] : '';?>" class="form-control" name="password2" required placeholder="Password..."/>
				</div>
				<h5>User Type </h5>
		      	<div class="form-check form-check-inline">
					<input type="radio" id="applicant" class="form-check-input" name="usertype" checked value="applicant">
					<label for="applicant" class="form-check-label">Applicant</label>
				</div>
		      	<div class="form-check form-check-inline">
					<input type="radio" id="employer" class="form-check-input" name="usertype" value="employer">
					<label for="employer" class="form-check-label">Employer</label>
				</div>
				<div class="form-group">
					<br/>
					<input type="submit" class="btn btn-primary" value="next">
				</div>
			</form>
		
	</section>
    <script src="js/jquery.js"></script>
    <script type="text/javascript">
      (function($){
        $(document).ready(function(){
        	$('.alert').alert();
        	
        });
      })(jQuery);
    </script>

<?php include_once "footer.php"; ?>
