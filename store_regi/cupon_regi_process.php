<?php
    include "dbconnect.php";
    // $conn = mysqli_connect('localhost', 'root', '', 'project');
    $cupon_name = $_POST['name'];
    $cupon_start = $_POST['start'];
    $cupon_end = $_POST['end'];
    $cupon_discount = $_POST['discount'];
    session_start();
    $store_id = $_SESSION['store_id'];

    $sql = "INSERT INTO cupon (name, start, end, discount, store_id) VALUES
            ('$cupon_name', '$cupon_start', '$cupon_end', '$cupon_discount', '$store_id')";
    
    $result = mysqli_query($conn, $sql);
    if($result){
        echo("<script>alert('쿠폰등록을 완료했습니다.');location.replace('cupon_regist.php');</script>");
    }else{
        echo('<script>alert("쿠폰등록에 실패했습니다.");history.back();</script>');
    }
  ?>