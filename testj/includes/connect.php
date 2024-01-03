<?php
	$PCS_string = 'DRIVER={ODBC Driver 17 for SQL Server};SERVER=10.249.120.22;DATABASE=ProductionControlSystem;MARS_Connection=yes;Encrypt=no';
	$PCS_user    = 'sa';
	$PCS_pass    =  'HPIwebDevDBsqlAdm1n';

    $conn 		  =  odbc_connect( $PCS_string, $PCS_user, $PCS_pass );
	if(!$conn){
        die(print_r(sqlsrv_errors(),true));
    }	else{							
	//echo 'connection established'; //print/check if working
        }       


		$hios_string = 'DRIVER={ODBC Driver 17 for SQL Server};SERVER=10.249.120.22;DATABASE=HpiInOutSecuritySystem;Encrypt=no';
		$hios_user    = 'sa';
		$hios_pass    = 'HPIwebDevDBsqlAdm1n';
		$hios 		  =  odbc_connect($hios_string, $hios_user, $hios_pass);
		
	      
?>