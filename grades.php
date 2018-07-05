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

		<table  style="color:black;text-align:center; font-size: 20px; font-weight: 300; margin: 3em auto">
			<tr>
				<th><b>Imię</b></th>
				<th><b>Nazwisko</b></th>
				<th><b>Kartkówka</b></th>
				<th><b>Kolokwium</b></th>
				<th><b>Odpowiedź</b></th>
				<th><b>Średnia</b></th>
				<th><b>Opcje</b></th>


			</tr>
			
		<?php
		include('connectpdo.php');
		
		$average= "";
		
		$id_subject = isSet( $_GET['id_subject'] ) ? intval( $_GET['id_subject'] ) : 0;
		if( $id_subject > 0 ) {
		
			$query = $dbh->prepare("SELECT id_grade, grade_1, grade_2, grade_3, id_student, student_surname, student_name, subject_name, id_subject FROM grades WHERE id_subject= :id_subject");

			
			$query->bindParam( ':id_subject', $id_subject );
			$query->execute();
		
			
			foreach($query->fetchAll() as $details) 

			{
			$g1=$details['grade_1'];
			$g2=$details['grade_2'];
			$g3=$details['grade_3'];
			$average=($g1+$g2+$g3)/3;
			$new_value = round($average, 2);
				echo '<tr>';
					echo '<td>' . $details['student_name'] . '</td>';
					echo '<td>' . $details['student_surname'] . '</td>';
					echo '<td>' . $details['grade_1'] . '</td>';					
					echo '<td>' . $details['grade_2'] . '</td>';
					echo '<td>' . $details['grade_3'] . '</td>';
					echo '<td>' .$new_value . '</td>';
					echo '<td><a href="grades_edit.php?id_grade=' . $details['id_grade'] . '"> edytuj oceny </a> </td>';	
					echo '<td></td>';
				echo '<tr>';
				
			}
			
			
				
			$query -> closeCursor();
			
		}
	
		?>
		</table>


		<button type="submit" class="btn" name="back" onclick="window.location.href='http://localhost/dziennik2/index.php'">Powrót</button><br><br>
	
	
	
</body>
</html>