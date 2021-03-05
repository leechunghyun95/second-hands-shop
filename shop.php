<?php
  $conn = mysqli_connect("localhost","root","1234","shop");
  session_start();//세션 시작

?>
<!DOCTYPE html>
<html lang="en">

<head>

  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="author" content="">

  <title>Modern Business - Start Bootstrap Template</title>

  <!-- Bootstrap core CSS -->
  <link href="vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">

  <!-- Custom styles for this template -->
  <link href="css/modern-business.css" rel="stylesheet">

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

#page_num {
	font-size: 14px;
	margin-left: 260px;
	margin-top:30px; 
}
#page_num ul li {
	float: left;
	margin-left: 10px; 
	text-align: center;
}
.fo_re {
	font-weight: bold;
	color:red;
}
</style>

</head>

<body>

<?php
if($_SESSION[is_login]){//로그인 되어 있을때
//echo "<script>alert('$_SESSION[nickname]님 환영합니다.');</script>";//닉네임과 환영인사를 알림창으로 보여주기

//네비게이션바 로그인 됐을때로 세팅
?>
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
            <a class="nav-link" href="shop.php">Shop</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="sell.php">Sell</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="contact.html">내 거래</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="contact.html">찜한 상품</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="sign_in.php">내 정보</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="sign_out.php">Logout</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="board.php">QnA</a>
          </li>

        </ul>
      </div>
    </div>
  </nav>
  <?php

}
else{//로그인 되어 있지 않을 때
  
  ?>
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
            <a class="nav-link" href="shop.php">Shop</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="sign_in.php">로그인</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="sign_up.php">회원가입</a>
          </li>
        </ul>
      </div>
    </div>
  </nav>
  <?php
}
?>

  <!-- Page Content -->
  <div class="container">

    <!-- Page Heading/Breadcrumbs -->
    <h1 class="mt-4 mb-3">SHOP
      <small></small>
    </h1>

    <ol class="breadcrumb">
      <li class="breadcrumb-item">
        <a href="index.php">Home</a>
      </li>
      <li class="breadcrumb-item active">SHOP</li>
      <li class="breadcrumb-item active"><?= $_GET[category] ?></li>
    </ol>

    <!-- Content Row -->
    <div class="row">
      <!-- Sidebar Column -->
      <div class="col-lg-3 mb-4">
        <div class="list-group">
          <h2>카테고리</h2>
        
          <a href="shop.php" class="list-group-item">전체</a>
          <!-- <a href="shop.php" class="list-group-item">디자이너</a> -->
          <a href="shop.php?category=상의" class="list-group-item">상의</a>
          <a href="shop.php?category=하의" class="list-group-item">하의</a>
          <a href="shop.php?category=아우터" class="list-group-item">아우터</a>
          <a href="shop.php?category=신발" class="list-group-item">신발</a>
        </div>
      </div>
      <!-- Content Column -->
      <div class="col-lg-9 mb-4">
      <?php if($_GET[category]){ ?>
        <h2><?= $_GET[category] ?></h2>
       <?php }else{?>
         <h2>전체 상품</h2>
      <?php } ?>

        <div class="row">
    <?php

        if(isset($_GET['page'])){ 

          $page = $_GET['page']; 
          
          }else{ 
          
          $page = 1; 
          
          }


        if($_GET[category]){//카테고리있으면 쿼리문을 테이블에서 카테고리 항목만 빼오게
        $category = $_GET[category];
        $sql2 = "SELECT * FROM goods WHERE category = '".$category."'";//카테고리에 맞는 판매글 전부 가져오기
        $num = mysqli_query($conn,$sql2);

        $row_num = mysqli_num_rows($num);//게시물 갯수 정수로 가져오기
          $list = 12;
          $block_ct = 5;

          $block_num = ceil($page/$block_ct);//현재 페이지 블록 구하기
          $block_start = (($block_num - 1) * $block_ct) + 1; // 블록의 시작번호
          $block_end = $block_start + $block_ct - 1; //블록 마지막 번호

          $total_page = ceil($row_num / $list); // 페이징한 페이지 수 구하기
          if($block_end > $total_page) $block_end = $total_page; //만약 블록의 마지박 번호가 페이지수보다 많다면 마지박번호는 페이지 수
          $total_block = ceil($total_page/$block_ct); //블럭 총 개수
          $start_num = ($page-1) * $list; //시작번호 (page-1)에서 $list를 곱한다.

          $sql = "SELECT * FROM goods WHERE category = '".$category."'  order by id desc Limit $start_num,$list";
        } else{//카테고리없이 전체 선택이면 다 빼오기
          // $sql = "SELECT * FROM goods order by id desc Limit 12";

          $sql2 = "select * from goods";//판매글 전부 가져오기
          $num = mysqli_query($conn,$sql2);

          $row_num = mysqli_num_rows($num);//게시물 갯수 정수로 가져오기
          $list = 12;
          $block_ct = 5;

          $block_num = ceil($page/$block_ct);//현재 페이지 블록 구하기
          $block_start = (($block_num - 1) * $block_ct) + 1; // 블록의 시작번호
          $block_end = $block_start + $block_ct - 1; //블록 마지막 번호

          $total_page = ceil($row_num / $list); // 페이징한 페이지 수 구하기
          if($block_end > $total_page) $block_end = $total_page; //만약 블록의 마지박 번호가 페이지수보다 많다면 마지박번호는 페이지 수
          $total_block = ceil($total_page/$block_ct); //블럭 총 개수
          $start_num = ($page-1) * $list; //시작번호 (page-1)에서 $list를 곱한다.

          $sql = "SELECT * FROM goods order by id desc Limit  $start_num,$list";

        }

        $result = mysqli_query($conn,$sql);
        while($row = mysqli_fetch_array($result)){
        ?>
      <div class="col-lg-4 col-sm-6 portfolio-item">
        <a href="#">
        <div class="card h-100">    
          <a href="shop_detail.php?id=<?= $row[id] ?>"><img class="card-img-top" src="<?php echo "uploads/".$row['photo']; ?>" alt="" width="218.3" height="261.95"></a>
          <div class="card-body">
            <p>
              <?=$row['designer']?>
        </p>
            <p class="card-text">
              <p><?=$row['item_name']?></p>
              <p><?= number_format($row[price]) ?>원</p>

              
        
          </div>
        </div>
        </a>
      </div>
      
      <?php } ?>
      </div>


      <div id="page_num">
      <ul>
        <?php
          if($page <= 1)
          { //만약 page가 1보다 크거나 같다면
            echo "<li class='fo_re'>처음</li>"; //처음이라는 글자에 빨간색 표시 
          }else{
            echo "<li><a href='?page=1'>처음</a></li>"; //알니라면 처음글자에 1번페이지로 갈 수있게 링크
          }
          if($page <= 1)
          { //만약 page가 1보다 크거나 같다면 빈값
            
          }else{
          $pre = $page-1; //pre변수에 page-1을 해준다 만약 현재 페이지가 3인데 이전버튼을 누르면 2번페이지로 갈 수 있게 함
            echo "<li><a href='?page=$pre'>이전</a></li>"; //이전글자에 pre변수를 링크한다. 이러면 이전버튼을 누를때마다 현재 페이지에서 -1하게 된다.
          }
          for($i=$block_start; $i<=$block_end; $i++){ 
            //for문 반복문을 사용하여, 초기값을 블록의 시작번호를 조건으로 블록시작번호가 마지박블록보다 작거나 같을 때까지 $i를 반복시킨다
            if($page == $i){ //만약 page가 $i와 같다면 
              echo "<li class='fo_re'>[$i]</li>"; //현재 페이지에 해당하는 번호에 굵은 빨간색을 적용한다
            }else{
              echo "<li><a href='?page=$i'>[$i]</a></li>"; //아니라면 $i
            }
          }
          if($block_num >= $total_block){ //만약 현재 블록이 블록 총개수보다 크거나 같다면 빈 값
          }else{
            $next = $page + 1; //next변수에 page + 1을 해준다.
            echo "<li><a href='?page=$next'>다음</a></li>"; //다음글자에 next변수를 링크한다. 현재 4페이지에 있다면 +1하여 5페이지로 이동하게 된다.
          }
          if($page >= $total_page){ //만약 page가 페이지수보다 크거나 같다면
            echo "<li class='fo_re'>마지막</li>"; //마지막 글자에 긁은 빨간색을 적용한다.
          }else{
            echo "<li><a href='?page=$total_page'>마지막</a></li>"; //아니라면 마지막글자에 total_page를 링크한다.
          }
        ?>
      </ul>
    </div>


    </div>
    <!-- /.row -->

    <div class="container mb-5">
    
    
  </div>
  <!-- /.container -->

  

  <!-- Bootstrap core JavaScript -->
  <script src="vendor/jquery/jquery.min.js"></script>
  <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

</body>

</html>
