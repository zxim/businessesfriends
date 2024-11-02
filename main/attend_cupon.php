<!DOCTYPE html>
<html lang="ko">
<head>
    <?php
        session_start();
        include "dbconnect.php";
        $user_id = $_SESSION['user_id'];
        $cupon_sql = "SELECT * FROM attend LEFT JOIN store
        ON store.store_id=attend.store_id WHERE attend.user_id=$user_id;";

        $cupon_result = mysqli_query($conn, $cupon_sql);

    ?>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width">
  <title>내 출석 쿠폰함</title>
  <style>
    @import url('https://fonts.googleapis.com/css2?family=Nanum+Gothic&display=swap');
    html{
        font-family: 'Nanum Gothic', sans-serif;
    }
    body {
     margin: 20px;
    background-color: #ffffff;
    }
    .img{
       margin-bottom: 10px;
    }

    .container{
        justify-content: center;
        text-align: center;
    }

    input {
        display: none;
    }

    hr{
        height: 2px;
        border: none;
        background-color: rgb(221, 218, 218);
        margin-top: 5px;
    }
  </style>
</head>
<body>
<img src="icon/back.png" onclick="history.back();" style="width: 25px; float: right;">
    <h4>내 출석 쿠폰함</h4>
    <hr>


    <?php
     $total_record = mysqli_num_rows($cupon_result); // 전체 글 수
     $number = $total_record;				// 글 번호 매김

     // 유저가 출석체크 한 이력이 있는 경우
     for ($i=0; $i<$total_record; $i++) {
         mysqli_data_seek($cupon_result, $i); 		// 가져올 레코드로 위치(포인터) 이동      	
         if($row = mysqli_fetch_assoc($cupon_result)){ // 하나의 레코드 가져오기
            $store_id = $row['store_name'];
            $store_img = $row['store_img'];
            $store_name = $row['store_name'];
            $num = $row['time'];
            echo("<div class=\"img\">
                    <img height=\"30px\" src=$store_img style=\"vertical-align:middle;\">
                    <span style=\"font-size:14px\">$store_name</span>
                    </div>");
            echo("<div class=\"container\">");
            for($i = 0; $i < 10; $i++){
    
                if($num >= 3){ // 받은 출석체크가 5개 이상일 경우
                    if($i < $num){
                    echo("<img src=\"icon/checkbox4.png\" id=\"cup\" style=\"height: 33px; margin-left: 5px;\">");
                    }
                    else if($i === 4){
                    echo("<img src=\"icon/checkbox4.png\" id=\"cup\" style=\"height: 33px; margin-left: 5px;\"><br>");
                    }else{
                    echo("<img src=\"icon/checkbox3.png\" id=\"cup\" style=\"height: 33px; margin-left: 5px;\">");
                    }
                }
                else{
                    if($i < $num){
                    echo("<img src=\"icon/checkbox4.png\" id=\"cup\" style=\"height: 33px; margin-left: 5px;\">");
                    }
                    else if($i === 4){
                    echo("<img src=\"icon/checkbox3.png\" id=\"cup\" style=\"height: 33px; margin-left: 5px;\"><br>");
                    }else{
                    echo("<img src=\"icon/checkbox3.png\" id=\"cup\" style=\"height: 33px; margin-left: 5px;\">");
                    }
                }
            
            }
            echo("</div>");


    ?>
    <!-- <div class="img">
        <img height="30px" src="images/pizza.jpeg" style="vertical-align:middle;">
        <span style="font-size:14px">행복한 빵집</span>
    </div> -->

    <!-- <div class="container">
        <img src="icon/checkbox3.png" id="cup" style="height: 33px; margin-left: 5px;" onclick="change(cup)">
        <img src="icon/checkbox3.png" id="cup2" style="height: 33px; margin-left: 5px;" onclick="change(cup2)">
        <img src="icon/checkbox3.png" id="cup3" style="height: 33px; margin-left: 5px;" onclick="change(cup3)">
        <img src="icon/checkbox3.png" id="cup4" style="height: 33px; margin-left: 5px;" onclick="change(cup4)">
        <img src="icon/checkbox3.png" id="cup5" style="height: 33px; margin-left: 5px;" onclick="change(cup5)">
        <div>
          <img src="icon/checkbox3.png" id="cup6" style="height: 33px; margin-left: 5px;" onclick="change(cup6)">
          <img src="icon/checkbox3.png" id="cup7" style="height: 33px; margin-left: 5px;" onclick="change(cup7)">
          <img src="icon/checkbox3.png" id="cup8" style="height: 33px; margin-left: 5px;" onclick="change(cup8)">
          <img src="icon/checkbox3.png" id="cup9" style="height: 33px; margin-left: 5px;" onclick="change(cup9)">
          <img src="icon/checkbox3.png" id="cup10" style="height: 33px; margin-left: 5px;" onclick="change(cup10)">
      </div> -->
    </div>

    <?php
        $number--;
            }
        }
        mysqli_close($conn);               
    ?>

    <hr>

    <script>
        let img = new Array();

        for (i=0; i<10; i++){
            img.push("images/checkbox3.png");
        }
        //img[2];

        function imgfu(){
            
        }
        
        function change(id){
            document.getElementById(id);
            id.src = "images/check4.png";
            id.style.height = '33px';
        }
    </script>
    <!-- <button type="button" onclick="location.replace('information.php');">돌아가기</button> -->
</body>
</html>