<?php include_once "model.php"; ?>
<?php $model = new Model(); 
  $model->restrictAccessByLevel(3);
	$mySocial = $model->getMySocial();
?>
<?php include_once "header.php"; ?>

<main class="container-fluid">
	<style type="text/css">
		.completion {
		}
		.comp-container {
			position: relative;
			width: 300px;
			height: 30px;
			overflow: hidden;
			margin: 0 auto;
		}
		.comp-bg {
			width: 100%;
			height: 100%;
			position: absolute;
			left: 0;
			top: 0;
			background: url(./img/completionbg.png) no-repeat;
			background-size: contain;
			z-index: 1;
		}
		.comp-bar {
		    width: 247px;
		    height: 30px;
		    position: absolute;
		    left: -247px;
		    top: 0;
		    background: url(./img/completionbar.png) no-repeat;
		    background-size: cover;
		    z-index: 0;
		    border-radius: 31px
		}
		.comp iframe {
			width: 960px;
			height: 300px;
		}
	</style>
	<div class="comp-container">
		<div class="comp-bar"> </div>
		<div class="comp-bg"> </div>
	</div>

	<section class="container completion">
		<h1 class="display-4"><?= $_SESSION['username'];?> Info</h1>

		<style type="text/css">
			.completion {
				/*background: orange;*/
				position: relative;
				overflow: hidden;
				min-height: 700px;
			}
			.container.comp {
				float: left;
				background: white;
			}
			.completion .long {
				position: absolute;
				left: 0;
				width: 500%;
				/*background: red;*/
			}
			.upphoto {
				width: 400px;
			}
			.upphoto div p {
				margin-top: 10px;
			}

		</style>
		<div class="long">
			<br/>
			<br/>

			<div class="container comp">
				<form method="post" id="userinfo">
					<input type="hidden" name="companyinfo" value="1">
					<label>Name
						<input type="text" class="form-control" required name="name" value="" placeholder="Company Name..." />
					</label>
					<label>Address
						<input type="text" class="form-control" name="address" value="" placeholder="Address..."/>
					</label>
					<label>Mobile
						<input type="text" class="form-control" name="mobile" value="" placeholder="Mobile #..."/>
					</label>
					<hr/>
					<label>Telephone
						<input type="text" class="form-control" name="telephone" value="" placeholder="Telephone #..."/>
					</label>
					<label>Email
						<input type="text" class="form-control" name="email" value="" placeholder="Email..."/>
					</label>
					<label>Industry
						<input type="text" class="form-control" value="" name="industry_ids">
					</label>
					<label class="hidden">Social Media
						<input type="text" class="form-control" value="" name="social_ids">
					</label>
					<hr/>
					<label>Size
						<input type="text" name="size" class="form-control" placeholder="Company Size..."/>
					</label>
					<hr/>
					<label>Overview
						<textarea name="overview" class="form-control" placeholder="Company Overview..."></textarea>
					</label>
					<hr/>
					<input type="submit" name="submit" id="update" class="btn" value="Update"/>
				</form>
				<br/>
			    <br/>
			    <input type="submit" id="firstnext" value="next>>" disabled data-left="-185px" data-percen="-100%" class="next btn custom" name="">
			</div>

			<div class="container photo comp">
				<div class="upphoto">
					<span class="btn custom fileinput-button">
				        <i class="glyphicon glyphicon-plus"></i>
				        <span>Add Company Logo...</span>
				        <input id="fileupload" type="file" name="companyphoto">
				    </span>
				    <br>
				    <br>
				    <div id="progress" class="progress">
				        <div class="progress-bar progress-bar-success"></div>
				    </div>
				    <div id="files" class="files"></div>
				    <br/>
				    <br/>
			    	<input type="submit" value="<<prev" data-left="0px" data-percen="0%" class="next btn custom" name="">
			    	<input type="submit" value="next>>" data-left="-120px" data-percen="-200%" class="next btn custom" name="">
				</div>
			</div>


			<div class="container comp">
				<iframe src="companybanner.php" frameborder="0"></iframe>
				 <br/>
			    <br/>
			    <input type="submit" value="<<prev" data-left="-120px" data-percen="-100%" class="next btn custom" name="">
			    <input type="submit" value="next>>" data-left="-89px" data-percen="-300%" class="next btn custom" name="">
			</div>
			<div class="container comp">
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

				<h5>Social Media</h5>
				<script type="text/html" id="media">
					<div class="row data">
						<div class="col">
							<input type="text"  readonly="readonly" class="form-control name"  value="[MEDIA]" />
						</div>
						<div class="col">
							<input type="text" required class="form-control link"  />
						</div>
						<div class="col"><button class="remove-media btn btn-danger">remove</button></div>
					</div>
				</script>
				<div class="row" id="first">
					<div class="col" id="social">
						<input type="text" id="socialname" class="form-control"  value="" placeholder="Search here..."/>
						<ul id="socialul"></ul>
					</div>
					<div class="col">Link</div>
					<div class="col">Actions</div>
				</div>
				<div class="row">
					<div class="col">
						<a href="" id="save-social" class="btn btn-sm btn-success save-social">Save</a>
					</div>
					<div class="col"></div>
					<div class="col"></div>
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
				
			 	<br/>
			    <br/>
			    <input type="submit" value="<<prev" data-left="-89px" data-percen="-200%" class="next btn custom" name="">
			    <input type="submit" id="socialnext" disabled value="next>>" data-left="-42px" data-percen="-400%" class="next btn custom" name="">
			</div>
			<div class="container comp">
				<div class="alert alert-success" role="alert">
				  <h4 class="alert-heading display-3">Well done!</h4>
				  <p>You can now view your profile by clicking the link below.</p>
				  <hr>
				<br/>
			    <input type="submit" id="completed" value="Completed" data-left="0" data-percen="-400%" class="next btn btn-success" name="">
				</div>
			</div>
			
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

		$("#completed").on("click", function(e){
			e.preventDefault();

			$.ajax({
				url : 'process.php',
				data : { socialCompleted:true},
				type : 'POST',
				dataType : 'JSON',
				success : function(res){
					console.log(res);
					setTimeout(function(){
						window.location.href="profile.php";
					},1500);
				}
			});
		});

		$("#userinfo").on("submit", function(e){
			e.preventDefault();

			$.ajax({
				url : 'process.php',
				data : $(this).serialize(),
				type : 'POST',
				dataType : 'JSON',
				success : function(res) {
					$("#firstnext").removeAttr("disabled");
				}
			});

		});

		$(".next").on("click", function(e){
			e.preventDefault();
			var percent = $(this).data("percen");
			var target = $(".long").first();
			var bar = $(".comp-bar").first();
			var left = $(this).data("left");

			bar.stop().animate({
				"left" : left
			});

			target.stop().animate({
				"left" : percent
			});

		});

		$("#save-social,.save-social").off().on("click", function(e){
			e.preventDefault();

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
					$("#socialnext").removeAttr("disabled");
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
