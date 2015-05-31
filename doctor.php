<?php
 require_once('php_cpi/cps_simple.php');
 
 $connectionStrings = array(	
  'tcp://cloud-eu-0.clusterpoint.com:9007',	
  'tcp://cloud-eu-1.clusterpoint.com:9007',	
  'tcp://cloud-eu-2.clusterpoint.com:9007',	
  'tcp://cloud-eu-3.clusterpoint.com:9007',	
);	
$cpsConn = new CPS_Connection('tcp://cloud-eu-0.clusterpoint.com:9007', 'new', 'utkershreuben.khanna@gmail.com', 'Utkershreuben5', 'document', '//document/id', array('account' => 816));
//$cpsConn->setDebug(true);	

$cpsSimple = new CPS_Simple($cpsConn);	
$doctor = array(
	'title' => 'Doctors form',
	'body' => array(
		'user' => $_POST['user'],
		'email' => $_POST['email'],
		'pass' => $_POST['pass'],
		'cpass' => $_POST['cpass'],
		'fname' => $_POST['fname'],
		'lname' => $_POST['lname'],
		'gender' => $_POST['gender'],
		'spec' => $_POST['spec'],
		'hosp' => $_POST['hosp'],
		'mno' => $_POST['mno'],
		'cnt' => $_POST['cnt'],
		'state' => $_POST['state'],
		'dist' => $_POST['dis'],
		'pin' => $_POST['pin'],
	)
);

// Insert
$cpsSimple->insertSingle(uniqid(), $doctor);

header("Location: Doctor_Redirect.html");
