<?php
    $conn = mysqli_connect("localhost","root","1234","shop");

    echo $_POST[title];

    $sql = "UPDATE board SET title = ".$_POST[title].",content = ".$_POST[content].", date now() WHERE idx=$_GET[idx]";
    mysqli_query($conn,$sql);

    echo "<script>
    alert('수정이 완료되었습니다.');
    location.href='/shop/board.php';</script>";
?>