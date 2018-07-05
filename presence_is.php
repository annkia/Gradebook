<?php
	//dkonczyc
	include( 'index.php' );
	include( 'connectpdo.php' );

	$id_student = isSet( $_GET['id_student'] ) ? intval( $_GET['id_student'] ) : 0;
	//$_SESSION['show_date'] = $show_date;

	if( $id_student > 0 ){
		//if ( $_SESSION['show_date'] > 0 ){
			
		
		//$query = "UPDATE grades SET date = '$_SESSION['show_date']', presence="1" WHERE id_student ='$id_student'";
		$query = "INSERT INTO presences (student_name, student_surname, id_student, id_subject_p, date, presence) VALUES( 'Adam', 'Kowalski', '1', '16', '2018-04-10', '1')";

		$query->bindParam( ':id_student', $id_student );
        $query->execute();


        header( 'location: index.php' );
	//	}
	// else {
	//	header( 'location: index.php' );
	//}
	
	}