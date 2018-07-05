<?php
	
	include( 'index.php' );
	include( 'connectpdo.php' );

	$id_record = isSet( $_GET['id_record'] ) ? intval( $_GET['id_record'] ) : 0;

	if( $id_record > 0 ) {

		
		
        $query = $dbh->prepare('DELETE FROM record WHERE id_record = :id_record' );
		$query->bindParam( ':id_record', $id_record );
        $query->execute();


        header( 'location: index.php' );

	} else {
		header( 'location: index.php' );
	}
	
	