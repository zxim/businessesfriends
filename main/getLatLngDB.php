<?php
include "dbconnect.php";
// $conn = mysqli_connect("localhost", "root", "", "project");
$sql = "SELECT * FROM store";
$result = mysqli_query($conn, $sql);
$position = [];
while($row = mysqli_fetch_array($result)){
    $ar = array("store_id" => $row['store_id'], "store_name" => $row['store_name'], "store_img" => $row['store_img'], "store_info" => $row['store_info'],
                 "store_lat" => $row['store_lat'], "store_lng" => $row['store_lng'], "store_ad" => $row['store_ad'], "store_category" => $row['store_category']);
    array_push($position, $ar);
}

// var_dump($position);
// var_dump(json_encode($position));
echo(json_encode($position));
?>