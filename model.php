<?php
include_once "helper.php";



session_start();

class Model {
	protected $db;
	public $errors = array();

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
		$this->uploadCV();
	}

	public function socialCompletedListener(){
		if(isset($_POST['socialCompleted'])){
			$this->db->prepare("
					UPDATE company
					SET completed = 1
					WHERE userid = ?
				")->execute(array($_SESSION['id']));

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
	
	private function redirect($data){
		if($data['usertype'] == "employer"){
			$completed = $this->db->prepare("
					SELECT completed
					FROM company
					WHERE userid = ?
					LIMIT 1
				")->execute(array($_SESSION['id']));

			if($completed){
				header("Location:dashboard.php");
			} else {
				header("Location:company.php");
			}


		} else {
			header("Location:info.php");
		}
	}

	private function updateCompanyUploadInfo($filename,$type) {
		$stmnt = $this->db->prepare("
				UPDATE company
				SET ".$type." = ?
				WHERE userid = ?")->execute(array($filename, $_SESSION['id']));
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
							gender = ?
						WHERE userid = ?
					")->execute(array($_POST['firstname'],$_POST['lastname'],$_POST['middlename'],$_POST['dob'],$_POST['address'],$_POST['mobile'],$_POST['nationality'],$_POST['skill_ids'],$_POST['industry_ids'],$_POST['email'],$_POST['social_ids'], $_POST['gender'],$_SESSION['id']));
			} else {
				$this->db->prepare("
						INSERT INTO userinfo(firstname,lastname,middlename,dob,address,mobile,nationality,skill_ids,industry_ids,email,userid,social_ids,gender) 
						VALUES(?,?,?,?,?,?,?,?,?,?,?,?,?)
					")->execute(array($_POST['firstname'],$_POST['lastname'],$_POST['middlename'],$_POST['dob'],$_POST['address'],$_POST['mobile'],$_POST['nationality'],$_POST['skill_ids'],$_POST['industry_ids'],$_POST['email'],$_SESSION['id'],$_POST['social_ids'], $_POST['gender']));

			}

			return $this;
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