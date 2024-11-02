<?php
include "dbconnect.php";
// 일반 사용자 회원가입
// $conn = mysqli_connect("localhost", "root", "", "project");
mysqli_query($conn, 'SET NAMES utf8');

$id = $_POST['user_id'];
$phone = $_POST['user_phone'];
$pwd = $_POST['password1'];
$name = $_POST['user_name'];
$uploadtmp = 'user_profile/';
// var_dump($_POST);
// var_dump($_FILES);
// 파일을 업로드한 경우
if($_FILES['user_profile']['size'] !== 0){
    $file = $_FILES['user_profile'];
    $filename = $file['name'];
    $filetmp = $file['tmp_name'];
    $upload_dir = $uploadtmp.$filename;
    
    // 파일 업로드 성공
    if(move_uploaded_file($filetmp, $upload_dir)){
        $upload_dir = "/project/login/user_profile/".$filename;
        $sql = "INSERT INTO user VALUES ('$id', '$name', '$phone', '$pwd', 1, '$upload_dir')";
        $result = mysqli_query($conn, $sql);
        if($result){
            echo("<script>alert('회원가입에 성공하였습니다! $name 님!');location.replace('index.html');</script>'");
        }else{
            echo("<script>alert('이미 존재하는 아이디입니다.');location.replace('index.html');</script>");
        }
    }
}else{ // 업로드한 파일이 없는 경우
    
    $sql = "INSERT INTO user VALUES ('$id', '$name', '$phone', '$pwd', 1, '/project/login/user_profile/default_profile.jpg')";
    $result = mysqli_query($conn, $sql);
    if($result){
        echo("<script>alert('회원가입에 성공하였습니다! $name 님!');location.replace('index.html');</script>'");
    }else{
        echo("<script>alert('이미 존재하는 아이디입니다.');location.replace('index.html');</script>");
    }
}
?>

