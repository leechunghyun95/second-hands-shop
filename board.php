<?php
    $conn = mysqli_connect("localhost","root","1234","shop");
?>
<!doctype html>
<head>
<meta charset="UTF-8">
<title>문의사항</title>
<link rel="stylesheet" type="text/css" href="/css/style.css" />
<style>
    {
	margin: 0 auto;
	padding: 0;
	font-family: 'Malgun gothic','Sans-Serif','Arial';
}
a {
	text-decoration: none;
	color:#333;
}
ul li {
	list-style:none;
}

/* 공통 */
.fl {
	float:left;
}
.tc {
	text-align:center;
}

/* 게시판 목록 */
#board_area {
	width: 900px;
	position: relative;
}
.list-table {
	margin-top: 40px;
}
.list-table thead th{
	height:40px;
	border-top:2px solid #09C;
	border-bottom:1px solid #CCC;
	font-weight: bold;
	font-size: 17px;
}
.list-table tbody td{
	text-align:center;
	padding:10px 0;
	border-bottom:1px solid #CCC; height:20px;
	font-size: 14px 
}
#write_btn {
	position: absolute;
	margin-top:20px;
	right: 0;
}
</style>
 <!-- Bootstrap core CSS -->
 <link href="vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">

<!-- Custom styles for this template -->
<link href="css/modern-business.css" rel="stylesheet">
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-BmbxuPwQa2lc/FVzBcNJ7UAyJxM6wuqIj61tLrc4wSX0szH/Ev+nYRRuWlolflfl" crossorigin="anonymous">


</head>
<body>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/js/bootstrap.bundle.min.js" integrity="sha384-b5kHyXgcpbZJO/tY9Ul7kGkf1S0CWuKcCD38l8YkeH8z8QjE0GmW1gYU5S9FOnJ0" crossorigin="anonymous"></script>
<!-- Navigation -->
<nav class="navbar fixed-top navbar-expand-lg navbar-dark bg-dark fixed-top">
    <div class="container">
      <a class="navbar-brand" href="index.php">Second Hands</a>
      <button class="navbar-toggler navbar-toggler-right" type="button" data-toggle="collapse" data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse" id="navbarResponsive">
        <ul class="navbar-nav ml-auto">
          
        <li class="nav-item">
            <a class="nav-link" href="shop.php">SHOP</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="sell.php">SELL</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="contact.html">LIKES</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="contact.html">PROFILE</a>
          </li>
        </ul>
      </div>
    </div>
  </nav>

    <div class="container mt-5">
    <div id="board_area"> 
  <h1>문의사항</h1>
  <h4>문의사항이 있으면 글을 작성해주세요.</h4>
    <table class="list-table">
      <thead>
          <tr>
              <th width="70">번호</th>
                <th width="500">제목</th>
                <th width="120">글쓴이</th>
                <th width="100">작성일</th>
                <th width="100">조회수</th>
            </tr>
        </thead>
        <?php
        // board테이블에서 idx를 기준으로 내림차순해서 5개까지 표시
          $sql = "select * from board order by idx desc limit 0,5";
          $result = mysqli_query($conn,$sql); 
            while($board = mysqli_fetch_array($result))
            {
              
              //title변수에 DB에서 가져온 title을 선택
              $title=$board["title"]; 
              if(strlen($title)>30)
              { 
                //title이 30을 넘어서면 ...표시
                $title=str_replace($board["title"],mb_substr($board["title"],0,30,"utf-8")."...",$board["title"]);
              }
        ?>
      <tbody>
        <tr>
          <td width="70"><?php echo $board['idx']; ?></td>
          <td width="500"><a href="read_board.php?idx=<?= $board[idx] ?>"><?php echo $title;?></a></td>
          <td width="120"><?php echo $board['name']?></td>
          <td width="100"><?php echo $board['date']?></td>
          <td width="100"><?php echo $board['hit']; ?></td>
        </tr>
      </tbody>
      <?php } ?>
    </table>
    <div id="write_btn">
      <a href="write_board.php"><button>글쓰기</button></a>
    </div>
  </div>
    </div>
</body>
</html>