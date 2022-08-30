<?
    include "../db/DBManager.php";
    
    $read_sql = "SELECT * FROM bestboard where num = {$_GET["num"]}";
    $read_stt = $dbo -> prepare($read_sql);
    $read_stt -> execute();
    $read_row = $read_stt->fetch();
?>
<!DOCTYPE html>
<html lang="ko">
<head>
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- CSS LINK -->
    <link rel="stylesheet" href="../css/admin_read.css">
    <link rel="stylesheet" href="../../css/common.css" />
      <!-- FontAwesome CDN -->
      <script
      src="https://kit.fontawesome.com/91eb112b1c.js"
      crossorigin="anonymous"
    ></script>
    <title>HSI | 문의내용</title>
</head>
<body>
    <main class="read__main">
        <h1>문의내용</h1>
        <section class="read__section">
        <table border="1" class="read">
            <tr>
                <th>담당자</th>
                <td><?=$read_row['name']?></td>
            </tr>
            <tr>
                <th>소속회사</th>
                <td><?=$read_row['company']?></td>
            </tr>
            <tr>
                <th>문의종류</th>
                <td><?=$read_row['type']?></td>            
                </tr>
            <tr>
                <th>연락처</th>
                <td><?=$read_row['tel']?></td>
            </tr>
            <tr>
                <th>이메일</th>
                <td><?=$read_row['email']?></td>
            </tr> 
            <tr>
                <th>내용</th>
                <td class="main__text"><textarea style="border: none" readonly="true"><?=$read_row['content']?></textarea></td>
            </tr>
            <tr>
                <th>날짜</th>
                <td><?=$read_row['date']?></td>
            </tr>
        </table>
        </section>
        <br/>
        <?
            $back_sql = "SELECT * FROM bestboard where num < {$_GET['num']} order by num desc";
            $back_stt = $dbo -> prepare($back_sql);
            $back_stt->execute();
            $back_row = $back_stt->fetch();

            // back button
            if(isset($back_row['num']))
            {
                echo "<a href='$_SERVER[PHP_SELF]?num={$back_row['num']}'><i class='fas fa-caret-left'></i> 이전</a>";
                
            }
            else
            {
                echo "<span><i class='fas fa-caret-left'></i> 이전</span>";
            }
            $next_sql = "SELECT * FROM bestboard where num > {$_GET['num']}";
            $next_stt = $dbo -> prepare($next_sql);
            $next_stt->execute();
            $next_row = $next_stt -> fetch();

            // Next button
            if(isset($next_row['num']))
            {
                echo "<a href='$_SERVER[PHP_SELF]?num={$next_row['num']}'>다음 <i class='fas fa-caret-right'></i></a>";
            }
            else
            {
                echo "<span>다음 <i class='fas fa-caret-right'></i></span>";
            }
            echo "<br/><br/>";

            echo "<a href='../db/del.php?num={$_GET['num']}'><i class='fas fa-trash-alt'></i></a>";
            echo "<a href='admin.php'>뒤로가기</a>";
        ?>
    </main>
</body>
</html>