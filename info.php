<?php include_once "model.php"; ?>
<?php $model = new Model(); ?>
<?php include_once "header.php"; ?>

<main class="container-fluid">
	<section class="container">
		<h1><?= $_SESSION['username'];?> Info</h1>
		<div class="container">
			<div class="row">
				<div class="col">
					<h4 class="display-8">Skills/Ratings</h4>
				</div>
			</div>
			<div class="container">
				<div class="row">
					<div class="col-5">
						<input type="text" name="skill" class="form-control" id="skillname" placeholder="skill..."/>
					</div>
					<div class="col-3">
						<ul id="rating">
							<li class="star staroff"><figure></figure></li>
							<li class="star staroff"><figure></figure></li>
							<li class="star staroff"><figure></figure></li>
							<li class="star staroff"><figure></figure></li>
						</ul>
					</div>
					<div class="col">
						<input type="submit" id="addskill" class="btn btn-success" value="add"/>
					</div>
				</div>
				<div class="row" >
					<ul id="allskills"></ul>
				</div>
			</div>
			<style type="text/css">
				#allskills,
				#rating {
					list-style-type: none;
				}
				#allskills li {
					background: #c1e1fd;
				    padding: 5px 10px;
				    margin: 3px;
				    border-radius: 15px;
				    font-size: 12px;
				    font-weight: 600;
				    display: initial;
				    line-height: 2;
				}
				#allskills li span.closex {
					margin-left: 10px;
					font-size: 15px;
				}
				.rate {
					font-size: 12px;
    				color: #ff2419;
				}
				#allskills,
				#rating li {
					display: inline-block;
					cursor: pointer;
				}
				.closex {
					opacity: .7;
					font-weight: 600;
				}
				.star figure {
					width: 30px;
					height: 30px;
				}
				.staroff figure {
					background: url(./img/staroff.png) no-repeat;
					background-size: contain;
				}
				.staron figure {
					background: url(./img/staron.png) no-repeat;
					background-size: contain;
				}
			</style>
			<script type="text/html" id="skill">
				<li class="li">[NAME]<span class="rate">([RATE])</span><span data-id="[ID]" class="closex">x</span></li>
			</script>
			<br>
			<br>
			<br>
			<br>
			<br>
		</div>
		<div class="container">
			<div class="row">
				<div class="col">
					<h4 class="display-8">Employment History</h4>
				</div>
			</div>
			<div class="row emp">
			
			</div>
			<div class="row">
				<div class="col">
					<form id="emphistory">
						<input type="hidden" name="addemploymenthistory" value="1">
						<label>Company Name
							<input type="text" id="ecompany" class="form-control " name="company" placeholder="Company..."/>
						</label>
						<label>Start Date
							<input type="date" id="sdate"  class="form-control" name="startdate" required placeholder="Date Started..."/>
						</label>
						<label>End Date
							<input type="date" id="edate"  class="form-control" name="enddate" required placeholder="Date Ended..."/>
						</label>
						<hr>
						<label>Job Role/Position
							<input type="text"  id="erole" class="form-control" name="role" placeholder="Position..."/>
						</label>
						<hr>
						<label>Job Description
							<textarea class="form-control" id="edesc"  name="jobdesc"></textarea>
						</label>
						<hr>
						<input type="submit" class="btn btn-success" value="Add">
						<hr>
					</form>
						<input type="submit" class="btn btn-primary" value="next">
				</div>
			</div>
		</div>
		<script type="text/html" id="emphist">
			<div class="col-12">
				<a href="" data-id="[ID]" class="close">x</a>
				<h5 class="display-8">[COMPANY] <small>[MONTHS]</small></h5>
				<b>[POSITION]</b>
				<p>[DESC]</p>
				<hr>
			</div>
		</script>
			
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
			</label>
			<label class="hidden">Social Media
				<input type="text" class="form-control" value="" name="social_ids">
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
	<script type="text/javascript">
		(function($){
			$(document).ready(function(){
				function attachListener(){
					$(".closex").off().on("click", function(e){
						e.preventDefault();
						
						var me = $(this);
						var id = me.data("id");

						$.ajax({
							url : "process.php",
							data : { deleteSkill : true, id : id},
							type : 'POST',
							dataType : 'JSON',
							success : function(res){
								me.parents("li").remove();
							}
						});	
					});
					$(".close").off().on("click", function(e){
						e.preventDefault();

						var me = $(this);
						var id = me.data("id");
						
						$.ajax({
							url : "process.php",
							data : { deleteEmpHis : true, id : id},
							type : 'POST',
							dataType : 'JSON',
							success : function(res){
								console.log(res);
								me.parents(".col-12").remove();
							}
						});
					});

				}
				
				attachListener();
				
				$("#addskill").on("click", function(e){
					e.preventDefault();
					var skill = $("#skillname").val();
					var target = $("#allskills");
					var rate = $("#rating").find(".staron").length;

					$.ajax({
						url : "process.php",
						data : { addskill : true, skill : skill , rate : rate},
						type : 'POST',
						dataType : 'JSON',
						success : function(res){
							var html = $("#skill").html();

							html = html.replace("[NAME]", skill).
								replace("[ID]", res.id).
								replace("[RATE]", rate);
							target.append(html);
							
							attachListener();
						}	
					});

				});

				$("#rating li").on("click", function(e){
					e.preventDefault();
					$(".star").removeClass("staron").addClass("staroff");
					var me = $(this);

					me.addClass("staron");
					me.prevAll().removeClass("staroff").addClass("staron");
				});	
				$("#emphistory").on("submit", function(e){
					e.preventDefault();

				
					$.ajax({
						url : "process.php",
						data : $(this).serialize(),
						type : 'POST',
						dataType : 'JSON',
						success : function(res){
							console.log(res);

							var html = $("#emphist").html();

							html = html.replace("[COMPANY]", $("#ecompany").val()).
								replace("[MONTHS]", res.interval).
								replace("[POSITION]", $("#erole").val()).
								replace("[ID]", res.id).
								replace("[DESC]", $("#edesc").val());

							$(".emp").first().append(html);
							
							attachListener();
						}
					});

				});
			});



		})(jQuery);
	</script>
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
