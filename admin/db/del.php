<?php
   include "DBManager.php";
    
   
   $num = $_GET['num'];

   // 1. 게시글을 삭제하기 위한 sql문
   $del_sql = "delete from bestboard where num='$num'";
   $del_stt=$dbo->prepare($del_sql);
   $del_stt->execute();
 
   echo
   "<script>
     window.alert('글이 정상적으로 삭제되었습니다!');
     location.href='../html/admin.php';
   </script>";
?>