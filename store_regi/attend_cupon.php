<?php
include "dbconnect.php";
session_start();
$store_id = $_SESSION['store_id'];
// $conn = mysqli_connect("localhost", 'root', '', 'project');
$phone = $_POST['tel'];// 핸드폰번호
$select_sql = "SELECT user_id FROM user WHERE user_phone='$phone'";
$result = mysqli_query($conn, $select_sql);
$row = mysqli_fetch_assoc($result);
if(empty($row)){ // 사용자가 없는 경우
    echo("<script>alert('사용자가 없습니다.');location.replace('cupon_regist.php');</script>");
}else{ // 사용자가 있는 경우 attend테이블에 가게 출석쿠폰을 발급받은적 있는지 없는지 본다 없는경우 insert 있는경우 update
    $user_id = $row['user_id'];
    $user_sql = "SELECT * FROM attend WHERE user_id='$user_id'";
    $result = mysqli_query($conn, $user_sql);
    $row = mysqli_fetch_array($result);
    if(isset($row)){ // 출석쿠폰이 있는 사용자의 경우
        $insert_sql = "UPDATE attend SET time = time + 1";
        $result = mysqli_query($conn, $insert_sql);
        if($result == true){
            echo("<script>alert('출석체크가 완료되었습니다.');location.replace('cupon_regist.php');</script>");
        }else{
            echo("Error!");
        }
    }else{ // 출석쿠폰을 발급받은적이 없는 사용자의 경우
        $insert_sql = "INSERT INTO attend VALUES (1, $store_id, '$user_id');";
        $result = mysqli_query($conn, $insert_sql);
        if($result == true){
            echo("<script>alert('출석체크가 완료되었습니다.');location.replace('cupon_regist.php');</script>");
        }else{
            echo("Error2");
        }
    }
    
}

?>