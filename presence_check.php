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
		<h2>Sprawdź obecność</h2>
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
		</div>
		<?php endif ?>
		<div class="header">
			<h3> Wybierz datę</h3>
		</div>
        <div class="container">
			<div class="col-sm-6 col-sm-offset-3 r-form-1-box wow fadeInUp">
					
				<form action="" method="post">
					<input type="date" name="show_date"  class="r-form-1-first-name form-control" id="r-form-1-first-name">	
					<button type="submit" class="btn" name="submit_date" >Pokaż</button><br><br>
				</form>
						

			</div>
		</div>	
		<form action="server.php" method="post">

		<table  style="color:black;text-align:center; font-size: 20px; font-weight: 300; margin: 3em auto">
			<tr>
				<th><b>Imię</b></th>
				<th><b>Nazwisko</b></th>
				<th><b>Data</b></th>
				<th><b>Numer indeksu</b></th>
				<th><b>Obecność</b></th>

				
			</tr>	
		<?php
		include('connectpdo.php');
		$show_date="";
		if (isset($_POST['submit_date'])) {
			 
			$show_date = $_POST['show_date'];
		
		}
		$id_subject = isSet( $_GET['id_subject'] ) ? intval( $_GET['id_subject'] ) : 0;
		if( $id_subject > 0 ) {
		
		
			$query = $dbh->prepare("SELECT id_student, student_surname, student_name, id_subject FROM grades WHERE id_subject= :id_subject");
			$query->bindParam( ':id_subject', $id_subject );
			$query->execute();
			
			
			$_SESSION['show_date'] = $show_date;

			foreach($query->fetchAll() as $details) 
	
			{
				$_SESSION['student_name'] = $details['student_name'];
				$_SESSION['student_surname'] = $details['student_surname'];
				
				echo '<tr>';
					
					echo '<td>' . $details['student_name'] . '</td>';
					echo '<td>' . $details['student_surname'] . '</td>';
					echo '<td>' . $show_date . '</td>';
					echo '<td>' . $details['id_student'] . '</td>';
					echo '<td><a href="presence_is.php?id_student=' . $details['id_student'] . '">obecny</a> | <a href="presence_no.php?id_student=' . $details['id_student'] . '">nieobecny</a></td>';	
					echo '<td></td>';
			}
			$query -> closeCursor();
			
		}
		?>
		
		</tr>
		</table>
		<button type="submit" class="btn" name="update_grades">Zapisz obecność</button><br>
		</form>
		<button type="submit" class="btn" name="back" onclick="window.location.href='http://localhost/dziennik2/index.php'">Powrót</button><br><br>

		
</body>
</html>