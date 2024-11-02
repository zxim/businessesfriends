<?php
include "dbconnect.php";
session_start();
$cupon_info = $_POST['attend_cupon'];
$store_id = $_SESSION['store_id'];
$sql = "INSERT INTO attend_cupon (cupon_info, store_id) VALUES ('$cupon_info', $store_id);";
// 출석쿠폰내용 삽입 성공 시
if($result = mysqli_query($conn, $sql)){
    echo("<script>alert('출석쿠폰 등록이 완료되었습니다.');location.replace('cupon_regist.php');</script>");
}else{
    echo("<script>alert('error');location.replace('cupon_regist.php');</script>");
}
?>