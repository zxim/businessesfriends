<?php
session_start();
include "dbconnect.php";
$store_id = $_SESSION['store_id'];
$cupon_info = $_POST['attend_cupon'];
$sql = "UPDATE attend_cupon SET cupon_info='$cupon_info' WHERE store_id=$store_id;";
$result = mysqli_query($conn, $sql);
if($result){
    echo("<script>alert('수정 완료');location.replace('cupon_regist.php');</script>");
}else{
    echo("<script>alert('수정 실패');location.replace('cupon_regist.php');</script>");
}
?>