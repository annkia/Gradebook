<?php 
	session_start();

	// variable declaration
	$username = "";
	$teacher_name="";
	$teacher_surname="";
	$email    = "";
	$errors = array(); 
	$_SESSION['success'] = "";

	// connect to database
	$db = mysqli_connect('localhost', 'root', '', 'gradebook') or die;
	
	mysql_query("SET CHARSET utf8");
	mysql_query("SET NAMES `utf8` COLLATE `utf8_polish_ci`"); 
	mysql_set_charset("utf8");

	
	// Check connection
	if (mysqli_connect_errno()) {
	echo "Nie udało się połaczyć z bazą: " . mysqli_connect_error();
	}

	

		
if ($db){
	// REGISTER USER
	if (isset($_POST['reg_user'])) {
		// receive all input values from the form
		$username = mysqli_real_escape_string($db, $_POST['username']);
		
		$teacher_name = mysqli_real_escape_string($db, $_POST['teacher_name']);
		$teacher_surname = mysqli_real_escape_string($db, $_POST['teacher_surname']);
		$email = mysqli_real_escape_string($db, $_POST['email']);
		$password_1 = mysqli_real_escape_string($db, $_POST['password_1']);
		$password_2 = mysqli_real_escape_string($db, $_POST['password_2']);
		

			// 
			// Checking to see if email exists in db
			//
			// form validation: ensure that the form is correctly filled
			if (empty($username)) { array_push($errors, "Login jest wymagany"); }
			if (empty($email)) { array_push($errors, "Email jest wymagany"); }
			if (empty($password_1)) { array_push($errors, "Hasło jest wymagane"); }	
			//checking if the passwors are the same
			if ($password_1 != $password_2) {
				array_push($errors, "Hasła nie pasują do siebie");
			}

			$query = "SELECT username FROM teachers WHERE username LIKE '" .mysqli_real_escape_string($db, $_POST['username'])."'";
  
			$result = mysqli_query($db, $query);
			if (mysqli_num_rows($result) > 0){
				echo "Niestety użytkownik o tej nazwie istnieje już w bazie";
				$result = "<div class='alert alert-danger col-md-4 col-md-offset-4 text-align-center' id='result'></div>";
			
			}
		
			else{
			
			// register user if there are no errors in the form
			if (count($errors) == 0) {
				$password = md5($password_1);//encrypt the password before saving in the database
				$query = "INSERT INTO teachers (username, email, password, teacher_name, teacher_surname) 
						  VALUES('$username', '$email', '$password', '$teacher_name', '$teacher_surname')";
				mysqli_query($db, $query);

				$_SESSION['username'] = $username;
				$_SESSION['success'] = "Zalogowałeś się";
				header('location: index.php');
			}
		}
		
	}
	
}
	// LOGIN USER
	if (isset($_POST['login_user'])) {
		$username = mysqli_real_escape_string($db, $_POST['username']);
		$password = mysqli_real_escape_string($db, $_POST['password']);

		if (empty($username)) {
			array_push($errors, "Login jest wymagany");
		}
		if (empty($password)) {
			array_push($errors, "Hasło jest wymagane");
		}

		if (count($errors) == 0) {
			$password = md5($password);
			$query = "SELECT * FROM teachers WHERE username='$username' AND password='$password'";
			$results = mysqli_query($db, $query);

			if (mysqli_num_rows($results) == 1) {
				$_SESSION['username'] = $username;

				$_SESSION['success'];
				header('location: index.php');
			}else {
				array_push($errors, "Zły login lub hasło");
			}
		}
	}
	// SAVING NEW SUBJECT
	
		if (isset($_POST['save_subject'])) {
	
			 
		echo $_SESSION['id_user'];

		$subject_name = mysqli_real_escape_string($db, $_POST['subject_name']);
		$start_date = $_POST['start_date'];
		
		
		if (count($errors) == 0) {
				
			$query = "INSERT INTO subjects (subject_name, start_date, username, id_user ) 
						  VALUES( '$subject_name', '$start_date', '".$_SESSION['username']."', '".$_SESSION['id_user']."')";
				
			
				mysqli_query($db, $query) or die ('Błąd zapisu');
				
			mysqli_close($db);

		}

		header('location: index.php');
	
	}

	// SAVING NEW STUDENT
	if (isset($_POST['add_new_student'])) {
	
			 
		$student_name = mysqli_real_escape_string($db, $_POST['student_name']);
		$student_surname = mysqli_real_escape_string($db, $_POST['student_surname']);

		
		
		if (count($errors) == 0) {
				
			$query = "INSERT INTO students (student_name, student_surname) 
					  VALUES( '$student_name', '$student_surname')";
			
			
			mysqli_query($db, $query) or die ('Błąd zapisu');
				
			mysqli_close($db);

		}

		header('location: index.php');
	
	}
	//ADD NEW STUDENT TO SUBJECT
	if (isset($_POST['add_new_student_to_subject'])) {
	
			 
		$student_name = mysqli_real_escape_string($db, $_POST['student_name']);
		$student_surname = mysqli_real_escape_string($db, $_POST['student_surname']);
		$id_student = mysqli_real_escape_string($db, $_POST['id_student']);
		$id_subject = mysqli_real_escape_string($db, $_SESSION['id_subject']);

		
		
		if (count($errors) == 0) {
				
			$query = "INSERT INTO grades (student_name, student_surname, id_student, id_subject) 
			VALUES( '$student_name', '$student_surname', '$id_student', '$id_subject')";
								
			mysqli_query($db, $query) or die ('Błąd zapisu');
				
			mysqli_close($db);

		}

		header('location: index.php');
	
	}
	
	//UPDATE GRADES
	
	if (isset($_POST['update_grades'])) {
			 
		$grade_1 = mysqli_real_escape_string($db, $_POST['grade_1']);
		$grade_2 = mysqli_real_escape_string($db, $_POST['grade_2']);
		$grade_3 = mysqli_real_escape_string($db, $_POST['grade_3']);
		$id_grade = mysqli_real_escape_string($db, $_SESSION['id_grade']);
		
		if (count($errors) == 0) {
			
			$query = "UPDATE grades SET grade_1 = '$grade_1', grade_2='$grade_2', grade_3= '$grade_3' WHERE id_grade ='$id_grade'";

			mysqli_query($db, $query) or die ('Błąd zapisu');
	
			mysqli_close($db);

		}

		header('location: index.php');
	
	}
	
	//SHOWING THE PRESENCE

	
	
	
?>