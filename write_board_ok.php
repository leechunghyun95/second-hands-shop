<?php
$conn = mysqli_connect("localhost","root","1234","shop");


//각 변수에 write.php에서 input name값들을 저장한다
$username = $_POST['name'];
//$userpw = password_hash($_POST['pw'], PASSWORD_DEFAULT);
$userpw = $_POST['pw'];
$title = $_POST['title'];
$content = $_POST['content'];
$date = date('Y-m-d');


if($userpw && $title && $content){
    $sql = "
    INSERT INTO board
    (pw,title,content,date,hit)
        VALUES(
    '".$userpw."','".$title."','".$content."',now(),0
        )
    ";

    $result = mysqli_query($conn,$sql);
    
    
    
    echo "<script>
    alert('글쓰기 완료되었습니다.');
    location.href='/shop/board.php';</script>";
}else{
    echo "<script>
    alert('글쓰기에 실패했습니다.');
    history.back();</script>";
}
?>