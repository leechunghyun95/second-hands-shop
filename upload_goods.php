<?php

session_start();//세션 시작

$seller = $_SESSION[email];
echo $_SESSION[email];

// 사진 파일명 지정
$fn = date(YmdHis);


$photo = "'".$fn.$_FILES['photo']['name']."'";//첫번째 사진파일 이름 변수에 담기

// echo "photo : ".$photo."<br>";



// for($i=2; $i<=9; $i++){
//     ${photo.$i};
//     if(!$_FILES[photo.$i][size] == 0){//파일이 존재하면
//         ${'photo'.$i} = "'".$i.$fn.$_FILES[photo.$i][name]."'";//파일명을 변수에 담는다
//         echo photo.$i." : ". ${'photo'.$i}."<br>";  
//     }
// }

$photo2 = "'"."2".$fn.$_FILES[photo2][name]."'";
$photo3 = "'"."3".$fn.$_FILES[photo3][name]."'";
$photo4 = "'"."4".$fn.$_FILES[photo4][name]."'";
$photo5 = "'"."5".$fn.$_FILES[photo5][name]."'";
$photo6 = "'"."6".$fn.$_FILES[photo6][name]."'";
$photo7 = "'"."7".$fn.$_FILES[photo7][name]."'";
$photo8 = "'"."8".$fn.$_FILES[photo8][name]."'";
$photo9 = "'"."9".$fn.$_FILES[photo9][name]."'";

$photo2;
if(isset($photo2)){
    echo "널값 아님";
}else{
    echo "널값";
}


// mysql접속
$conn = mysqli_connect('localhost','root','1234','shop');





$sql = "
  INSERT INTO goods
    (designer,category,item_name,con,description,price,created,likes,size,color,photo,photo2,photo3,photo4,photo5,photo6,photo7,photo8,photo9,seller)
    VALUES(
        '{$_POST['designer']}',
        '{$_POST['category']}',   
        '{$_POST['item_name']}',
        '{$_POST['con']}',
        '{$_POST['description']}',
        '{$_POST['price']}',
        NOW(),
        0,
        '{$_POST['size']}',
        '{$_POST['color']}',
        $photo,
        $photo2,
        $photo3,
        $photo4,
        $photo5,
        $photo6,
        $photo7,
        $photo8,
        $photo9,
        '$seller'
    )
";

echo $sql;

echo "designer: ".$_POST['designer']."<br>";
echo "category: ".$_POST['category']."<br>";
echo "item_name: ".$_POST['item_name']."<br>";
echo "con: ".$_POST['con']."<br>";
echo "price: ".$_POST['price']."<br>";

echo "photo: ".$photo."<br>";


// 데이터베이스에 쿼리문 요청해서 데이터 추가하기
$result = mysqli_query($conn,$sql);

// 처리 결과 값 반환하기
if($result === false){
    echo '저장하는 과정에서 문제가 생겼습니다. 관리자에게 문의해주세요';
    error_log(mysqli_error($conn));
  } else {
    echo "<script>alert('상품이 등록되었습니다.'); 
        location.href='shop.php';</script>";
  }








// 사진 업로드 관련 코드
// 설정
$uploads_dir = '/var/www/html/shop/uploads';
$allowed_ext = array('jpg','jpeg','png','gif');
 
//$fn = date(YmdHis);

// 변수 정리

$error = $_FILES['photo']['error'];
$name = $fn.$_FILES['photo']['name'];
$ext = array_pop(explode('.', $name));


// 오류 확인 
if( $error != UPLOAD_ERR_OK ) {
    
	switch( $error ) {
		case UPLOAD_ERR_INI_SIZE:
		case UPLOAD_ERR_FORM_SIZE:
			echo "파일이 너무 큽니다. ($error)";
			break;
		case UPLOAD_ERR_NO_FILE:
			echo "파일이 첨부되지 않았습니다. ($error)";
			break;
		default:
			echo "파일이 제대로 업로드되지 않았습니다. ($error)";
	}
	exit;
}



 
// 확장자 확인
if( !in_array($ext, $allowed_ext) ) {
   
	echo "허용되지 않는 확장자입니다.";
	exit;
 }

 

// 파일 이동
move_uploaded_file( $_FILES['photo']['tmp_name'], "$uploads_dir/$name");


// 2~9번째 사진 처리
for($i = 2; $i <= 9; $i++){
    if($_FILES[photo.$i]){
        // 2~9번째 사진 변수 정리
        $error = $_FILES[photo.$i]['error'];
        $name = $i.$fn.$_FILES[photo.$i]['name'];
        $ext = array_pop(explode('.', $name));

        echo "name for: ".$name."<br>";



        // 2~9번째 사진 오류 확인
        if( $error != UPLOAD_ERR_OK ) {
    
            switch( $error ) {
                case UPLOAD_ERR_INI_SIZE:
                case UPLOAD_ERR_FORM_SIZE:
                    echo "파일이 너무 큽니다. ($error)";
                    break;
                case UPLOAD_ERR_NO_FILE:
                    break;
                default:
                    echo "파일이 제대로 업로드되지 않았습니다. ($error)";
            }
            exit;
        }

        // 2~9번 사진 확장자 확인
        if( !in_array($ext, $allowed_ext) ) {
   
            echo "허용되지 않는 확장자입니다.";
            exit;
        }

        // 2~9번째 사진 파일 이동
        move_uploaded_file($_FILES[photo.$i]['tmp_name'], "$uploads_dir/$name");
    }
}
?>


