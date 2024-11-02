<?php
ini_set('display_errors', '0');
include "dbconnect.php";
session_start();

// $conn = mysqli_connect("localhost", "root", "", "project");
$id = $_POST['user_id'];
$pw = $_POST['user_pw'];

$sql = "SELECT * FROM store LEFT JOIN user ON store.user_id=user.user_id WHERE user.user_id='$id'";
// $sql = "SELECT * FROM user WHERE user_id='$user_id'";
$result = mysqli_query($conn, $sql);
$row = mysqli_fetch_array($result);

// if($row !== NULL){ // sql실행 결과 값이 있는 경우
    
    // DB에서 값을 받은 경우
    if($row !== NULL){
        
        // 세션이 있다면
        if(isset($_SESSION)){
            unset($_SESSION['user_id']);
            unset($_SESSION['user_name']);
            unset($_SESSION['user_type']);
            unset($_SESSION['store_id']);
        }
        $user_id = $row['user_id'];
        $user_pw = $row['user_pw'];
        $user_name = $row['user_name'];
        $user_type = $row['user_type'];
        $store_id = $row['store_id'];
    
        //로그인 성공
        if($id === $user_id && $pw === $user_pw){
            echo("<script>location.replace('../main/home.php');</script>");
            $_SESSION['user_id'] = $user_id;
            $_SESSION['user_name'] = $user_name;
            $_SESSION['user_type'] = $user_type;
            $_SESSION['store_id'] = $store_id;
        }else{
            echo("<script>alert('아이디 혹은 비밀번호가 틀렸습니다.');location.replace('index.html');");
        }
    }else{ // store_id가 없는 유저 sql 다시 설정
        
        $sql = "SELECT * FROM user WHERE user_id='$id'";
        $result = mysqli_query($conn, $sql);
        $row = mysqli_fetch_array($result);
        // 세션이 있다면
        if(isset($_SESSION)){
            unset($_SESSION['user_id']);
            unset($_SESSION['user_name']);
            unset($_SESSION['user_type']);
            unset($_SESSION['store_id']);
        }
     
        $user_id = $row['user_id'];
        $user_pw = $row['user_pw'];
        $user_name = $row['user_name'];
        $user_type = $row['user_type'];
    
        //로그인 성공
        if($id === $user_id && $pw === $user_pw){
            echo("<script>location.replace('../main/home.php');</script>");
            $_SESSION['user_id'] = $user_id;
            $_SESSION['user_name'] = $user_name;
            $_SESSION['user_type'] = $user_type;
            $_SESSION['store_id'] = NULL;
        }else{
            echo("<script>alert('아이디 혹은 비밀번호가 틀렸습니다.');location.replace('index.html');</script>");
        }
    }
// }
// else{
//     echo("<script>alert('아이디 혹은 비밀번호가 틀렸습니다.');location.replace('index.html');</script>");
// }

?>