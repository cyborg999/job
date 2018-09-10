<?php
// error_reporting(E_ALL);
error_reporting(0);

include_once "helper.php";



session_start();

class Model {
	protected $db;
	public $errors = array();
	public $messages = array();

	public function __construct(){
		include_once "config.php";

		$this->db = $db;
		$this->signupListener();
		$this->updateUserListener();
		$this->updateCompanyInfo();
		$this->uploadPhotoListener();
		$this->loginListener();
		$this->uploadCompanyPhotoListener();
		$this->uploadCompanyBannerListener();
		$this->socialCompletedListener();
		$this->searchSocialListener();
		$this->saveSocialListener();
		$this->addEmploymentHistoryListener();
		$this->addEducationListener();
		$this->addSkillListener();
		$this->deleteSkillListener();
		$this->addNewJobListener();
		$this->viewJobListener();
		$this->browseListener();
		$this->applyListener();
		$this->deleteEducationListener();
		$this->deleteEmploymentHistoryListener();
		$this->deleteRequirementListener();
		$this->requirementUploadListener();
		$this->addRequirementListener();
		$this->approveCompanyListener();
		$this->addSlideListener();
		$this->uploadSliderListener();
		$this->deleteSlideListener();
		$this->markSeenListener();
		$this->settingsListener();
		$this->changePasswordListener();
		$this->uploadCV();
	}	

	public function restrictAccessByLevel($level){
		if(isset($_SESSION['usertype'])){
			$type = $_SESSION['usertype'];

			switch($level) {
				case 3:
					//admin only
					if($type != "admin"){
						header("Location:404.php");
					}

					break;
				case 2: 
					//employer only
					if($type !="employer"){
						header("Location:404.php");
					}

					break;
				case 1 : 
					//employer only
					if($type !="applicant"){
						header("Location:404.php");
					}
					break;
				default :
					//can be acccess by everyone pero papasok na to sa else ng parent if
					
					break;
			}
		}
		else {
			header("Location:404.php");
		}
	}

