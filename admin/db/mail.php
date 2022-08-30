<?php
mb_internal_encoding('utf-8');
header( 'Content-type: text/html; charset=utf-8');
$mailTo				=		'johnny@webffle.kr';
$mailName			=		$_POST['nameContact'];
$mailEmail			=		$_POST['emailContact'];
$mailTitle			=		$_POST['contactType'];
$mailMessage		=		"홈페이지를 통한 문의가 접수되었습니다.";
$returnMail			=		$mailFrom;

if(empty($mailName) || empty($mailName) || empty($mailTitle) || empty($mailMessage)){

  die("파라미터 에러!");

 }

$Message = 'From: '. $mailTitle."\r\n"; 
$Message .='Name: '.$mailName. "\r\n";
$Message .='Message:'.$mailMessage ."\r\n";
$headers ='From:'. $mailEmail;
@mail($mailTo,$mailTitle,$Message,$headers);
 
?>
