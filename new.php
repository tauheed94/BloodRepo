<?php
 require_once('php_cpi/cps_simple.php');
 
 $connectionStrings = array(	
  'tcp://cloud-eu-0.clusterpoint.com:9007',	
  'tcp://cloud-eu-1.clusterpoint.com:9007',	
  'tcp://cloud-eu-2.clusterpoint.com:9007',	
  'tcp://cloud-eu-3.clusterpoint.com:9007',	
);	
$cpsConn = new CPS_Connection(new CPS_LoadBalancer($connectionStrings), 'new', 'utkershreuben.khanna@gmail.com', 'Utkershreuben5', 'document', '//document/id', array('account' => 816));	
//$cpsConn->setDebug(true);	
$cpsSimple = new CPS_Simple($cpsConn);	

echo "it works";