	public function changePasswordListener(){
		if(isset($_POST['changepw'])){
			$record = $this->db->query("
					SELECT *
					FROM user
					WHERE username = '".$_POST['username']."'
					LIMIT 1
				")->fetchAll();

			if(count($record)>0){
				$data = reset($record);
				if($data['id'] == $_SESSION['id']){
					if($data['password'] != md5($_POST['password1'])){
						$this->errors[] = "Incorrect Password";
					} else {
						if($_POST['password1'] == $_POST['password2']){
							$this->errors[] = "Old password must not be the same with the new one";
						} else {
							if($_POST['password2'] != $_POST['password3']){
								$this->errors[] = "New passwords doesnt matched.";
							} else {
								if(strlen($_POST['password3']) <= 5){
									$this->errors[] = "Password is too short.";
								} else {
									$this->db->prepare("
											UPDATE user
											SET password = ?
											WHERE id = ?
										")->execute(array(md5($_POST['password3']), $_SESSION['id']));

									return $this;
								}

							}
						}	
					}
				} else {
					$this->errors[] = "Username doesnt matched.";
				}

			} else {
				$this->errors[] = "Invalid Username.";
			}

		}
	}

	public function getSettings(){
		return $this->db->query("
				SELECT *
				FROM admin
				LIMIT 1
			")->fetch(PDO::FETCH_ASSOC);
	}

	public function settingsListener(){
		if(isset($_POST['setting'])){
			$this->db->prepare("
				DELETE FROM admin
				")->execute(array());

			$this->db->prepare("
					INSERT INTO admin
					SET terms = ?,
					contact = ?,
					privacy = ?,
					about = ?,
					name = ?
				")->execute(array($_POST['terms'],$_POST['contact'],$_POST['privacy'],$_POST['about'],$_POST['name']));

			return $this;
		}
	}

	public function deleteSlideListener(){
		if(isset($_POST['deleteSlide'])){
			$id = $_POST['id'];

			$this->db->prepare("DELETE FROM slider WHERE id=?")->execute(array($id));

			die(json_encode(array(true)));
		}
	}

	public function getAllSlider(){
		return $this->db->query("
			SELECT t1.*, t2.filename FROM slider t1
			LEFT JOIN photo t2 on t1.photoid = t2.id
			where t1.title !=''
			")->fetchAll(PDO::FETCH_ASSOC);
	}

	public function addSlideListener(){
		if(isset($_POST['addSlider'])){
			$title 	= $_POST['title'];
			$desc 	= $_POST['description'];
			$id 	= $_POST['id'];

			$stmnt = $this->db->prepare("UPDATE slider SET title =?, description = ? WHERE photoid = ?");
			$stmnt->execute(array($title, $desc, $id));

			die(json_encode(array("updated" => true)));
		}
	}

	public function getPhotoPath($filename, $id = false){
		$file 	= explode(".", $filename);
		$ext 	= end($file);
		$path 	= "";


		$videoExt = array("bmp", "jpg", "png","jpeg");

		if(in_array($ext, $videoExt)){
			$path = md5($filename.time());

			if (!file_exists('uploads/photos')) {
			    mkdir('uploads/photos/', 0777, true);
			}

			if($id != false){
				$slideId = $this->addPhoto($path.".".$ext, $id);
				$this->addSlide($slideId);
				echo $slideId;

			} else {
				//add new record
				$this->addPhoto($path.".".$ext);
				//return html to js as response
				echo "uploads/photos/". $path.".".$ext;
			
			}

			
			return array($path.".".$ext, true, $path);
		}
	}

	public function addSlide($id){
		$stmnt = $this->db
			->prepare("INSERT INTO slider(photoid) VALUES(?)")
			->execute(array($id));
	}

	public function addPhoto($filename, $id){
		$this->db
			->prepare("INSERT INTO photo(filename) VALUES(?)")
			->execute(array($filename));

		if($id == true){
			return $this->db->lastInsertId();
		} 
	}

	public function uploadSliderListener(){
		$fn = (isset($_SERVER['HTTP_X_FILENAME']) ? $_SERVER['HTTP_X_FILENAME'] : false);
		$isReady = (isset($_GET['sliderPath'])) ? $_GET['sliderPath'] : null;
			
		if(isset($_GET['sliderPath'])){
			if (!file_exists('uploads/photos')) {
			    mkdir('uploads/photos/', 0777, true);
			}

			if ($fn) {
				//pag nag drag&drop
				list($file, $html, $path) =  $this->getPhotoPath($fn, true);

				// var_dump($fn);
				file_put_contents(
					'uploads/photos/'. $file,
					file_get_contents('php://input')
				);

			} else {
				//browse
				$files = $_FILES['fileselect'];

				foreach ($files['error'] as $id => $err) {
					if ($err == UPLOAD_ERR_OK) {
						list($file, $html, $path) = $this->getPhotoPath($files['name'][$id], true);

						move_uploaded_file(
							$files['tmp_name'][$id],
							'uploads/photos/'.$file
						);
					} 
				}

			}
		}
	}

	public function checkIfApproved(){
		$approved =  $this->db->query("
				SELECT userid,approved
				FROM company
				WHERE userid = ". $_SESSION['id']."
				LIMIT 1
			")->fetch(PDO::FETCH_ASSOC);

		return $approved['approved'];
	}

	public function markSeenListener(){
		if(isset($_POST['markSeen'])){
			$this->db->prepare("
					UPDATE message
					SET seen = 1
					WHERE receiver = ?
				")->execute(array($_SESSION['id']));

			die(json_encode(array("success")));
		}
	}

	public function getNotification(){
		return $this->db->query("
				SELECT *
				FROM message
				WHERE receiver = ".$_SESSION['id']."
				AND seen = 0
			")->fetchAll(PDO::FETCH_ASSOC);
	}

	public function  approveCompanyListener(){
		if(isset($_POST['approveCompany'])){
			$this->db->prepare("
				UPDATE company
				SET approved = 1
				WHERE id = ?
				")->execute(array($_POST['id']));

			$this->addMessage("Your account has been approved.<br> You can now post a new job opening.", $_POST['userid']);
			die(json_encode(array("success")));
		}
	}

	public function getCompanyByApproved($approved){
		$records = $this->db->query("
				SELECT *
				FROM company
				WHERE completed = 1
				AND approved = ".$approved)->fetchAll(PDO::FETCH_ASSOC);

		return $records;
	}

	public function requirementUploadListener(){
		if(isset($_FILES['file'])){
			$allowedTypes = array("jpg", "pdf");

			foreach($_FILES['file']['size'] as $idx => $size){
				if(count($this->errors) == 0){
					if($size == 0){
						$this->errors[] = "Incomplete files attached.";
					}

					$filetype = explode(".", $_FILES['file']['name'][$idx]);
					$filetype = end($filetype);

					if(count($this->errors) == 0){
						if(!in_array($filetype, $allowedTypes)){
							$this->errors[] = "Incomplete file type.";
						}
					}
				}

			}

			if(count($this->errors) == 0){
				$this->db->prepare("
					DELETE FROM requirement
					WHERE userid = ? 
				")->execute(array($_SESSION['id']));

				foreach($_FILES['file']['name'] as $idx => $name){
					$path = "uploads/".$_SESSION['id']."/";
					$ext = ".".pathinfo($name, PATHINFO_EXTENSION);
					$filename = md5($name).$ext;

					if(move_uploaded_file($_FILES['file']['tmp_name'][$idx], $path.$filename)){
						$this->db->prepare("
							INSERT INTO requirement
							SET requirement_id = ?,
							level = 1,
							location = ?,
							userid = ?
							")->execute(array($idx, $path.$filename, $_SESSION['id']));

					}

				}
			}

			return $this;
		}
	}

	public function deleteRequirementListener(){
		if(isset($_POST['deleteReq'])){
			$this->db->prepare("
					DELETE FROM requirement
					WHERE id = ?
				")->execute(array($_POST['id']));

			die(json_encode(array("deleted")));
		}
	}

	public function getAllAdminRequirements(){
		return $this->db->query("
			SELECT *
			FROM requirement
			WHERE level = 0
			")->fetchAll(PDO::FETCH_ASSOC);
	}

	public function getAllAdminRequirementsByUserId($id){
		$data = $this->getAllAdminRequirements();

		foreach ($data as $key => $value) {
			$req = $this->db->query("
					SELECT *
					FROM requirement
					WHERE userid = ".$id." 
					AND requirement_id = ".$value['id']."
					LIMIT 1
					")->fetch(PDO::FETCH_ASSOC);

			$data[$key]['uploaded'] = $req['location'];
		}

		return $data;
	}

	public function addRequirementListener(){
		if(isset($_POST['addReq'])){
			$name = $_POST['txt'];
			$id = false;

			//check length
			if(strlen($name)>2) {

				//check if exists
				$exists = $this->db->query("
					SELECT *
					FROM requirement
					WHERE name = '".$name."'
					LIMIT 1
					")->rowCount();	

				if($exists>0){
					$this->errors[] = "Form name already exists.";
				}
				else {
					$this->db->prepare("
						INSERT INTO requirement(name,userid)
						VALUES(?,?)
						")->execute(array($name, $_SESSION['id']));

					$id = $this->db->lastInsertId();

					$receiver = $this->getAllCompletedCompany();
					$this->disApproveAll();
					$this->addMessage("Required forms have been updated by the administrator.<br>Please comply with the new requirements in order to post a new job.", $receiver);
				}

			}
			else {
				$this->errors[] = "Form name is too short";
			}

			die(json_encode(array("id"=>$id, 'errors' => $this->errors)));
		}
	}

	public function disApproveAll(){
		$this->db->prepare("
			UPDATE company
			SET approved = 0
			WHERE approved = 1
			")->execute(array());

		return $this;
	}

	public function getAllCompletedCompany(){
		return $this->db->query("
				SELECT userid
				FROM company
				WHERE completed = 1
			")->fetchAll(PDO::FETCH_ASSOC);
	}

	public function addMessage($msg, $receiver){
		if(is_array($receiver)){
			foreach ($receiver as $key => $value) {
				$this->db->prepare("
					INSERT INTO message
					SET content = ?,
					sender = ?,
					receiver = ?
				")->execute(array($msg, $_SESSION['id'], $value['userid']));

			}
		} else {
			$this->db->prepare("
					INSERT INTO message
					SET content = ?,
					sender = ?,
					receiver = ?
				")->execute(array($msg, $_SESSION['id'], $receiver));

		}
		
		return $this;
	}

	public function getUserById($id) {
		return  $this->db->query("
					SELECT *
					FROM userinfo
					WHERE userid = ".$id."
					LIMIT 1
					")->fetch(PDO::FETCH_ASSOC);

	}

	public function getSocialMediaByUserId($id){
		return $this->db->query("
				SELECT *
				FROM socialmedia
				WHERE userid =".$id)->fetchAll(PDO::FETCH_ASSOC);
	}

	public function getSkillsByUserId($id){
		return $this->db->query("
				SELECT *
				FROM skill
				WHERE userid =".$id)->fetchAll(PDO::FETCH_ASSOC);
	}

	public function getEducationByUserId($id){
		return $this->db->query("
				SELECT *
				FROM education
				WHERE userid =".$id)->fetchAll(PDO::FETCH_ASSOC);
	}

	public function getEmploymentHistoryByUserId($id) {
		$record =  $this->db->query("
				SELECT *
				FROM emp_history
				WHERE userid =".$id)->fetchAll(PDO::FETCH_ASSOC);
		
		foreach($record as $idx => $r){
			$startdate = new DateTime($r['startdate']);
			$enddate = new DateTime($r['enddate']);
			$interval = $startdate->diff($enddate);

			$interval->format('%m months');
			$expText = "";

			if($interval->y > 0){
				$expText = $interval->y." year(s)";

				if($interval->m > 0){
					$expText.= " and ".$interval->m." month(s).";
				}
			} else {
				$expText = $interval->m." month(s).";
			}

			$record[$idx]['interval'] = $expText;
		}

		return $record;
	}

	public function applyListener(){
		if(isset($_POST['apply'])){
			$this->db->prepare("
					INSERT INTO application(jobid,userid)
					VALUES(?,?)
				")->execute(array($_POST['id'], $_SESSION['id']));

			die(json_encode(array("success")));
		}
	}

	public function browseListener(){
		if(isset($_POST['browse'])){

			$text = $_POST['searchtext'];

			switch ($_POST['category']) {
				case 'Jobs':
					$stmnt =  $this->db->query("
						SELECT t1.*,t2.name,t2.address,t2.overview,t2.banner,t2.size,t2.photo
						FROM job t1
						LEFT JOIN company t2 
						ON t1.companyid = t2.userid
						WHERE t1.title LIKE '%".$text."%'
					")->fetchAll(PDO::FETCH_ASSOC);

					break;
				case 'Skills':
					$stmnt =  $this->db->query("
						SELECT t1.*,t2.name,t2.address,t2.overview,t2.banner,t2.size,t2.photo
						FROM job t1
						LEFT JOIN company t2 
						ON t1.companyid = t2.userid
						WHERE (t1.description LIKE '%".$text."%')
						OR (t1.desclist LIKE '%".$text."%')
					")->fetchAll(PDO::FETCH_ASSOC);

					break;
				case 'Companies':
					$stmnt =  $this->db->query("
						SELECT t1.*,t2.name,t2.address,t2.overview,t2.banner,t2.size,t2.photo
						FROM job t1
						LEFT JOIN company t2 
						ON t1.companyid = t2.userid
						WHERE t2.name LIKE '%".$text."%'
					")->fetchAll(PDO::FETCH_ASSOC);

					break;
				
				default:
					# code...
					break;
			}
			
			// opd($stmnt);
			die(json_encode($stmnt));

		}
	}

	public function viewJobListener(){
		if(isset($_POST['viewjob'])){
			$data = $this->getJobById($_POST['id']);

			die(json_encode($data));
		}
		
	}

	public function addEducationListener(){
		if(isset($_POST['addEduc'])){
			$start = date_create($_POST['educdatestart']);
			$start = date_format($start,"Y/m/d");
			$end = date_create($_POST['educdateend']);
			$end = date_format($end,"Y/m/d");

			$this->db->prepare("
					INSERT INTO education(school,level,datestart,dateend,userid)
					VALUES(?,?,?,?,?)
				")->execute(array($_POST['school'],$_POST['level'],$start,$end,$_SESSION['id']));
			$data = array(
					"name" => $_POST['school'], 
					"level" => $_POST['level'], 
					"start" => $start, 
					"end" => $end, 
					"id" => $this->db->lastInsertId());

			die(json_encode($data));
		}
	}

	public function getIndustry(){
		return $this->db->query("
				SELECT *
				FROM industry
			")->fetchAll(PDO::FETCH_ASSOC);
	}

	public function deleteSkillListener(){
		if(isset($_POST['deleteSkill'])){
			$this->db->prepare("
					DELETE FROM skill
					WHERE ID = ?
				")->execute(array($_POST['id']));

			die(json_encode(array("success")));
		}
	}

	public function addSkillListener(){
		if(isset($_POST['addskill'])){
			$this->db->prepare("
					INSERT INTO skill(name,level,userid)
					VALUES(?,?,?)
				")->execute(array($_POST['skill'],$_POST['rate'],$_SESSION['id']));

			die(json_encode(array("id" => $this->db->lastInsertId())));
		}
	}

	public function deleteEmploymentHistoryListener(){
		if(isset($_POST['deleteEmpHis'])){
			$this->db->prepare("
					DELETE FROM emp_history
					WHERE id = ?
				")->execute(array($_POST['id']));
			
			die(json_encode(array("success")));
		}
	}

	public function deleteEducationListener(){
		if(isset($_POST['deleteEduc'])){
			$this->db->prepare("
					DELETE FROM education
					WHERE id = ?
				")->execute(array($_POST['id']));
			
			die(json_encode(array("success")));
		}
	}

	public function addEmploymentHistoryListener(){
		if(isset($_POST['addemploymenthistory'])){
			$startdate = new DateTime($_POST['startdate']);
			$enddate = new DateTime($_POST['enddate']);
			$interval = $startdate->diff($enddate);

			$interval->format('%m months');
			$expText = "";

			if($interval->y > 0){
				$expText = $interval->y." year(s)";

				if($interval->m > 0){
					$expText.= " and ".$interval->m." month(s).";
				}
			} else {
				$expText = $interval->m." month(s).";
			}

			$this->db->prepare("
					INSERT INTO emp_history(companyname,startdate,enddate,jobrole,jobdesc,userid)
					VALUES(?,?,?,?,?,?)
				")->execute(array($_POST['company'],$_POST['startdate'],$_POST['enddate'],$_POST['role'],$_POST['jobdesc'],$_SESSION['id']));

			die(json_encode(array("interval" => $expText, "id" => $this->db->lastInsertId())));
		}
	}

	public function getFeaturedCompanies(){
		return $this->db->query("
				SELECT name,photo,userid
				FROM company
				WHERE approved = 1
				LIMIT 10
			")->fetchAll(PDO::FETCH_ASSOC);
	}

	public function getFeaturedJobs(){
		return $this->db->query("
				SELECT t1.id,t1.title,t1.salary,t1.description,t2.name as 'company'
				FROM job t1
				LEFT JOIN company t2 ON t1.userid = t2.userid
				ORDER BY t1.date_added ASC
				LIMIT 3
			")->fetchAll(PDO::FETCH_ASSOC);
	}

	public function getAllJobByUserId(){
		$stmnt = $this->db->query("
					SELECT *
					FROM job
					WHERE companyid = ".$_SESSION['id']);

		return $stmnt->fetchAll(PDO::FETCH_ASSOC);
	}

	public function getApplicantsByJobId($id){
		$stmnt = $this->db->query("
			SELECT t1.*,t2.firstname,t2.gender,t2.photo,t2.id as 'applicantid'
			FROM application t1
			LEFT JOIN userinfo t2 
			ON t1.userid = t2.userid
			WHERE t1.jobid = ".$id."

		");

		return $stmnt->fetchAll(PDO::FETCH_ASSOC);
	} 

	public function getJobById($id){
		$stmnt = $this->db->query("
				SELECT t1.*,t2.name,t2.address,t2.overview,t2.banner,t2.size,t2.photo
				FROM job t1
				LEFT JOIN company t2 
				ON t1.companyid = t2.userid
				WHERE t1.id = ".$id."
				LIMIT 1
			");

		return $stmnt->fetch(PDO::FETCH_ASSOC);
	}

	public function addNewJobListener(){
		if(isset($_POST['addnewjob'])){
			$stmnt = $this->db->prepare("
					INSERT INTO job(companyid,description,userid,processing_time,salary,min_experience,expire_date,industryid,title,otherdesc,desclist)
					VALUES(?,?,?,?,?,?,?,?,?,?,?)
				")->execute(array($_SESSION['id'],$_POST['description'],$_SESSION['id'],$_POST['processing'],$_POST['salary'],$_POST['minex'],$_POST['expirationdate'],$_POST['industry'],$_POST['title'],$_POST['header'], implode("]", $_POST['list'])));

			$id = $this->db->lastInsertId();

			if($id){
				$this->messages[] = "You have succesfully posted a new job.<br/> Click <a href='viewjob.php?id=".$id."'>here</a> to view the job post.";
			}

			return $this;
		}
	}

	public function socialCompletedListener(){
		if(isset($_POST['socialCompleted'])){
			if($_SESSION['usertype'] == "employer"){
				$this->db->prepare("
					UPDATE company
					SET completed = 1
					WHERE userid = ?
				")->execute(array($_SESSION['id']));
			} else {
				$this->db->prepare("
					UPDATE userinfo
					SET completed = 1
					WHERE userid = ?
				")->execute(array($_SESSION['id']));
			}

			die(json_encode(array("success")));
		}
	}

	public function saveSocialListener() {
		if(isset($_POST['saveSocial'])){
			if(isset($_POST['data'])){
				$data = $_POST['data'];
				foreach($data as $idx => $d) {
					$stmnt = $this->db->prepare("
							SELECT *
							FROM socialmedia
							WHERE name = ?
							AND userid = ?
						");

					$stmnt->execute(array($d[0], $_SESSION['id']));
					$exists = $stmnt->fetchAll();

					if($exists){
						$this->db->prepare("
								UPDATE socialmedia
								SET link = ?
								WHERE userid = ?
							")->execute(array($d[1], $_SESSION['id']));
					} else {
						$this->db->prepare("
							INSERT INTO socialmedia(name,link,userid)
							VALUES(?,?,?)
							")->execute(array($d[0],$d[1],$_SESSION['id']));
					}
				}
			} else {
				$this->db->prepare("
						DELETE 
						FROM socialmedia
						WHERE userid = ?
					")->execute(array($_SESSION['id']));
			}

			
			die(json_encode(array("success")));
		}
	}

	public function getMySocial(){
		$stmnt = $this->db->query("
				SELECT *
				FROM socialmedia
				WHERE userid = ". $_SESSION['id']);

		return $stmnt->fetchAll();
	}

	public function searchSocialListener(){
		if(isset($_POST['searchSocial'])){
			$text = $_POST['text'];
			$record = $this->db->query("
				SELECT *
				FROM socialmedia
				WHERE name LIKE '%".$text."%'
				AND userid !='".$_SESSION['id']."'
				")->fetchAll();

			die(json_encode($record));
		}
	}

	public function getErrors(){
			return $this->errors;
	}

	public function getMessages(){
			return $this->messages;
	}
	
	public function getCompanyBySessionId(){
			$completed = $this->db->query("
				SELECT *
				FROM company
				WHERE userid = ".$_SESSION['id']."
				LIMIT 1
			");

			return $completed->fetch();
	}

	private function redirect($data){
		if($data['usertype'] == "employer"){
			$completed = $this->db->query("
				SELECT *
				FROM company
				WHERE userid = ".$_SESSION['id']."
				LIMIT 1
			");
			$data = $completed->fetch();

			if((isset($data['completed'])) && ($data['completed'] == 1)){
				$_SESSION['photo'] = 'uploads/'.$_SESSION['id'].'/'.$data['photo'];
				$_SESSION['name'] = $data['name'];

				header("Location:profile.php");
			} else {
				header("Location:company.php");
			}
		}
		elseif($data['usertype'] == "admin"){
			header("Location:admin.php");
		} else {
			$completed = $this->db->query("
				SELECT *
				FROM userinfo
				WHERE userid = ".$_SESSION['id']."
				LIMIT 1
			");

			$data = $completed->fetch();

			if((isset($data['completed'])) && ($data['completed'] == 1)){
				$_SESSION['photo'] = 'uploads/'.$_SESSION['id'].'/'.$data['photo'];
				$_SESSION['name'] = $data['firstname'];

				header("Location:browse.php");
			} else {
				header("Location:info.php");
			}
		}
	}

	private function updateCompanyUploadInfo($filename,$type) {
		$stmnt = $this->db->prepare("
				UPDATE company
				SET ".$type." = ?
				WHERE userid = ?")->execute(array($filename, $_SESSION['id']));

		$_SESSION['photo'] = 'uploads/'.$_SESSION['id'].'/'.$filename;
	}

	private function updateUploadInfo($filename,$type) {
		$stmnt = $this->db->prepare("
				UPDATE userinfo
				SET ".$type." = ?
				WHERE userid = ?")->execute(array($filename, $_SESSION['id']));
	}

	public function loginListener(){
		if(isset($_POST['login'])){
			$record = $this->db->query("
					SELECT *
					FROM user
					WHERE username = '".$_POST['username']."'
					AND password = '". md5($_POST['password'])."'
					LIMIT 1
				")->fetchAll();

			if(count($record)>0){
				$data = reset($record);
				$_SESSION['id'] = $data['id'];
				$_SESSION['username'] = $data['username'];
				$_SESSION['usertype'] = $data['usertype'];

				$this->redirect($data);

			} else {
				$this->errors[] = "Invalid login details.";
			}

		}
	}

	public function uploadCompanyBannerListener(){
		if(isset($_FILES['banner'])){
			$path = "uploads/".$_SESSION['id'];
			$ext = ".".pathinfo($_FILES['banner']['name'], PATHINFO_EXTENSION);
			$filename = md5($_FILES['banner']['name']).$ext;

			if (!file_exists($path)) {
			    mkdir($path, 0777, true);
			}
			if(move_uploaded_file($_FILES['banner']['tmp_name'], $path."/".$filename)){
				$this->updateCompanyUploadInfo($filename, "banner");

				die(json_encode(array('success')));
			}
			else {
				die(json_encode(array('failed')));
			}
		}
	}

	public function uploadCompanyPhotoListener(){
		if(isset($_FILES['companyphoto'])){
			$path = "uploads/".$_SESSION['id'];
			$ext = ".".pathinfo($_FILES['companyphoto']['name'], PATHINFO_EXTENSION);
			$filename = md5($_FILES['companyphoto']['name']).$ext;

			if (!file_exists($path)) {
			    mkdir($path, 0777, true);
			}
			if(move_uploaded_file($_FILES['companyphoto']['tmp_name'], $path."/".$filename)){
				$this->updateCompanyUploadInfo($filename, "photo");

				die(json_encode(array('success')));
			}
			else {
				die(json_encode(array('failed')));
			}
		}
	}

	public function updateCompanyInfo(){
		if(isset($_POST['companyinfo'])){
			$exists = $this->db->query("
					SELECT *
					FROM company
					WHERE userid = ".$_SESSION['id'])->rowCount();	

			if($exists>0){
				$this->db->prepare("
						UPDATE  company
						SET name  = ?,
							address = ?,
							overview = ?,
							industry = ?,
							social_ids = ?, 
							size = ?,
							telephone = ?,
							email = ?, 
							mobile = ?
						WHERE userid = ?
					")->execute(array($_POST['name'],$_POST['address'],$_POST['overview'],$_POST['industry_ids'],$_POST['social_ids'],$_POST['size'],$_POST['telephone'],$_POST['email'],$_POST['mobile'],$_SESSION['id']));
			} else{
				$this->db->prepare("
						INSERT INTO company(name,address,overview,industry,social_ids,size,telephone,email,userid,mobile) 
						VALUES(?,?,?,?,?,?,?,?,?,?)
					")->execute(array($_POST['name'],$_POST['address'],$_POST['overview'],$_POST['industry_ids'],$_POST['social_ids'],$_POST['size'],$_POST['telephone'],$_POST['email'],$_SESSION['id'],$_POST['mobile']));
			}

			die(json_encode(array('success')));
			return $this;
		}
	}

	public function uploadCV(){
		if(isset($_FILES['cv'])){
			$path = "uploads/".$_SESSION['id'];
			$ext = ".".pathinfo($_FILES['cv']['name'], PATHINFO_EXTENSION);
			$filename = md5($_FILES['cv']['name']).$ext;

			if (!file_exists($path)) {
			    mkdir($path, 0777, true);
			}
			if(move_uploaded_file($_FILES['cv']['tmp_name'], $path."/".$filename)){
				$this->updateUploadInfo($filename, "resume");

				die(json_encode(array('success')));
			}
			else {
				die(json_encode(array('failed')));
			}
		}
	}

	public function uploadPhotoListener(){
		if(isset($_FILES['photo'])){
			$path = "uploads/".$_SESSION['id'];
			$ext = ".".pathinfo($_FILES['photo']['name'], PATHINFO_EXTENSION);
			$filename = md5($_FILES['photo']['name']).$ext;

			if (!file_exists($path)) {
			    mkdir($path, 0777, true);
			}
			if(move_uploaded_file($_FILES['photo']['tmp_name'], $path."/".$filename)){
				$this->updateUploadInfo($filename, "photo");

				die(json_encode(array('success')));
			}
			else {
				die(json_encode(array('failed')));
			}
		}
	}

	public function updateUserListener(){
		if(isset($_POST['userinfo'])){
				$exists = $this->db->query("
					SELECT *
					FROM userinfo
					WHERE userid = ".$_SESSION['id'])->rowCount();	

			if($exists>0){
				$this->db->prepare("
						UPDATE  userinfo
						SET firstname  = ?,
							lastname = ?,
							middlename = ?,
							dob = ?,
							address = ?, 
							mobile = ?,
							nationality = ?,
							skill_ids = ?, 
							industry_ids = ?, 
							email = ?, 
							social_ids = ?, 
							gender = ?,
							position = ?,
							intro = ?
						WHERE userid = ?
					")->execute(array($_POST['firstname'],$_POST['lastname'],$_POST['middlename'],$_POST['dob'],$_POST['address'],$_POST['mobile'],$_POST['nationality'],$_POST['skill_ids'],$_POST['industry_ids'],$_POST['email'],$_POST['social_ids'], $_POST['gender'],$_POST['position'],$_POST['intro'],$_SESSION['id']));
			} else {
				$this->db->prepare("
						INSERT INTO userinfo(firstname,lastname,middlename,dob,address,mobile,nationality,skill_ids,industry_ids,email,userid,social_ids,gender,position,intro) 
						VALUES(?,?,?,?,?,?,?,?,?,?,?,?,?,?,?)
					")->execute(array($_POST['firstname'],$_POST['lastname'],$_POST['middlename'],$_POST['dob'],$_POST['address'],$_POST['mobile'],$_POST['nationality'],$_POST['skill_ids'],$_POST['industry_ids'],$_POST['email'],$_SESSION['id'],$_POST['social_ids'], $_POST['gender'],$_POST['position'],$_POST['intro']));

			}

			die(json_encode(array("success")));	
		}
	}

	public function signupListener(){
		if(isset($_POST['signup'])){
			//check if username exists
			$validate = $this->validateUsername($_POST['username'])->comparePasswords($_POST['password1'], $_POST['password2']);

			if(count($this->errors) === 0 ){
				$this->addUser();
			} 

			return $this;
		}
	}

	public function addUser(){
		$this->db->prepare("
				INSERT INTO user(username, password, usertype)
				VALUES (?, ?, ?)
			")->execute(array($_POST['username'], md5($_POST['password1']), $_POST['usertype']));

		$_SESSION['id'] = $this->db->lastInsertId();
		$_SESSION['username'] = $_POST['username'];
		$_SESSION['usertype'] = $_POST['usertype'];

		$this->redirect($_POST);
	}

	public function comparePasswords($password1, $password2) {
		if($password1 != $password2){
			$this->errors[] = "Passwords mismatched.";
		}

		if(strlen($password1) <= 5){
			$this->errors[] = "Password is too short.";
		}

		return $this;
	}

	public function validateUsername($username){
		$count =   $this->db
			->query("SELECT username FROM user WHERE username = '".$username."' LIMIT 1")
			->rowCount();

		if($count > 0){
			$this->errors[] = "Username already exists.";
		}

		return $this;
	}

}