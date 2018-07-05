<?php 
include('server.php');

if(!isset($_SESSION['username']))
	{	$_SESSION['msg'] = "Muisz się zalogować";
		header('Location:index.php');
		exit();
	}
include('connectpdo.php');
 ?>

<!DOCTYPE html>
<html lang="pl">
<head>
	<meta charset="utf-8"/>
	<title>Dziennik</title>
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
   
    <!-- CSS -->
		<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Raleway:400,700">
		<link rel="stylesheet" href="assets/bootstrap/css/bootstrap.min.css">
		<link rel="stylesheet" href="assets/font-awesome/css/font-awesome.min.css">
		<link rel="stylesheet" href="assets/css/animate.css">
		<link rel="stylesheet" href="assets/css/style.css">
		<link rel="stylesheet" href="assets/css/media-queries.css">

    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
		<!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
		<!--[if lt IE 9]>
			<script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
			<script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
		<![endif]-->
	
	<!-- Favicon and touch icons -->
        <link rel="shortcut icon" href="assets/ico/favicon.png">
        <link rel="apple-touch-icon-precomposed" sizes="144x144" href="assets/ico/apple-touch-icon-144-precomposed.png">
        <link rel="apple-touch-icon-precomposed" sizes="114x114" href="assets/ico/apple-touch-icon-114-precomposed.png">
        <link rel="apple-touch-icon-precomposed" sizes="72x72" href="assets/ico/apple-touch-icon-72-precomposed.png">
        <link rel="apple-touch-icon-precomposed" href="assets/ico/apple-touch-icon-57-precomposed.png">
</head>
<body>
   <body>
	<div class="header">
		<h2>Lista ocen</h2>
	</div>
	<div class="content">
		<!-- notification message -->
		<?php if (isset($_SESSION['success'])) : ?>
			<div class="error success" >
				<h3>
					<?php 
						echo $_SESSION['success']; 
						unset($_SESSION['success']);
					?>
				</h3>
			</div>
		<?php endif ?>
		<?php 
		
		$id_grade = isSet( $_GET['id_grade'] ) ? intval( $_GET['id_grade'] ) : 0;
		if( $id_grade > 0 ) {
		
			
			$query = $dbh->prepare("SELECT id_grade, grade_1, grade_2, grade_3, id_student, student_surname, student_name, subject_name, id_subject FROM grades WHERE id_grade= :id_grade");
			$query->bindParam( ':id_grade', $id_grade );
			$query->execute();
		 
			
			if($details = $query -> fetch()) 
			{
				$_SESSION['student_name'] = $details['student_name'];
				$_SESSION['student_surname'] = $details['student_surname'];
				$_SESSION['grade_1'] = $details['grade_1'];
				$_SESSION['grade_2'] = $details['grade_2'];
				$_SESSION['grade_3'] = $details['grade_3'];
				$_SESSION['id_student'] = $details['id_student'];
				$_SESSION['id_grade'] = $details['id_grade'];


			}
			
			$query -> closeCursor();
		}
		
		
		?>

		<table  style="color:black;text-align:center; font-size: 20px; font-weight: 300; margin: 3em auto">
			<tr>
				<th><b>Imię</b></th>
				<th><b>Nazwisko</b></th>
				<th><b>Kartkówka</b></th>
				<th><b>Kolokwium</b></th>
				<th><b>Odpowiedź</b></th>
			</tr>
			<tr>
			<form action="server.php" method="post">
			<td><input type="text" name="student_name"  class="r-form-1-first-name form-control" id="r-form-1-first-name" value="<?php echo $_SESSION['student_name']; ?>"/readonly></td>
			<td><input type="text" name="student_surname"  class="r-form-1-first-name form-control" id="r-form-1-first-name" value="<?php echo $_SESSION['student_surname']; ?>" /readonly></td>
			<td><input type="text" name="grade_1"  class="r-form-1-first-name form-control" id="r-form-1-first-name" value="<?php echo $_SESSION['grade_1']; ?>" /></td>
			<td><input type="text" name="grade_2"  class="r-form-1-first-name form-control" id="r-form-1-first-name" value="<?php echo $_SESSION['grade_2']; ?>" /></td>
			<td><input type="text" name="grade_3"  class="r-form-1-first-name form-control" id="r-form-1-first-name" value="<?php echo $_SESSION['grade_3']; ?>" /></td>
			<td></td>
			<td></td>
			<td></td>
			</tr>
		</table>

			<button type="submit" class="btn" name="update_grades" >Zapisz oceny</button><br>
			</form>
			<button type="submit" class="btn" name="back" onclick="window.location.href='http://localhost/dziennik2/index.php'">Powrót</button><br><br>

			
		

			

</body>
</html>