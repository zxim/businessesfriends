<?php
include "dbconnect.php";
// $conn = mysqli_connect("localhost", "root", "", "project");
$latitude = $_POST['latitude'];
$longitude = $_POST['longitude'];

$sql = "INSERT INTO store (latitude, longitude) VALUE ($latitude, $longitude);";
// escape실행
// $sql = mysqli_real_escape_string($sql);
$result = mysqli_query($conn, $sql);
if($result === true){
    echo "<script>alert('가게등록이 완료되었습니다.');</script>";
    echo "<script>location.replace('user_map.html');</script>";
}else{
    echo "에러발생 관리자에게 문의하세요";
    echo "<a href='worker.html'>돌아가기</a>";
}
?>