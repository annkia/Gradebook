<?php 
	session_start(); 

	if (!isset($_SESSION['username'])) {
		$_SESSION['msg'] = "Muisz się zalogować";
		header('location: login.php');
	}

	if (isset($_GET['logout'])) {
		session_destroy();
		unset($_SESSION['username']);
		header("location: login.php");
		
	}	
	include('connectpdo.php');
	

?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>Lista uczniów</title>

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
	<div class="header">
		<h2>Lista uczniów</h2>
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
				<th><b>Opcje</b></th>
			</tr>
			
		<?php
		
		
		
		$id_subject = isSet( $_GET['id_subject'] ) ? intval( $_GET['id_subject'] ) : 0;
		if( $id_subject > 0 ) {
			$query = $dbh->prepare("SELECT id_subject, id_student, student_surname, student_name, subject_name, id_grade FROM grades WHERE id_subject= :id_subject");
			$query->bindParam( ':id_subject', $id_subject );
			$query->execute();
		
			
			foreach($query->fetchAll() as $details) 

			{
				echo '<tr>';
					echo '<td>' . $details['student_name'] . '</td>';
					echo '<td>' . $details['student_surname'] . '</td>';
					echo '<td> usuń | edytuj </td>';	

					//echo '<td> obecność | oceny <a href="students_list2.php?id_subject=' . $value['id_subject'] . '"> lista uczniów </a> |usuń przedmiot|edytuj przedmiot </td>';	
					echo '<td></td>';
				echo '<tr>';
				
			}
			//else
			//{
			//	echo "<p>Przepraszamy, podany rekord nie istnieje!</p>";
			//}
			//$_SESSION['id_subject'] = $value['id_subject'];	

			$query -> closeCursor();
		}
		?>
		</table>


		<button type="submit" class="btn" name="back" onclick="window.location.href='http://localhost/dziennik2/index.php'">Powrót</button><br><br>
		<div class="header">
		<h2>Dodaj ucznia do przedmiotu</h2>
	</div>
		<div class="top-content">
        <div class="container">
			
			<div class="row">
				<div class="col-sm-6 col-sm-offset-3 r-form-1-box wow fadeInUp">
					<div class="r-form-1-top">
						
					</div>
					<div class="r-form-1-bottom">
						<!--FORM -->
						<form action="server.php" method="post">
							<div class="form-group">
								<input type="text" name="student_name" placeholder="Imię..." class="r-form-1-first-name form-control" id="r-form-1-first-name">
							</div>
							<div class="form-group">
								<input type="text" name="student_surname" placeholder="Nazwisko..." class="r-form-1-first-name form-control" id="r-form-1-first-name">
							</div>
							<div class="form-group">
								<input type="text" name="id_student" placeholder="Numer indeksu..." class="r-form-1-first-name form-control" id="r-form-1-first-name">
							</div>					
							<button type="submit" class="btn" name="add_new_student_to_subject" >Zapisz</button><br><br>
						</form>
						

						</div>
					</div>
				</div>
        </div>
    </div>
	<?php 
	$_SESSION['id_subject'] = $id_subject;
	?>
</body>
</html>
