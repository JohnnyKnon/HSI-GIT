<?php
    // List
    if($page < 1) { $page = 1; } 
    if($_GET["page"] > $page) {$page = $_GET["page"];}
  

    include "../db/DBManager.php";
    
    $sql = "SELECT COUNT(*) AS `cnt` FROM bestboard";
    $result = $dbo -> prepare($sql);
    $result -> execute();
    $row = $result->fetch(PDO::FETCH_ASSOC);
    $total_count = $row['cnt'];
    
    
  // if ($page < 1) {$page=1;}
    $page_rows = 15;
    $total_page = ceil($total_count / $page_rows);
    $from_record = ($page - 1) * $page_rows;

    $list = array();

    $sql = "SELECT * FROM bestboard ORDER BY date DESC LIMIT {$from_record}, {$page_rows} ";
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
                        <td><a href='admin_read.php?num=<?=$list[$i]['num']?>'><?=$list[$i]['name']?></a></td>
                        <td><a href='admin_read.php?num=<?=$list[$i]['num']?>'><?=$list[$i]['company']?></a></td>
                        <td><a href='admin_read.php?num=<?=$list[$i]['num']?>'><?=$list[$i]['type']?></a></td>
                        <td><a href='admin_read.php?num=<?=$list[$i]['num']?>'><?=$list[$i]['date']?></a></td>
                        <td><a href='../db/del.php?num=<?=$list[$i]['num']?>'><i class='fas fa-trash-alt'></i></a></td>
                    </tr>
                <?php
                    
                    }
                    echo "</table>
                    </section>";
                    $str = '';
                                    
                    if($page > 1){
                        $str .= '<a href="test.php?page=1">처음</a>';
                    }

                    $start_page = (((int)(($page - 1) / $page_rows)) * $page_rows) + 1;
                    $end_page = $start_page + $page_rows - 1;

                    if ($end_page >= $total_page) $end_page = $total_page;

                    if ($start_page > 1 ) $str .= '<a href="test.php?page='.($start_page - 1).'">이전</a>';

                    if($total_page > 1){
                        for($k=$start_page; $k <= $end_page; $k++){
                            if
                                ($page != $k) $str .= '<a href="test.php?page='.$k.'">'.$k.'</a>';
                            else 
                                $str .= '<strong>'.$k.'</strong>';
                    
                                    
                            }
                    }


                    if($total_page > $end_page) $str .= '<a href="test.php?page='.($end_page + 1).'">다음</a>';
                
                    if($page < $total_page){ 
                        $str .= '<a href="test.php?page='.$total_page.'">맨끝</a>';
                    }

                    if($str)
                        $write_page = "<nav><span>{$str}</span></nav>";
                    else
                        $write_page = "";
                ?>
                <p><?=$write_page;?></p>

    
    </main>
  </body>
</html>
