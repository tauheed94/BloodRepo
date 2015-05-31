<?php

require_once('php_cpi/cps_simple.php');
define('DB_HOST', 'tcp://cloud-eu-0.clusterpoint.com:9007');
define('DB_NAME', 'new');
define('DB_ACCOUNT', '816');
define('DB_USER','utkershreuben.khanna@gmail.com');
define('DB_PASSWORD','Utkershreuben5');

 //starting the session for user profile page
session_start();

function SignIn(){
	try{
		$cpsConn = new CPS_Connection(DB_HOST, DB_NAME, DB_USER, DB_PASSWORD, 'document', '//document/id', array('account' => DB_ACCOUNT));
		$cpsConn->setDebug(true);	
		$cpsSimple = new CPS_Simple($cpsConn);	

		$query = CPS_Term($_POST['email'], 'body/email');
		$documents = $cpsSimple->search($query, 0, 100);
	} catch (CPS_Exception $e) {
		var_dump($e->errors());
		exit;
	}
	$valid = false;
// Looping through results
	foreach ($documents as $id => $document) {
		// var_dump((string)$document->body->pass);
		// var_dump($_POST['pass']);
		if((string)$document->body->pass == $_POST['pass'] && (string)$document->body->email == $_POST['email']){
			$valid = true;
			break;
		}
	}
	
	if($valid) { 
		
		echo " <script>document.location='Donor_Redirect.html'</script>SUCCESSFULLY LOGIN TO USER PROFILE PAGE..."; 
	} else { 
		echo "<script>document.location='Donor_Redirect.html'</script>SORRY... YOU ENTERD WRONG ID AND PASSWORD... PLEASE RETRY..."; 
	}
}

if(isset($_POST['pass'])){
	SignIn();
}
header("Location: Donor_Redirect.html");
?>
