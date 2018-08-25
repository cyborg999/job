<?php include_once "model.php"; ?>
<?php 	$model = new Model(); 
		$industry = $model->getIndustry();
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
		<style type="text/css">
			.completion {
				/*background: orange;*/
				position: relative;
				overflow: hidden;
				min-height: 1000px;
			}
			.container.comp {
				float: left;
				background: white;
			}
			.completion .long {
				position: absolute;
				left: 0;
				width: 800%;
				/*background: red;*/
			}
			.upphoto {
				width: 400px;
			}
			.upphoto div p {
				margin-top: 10px;
			}

		</style>
		<h1 class="display-4"><?= $_SESSION['username'];?> Info</h1>
		<div class="long">
			<br/>
			<br/>
			<div class="container comp">
				<form method="post" id="userinfo">
					<label class="hidden">Social Media
						<input type="text" class="form-control" value="" name="social_ids">
					</label>
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
						<input type="date" class="form-control" name="dob" value="" placeholder="Date of Birth..."/>
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
					<label class="hidden">Key Skills
						<input type="text" class="form-control" value="" name="skill_ids">
					</label>
					<label>Industry
						<select class="form-control" name="industry_ids">
							<?php foreach($industry as $idx => $i): ?>
								<option value=""><?= $i['name'];?></option>
							<?php endforeach; ?>
						</select>
					</label>
					<hr>	
					<label>Desired Position
						<input type="text" class="form-control" required name="position" placeholder="Position..."/>
					</label>
					<br>
					<hr>	
					<label>Short Introduction about you
						<textarea class="form-control" required name="intro"></textarea>
					</label>
					<hr>	
					<input type="submit" value="save" class="btn btn-success">
				</form>
				<br>
			    <input type="submit" disabled="" id="firstnext" value="next>>" disablsed data-left="-205px" data-percen="-100%" class="next btn custom" name="">

			</div>

			<div class="container comp">
				<div class="row">
					<h4 class="display-8">Educational Attainment</h4>
				</div>
				<div class="row" id="education">
					
				</div>
				<div class="row">
					<form id="formeduc">
						<input type="hidden" name="addEduc" value="true"/>
						<label>School
							<input type="text" required class="form-control" name="school" placeholder="School..."/>
						</label>
						<label>Level
							<select class="form-control" required name="level">
								<option value="Academic">Academic degree</option>
								<option value="Bachelor">Bachelor's degree</option>
								<option value="Doctorate">Doctorate degree</option>
								<option value="Master">Master's degree</option>
							</select>
						</label>
						<label>Date Started
							<input type="month" name="educdatestart" class="form-control" placeholder="Date Started..." required />
						</label>
						<label>Date Graduated
							<input type="month" required name="educdateend" class="form-control" placeholder="Date Graduated..."/>
						</label>
						<input type="submit" value="Add" class="btn btn-success">
						<hr>
					</form>

					
				</div>
				<script type="text/html" id="educ">
					<blockquote class="blockquote text-center">
					  <p class="mb-0">[SCHOOL]</p>
					  <footer class="blockquote-footer">[LEVEL] <cite title="Source Title">[START]-[END]</cite></footer>
					</blockquote>
				</script>
				<br/>
			    <br/>
		    	<input type="submit" value="<<prev" data-left="0px" data-percen="0%" class="next btn custom" name="">
		    	<input type="submit" value="next>>" data-left="-160px" data-percen="-200%" class="next btn custom" name="">
			</div>


			<div class="container comp">
				<div class="row">
					<h4 class="display-8">Upload Resume</h4>
				</div>
				<div class="row">
						<iframe src="cv.php" frameborder="0"></iframe>
						<br>
						<br>

					<input type="submit" value="<<prev" data-left="-120px" data-percen="-100%" class="next btn custom" name=""> 
		   	
	    			<input type="submit" value="next>>" data-left="-109px" data-percen="-300%" class="next btn custom" name="">
				</div>
			</div>

			<div class="container comp">
				<div class="row">
					<div class="col">
						<h4 class="display-8">Skills/Ratings</h4>
					</div>
				</div>
				<div class="row">
					<div class="col-5">
						<input type="text" required name="skill" class="form-control" id="skillname" placeholder="skill..."/>
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
				<br/>
			    <br/>
			    <input type="submit" value="<<prev" data-left="-89px" data-percen="-200%" class="next btn custom" name="">
			    <input type="submit" id="socialnext" value="next>>" data-left="-80px" data-percen="-400%" class="next btn custom" name="">
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
			
			<div class="container comp">
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
					</div>
					
				</div>
				<div class="row">	
					<br/>
				    <br/>
				    <input type="submit" value="<<prev" data-left="-89px" data-percen="-300%" class="next btn custom" name="">
				    <input type="submit" id="socialnext" value="next>>" data-left="-42px" data-percen="-500%" class="next btn custom" name="">

				</div>
				<script type="text/html" id="emphist">
					<div class="col-12">
						<a href="" data-id="[ID]" class="close closeemp">x</a>
						<h5 class="display-8">[COMPANY] <small>[MONTHS]</small></h5>
						<b>[POSITION]</b>
						<p>[DESC]</p>
						<hr>
					</div>
				</script>
			</div>

			<div class="container comp photo">
				<div class="row">
					<h4 class="display-8">Add Photo</h4>
				</div>
				<div class="row">
					 <span class="btn btn-success fileinput-button">
				        <i class="glyphicon glyphicon-plus"></i>
				        <span>Upload...</span>
				        <input id="fileupload" type="file" name="photo">
				    </span>
				    <br>
				    <br>
				    <div id="progress" class="progress">
				        <div class="progress-bar progress-bar-success"></div>
				    </div>
				    <div id="files" class="files"></div>
				</div>
				<div class="row clearfix">	
					<br/>
				    <br/>
				    <input type="submit" value="<<prev" data-left="-89px" data-percen="-400%" class="next btn custom" name="">
				    <input type="submit" id="socialnext" value="next>>" data-left="-32px" data-percen="-600%" class="next btn custom" name="">

				</div>
			   
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
					.data {
						margin: 5px 0;
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

			    <input type="submit" value="<<prev" data-left="-89px" data-percen="-500%" class="next btn custom" name="">
			    <input type="submit" id="socialnext" value="next>>" data-left="-12px" data-percen="-700%" class="next btn custom" name="">
			</div>
			<div class="container comp">
				<div class="alert alert-success" role="alert">
				  <h4 class="alert-heading display-3">Well done!</h4>
				  <p>You can now login to your profile by clicking the link below.</p>
				  <hr>
				<br/>

			    <input type="submit" id="completed2" value="Completed" data-left="0"  class=" btn btn-success" name="">
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
	<script type="text/javascript">
		(function($){
			'use strict';
		    var delay = (function(){
			  var timer = 0;
			  return function(callback, ms){
			    clearTimeout (timer);
			    timer = setTimeout(callback, ms);
			  };
			})();

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
					$(".closeemp").off().on("click", function(e){
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

				$("#completed2").on("click", function(e){
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

					$.ajax({
						url : 'process.php',
						data : { socialCompleted:true},
						type : 'POST',
						dataType : 'JSON',
						success : function(res){
							setTimeout(function(){
								window.location.href="login.php";
							},1500);
						}
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
				      		
				      		console.log(res);
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

				$("#formeduc").on("submit", function(e){
					e.preventDefault();
					var html = $("#educ").html();
					var target = $("#education");

					$.ajax({
						url : "process.php",
						data : $(this).serialize(),
						type : 'POST',
						dataType : 'JSON', 
						success : function(res){
							html = html.replace("[SCHOOL]", res.name).
									replace("[LEVEL]", res.level).
									replace("[START]", res.start).
									replace("[END]", res.end);

							target.append(html);
						}
					});
				});

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
