<?php include_once "model.php"; ?>
<?php $model = new Model(); ?>
<?php include_once "header.php"; ?>

    <main class="container-fluid">
	<section class="container">
		<form method="post" id="signup" action="">
			<input type="hidden" name="signup" value="1">
			<label>Username
				<input type="text" name="username" required placeholder="Username..."/>
			</label>
			<label>Password
				<input type="password" name="password1" required placeholder="Password..."/>
			</label>
			<label>Retype Password
				<input type="password" name="password2" required placeholder="Password..."/>
			</label>
			<h5>User Type</h5>
			<label>Applicant
				<input type="radio" name="usertype" checked value="applicant">
			</label>
			<label>Employer
				<input type="radio" name="usertype" value="employer">
			</label>
			<input type="submit" value="next">
		</form>
		<form method="post" id="userinfo">
			<input type="hidden" name="userinfo" value="1">
		</form>
	</section>
    <script src="js/jquery.js"></script>
    <script type="text/javascript">
      (function($){
        $(document).ready(function(){
        	$("#sisgnup").on("submit", function(e){
        		e.preventDefault();

        		alert("asdsad");
        	});
        });
      })(jQuery);
    </script>

<?php include_once "footer.php"; ?>
