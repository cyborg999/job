<?php include_once "model.php"; ?>
<?php $model = new Model(); 
  $model->restrictAccessByLevel(1);
  $industry = $model->getIndustry();
  $mySocial = $model->getMySocial();
  $personal = $model->getUserById($_SESSION['id']);
  $education = $model->getEducationByUserId($_SESSION['id']);
  $employment = $model->getEmploymentHistoryByUserId($_SESSION['id']);
  $skills = $model->getSkillsByUserId($_SESSION['id']);
  $social = $model->getSocialMediaByUserId($_SESSION['id']);

  // opd($personal);
?>
<?php include_once "header2.php"; ?>

  <style type="text/css">

  </style>
    <div class="container-fluid">
      <div class="row">
        <?php include_once "side-nav.php"; ?>


        <style type="text/css">
          .hidden { display: none; }
        </style>
        <main role="main" class="col-md-9 ml-sm-auto col-lg-10 px-4">
          <br>
          <br>
          <div class="container">
            <ul class="nav nav-pills mb-3" id="personalData" role="tablist">
              <li class="nav-item">
                <a class="nav-link active" id="personal" data-toggle="pill" href="#pills-home" role="tab" aria-controls="pills-home" aria-selected="true">Personal Data</a>
              </li>
              <li class="nav-item">
                <a class="nav-link" id="educationalTab" data-toggle="pill" href="#educProfile" role="tab" aria-controls="educProfile" aria-selected="false">Educational Attainment</a>
              </li>
              <li class="nav-item">
                <a class="nav-link" id="empTabCall" data-toggle="pill" href="#empTab" role="tab" aria-controls="empTab" aria-selected="false">Employment History</a>
              </li>
              <li class="nav-item">
                <a class="nav-link" id="resumeTab" data-toggle="pill" href="#cvTab" role="tab" aria-controls="cvTab" aria-selected="false">Resume</a>
              </li>
              
              <li class="nav-item">
                <a class="nav-link" id="skillTabCall" data-toggle="pill" href="#skillTab" role="tab" aria-controls="skillTab" aria-selected="false">Skills</a>
              </li>

              <li class="nav-item">
                <a class="nav-link" id="photoTabCall" data-toggle="pill" href="#photoTab" role="tab" aria-controls="photoTab" aria-selected="false">Photo</a>
              </li>

              <li class="nav-item">
                <a class="nav-link" id="socialTabCall" data-toggle="pill" href="#socialTab" role="tab" aria-controls="socialTab" aria-selected="false">Social Media</a>
              </li>
            </ul>

            <div class="tab-content" id="personalDataContent">
              <div class="tab-pane fade show active" id="pills-home" role="tabpanel" aria-labelledby="personal">
                <div class="container comp">
                  <!-- <div class="row">
                    <div class="col">
                          <div class="alert updated alert-success alert-dismissible fade show" role="alert"><strong>Success</strong>
                           <br/>All data are now updated.<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button></div>
                    </div>
                  </div> -->
                  <form method="post" id="userinfo">
                    <label class="hidden">Social Media
                      <input type="text" class="form-control" value="" name="social_ids">
                    </label>
                    <input type="hidden" name="userinfo" value="1">
                    <label>Firstname
                      <input type="text" class="form-control" name="firstname" value="<?= isset($personal['firstname']) ? $personal['firstname'] : '';?>" placeholder="Firstname..." />
                    </label>
                    <label>Middlename
                      <input type="text" class="form-control" name="middlename" value="<?= isset($personal['middlename']) ? $personal['middlename'] : '';?>" placeholder="Middlename..."/>
                    </label>
                    <label>Lastname
                      <input type="text" class="form-control" name="lastname" value="<?= isset($personal['lastname']) ? $personal['lastname'] : '';?>" placeholder="Lastname..."/>
                    </label>
                    <label>Gender
                      <input type="radio" name="gender" value="male" <?= isset($personal['gender']) ? ($personal['gender'] == 'male') ? 'checked' : '' : '';?>  />
                      <input type="radio" name="gender" value="female"  <?= isset($personal['gender']) ? ($personal['gender'] == 'female') ? 'checked' : '' : '';?> />
                    </label>
                    <label>Date of Birth
                      <input type="date" class="form-control" name="dob" value="<?= isset($personal['dob']) ? $personal['dob'] : '';?>" placeholder="Date of Birth..."/>
                    </label>
                    <label>Address
                      <input type="text" class="form-control" name="address" value="<?= isset($personal['address']) ? $personal['address'] : '';?>" placeholder="Address..."/>
                    </label>
                    <label>Mobile
                      <input type="text" class="form-control" name="mobile" value="<?= isset($personal['mobile']) ? $personal['mobile'] : '';?>" placeholder="Mobile #..."/>
                    </label>
                    <label>Nationality
                      <input type="text" class="form-control" name="nationality" value="<?= isset($personal['nationality']) ? $personal['nationality'] : '';?>" placeholder="Nationality..."/>
                    </label>
                    <label>Email
                      <input type="text" class="form-control" name="email" value="<?= isset($personal['email']) ? $personal['email'] : '';?>" placeholder="Email..."/>
                    </label>
                    <label class="hidden">Key Skills
                      <input type="text" class="form-control" value="" name="skill_ids">
                    </label>
                    <label>Industry
                      <select class="form-control" name="industry_ids">
                        <?php foreach($industry as $idx => $i): ?>
                          <option value="<?= $i['id'];?>"  <?= ($i['id'] == $personal['industry_ids']) ? 'selected' : '';?> ><?= $i['name'];?></option>
                        <?php endforeach; ?>
                      </select>
                    </label>
                    <hr>  
                    <label>Desired Position
                      <input type="text" class="form-control" value="<?= isset($personal['position']) ? $personal['position'] : '';?>" required name="position" placeholder="Position..."/>
                    </label>
                    <br>
                    <hr>  
                    <label>Short Introduction about you
                      <textarea class="form-control" required name="intro"><?= isset($personal['intro']) ? $personal['intro'] : '';?></textarea>
                    </label>
                    <hr>  
                    <input type="submit" value="save" class="btn btn-success">
                  </form>
                </div>
              </div>
              <div class="tab-pane fade" id="socialTab" role="tabpanel" aria-labelledby="educationalTab">
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
                  
                </div>
              </div>
              <div class="tab-pane fade" id="photoTab" role="tabpanel" aria-labelledby="educationalTab">
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
                  </div>
                   
                </div>
              </div>
              <div class="tab-pane fade" id="educProfile" role="tabpanel" aria-labelledby="educationalTab">
                <div class="container comp">
                  <div class="row" id="education">
                    <?php foreach($education as $idx => $e): ?>
                      <div class="col-12 educ">
                        <a href="" class="educclose" data-id="<?= $e['id'];?>">x</a>
                        <p class="mb-0"><?= $e['school']; ?></p>
                        <p class="blockquote-footer"><?= $e['level']; ?> <cite title="Source Title"><?= $e['datestart']; ?>-<?= $e['dateend']; ?></cite></p>
                        <hr>    
                      </div>
                    
                  <?php endforeach; ?>
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
                    <div class="col-12 educ">
                      <!-- <a href="" class="educclose" data-id="<?= $e['id'];?>">x</a> -->
                      <p class="mb-0">[SCHOOL]</p>
                      <p class="blockquote-footer">[LEVEL] <cite title="Source Title">[START]-[END]</cite></p>
                      <hr>    
                    </div>
                  </script>
                </div>

              </div>
              <div class="tab-pane fade" id="cvTab" role="tabpanel" aria-labelledby="resumeTab">
                <div class="container comp">
                  <div class="row">
                      <iframe src="cv.php" frameborder="0"></iframe>
                  </div>
                </div>

              </div>

              <div class="tab-pane fade" id="empTab" role="tabpanel" aria-labelledby="resumeTab">
                <div class="container comp">
                  <div class="row">
                    <div class="col">
                      <h4 class="display-8">Employment History</h4>
                    </div>
                  </div>
                   <style type="text/css">
                    .borderp {
                      border: none;
                      border-left: 5px solid #eee;
                      padding-left: 10px;
                      margin: 0;
                      clear: both;
                      display: block;
                      margin-bottom: 20px!important;
                    }
                  </style>
                  <div class="row emp">
                    <?php foreach($employment as $idx => $e): ?>
                      <div class="borderp col-12">
                        <a href="" data-id="<?= $e['id'];?>" class="close closeemp">x</a>
                        <h5 class="display-8"><?= $e['companyname']; ?> <small><?= $e['interval']; ?></small></h5>
                        <b><?= $e['jobrole']; ?></b>
                        <p><?= $e['jobdesc']; ?></p>
                        <hr>
                    </div>
                    <?php endforeach; ?>  
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
                  <script type="text/html" id="emphist">
                    <div class="borderp col-12">
                      <a href="" data-id="[ID]" class="close closeemp">x</a>
                      <h5 class="display-8">[COMPANY] <small>[MONTHS]</small></h5>
                      <b>[POSITION]</b>
                      <p>[DESC]</p>
                      <hr>
                    </div>
                  </script>
                </div>
              </div>

              <div class="tab-pane fade" id="skillTab" role="tabpanel" aria-labelledby="resumeTab">
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
                     <div id="allskills">
                      <?php foreach($skills as $idx => $e): ?>
                        <p class="li"><?= $e['name']; ?><span class="rate <?= $e['level']; ?>">(<?= $e['level']; ?>)</span><span data-id="<?= $e['id'];?>" class="closex">x</span></p>
                      <?php endforeach ?>
                    </div>
                  </div>
                </div>
                <style type="text/css">
                  #allskills,
                  #rating {
                    list-style-type: none;
                  }
                  #allskills li {
                    background: #c1e1fd;
                      padding: 2px 5px;
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

                  #allskills p {
                background: #c1e1fd;
                  padding: 3px 10px;
                  margin: 3px;
                  border-radius: 15px;
                  font-size: 12px;
                  font-weight: 600;
                  display: initial;
                  display: block;
                  width: initial;
                  float: left;
                  line-height: 2;
              }
              .rate {
                font-size: 12px;
                  color: #ff2419;
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
                  <p class="li">[NAME]<span class="rate">([RATE])</span><span data-id="[ID]" class="closex">x</span></p>
                </script>
              </div>
            </div>
            
          </div>
          
        </main>
      </div>
    </div>
 <!-- Bootstrap core JavaScript
    ================================================== -->
    <!-- Placed at the end of the document so the pages load faster -->
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script>window.jQuery || document.write('<script src="bootstrap-4.0.0/assets/js/vendor/jquery-slim.min.js"><\/script>')</script>
    <script src="bootstrap-4.0.0/assets/js/vendor/popper.min.js"></script>
    <script src="js/jquery.js"></script>
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
    <!-- Icons -->
    <!-- <script src="https://unpkg.com/feather-icons/dist/feather.min.js"></script> -->
   <!--  <script>
      feather.replace()
    </script> -->

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
          $(".col").find(".remove-media").off().on("click", function(e){
            e.preventDefault();
            var me = $(this);

            me.parents(".data").remove();
          });

          $(".educclose").off().on("click", function(e){
            e.preventDefault();

            var me = $(this);
            var id = me.data("id");

            $.ajax({
              url : "process.php",
              data : { deleteEduc : true, id:id},
              type : 'POST',
              dataType : 'JSON',
              success : function(res){
                console.log(res);
                me.parents(".educ").remove();
              }
            });
          });

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
                me.parents(".li").remove();
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
          var me = $(this);

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
  </body>
</html>
