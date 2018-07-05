<?php 

	try{$dbh= new PDO("mysql:host=localhost; dbname=gradebook", "root", ""); //połaczenie się z bazą
		$dbh->setAttribute( PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_ASSOC );
		$options=array(
		PDO::MYSQL_ATTR_INIT_COMMAND, "SET NAMES 'UTF8'",
		PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION); // wyrzuca bład i zatrzymuje skrypt
	}
		catch(PDOException $e) //przechytywanie wyjątku
			{
				echo"Błąd: " . $e->getMessage();
				die();
			}
?>