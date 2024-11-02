<?php
    include "dbconnect.php";
    session_start();
    // $conn = mysqli_connect('localhost', 'root', '', 'project');
    $user_id = $_SESSION['user_id'];
    $cupon_id = $_GET['cupon_id'];
    $store_id = $_GET['store_id'];
    $insert_sql = "INSERT INTO user_cupon VALUES ('$cupon_id', '$user_id');";
    $result = mysqli_query($conn, $insert_sql);

    if($result){
        echo "<script>alert('쿠폰을 받았습니다.');location.replace('store_inf2.php?store_id=$store_id');</script>";
    }else{
        echo "<script>alert('ERROR: 관리자에게 문의하세요'); window.close();</script>";
    }
?>