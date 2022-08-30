<?php
	include "DBManager.php";
	$id = $_POST['id'];
	$pass = $_POST['pass'];


	$login_sql = "select * from member where id = '$id' and pass = '$pass'";
	$login_stt = $dbo -> prepare($login_sql);
	$login_stt -> execute();
	$login_row = $login_stt -> rowCount();

	if(!$_POST['id'])
	{
		echo
		"<script>
			window.alert('아이디를 입력하세요.');
			history.back(-1);
		</script>
		";
	}
	else if (!$_POST['pass'])
	{
		echo
		"<script>
			window.alert('패스워드를 입력하세요.');
			history.back(-1);
		</script>
		";
	}
	else
	{
		if(!$login_row)
		{
			echo
		"<script>
			window.alert('아이디 또는 비밀번호가 일치하지 않습니다.');
			history.back(-1);
		</script>
		";
		}
		else
		{
			$_SESSION['id'] = $id;
			$_SESSION['pass'] = $pass;
			 echo "<script>location.href='../html/admin.php';</script>";
		}
	}
?>