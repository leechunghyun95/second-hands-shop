<?php
	$conn = mysqli_connect("localhost","root","1234","shop");

    if(! $_POST[pw1] == $_POST[pw2]){//비밀번호와 비밀번호 확인이 일치하나 여부 검사
        echo "<script>alert('비밀번호가 일치하지 않습니다.'); 
        history.back();</script>";
    }

    $sql = "select * from user";
    $result = mysqli_query($conn,$sql);
    while($row = mysqli_fetch_array($result)){
        if($_POST[email] == $row[email]){
            echo $row[email];
            echo "<script>alert('이미 가입한 이메일입니다.'); 
        history.back();</script>";
        }
    }
    

    


    $sql = "INSERT INTO user(email,phone_num,pw,nick_name) 
            VALUES
            ('$_POST[email]',
            '$_POST[phone_num]',
            '$_POST[pw1]',
            '$_POST[nick_name]'
            )";

    $result = mysqli_query($conn,$sql);
    if($result){
        echo "<script>alert('회원가입이 완료되었습니다.'); 
        location.href='sign_in.php';</script>";
    }else{
        echo "<script>alert('회원가입에 실패했습니다.'); 
        history.back();</script>";
    }
	
?>