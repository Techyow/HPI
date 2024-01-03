<?php
public function AS400Connection()
{
    $driver = '{iSeries Access ODBC Driver}';
    //$ashost = '10.249.120.2';
    $ashost = '10.249.120.3';
    $asusername = 'PCUSER';
    $aspassword = 'PCUSER';
    $this->asconn = null;

    try {
        $this->asconn = new PDO("odbc:DRIVER={$driver};SYSTEM={$ashost};UID={$asusername};PWD={$aspassword};");
        echo 'Connected';
    } catch (PDOException $exception) {
        // echo 'Connection error: '.$exception->getMessage();
        echo 'Database connection Error. Please contact I.T.';
    }
    return $this->asconn;
}


?>