<?php

$conn = sqlsrv_connect(DB_HOST, $connectionInfo=[DB_NAME, DB_UID,DB_PSSW]);

$loggedInUser = null;


if( isset($_SESSION['user'])){
   $loggedInUser=$_SESSION['user'];
}

?>