<?php
$db_info['host'] = 'db.webffle.com'; 
$db_info['database'] = 'dbwebffle'; 
$db_info['user'] ='webffle'; 
$db_info['password'] = 'minjjang12!@'; 

try{ 
    $dbo = new PDO('mysql:host='.$db_info['host'].';dbname='.$db_info['database'].';charset=utf8', 
                                  $db_info['user'], $db_info['password']); 
    $dbo->setAttribute(PDO::ATTR_EMULATE_PREPARES, false); 
    $dbo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION); 
}catch(PDOException $e) { 
    echo $e->getMessage(); 
}

?>		