<?php
include "dbconnect.php";
session_start();
$user_id = $_SESSION['user_id'];
// $conn = mysqli_connect("localhost", "root", "", "project");
$name = $_POST['storename'];
$file = $_FILES['store_img'];
$text = $_POST['content'];
$latitude = $_POST['latitude'];
$longitude = $_POST['longitude'];
$address = $_POST['address']." ".$_POST['de_address'];
$category = $_POST['category']; // 가게 카테고리 설정
// 가게 이미지 설정
$filename = $file['name'];
$filetype = $file['type'];
$tmp_name = $file['tmp_name'];
$uploaddir = "store_img/";
$uploadfile = $uploaddir.$filename;
$defaultfile = "/project/store_regi/store_img/restaurant.jpg";


// 이미지파일 사용자가 등록 시
if(!empty($_FILES)){
    if(move_uploaded_file($tmp_name, $uploadfile)){
        $uploadfile = "/project/store_regi/store_img/".$filename;
        $sql = "INSERT INTO store (store_name, store_img, store_info, store_lat, store_lng, store_ad, user_id, store_category)
                VALUES ('$name', '$uploadfile', '$text', '$latitude', '$longitude', '$address', '$user_id', '$category');";
        $result = mysqli_query($conn, $sql);
        
    
        if($result === true){
            $sql1 = "SELECT * FROM store WHERE user_id='$user_id';";
            $result1 = mysqli_query($conn, $sql1);
            $row = mysqli_fetch_array($result1);
            $_SESSION['store_id'] = $row['store_id'];
            echo "<script>alert('가게 위치가 설정되었습니다.');</script>";
            echo "<script>location.replace('../main/information.php');</script>";
        }else{
            echo "error";
            echo "<a href='worker.html'>돌아가기</a>";
        }
    }else{
        echo("업로드 실패");
    }
}else{ // 이미지 파일 사용자가 등록 안했을 때 기본 이미지 사용
    $sql = "INSERT INTO store (store_name, store_img, store_info, store_lat, store_lng, store_ad, user_id)
    VALUES ('$name', '$defaultfile', '$text', '$latitude', '$longitude', '$address', '$user_id');";

    $result = mysqli_query($conn, $sql);

    if($result === true){
        $sql1 = "SELECT * FROM store WHERE user_id='$user_id';";
        $result1 = mysqli_query($conn, $sql1);
        $row = mysqli_fetch_array($result);
        $_SESSION['store_id'] = $row['store_id'];
        echo "<script>alert('가게 위치가 설정되었습니다.');</script>";
        echo "<script>location.replace('../main/information.php');</script>";
    // 다음으로 갈 페이지 만들기
    }else{
    echo "에러발생 관리자에게 문의하세요";
    echo "<a href='../main/information.php'>돌아가기</a>";
    }
}
?>