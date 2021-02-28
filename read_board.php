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
<style>
    /* 게시판 read */
#board_read {
	width:900px;
	position: relative;
	word-break:break-all;
}
#user_info {
	font-size:14px;
}
#user_info ul li {
	float:left;
	margin-left:10px;
}
#bo_line {
	width:880px;
	height:2px;
	background: gray;
	margin-top:20px;
}
#bo_content {
	margin-top:20px;
}
#bo_ser {
	font-size:14px;
	color:#333;
	position: absolute;
	right: 0;
}
#bo_ser > ul > li {
	float:left;
	margin-left:10px;
}

</style>

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
    <?php
        $sql = "select * from board where idx= $_GET[idx]";
        $result = mysqli_query($conn,$sql);
        $board = mysqli_fetch_array($result);

        $hit = $board[hit];//기존 조회수 가져오기
        echo "조회수: ".$hit;
        $hit = $hit+1;//기존 조회수 +1하기
        echo "조회수 업뎃: ".$hit;

        $sql = "UPDATE board SET hit = $hit WHERE idx = $_GET[idx]";//조회수 증가 sql문
        mysqli_query($conn,$sql);//조회수 증가



		// $bno = $_GET['idx']; /* bno함수에 idx값을 받아와 넣음*/
		// $hit = mysqli_fetch_array(mysqli_query("select * from board where idx ='".$bno."'"));
		// $hit = $hit['hit'] + 1;
		// $fet = mysqli_query("update board set hit = '".$hit."' where idx = '".$bno."'");
		// $sql = mysqli_query("select * from board where idx='".$bno."'"); /* 받아온 idx값을 선택 */
		// $board = $sql->fetch_array();
	?>
    
<!-- 글 불러오기 -->
<div id="board_read">
	<h2><?php echo $board['title']; ?></h2>
		<div id="user_info">
			<?php echo $board['name']; ?> <?php echo $board['date']; ?> 조회:<?php echo $board['hit']; ?>
				<div id="bo_line"></div>
			</div>
			<div id="bo_content">
				<?php echo nl2br("$board[content]"); ?>
			</div>
	<!-- 목록, 수정, 삭제 -->
	<div id="bo_ser">
		<ul>
			<li><a href="/shop/board.php">[목록으로]</a></li>
			<li><a href="modify_board.php?idx=<?php echo $board['idx']; ?>">[수정]</a></li>
			<li><a href="delete.php?idx=<?php echo $board['idx']; ?>">[삭제]</a></li>
		</ul>
	</div>
</div>
    </div>
</body>
</html>