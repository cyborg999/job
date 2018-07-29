<?php include_once "model.php"; ?>
<?php $model = new Model(); ?>
<?php include_once "header.php"; ?>

<main class="container-fluid">
	<section class="container">
		<h1><?= $_SESSION['username'];?> Info</h1>
		<div class="container photo">
		    <!-- The fileinput-button span is used to style the file input field as button -->
		    <span class="btn btn-success fileinput-button">
		        <i class="glyphicon glyphicon-plus"></i>
		        <span>Add Photo...</span>
		        <!-- The file input field used as target for the file upload widget -->
		        <input id="fileupload" type="file" name="photo">
		    </span>
		    <br>
		    <br>
		    <!-- The global progress bar -->
		    <div id="progress" class="progress">
		        <div class="progress-bar progress-bar-success"></div>
		    </div>
		    <!-- The container for the uploaded files -->
		    <div id="files" class="files"></div>
		</div>
		<form method="post" id="userinfo">
			<input type="hidden" name="userinfo" value="1">
			<label>Firstname
				<input type="text" class="form-control" name="firstname" value="" placeholder="Firstname..." />
			</label>
			<label>Middlename
				<input type="text" class="form-control" name="middlename" value="" placeholder="Middlename..."/>
			</label>
			<label>Lastname
				<input type="text" class="form-control" name="lastname" value="" placeholder="Lastname..."/>
			</label>
			<label>Gender
				<input type="checkbox" name="gender" value="male" checked />
				<input type="checkbox" name="gender" value="female"/>
			</label>
			<label>Date of Birth
				<input type="text" class="form-control" name="dob" value="" placeholder="Date of Birth..."/>
			</label>
			<label>Address
				<input type="text" class="form-control" name="address" value="" placeholder="Address..."/>
			</label>
			<label>Mobile
				<input type="text" class="form-control" name="mobile" value="" placeholder="Mobile #..."/>
			</label>
			<label>Nationality
				<input type="text" class="form-control" name="nationality" value="" placeholder="Nationality..."/>
			</label>
			<label>Email
				<input type="text" class="form-control" name="email" value="" placeholder="Email..."/>
			</label>
			<label>Key Skills
				<input type="text" class="form-control" value="" name="skill_ids">
				todo
			</label>
			<label>Industry
				<input type="text" class="form-control" value="" name="industry_ids">
				todo
			</label>
			<label>Social Media
				<input type="text" class="form-control" value="" name="social_ids">
				todo
			</label>
			<div class="table-responsive">
				<table class="table">
					<tr>
						<th>Social Profile
						<input type="text" id="socialname" class="form-control"  value="" placeholder="Search here..."/></th>
						<th>Link</th>
					</tr>
					<tr>
						<td ><input type="text" class="socialname form-control" placeholder="Name..."/></td>
						<td ><input type="text" class="link form-control" placeholder="Link..."/></td>
					</tr>
				</table>
			</div>
			<input type="submit" name="submit" class="btn" value="Update"/>
			<hr>
			<a href=""> upload cv</a>

		</form>
		<iframe src="cv.php" frameborder="0"></iframe>
	</section>
	<script src="js/jquery.js"></script>
	<!-- The jQuery UI widget factory, can be omitted if jQuery UI is already included -->
	<script src="js/jQuery-File-Upload-master/js/vendor/jquery.ui.widget.js"></script>
	<!-- The Load Image plugin is included for the preview images and image resizing functionality -->
	<script src="js/loadimage.js"></script>
	<!-- The basic File Upload plugin -->
	<script src="js/jQuery-File-Upload-master/js/jquery.fileupload.js"></script>
	<!-- The File Upload processing plugin -->
	<script src="js/jQuery-File-Upload-master/js/jquery.fileupload-process.js"></script>
	<!-- The File Upload image preview & resize plugin -->
	<script src="js/jQuery-File-Upload-master/js/jquery.fileupload-image.js"></script>
	<!-- The File Upload audio preview plugin -->
	<script src="js/jQuery-File-Upload-master/js/jquery.fileupload-audio.js"></script>
	<!-- The File Upload video preview plugin -->
	<script src="js/jQuery-File-Upload-master/js/jquery.fileupload-video.js"></script>
	<!-- The File Upload validation plugin -->
	<script src="js/jQuery-File-Upload-master/js/jquery.fileupload-validate.js"></script>
	<script>
	/*jslint unparam: true, regexp: true */
	/*global window, $ */
	$(function () {
	    'use strict';
	    // Change this to the location of your server-side upload handler:
	    var url = window.location.hostname === 'blueimp.github.io' ?
	                '//jquery-file-upload.appspot.com/' : 'process.php',
	        uploadButton = $('<button/>')
	            .addClass('btn btn-primary')
	            .prop('disabled', true)
	            .text('Processing...')
	            .on('click', function () {
	                var $this = $(this),
	                    data = $this.data();
	                $this
	                    .off('click')
	                    .text('Abort')
	                    .on('click', function () {
	                        $this.remove();
	                        data.abort();
	                    });
	                data.submit().always(function () {
	                    $this.remove();
	                });
	            });
	    $('#fileupload').fileupload({
	        url: url,
	        dataType: 'json',
	        autoUpload: false,
	        acceptFileTypes: /(\.|\/)(gif|jpe?g|png)$/i,
	        maxFileSize: 999000,
	        // Enable image resizing, except for Android and Opera,
	        // which actually support image resizing, but fail to
	        // send Blob objects via XHR requests:
	        disableImageResize: /Android(?!.*Chrome)|Opera/
	            .test(window.navigator.userAgent),
	        previewMaxWidth: 100,
	        previewMaxHeight: 100,
	        previewCrop: true
	    }).on('fileuploadadd', function (e, data) {
	        data.context = $('<div/>').appendTo('#files');
	        $.each(data.files, function (index, file) {
	            var node = $('<p/>')
	                    .append($('<span/>').text(file.name));
	            if (!index) {
	                node
	                    .append('<br>')
	                    .append(uploadButton.clone(true).data(data));
	            }
	            node.appendTo(data.context);
	        });
	    }).on('fileuploadprocessalways', function (e, data) {
	        var index = data.index,
	            file = data.files[index],
	            node = $(data.context.children()[index]);
	        if (file.preview) {
	            node
	                .prepend('<br>')
	                .prepend(file.preview);
	        }
	        if (file.error) {
	            node
	                .append('<br>')
	                .append($('<span class="text-danger"/>').text(file.error));
	        }
	        if (index + 1 === data.files.length) {
	            data.context.find('button')
	                .text('Upload')
	                .prop('disabled', !!data.files.error);
	        }
	    }).on('fileuploadprogressall', function (e, data) {
	        var progress = parseInt(data.loaded / data.total * 100, 10);
	        $('#progress .progress-bar').css(
	            'width',
	            progress + '%'
	        );
	    }).on('fileuploaddone', function (e, data) {
	        $.each(data.result.files, function (index, file) {
	            if (file.url) {
	                var link = $('<a>')
	                    .attr('target', '_blank')
	                    .prop('href', file.url);
	                $(data.context.children()[index])
	                    .wrap(link);
	            } else if (file.error) {
	                var error = $('<span class="text-danger"/>').text(file.error);
	                $(data.context.children()[index])
	                    .append('<br>')
	                    .append(error);
	            }
	        });
	    }).on('fileuploadfail', function (e, data) {
	    	console.log(data);
	        $.each(data.files, function (index) {
	            var error = $('<span class="text-danger"/>').text('File upload failed.');
	            $(data.context.children()[index])
	                .append('<br>')
	                .append(error);
	        });
	    }).prop('disabled', !$.support.fileInput)
	        .parent().addClass($.support.fileInput ? undefined : 'disabled');
	});
	</script>
