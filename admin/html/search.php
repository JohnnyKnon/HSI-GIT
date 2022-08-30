<?php
    // List
    include "../db/DBManager.php";

    $sql = "SELECT COUNT(*) AS `cnt` FROM bestboard";
    $result = $dbo -> prepare($sql);
    $result -> execute();
    $row = $result->fetch(PDO::FETCH_ASSOC);
    $total_count = $row['cnt'];

    // if page is null page = 1
    $page=$_GET["page"];
    if($page < 1){ $page =1;}

    $page_rows = 15;
    $page_size = 10;
    $total_page = ceil($total_count / $page_rows);
    $from_record = ($page - 1) * $page_rows;

    if($_GET['select']!='all' && $_GET['select']!='name_type'){
        $sql = "select * from  bestboard where {$_GET['select']} like '%{$_GET['search']}%'";
        $sql .= " order by date desc limit $from_record,  $page_rows";
    }
    else if($_GET['select'] == 'all')
    {
        $sql = "select * from bestboard where name like '%{$_GET['search']}%'";
        $sql .= "or company like '%{$_GET['search']}%'";
        $sql .= "order by date desc limit $from_record,  $page_rows";
    }
    else{
        $sql = "select * from bestboard where name like '%{$_GET['search']}%'";
        $sql .= "or type like '%{$_GET['search']}%'";
        $sql .= "order by date desc limit $from_record,  $page_rows";
    }
    $resultTwo = $dbo -> prepare($sql);
    $resultTwo -> execute();

    for($i=0; $row = $resultTwo -> fetch(PDO::FETCH_ASSOC); $i++){
        $list[$i] = $row;
        $list_num = $total_count - ($page - 1) * $page_rows;
        $list[$i]['num'] = $list_num - $i;

        $realNum[$i]['no'] = $row['num'];
    }

?>
<!DOCTYPE html>
<html lang="ko">
  <head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <!-- CSS LINK -->
    <link rel="stylesheet" href="../css/list_style.css" />
    <link rel="stylesheet" href="../../css/common.css" />
      <!-- FontAwesome CDN -->
      <script
      src="https://kit.fontawesome.com/91eb112b1c.js"
      crossorigin="anonymous"
    ></script>
    <title>HSI | 문의관리자</title>
  </head>
  <body>
    <!-- main -->
    <main id="admin__main">
            <h1>문의내용</h1>
            <section class="content">
                <section class="search__section">
                    <a href='../../index.html'>메인사이트 가기</a>
                    <form action="search.php" method="get" class="search">
                        <select name="select">
                            <option value="all">전체</option>
                            <option value="name">담당자</option>
                            <option value="company">소속회사</option>
                            <option value="type">문의종류</option>
                            <option value="name_type">담당자+문의종류</option>
                        </select>
                        <input type="text" name="search">
                        <input type="submit" value="검색">
                    </form>
                </section>
            
                <table border="1" class="list">
                    <tr>
                        <th>번호</th>
                        <th>담당자</th>
                        <th>소속회사</th>
                        <th>문의종류</th>
                        <th>날짜</th>
                        <th>삭제</th>
                    </tr>
                <?php
                     for($i = 0; $i < count($list); $i++){
                ?>
                    <tr>
                        <td><a href='admin_read.php?num=<?=$realNum[$i]['no']?>'><?=$list[$i]['num']?></a></td>
                        <td><a href='admin_read.php?num=<?=$realNum[$i]['no']?>'><?=$list[$i]['name']?></a></td>
                        <td><a href='admin_read.php?num=<?=$realNum[$i]['no']?>'><?=$list[$i]['company']?></a></td>
                        <td><a href='admin_read.php?num=<?=$realNum[$i]['no']?>'><?=$list[$i]['type']?></a></td>
                        <td><a href='admin_read.php?num=<?=$realNum[$i]['no']?>'><?=$list[$i]['date']?></a></td>
                        <td><a href='../db/del.php?num=<?=$realNum[$i]['no']?>'><i class='fas fa-trash-alt'></i></a></td>
                    </tr>
                <?php
                    }
                    echo "</table>
                    </section>";

                    if($_GET['select']!= 'all' && $_GET['select']!='name_type')
                    {
                        $total_sql = "select count(*) from bestboard where {$_GET['select']} like '%{$_GET['select']}%'";
                    }
                    else if($_GET['select'] == 'all')
                    {
                        $total_sql = "select count(*)from bestboard where name LIKE '%{$_GET['select']}%'";
                        $total_sql .= "or company LIKE '%{$_GET['select']}%'";
                    }
                    else
                    {
                        $total_sql = "select count(*) from bestboard where name LIKE '%{$_GET['select']}%'";
                        $total_sql .= "or company LIKE '%{$_GET['select']}%'";
                    }

                    $total_sql = "select count(*) from bestboard";
                    $total_stt = $dbo -> prepare($total_sql);
                    $total_stt -> execute();
                    $total_row = $total_stt -> fetch();
                    $total_list = $total_row['count(*)'];
                    $row = ceil($_GET['page']/$page_size);
                    $start_page = (($row-1)*$page_size)+1;

                    if($start_page <= 0)
                    {
                        $start_page = 1;
                    }
                    $end_page=($start_page + $page_size)-1;
                    if($total_page<$end_page)
                    {
                        $end_page = $total_page;
                    }
                    if($_GET['page']!=1) 
                    {
                        $back = $_GET['page']-$page_size;
                        if($back <= 0)
                        {
                            $back = 1;
                        }
                        echo "<a href='$_SERVER[PHP_SELF]?page=$back&select={$_GET['select']}&search={$_GET['search']}><i class='fas fa-caret-left'></i></a>";
                    }
                    for($i=$start_page; $i<=$end_page; $i++)
                    {
                    if($_GET['page']!=$i) 
                    {
                        echo "<a class='list__page' href='$_SERVER[PHP_SELF]?page=$i&select={$_GET['select']}&search={$_GET['search']}'>";
                    }
                
                    echo " $i ";
                
                    if($_GET['page']!=$i)
                    {
                        echo "</a>";
                    }
                    }
                    if($_GET['page']!= $total_page)
                    {
                        $next = $_GET['page'] + $page_size;
                        if($total_page < $next)
                        {
                            $next = $total_page;
                        }
                        echo "<a href='$_SERVER[PHP_SELF]?page=$next&select={$_GET['select']}&search={$_GET['search']}'></a>";
                    }
                ?>
                

    
    </main>
  </body>
</html>
