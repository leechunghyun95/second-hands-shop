<?php
  $conn = mysqli_connect("localhost","root","1234","shop");
 

  $sql = "select * from goods where id=$_GET[id]";
  
  $result = mysqli_query($conn,$sql);

  $row = mysqli_fetch_array($result);
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
    </ol>

    <!-- Content Row -->
    <div class="row">
      <!-- Sidebar Column -->
      <div class="col-lg-3 mb-4">
        <div class="list-group">
          <a href="shop.php" class="list-group-item">전체</a>
          <!-- <a href="about.html" class="list-group-item">디자이너</a> -->
          <a href="shop.php?category=상의" class="list-group-item">상의</a>
          <a href="shop.php?category=하의" class="list-group-item">하의</a>
          <a href="shop.php?category=아우터" class="list-group-item">아우터</a>
          <a href="shop.php?category=신발" class="list-group-item">신발</a>
        </div>
      </div>
      <!-- Content Column -->
      <div class="col-lg-9 mb-4">
          <div class="row">
              <div class="col">
                  <div class="container">
                    <img src="<?php echo "uploads/".$row['photo']; ?>" height="500px" width="500px">
                    </img>
                  </div>
              </div>
              <!-- col -->
              <div class="col">

                <!-- container -->
                <div class="container">
                      <p><?php echo $row[designer] ?></p>
                      <p><?php echo $row[item_name] ?></p>
                      <p>사이즈: <?php echo $row[size] ?></p>
                      <p>색상: <?php echo $row[color] ?></p>
                      <p>상태: <?php echo $row[con] ?></p>
                      <p>가격: <?php echo $row[price] ?>원</p>
                      <p>찜한수: <?php echo $row[likes] ?></p>
                      <p>
                          <h5>상세 설명</h5>
                          <?php echo $row[description] ?>
                      </p>
                      

                    
                    <!-- 판매자 정보 카드 -->
                    <div class="card" style="width: 18rem;">
                        <img src="" class="card-img-top" alt="">
                        <div class="card-body">
                            <h5 class="card-title">판매자</h5>
                            <p class="card-text">100개의 상품을 판매중입니다.</p>
                            <a href="#" class="btn btn-primary">판매중인 상품 더보기</a>
                        </div>
                    </div>

                      <div class="row mt-3">
                          <div class="col">
                              <div class="container">
                                  <!-- 구매요청 버튼 -->
                                  <button type="button" class="btn btn-primary btn-lg">구매요청</button>

                              </div>
                          </div>

                          <!-- 좋아요 버튼 -->
                          <div class="col">
                              <div class="container mt-2">

                              <!-- 빈하트 -->
                              <svg xmlns="http://www.w3.org/2000/svg" width="30" height="30" fill="currentColor" class="bi bi-heart" viewBox="0 0 16 16">
                              <path d="M8 2.748l-.717-.737C5.6.281 2.514.878 1.4 3.053c-.523 1.023-.641 2.5.314 4.385.92 1.815 2.834 3.989 6.286 6.357 3.452-2.368 5.365-4.542 6.286-6.357.955-1.886.838-3.362.314-4.385C13.486.878 10.4.28 8.717 2.01L8 2.748zM8 15C-7.333 4.868 3.279-3.04 7.824 1.143c.06.055.119.112.176.171a3.12 3.12 0 0 1 .176-.17C12.72-3.042 23.333 4.867 8 15z"/>
                              </svg>
                              </div>
                          </div>
                      </div>

                      <div class="row mt-3">
                          <div class="col">
                              <div class="container">
                                  <!-- 수정 버튼 -->
                                  <button type="button" class="btn btn-primary btn-lg" onClick="location.href='modify_sell.php?id=<?= $_GET[id] ?>'">수정</button>

                              </div>
                          </div>

                          <div class="col">
                              <div class="container">
                              <!-- 삭제버튼 -->
                              <button type="button" class="btn btn-primary btn-lg" onClick="location.href='delete_sell.php?id=<?= $_GET[id] ?>'">삭제</button>
                              </div>
                          </div>
                      </div>
                </div>

              <!-- container -->
              </div>
              <!-- /col -->
          </div>

          <div class="text-center mt-5">
                 <h3>상품 사진</h3>
            
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

      </div>
    </div>
    <!-- /.row -->

    <div class="container">
        
    
   
    </div>
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
