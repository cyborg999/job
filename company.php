<?php include_once "model.php"; ?>
<?php $model = new Model(); 
	$mySocial = $model->getMySocial();
?>
<?php include_once "header.php"; ?>

<main class="container-fluid">
	<section class="container">
		<h1><?= $_SESSION['username'];?> Company Info</h1>
		<div class="container photo">
		    <!-- The fileinput-button span is used to style the file input field as button -->
		    <span class="btn btn-success fileinput-button">
		        <i class="glyphicon glyphicon-plus"></i>
		        <span>Add Company Logo...</span>
		        <!-- The file input field used as target for the file upload widget -->
		        <input id="fileupload" type="file" name="companyphoto">
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
			<input type="hidden" name="companyinfo" value="1">
			<label>Name
				<input type="text" class="form-control" name="name" value="" placeholder="Company Name..." />
			</label>
			<label>Address
				<input type="text" class="form-control" name="address" value="" placeholder="Address..."/>
			</label>
			<label>Mobile
				<input type="text" class="form-control" name="mobile" value="" placeholder="Mobile #..."/>
			</label>
			<label>Overview
				<textarea name="overview" class="form-control" placeholder="Company Overview..."></textarea>
			</label>
			<label>Telephone
				<input type="text" class="form-control" name="telephone" value="" placeholder="Telephone #..."/>
			</label>
			<label>Email
				<input type="text" class="form-control" name="email" value="" placeholder="Email..."/>
			</label>
			<label>Industry
				<input type="text" class="form-control" value="" name="industry_ids">
				todo
			</label>
			<label>Social Media
				<input type="text" class="form-control" value="" name="social_ids">
				todo
			</label>
			<label>Size
				<input type="text" name="size" class="form-control" placeholder="Company Size..."/>
			</label>
			<input type="submit" name="submit" class="btn" value="Update"/>
			<hr>

		</form>
		<iframe src="companybanner.php" frameborder="0"></iframe>
		<style type="text/css">
			#social {
				position: relative;
			}
			#first {
				margin-bottom: 10px;	
			}
			#socialul {
				position: absolute;
				bottom: -50px;
				left: 0;
				width: 100%;
				z-index: 999;
				background: white;
			}
		</style>
		<script type="text/html" id="media">
			<div class="row data">
				<div class="col">
					<input type="text"  readonly="readonly" class="form-control name"  value="[MEDIA]" />
				</div>
				<div class="col">
					<input type="text"  class="form-control link"  />
				</div>
				<div class="col"><button class="remove-media btn btn-danger">remove</button></div>
			</div>
		</script>
		<h5>Social Media</h5>
		<div class="row" id="first">
				<div class="col" id="social">
					<input type="text" id="socialname" class="form-control"  value="" placeholder="Search here..."/>
					<ul id="socialul">
				</div>
				<div class="col">Link</div>
				<div class="col">Actions</div>
		</div>
		<?php foreach($mySocial as $idx => $i): ?>
			<div class="row data">
				<div class="col">
					<input type="text"  readonly="readonly" class="form-control name"  value="<?= $i['name'];?>" />
				</div>
				<div class="col">
					<input type="text"  class="form-control link" value="<?= $i['link'];?>" />
				</div>
				<div class="col"><button class="remove-media btn btn-danger">remove</button></div>
			</div>
		<?php endforeach; ?>
		<div class="row" id="first">
				<div class="col">
					<input type="submit" class="btn btn-sm btn-success save-social" value="Save">
				</div>
				<div class="col"></div>
				<div class="col"></div>
		</div>


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
	    var delay = (function(){
		  var timer = 0;
		  return function(callback, ms){
		    clearTimeout (timer);
		    timer = setTimeout(callback, ms);
		  };
		})();

		$(".save-social").on("click", function(){
			var data = Array();

			$(".data").each(function(){
				var name = $(this).find(".name").val();
				var link = $(this).find(".link").val();

				data.push(Array(name,link));
			});

			$.ajax({
				url : 'process.php',
				data : { saveSocial : true, data : data},
				type : 'POST',
				dataType : 'JSON',
				success : function(res){
					console.log(res);
				}
			});
		});

		$(".col").find(".remove-media").off().on("click", function(e){
			e.preventDefault();
			var me = $(this);

			me.parents(".row").remove();
		});

		$('#socialname').keyup(function() {
			var me = $(this);
			var target = $("#socialul");

		    delay(function(){
		      $.ajax({
		      	url : 'process.php',
		      	data : { text : me.val(), searchSocial :true},
		      	type : 'POST',
		      	dataType : 'JSON',
		      	success : function(res){
		      		target.html("");
		      		
		      		//no result
		      		if(res.length == 0){
		      			var li = $("<li id='noresult'>(0) Result Found. <a href=''>Click here to add this.</a></li>");
			      		target.append(li);

			      		target.find("li a").off().on("click", function(e){
			      			e.preventDefault();

			      			var text = $(this).html();
			      			var media = $("#media").html();
			      			media = media.replace("[MEDIA]", me.val());

			      			$("#first").after($(media));
			      			target.html("");

			      			$(".col").find(".remove-media").off().on("click", function(e){
				      			e.preventDefault();
				      			var me = $(this);

				      			me.parents(".row").remove();
				      		});
			      			
			      		});
		      		} else{
		      			for(var i in res){
				      		var li = $("<li>"+ res[i].name+ "</li>");
				      		target.append(li);
			      		}

			      		target.find("li").off().on("click", function(e){
			      			var text = $(this).html();
			      			var media = $("#media").html();
			      			media = media.replace("[MEDIA]", text);

			      			$("#first").after($(media));
			      			target.html("");

			      			$(".col").find(".remove-media").off().on("click", function(e){
				      			e.preventDefault();
				      			var me = $(this);

				      			me.parents(".row").remove();
				      		});
			      		});
		      		}


		      	},
		      	error :  function(){
		      		console.log('Oops, something went wrong.');
		      	}
		      });
		    }, 300 );

		});

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
