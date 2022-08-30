<?php
    session_start();
    include "DBManager.php";

    if(!$_POST['agreeContact'])
    {
        echo
        "
        <script>
            window.alert('동의를 해주세요.');
            history.back(-1);
        </script>
        ";
    }
    else if(!$_POST['contactType'])
    {
        echo
        "
        <script>
            window.alert('문의종류를 선택해주세요.');
            history.back(-1);
        </script>
        ";
    }
    else if(!$_POST['nameContact'])
    {
        echo
        "
        <script>
            window.alert('이름을 입력해주세요.');
            history.back(-1);
        </script>
        ";
    }
    else if(!$_POST['telContact'])
    {
        echo
        "
        <script>
            window.alert('연락처를 입력해주세요.');
            history.back(-1);
        </script>
        ";
    }
    else if(!$_POST['emailContact'])
    {
        echo
        "
        <script>
            window.alert('이메일을 입력해주세요.');
            history.back(-1);
        </script>
        ";
    }
    else if(!$_POST['companyContact'])
    {
        echo
        "
        <script>
            window.alert('회사명을 입력해주세요.');
            history.back(-1);
        </script>
        ";
    }
    else if(!$_POST['contentsContact'])
    {
        echo
        "
        <script>
            window.alert('내용을 입력해주세요.');
            history.back(-1);
        </script>
        ";
    }
    else 
    {       
              
            mb_internal_encoding('utf-8');
            header( 'Content-type: text/html; charset=utf-8');
            $mailTo				=		"jony0224@naver.com";
            $mailName			=		iconv("UTF-8", "EUC-KR",$_POST['nameContact']);
            $mailEmail			=		$_POST['emailContact'];
            $mailTitle			=	    iconv("UTF-8", "EUC-KR", $_POST['contactType'].'(으)로 '. $_POST['nameContact'].'님이 문의하셨습니다.');
            $mailMessage		=		iconv("UTF-8", "EUC-KR","홈페이지를 통한 문의가 접수되었습니다.");
            $returnMail			=		$mailFrom;

            if(empty($mailName) || empty($mailName) || empty($mailTitle) || empty($mailMessage)){

            die("파라미터 에러!");

            }

            $Message = 'From: '.$mailTitle."\r\n"; 
            $Message .='Name: '.$mailName. "\r\n";
            $Message .='E-mail: '.$mailEmail. "\r\n";
            $Message .='Message:'.$mailMessage ."\r\n";
            $headers ='From:'. $mailEmail;
            @mail($mailTo,$mailTitle,$Message,$headers);

        $insert_sql = "insert into bestboard(name, tel, email, company, content, type)";
        $insert_sql .= "values(:name, :tel, :email, :company, :content, :type)";
        // 80 Line has syntax error
        $insert_stt=$dbo->prepare($insert_sql);
        $insert_stt -> execute(
            array(
                ':name' => $_POST['nameContact'],
                ':tel' => $_POST['telContact'],
                ':email' => $_POST['emailContact'],
                ':company' => $_POST['companyContact'],
                ':content' => $_POST['contentsContact'],
                ':type' => $_POST['contactType']
            )
        );
        echo
        "
        <script>
            window.alert('정상적으로 문의되었습니다.');
            history.back(-1);
        </script>
        ";
    }
?>