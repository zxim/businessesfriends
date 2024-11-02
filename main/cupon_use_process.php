<?php
    include "dbconnect.php";
    // GET방식으로 받은 경우
    if(empty($_GET)){
        echo("<script>alert('GET ERROR 관리자에게 문의하세요');location.replace('my_cupon.php');</script>");
    }else{
        $cupon_id = $_GET['cupon_id'];
        $user_id = $_GET['user_id'];
    }

    // $conn = mysqli_connect("localhost", "root", "", "project");
    if(isset($conn)){
        $sql = "SELECT * FROM user_cupon WHERE cupon_id=$cupon_id and user_id='$user_id';";
        $result = mysqli_query($conn, $sql);
        $row = mysqli_fetch_assoc($result);
        //결과값이 있다면
        if(empty($row)){ 
            var_dump($row);
            echo("<script>alert('쿠폰이 조회되지 않습니다.');location.replace('my_cupon.php');</script>");
        }else{ // 결과값이 없다면
            $delete_sql = "DELETE FROM user_cupon WHERE cupon_id=$cupon_id and user_id='$user_id'";
            $result = mysqli_query($conn, $delete_sql);
            if(empty($result)){
                echo("DB에러 관리자에게 문의하세요(DELETE)");
            }else{
                echo("<script>alert('쿠폰 사용이 완료되었습니다.');self.close();</script>");
            }
        }
    }else{
        echo("<script>alert('DB에러 관리자에게 문의하세요.');self.close();</script>");
    }

?>