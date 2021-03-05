<?php
  $conn = mysqli_connect("localhost","root","1234","shop");

  session_start();
 

  $sql = "select * from goods where id=$_GET[id]";
  
  $result = mysqli_query($conn,$sql);

  $row = mysqli_fetch_array($result);
?>
<!DOCTYPE html>
<html lang="ko">

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
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-BmbxuPwQa2lc/FVzBcNJ7UAyJxM6wuqIj61tLrc4wSX0szH/Ev+nYRRuWlolflfl" crossorigin="anonymous">


</head>

<body>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/js/bootstrap.bundle.min.js" integrity="sha384-b5kHyXgcpbZJO/tY9Ul7kGkf1S0CWuKcCD38l8YkeH8z8QjE0GmW1gYU5S9FOnJ0" crossorigin="anonymous"></script>


  <!-- Navigation -->
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
<h1 class="mt-4 mb-3">Shop
  <small></small>
</h1>

<ol class="breadcrumb">
  <li class="breadcrumb-item">
    <a href="index.php">Home</a>
  </li>
  <li class="breadcrumb-item active"><a href="shop.php">Shop</a></li>
</ol>

<!-- 콘텐츠 들어갈 곳 -->
<div class="row">


    <!-- 사진 들어갈 칼럼 -->
    <div class="col mb-5">
        <!-- 사진 컨텐츠 -->
        <div class="container">
              <img src="<?php echo "uploads/".$row['photo']; ?>" height="500px" width="500px">
                </img>
              </div>
              <div class="container">
              <img src="<?php echo "uploads/".$row['photo2']; ?>" height="500px" width="500px">
                </img>
              </div>
              <div class="container">
              <img src="<?php echo "uploads/".$row['photo3']; ?>" height="500px" width="500px">
                </img>
              </div>
              <div class="container">
              <img src="<?php echo "uploads/".$row['photo4']; ?>" height="500px" width="500px">
                </img>
              </div>
              <div class="container">
              <img src="<?php echo "uploads/".$row['photo5']; ?>" height="500px" width="500px">
                </img>
              </div>
              <div class="container">
              <img src="<?php echo "uploads/".$row['photo6']; ?>" height="500px" width="500px">
                </img>
              </div>
              <div class="container">
              <img src="<?php echo "uploads/".$row['photo7']; ?>" height="500px" width="500px">
                </img>
              </div>
              <div class="container">
              <img src="<?php echo "uploads/".$row['photo8']; ?>" height="500px" width="500px">
                </img>
              </div>
              <div class="container">
              <img src="<?php echo "uploads/".$row['photo9']; ?>" height="500px" width="500px">
                </img>
              </div>
    </div>
    <!-- 사진 칼럼 끝 div -->


    <!-- 설명 들어갈 칼럼 -->
    <div class="col">
        <!-- 설명 컨텐츠 -->
        <div class="container" style="position:fixed">
                  <h6><?php echo $row[designer] ?></h6>
                  <p><?php echo $row[item_name] ?></p>
                  <p>사이즈: <?php echo $row[size] ?></p>
                  <p>색상: <?php echo $row[color] ?></p>
                  <p>상태: <?php echo $row[con] ?></p>
                  <p>가격: <?= number_format($row[price]) ?>원</p>
                  <p>찜한수: <?php echo $row[likes] ?></p>
                  <p>
                      <?php echo $row[description] ?>
                  </p>
                  <p>
                    <?php
                    $seller_id = $row[seller];//상품정보에 등록된 판매자 이메일을 가져와서 셀러아이디 변수에 담기
                    $sql = "SELECT * FROM user WHERE email = '$seller_id'";//판매자 이메일과 일치하는 정보 꺼내오는 쿼리문
                    $result = mysqli_query($conn,$sql);//쿼리문 실행
                    $seller = mysqli_fetch_array($result);//결과 로우변수에 담기
                    echo "판매자: "
                    ?>
                    <a href="seller_info.php?seller=<?=$seller[nick_name]?>">
                    <?php
                    
                            echo $seller[nick_name];
                          ?>
                    </a>
                  </p>

                  <p>판매자 평점: <?php 
                            $seller_id = $row[seller];//상품정보에 등록된 판매자 이메일을 가져와서 셀러아이디 변수에 담기
                            $sql = "SELECT * FROM user WHERE email = '$seller_id'";//판매자 이메일과 일치하는 정보 꺼내오는 쿼리문
                            $result = mysqli_query($conn,$sql);//쿼리문 실행
                            $seller = mysqli_fetch_array($result);//결과 로우변수에 담기
                            if($seller[rating]){
                              echo $seller[rating];
                            }else{
                              echo "거래 내역이 없습니다.";
                            }
                            
                          ?>
                  </p>


                  <!-- 판매자랑 사용자 같을 때 다를때 다른 버튼 같으면 수정삭제/ 다르면 구매 -->
                  <?php
                    if($_SESSION[email] == $seller[email]){//사용자와 판매자가 같을경우
                      ?>
                      <button type="button" class="btn btn-warning" onClick="location.href='modify_sell.php'">수정</button>
                      <button type="button" class="btn btn-danger" onClick="location.href='delete_sell.php?id=<?=$_GET[id]?>'">삭제</button>
                      <?php
                    }else{//사용자와 판매자가 다를 경우
                      // 판매중일때 , 판매완료일 때 다름
                      if($row[for_sale]=0){//판매 완료일때 거래 완료버튼
                        ?><button type="button" class="btn btn-dark" disabled>거래 완료</button><?php
                      }else{//판매중일때 , for_sale=1일때
                        if($row[on_sale] = 1){//거래중 아니고 평시상황
                          ?>
                          <form action="mail/mail.php?id=<?=$_GET[id]?>" method="post">
                            <button type="submit" class="btn btn-success">거래</button>
                          </form>
                        <?php
                        }else{//거래중일때
                          ?>
                          <button type="button" class="btn btn-dark" disabled>거래중</button>
                        <?php
                        }
                      }
                    }
                  ?>



                
    
    </div>
    <!-- 설명 칼럼 끝 div -->                   

</div>
<!-- 콘텐츠 들어가는곳 끝 div -->

</div>
                              
  <!-- Bootstrap core JavaScript -->
  <script src="vendor/jquery/jquery.min.js"></script>
  <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

</body>

</html>
