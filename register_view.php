<?php include('server.php') ?>
<!DOCTYPE html>
<html>
<head>
	<title>Dziennik</title>
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
		
	<!-- Top content -->
		<div class="top-content">
        	<div class="container">
        	
			<div class="row">
					<div class="col-sm-8 col-sm-offset-2 text">
						<h1 class="wow fadeInLeftBig">Twój dziennik.</h1>
					</div>
				</div>

				<div class="row">
					<div class="col-sm-6 col-sm-offset-3 r-form-1-box wow fadeInUp">
						<div class="r-form-1-top">
							<div class="r-form-1-top-left">
								<h3>Zarejestruj się</h3>
							</div>
							<div class="r-form-1-top-right">
								<i class="fa fa-pencil"></i>
							</div>
						</div>
						<div class="r-form-1-bottom">
							<form method="post" action="register_view.php">
								<div class="form-group">
									<label class="sr-only" for="r-form-1-first-name">Pesel</label>
									<input type="text" name="username" placeholder="Pesel..." class="r-form-1-first-name form-control" id="r-form-1-first-name" value="<?php echo $username; ?>">
								</div>
								<div class="form-group">
									<label class="sr-only" for="r-form-1-first-name">Email</label>
									<input type="text" name="email" placeholder="Email..." class="r-form-1-first-name form-control" id="r-form-1-first-name"  value="<?php echo $email; ?>">
								</div>
								<div class="form-group">
									<label class="sr-only" for="r-form-1-last-name">Hasło</label>
									<input type="password" name="password_1" placeholder="Hasło..." class="r-form-1-last-name form-control" id="r-form-1-last-name">
								</div>
								<div class="form-group">
									<label class="sr-only" for="r-form-1-last-name">Potwierdź hasło</label>
									<input type="password" name="password_2" placeholder="Potwierdź hasło..." class="r-form-1-last-name form-control" id="r-form-1-last-name">
								</div>
								<div class="form-group">
									<label class="sr-only" for="r-form-1-first-name">Imię</label>
									<input type="text" name="teacher_name" placeholder="Imię..." class="r-form-1-first-name form-control" id="r-form-1-first-name" value="<?php echo $teacher_name; ?>">
								</div>
								<div class="form-group">
									<label class="sr-only" for="r-form-1-first-name">Nazwisko</label>
									<input type="text" name="teacher_surname" placeholder="Nazwisko..." class="r-form-1-first-name form-control" id="r-form-1-first-name" value="<?php echo $teacher_surname; ?>">
								</div>
								<button type="submit" class="btn" name="reg_user" style=" font-size: 23px; font-weight: 300;">Zarejestruj</button><br>
							</form>
							<h5 style="color:black;text-align:center; font-size: 20px; font-weight: 300;">Masz już konto? <a href="login.php" style="color:#FFFFFF">Zaloguj się!</h5>
						</div>
					</div>
				</div>
            </div>
        </div>
	
	
	
	
	 <!-- Footer 
        <footer>
	        <div class="container">
	        	
	            <div class="row">
           			<div class="col-sm-6 footer-copyright">
					<p>
                    	&copy; Regy Bootstrap Registration Template by <a href="http://azmind.com/free-bootstrap-themes-templates/">AZMIND</a>
					</p>
                    </div>
           			
           		</div>
	        </div>
        </footer> -->

        <!-- Javascript -->
        <script src="assets/js/jquery-1.11.1.min.js"></script>
        <script src="assets/bootstrap/js/bootstrap.min.js"></script>
        <script src="assets/js/jquery.backstretch.min.js"></script>
        <script src="assets/js/wow.min.js"></script>
        <script src="assets/js/retina-1.1.0.min.js"></script>
        <script src="assets/js/scripts.js"></script>
        
        <!--[if lt IE 10]>
            <script src="assets/js/placeholder.js"></script>
        <![endif]-->
	
</body>
</html>