<?php include_once "model.php"; ?>
<?php $model = new Model(); 
    $industry = $model->getIndustry();
    $mySocial = $model->getMySocial();
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

    <!-- Icons -->
    <script src="https://unpkg.com/feather-icons/dist/feather.min.js"></script>
    <script>
      feather.replace()
    </script>

    <script type="text/javascript">
      (function($){
        $(document).ready(function(){

         
        });

      })(jQuery);
    </script>
  </body>
</html>
