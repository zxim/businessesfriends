<?php
$conn = mysqli_connect("localhost", "root", "", "project");

$id = $_POST['user_id'];
$phone = $_POST['user_phone'];
// $pwd = $hashedPassword = password_hash($_POST['password1'], PASSWORD_DEFAULT);
$pwd = $_POST['password1'];
$name = $_POST['user_name'];

$sql = "INSERT INTO user VALUES ('$id', '$name','$phone', '$pwd', 1);";

$result = mysqli_query($conn, $sql);

if($result){
    echo "<script>alert(회원가입에 성공하였습니다! $name 님!</script>";
    echo '<script>location.href="index.html";</script>';
}else{
    // header("index.html");
    echo "<script>alert('실패');</script>";
}
?>

