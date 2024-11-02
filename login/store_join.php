<?php
include "dbconnect.php";
// 가게 주인
// $conn = mysqli_connect("localhost", "root", "", "project");
mysqli_query($conn, 'SET NAMES utf8');

$id = $_POST['user_id'];
$phone = $_POST['user_phone'];
$pwd = $_POST['password1'];
$name = $_POST['user_name'];
$auth_file = $_FILES['auth_file'];
$filename = $auth_file['name'];
$filetmp = $auth_file['tmp_name'];
$uploadtmp = 'auth_document/';
$upload_dir = $uploadtmp.$filename;

$profile_file = $_FILES['user_profile'];
$p_filename = $profile_file['name'];
$p_filetmp = $profile_file['tmp_name'];
$p_uploadtmp = 'user_profile/';
$p_upload_dir = $p_uploadtmp.$p_filename;

move_uploaded_file($filetmp, $upload_dir);
$sql2 = "INSERT INTO store_auth (document, user_id) VALUES ('$upload_dir', '$id');";
$result2 = mysqli_query($conn, $sql2);
// var_dump($profile_file);
// var_dump($profile_file['size'] === 0);
//프로필을 등록 안한 경우
if($profile_file['size'] === 0){
    // echo("1");
    $sql1 = "INSERT INTO user VALUES ('$id', '$name','$phone', '$pwd', 2, '/project/login/user_profile/default_profile.jpg');";
    $result = mysqli_query($conn, $sql1);
    echo("<script>alert('회원가입에 성공하였습니다! $name 님!');location.replace('index.html');</script>");
}else{ //프로필 등록 안한 경우
    // echo('2');
    if(move_uploaded_file($p_filetmp, $p_upload_dir)){// 업로드 성공 시
        $p_upload_dir = '/project/login/user_profile/'.$p_filename;
        $sql1 = "INSERT INTO user VALUES ('$id', '$name','$phone', '$pwd', 2, '$p_upload_dir');";
        $result = mysqli_query($conn, $sql1);
        echo("<script>alert('회원가입에 성공하였습니다! $name 님!');location.replace('index.html');</script>");
    }else{
        echo("<script>alert('업로드 실패');location.replace('store_join2.html');</script>");
    }
}
?>

