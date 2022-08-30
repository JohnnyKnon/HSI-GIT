<?php
$db_info['host'] = 'host'; 
$db_info['database'] = 'db'; 
$db_info['user'] ='user'; 
$db_info['password'] = 'password'; 

try{ 
    $dbo = new PDO('mysql:host='.$db_info['host'].';dbname='.$db_info['database'].';charset=utf8', 
                                  $db_info['user'], $db_info['password']); 
    $dbo->setAttribute(PDO::ATTR_EMULATE_PREPARES, false); 
    $dbo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION); 
}catch(PDOException $e) { 
    echo $e->getMessage(); 
}

?>		
