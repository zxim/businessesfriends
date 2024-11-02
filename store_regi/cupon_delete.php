<?php
    include "dbconnect.php";
    $cupon_id = $_GET['cupon_id'];
    // $conn = mysqli_connect('localhost', 'root', '', 'project');
    $sql = "DELETE FROM cupon WHERE cupon_id='$cupon_id'";
    $result = mysqli_query($conn, $sql);
    echo "<script>location.replace('cupon_regist.php');</script>";
?>