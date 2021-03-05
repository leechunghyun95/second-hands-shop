<?php
  $conn = mysqli_connect("localhost","root","1234","shop");
  $sql = "select * from goods order by id desc LIMIT 8";
  $result = mysqli_query($conn,$sql);
  $row = mysqli_fetch_array($result);

  session_start();


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
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-BmbxuPwQa2lc/FVzBcNJ7UAyJxM6wuqIj61tLrc4wSX0szH/Ev+nYRRuWlolflfl" crossorigin="anonymous">


</head>

<body>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/js/bootstrap.bundle.min.js" integrity="sha384-b5kHyXgcpbZJO/tY9Ul7kGkf1S0CWuKcCD38l8YkeH8z8QjE0GmW1gYU5S9FOnJ0" crossorigin="anonymous"></script>


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
  <div class="container" style="width:50%">

    <!-- Page Heading/Breadcrumbs -->
    <h1 class="mt-4 mb-3">상품 등록
      <small></small>
    </h1>

    


    <div class="container">

      <div class="card mt-5">
  <div class="card-body">
    <h3>상품 기본 정보</h3>


<form action="upload_goods.php" method="post" enctype="multipart/form-data">

    <h5 class="mt-5">브랜드<h5>
      <!-- <select class="form-select" aria-label="Default select example" name="designer" required>
        <option selected>디자이너</option>
        <option value="디자이너1">One</option>
        <option value="디자이너2">Two</option>
        <option value="디자이너3">Three</option>
      </select> -->
      <div class="input-group mb-3">
        <input type="text" class="form-control" placeholder="" aria-label="Recipient's username" aria-describedby="basic-addon2" name="designer" required>
      </div>


  <h5 class="mt-3">카테고리<h5>
      <select class="form-select" aria-label="Default select example" name="category" required>
        <option selected>카테고리</option>
        <option value="상의">상의</option>
        <option value="하의">하의</option>
        <option value="아우터">아우터</option>
        <option value="신발">신발</option>
        <option value="신발">etc</option>
      </select>


<h5 class="mt-3">상품명<h5>
<div class="input-group mb-3">
  <input type="text" class="form-control" placeholder="상품명" aria-label="Recipient's username" aria-describedby="basic-addon2" name="item_name" required>
</div>


<h5 class="mt-3">사이즈<h5>
<div class="input-group mb-3">
  <input type="text" class="form-control" placeholder="사이즈" aria-label="Recipient's username" aria-describedby="basic-addon2" name="size">
</div>


<h5 class="mt-3">상태<h5>
      <select class="form-select" aria-label="Default select example" name="con" required>
        <option selected>상태</option>
        <option value="새상품">새상품</option>
        <option value="극미중고">극미중고</option>
        <option value="사용감 있음">사용감 있음</option>        
        <option value="사용감 많음">사용감 많음</option>
      </select>


<h5 class="mt-3">가격<h5>
<div class="input-group mb-3">
  <input type="number" class="form-control" placeholder="가격 단위를 빼고 숫자만 입력해주세요. ( 단위:원 )" aria-label="Recipient's username" aria-describedby="basic-addon2" name="price" required>
  <span class="input-group-text" id="basic-addon2">원</span>
</div>


  </div>
</div>

<div class="card mt-5 mb-5">
  <div class="card-body">
    <h3>상품 추가 정보</h3>


<h5 class="mt-5">색상<h5>
<div class="input-group mb-3">
  <input type="text" class="form-control" placeholder="색상" aria-label="Recipient's username" aria-describedby="basic-addon2" name="color">
</div>


<h5 class="mt-3">상세 설명<h5>
<textarea id="story" name="description"
          rows="10" cols="67">
</textarea>
  </div>
</div>


<!-- 사진 추가 카드 -->
<div class="card">
  <div class="card-body">
    <h3>사진 추가</h3>


        
    
      <div class="input-group mb-3 mt-5">
        <input type="file" class="form-control" id="inputGroupFile02" name="photo" multiple required>
        <label class="input-group-text" for="inputGroupFile02">업로드</label>
      </div>
      <div class="input-group mb-3">
        <input type="file" class="form-control" id="inputGroupFile02" name="photo2">
        <label class="input-group-text" for="inputGroupFile02">Upload</label>
      </div>
      <div class="input-group mb-3">
        <input type="file" class="form-control" id="inputGroupFile02" name="photo3">
        <label class="input-group-text" for="inputGroupFile02">Upload</label>
      </div>
      <div class="input-group mb-3">
        <input type="file" class="form-control" id="inputGroupFile02" name="photo4">
        <label class="input-group-text" for="inputGroupFile02">Upload</label>
      </div>
      <div class="input-group mb-3">
        <input type="file" class="form-control" id="inputGroupFile02" name="photo5">
        <label class="input-group-text" for="inputGroupFile02">Upload</label>
      </div>
      <div class="input-group mb-3">
        <input type="file" class="form-control" id="inputGroupFile02" name="photo6">
        <label class="input-group-text" for="inputGroupFile02">Upload</label>
      </div>
      <div class="input-group mb-3">
        <input type="file" class="form-control" id="inputGroupFile02" name="photo7">
        <label class="input-group-text" for="inputGroupFile02">Upload</label>
      </div>
      <div class="input-group mb-3">
        <input type="file" class="form-control" id="inputGroupFile02" name="photo8">
        <label class="input-group-text" for="inputGroupFile02">Upload</label>
      </div>


      <div class="input-group mb-3">
        <input type="file" class="form-control" id="inputGroupFile02" name="photo9">
        <label class="input-group-text" for="inputGroupFile02">Upload</label>
      </div>
                
  </div>
</div>
  <div class="d-grid gap-2 col-6 mx-auto mt-5 mb-5">
    <button type="submit" class="btn btn-primary btn-lg">등록</button>
  </div>
</form>

    </div>
      

    <!-- Pagination -->

    

  </div>
  <!-- /.container -->

  <!-- Footer -->
  <footer class="py-5 bg-dark">
    <div class="container">
      <p class="m-0 text-center text-white">Copyright &copy; Your Website 2020</p>
    </div>
    <!-- /.container -->
  </footer>

  <!-- Bootstrap core JavaScript -->
  <script src="vendor/jquery/jquery.min.js"></script>
  <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

</body>

</html>
