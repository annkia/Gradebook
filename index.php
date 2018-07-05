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
	
?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>Dziennik</title>

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
		<h2>Twój dziennik</h2>
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
		<p style="color:black;text-align:center; font-size: 30px; font-weight: 300;"><strong><?php echo $_SESSION['username']; ?></strong> witaj w Twoim dzienniku!</p>
		
		
		
	<?php include('connectpdo.php');
		
		$query=$dbh->query("SELECT subject_name, start_date, id_subject, id_user, username FROM subjects WHERE username='".$_SESSION['username']."'"); ?>
		
		<table  style="color:black;text-align:center; font-size: 20px; font-weight: 300; margin: 3em auto">
			<tr>
				<th><b>Przedmiot</b></th>
				<th><b>Data rozpoczęcia</b></th>
				<th><b>Opcje</b></th>
			</tr>
		<?php	
			foreach($query->fetchAll() as $value) {
				echo '<tr>';
					echo '<td>' . $value['subject_name'] . '</td>';
					echo '<td>' . $value['start_date'] . '</td>';
					echo '<td><a href="presence_show.php?id_subject=' . $value['id_subject'] . '">pokaż obecność </a>|<a href="presence_check.php?id_subject=' . $value['id_subject'] . '">sprawdź obecność </a>|<a href="grades.php?id_subject=' . $value['id_subject'] . '"> oceny </a> |<a href="students_list.php?id_subject=' . $value['id_subject'] . '"> lista uczniów </a> |usuń przedmiot|edytuj przedmiot </td>';	
					echo '<td></td>';
				echo '<tr>';
			
			$_SESSION['id_user'] = $value['id_user'];
			$_SESSION['id_subject'] = $value['id_subject'];

			}
			?>
		</table>
		<button class="btn" id="button1" ><a href="index.php?logout='1'">Wyloguj się</a></button>
		<button class="btn" id="button2"><a href="new_subject.php">Nowy przedmiot</a></button>
		<button class="btn" id="button1"><a href="new_student.php">Dodaj ucznia</a></button>
		<button class="btn" id="button2"><a href="all_students.php">Lista wszystkich uczniów</a></button>


		
		
</body>
</html>