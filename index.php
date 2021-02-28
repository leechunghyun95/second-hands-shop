<?php
 $conn = mysqli_connect("localhost","root","1234","shop");
?>
<!DOCTYPE html>
<html lang="en">

<head>

  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="author" content="">

  <title>Second Hands</title>

  <!-- Bootstrap core CSS -->
  <link href="vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">

  <!-- Custom styles for this template -->
  <link href="css/modern-business.css" rel="stylesheet">

</head>

<body>

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
            <a class="nav-link" href="contact.html">로그인</a>
          </li>
        </ul>
      </div>
    </div>
  </nav>

 

  <header>
    <div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel">
      <ol class="carousel-indicators">
        <li data-target="#carouselExampleIndicators" data-slide-to="0" class="active"></li>
        <li data-target="#carouselExampleIndicators" data-slide-to="1"></li>
        <li data-target="#carouselExampleIndicators" data-slide-to="2"></li>
      </ol>
      <div class="carousel-inner" role="listbox">
        <!-- Slide One - Set the background image for this slide in the line below -->
        <div class="carousel-item active" style="background-image: url('http://placehold.it/1900x1080')">
          <div class="carousel-caption d-none d-md-block">
            <h3>First Slide</h3>
            <p>This is a description for the first slide.</p>
          </div>
        </div>
        <!-- Slide Two - Set the background image for this slide in the line below -->
        <div class="carousel-item" style="background-image: url('http://placehold.it/1900x1080')">
          <div class="carousel-caption d-none d-md-block">
            <h3>Second Slide</h3>
            <p>This is a description for the second slide.</p>
          </div>
        </div>
        <!-- Slide Three - Set the background image for this slide in the line below -->
        <div class="carousel-item" style="background-image: url('http://placehold.it/1900x1080')">
          <div class="carousel-caption d-none d-md-block">
            <h3>Third Slide</h3>
            <p>This is a description for the third slide.</p>
          </div>
        </div>
      </div>
      <a class="carousel-control-prev" href="#carouselExampleIndicators" role="button" data-slide="prev">
        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
        <span class="sr-only">Previous</span>
      </a>
      <a class="carousel-control-next" href="#carouselExampleIndicators" role="button" data-slide="next">
        <span class="carousel-control-next-icon" aria-hidden="true"></span>
        <span class="sr-only">Next</span>
      </a>
    </div>
  </header>

  <!-- Page Content -->
  <div class="container">

    <h1 class="my-4">인기 상품</h1>

    <div class="row">
      <!-- like많은순 으로 뽑아오기 -->
      <?php
      $sql = "select * from goods order by likes desc,id desc limit 3";
      $result = mysqli_query($conn,$sql);
      
      while($row = mysqli_fetch_array($result)){  
      ?>
      <div class="col-lg-4 col-sm-6 portfolio-item">
        <div class="card h-100">
        <a href="#"><img class="card-img-top" src="<?php echo "uploads/".$row['photo']; ?>" alt="" width="218.3" height="261.95"></a>
          <div class="card-body">
            <p class="card-title">
              <a href="#"><?= $row[designer] ?></a>
            </p>
            <p>
              <?= $row[item_name] ?>
            </P>
            <P>
              <?= $row[price]."원" ?>
            </P>
            <P>
              <?= "관심: ".$row[likes] ?>
            </P>
          </div>
        </div>
      </div>
      <?php } ?>
      
     
    </div>
    <!-- /.row -->

    <!-- Portfolio Section -->
    <h2>최신 등록 상품</h2>

    <div class="row">

    <?php
      $sql = "select * from goods order by id desc limit 3";
      $result = mysqli_query($conn,$sql);
      
      while($row = mysqli_fetch_array($result)){
        
      ?>
      <div class="col-lg-4 col-sm-6 portfolio-item">
        <div class="card h-100">
        <a href="#"><img class="card-img-top" src="<?php echo "uploads/".$row['photo']; ?>" alt="" width="218.3" height="261.95"></a>
          <div class="card-body">
            <p class="card-title">
              <a href="#"><?= $row[designer] ?></a>
            </p>
            <p>
              <?= $row[item_name] ?>
            </P>
            <P>
              <?= $row[price]."원" ?>
            </P>
            <P>
              <?= "관심: ".$row[likes] ?>
            </P>
          </div>
        </div>
      </div>
      <?php } ?>
    </div>
    <!-- /.row -->

    <!-- Features Section -->
    

    <hr>

    <!-- Call to Action Section -->
    <div class="row mb-4">
      <div class="col-md-8">
        <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Molestias, expedita, saepe, vero rerum deleniti beatae veniam harum neque nemo praesentium cum alias asperiores commodi.</p>
      </div>
      <div class="col-md-4">
        <a class="btn btn-lg btn-secondary btn-block" href="board.php">문의사항</a>
      </div>
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
