<?php
	$af_string = 'DRIVER={ODBC Driver 17 for SQL Server};SERVER=10.249.120.22;DATABASE=TestDB;MARS_Connection=yes;Encrypt=no';
	$af_user    = 'sa';
	$af_pass    =  'HPIwebDevDBsqlAdm1n';

    $conn 		  =  odbc_connect( $af_string, $af_user, $af_pass );
	if(!$conn){
        die(print_r(sqlsrv_errors(),true));
    }	else{							
	//echo 'connection established'; //print/check if working
        }       
	      
?>