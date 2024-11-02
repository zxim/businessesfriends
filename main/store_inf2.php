<!DOCTYPE html>
<html lang="ko">
<head>
  <?php
    session_start();
  ?>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width">
  <title>가게 샘플 페이지</title>
  <style>

    @import url('https://fonts.googleapis.com/css2?family=Nanum+Gothic&display=swap');
    
    html{
      font-family: 'Nanum Gothic', sans-serif;
    }

    /*@media screen and (max-width:450px){
      .couponbox{
         width: 21%;
      }
    }*/

    /* @media(min-width:800px){ 
      .couponbox{
        /* justify-content: center;
        /* text-align: center; 
        /* margin: auto; 
        width: 90%;
      }
    }*/

    body {
      margin: 40px;
      justify-content: center;
      /* background-color: rgb(211, 237, 255); */
      background-color: #ffffff;
      /* text-align: center; */
    }

    h4{
      font-family: 'Jua', sans-serif;
      font-family: 'Nanum Gothic', sans-serif;
    }

    hr{
      height: 2px;
      border: none;
      background-color: rgb(221, 218, 218);
      margin-top: 5px;
    }
    
    .shop_img{
      margin-top: 40px;
      margin-bottom: 40px;
    }

    .shop_map{
      margin-bottom: 20px;
    }

    .shop_content{
      margin-bottom: 30px;
    }

    #content_img{
      margin-top: 10px;
    }

    .coupon{
      margin-top: 30px;
    }

    .couponbox{
      margin-top: 10px;
      width: 58%;
      height: 6px;
      border: 0;
      border-top-left-radius: 5px;
      border-bottom-left-radius: 5px;
      background-color: #ffffff;
      border: 2px solid #d2e2fe;
      padding: 30px;
      margin: 0 auto;
      float: left;
      line-height: 10px;
    }

    .couponbutton{
      height: 70px;
      border: 1px solid #d2e2fe;
      background-color: #d2e2fe;
      color: black;
      border-top-right-radius: 5px;
      border-bottom-right-radius: 5px;
      padding: 5px;
      float: left;
      margin-bottom: 10px;
    }

    .container_in{
      margin-top: 15px;
      text-align: center;
    }

    .container{
      padding-left: 1px;
    }

    .check_content{
      text-align: center;
      border: 2px solid #d2e2fe;
      border-radius: 15px;
      color: gray;
    }

    .a2{
      font-size: 5px;
    }

    .cancle{
      font-family: 'Nanum Gothic', sans-serif; 
      padding: 12px;
      border-radius: 5px;
      background-color: gray; 
      border: none;
      color: white;
      margin: 5px;
    }
  
  </style>
</head>
<body>
<script>

    function change(id){
    //document.getElementById(id);
    id.src = "icon/check4.png";
    id.style.height = '33px';
    }

    //정보란에 이미지 올리기
    function image_upload(src){

    let img = document.createElement('img');
    img.src = src;
    img.height = '60';
    img.style.marginRight='5px'

    let i = document.getElementById('content_img');
    i.appendChild(img);
    }

    // 쿠폰 올리기
    function coupon(store_id, cupon_id, name, discount, start, end){

      let div = document.createElement('div');
      div.classList.add('couponbox');
      let text = document.createTextNode(name + " " + discount);
      let text1 = document.createTextNode("(" + start + " ~ " + end + "까지)");
      let a1 = document.createElement('a');
      let a2 = document.createElement('a');
      let br = document.createElement('br');
      a2.classList.add('a2');
      a1.appendChild(text);
      a2.appendChild(text1);
      div.appendChild(a1);
      div.appendChild(br);
      div.appendChild(a2);
      document.body.appendChild(div);

      let btn = document.createElement('input');
      btn.setAttribute("type", "submit");
      btn.setAttribute("value", "쿠폰받기");
      btn.classList.add('couponbutton');
      let link = "user_cupon_get.php?cupon_id=" + cupon_id + "&store_id=" + store_id;
      btn.setAttribute('onclick', "location.replace('" + link + "');");
      // btn.onclick = function(){
      //   btn.disabled = true;
      // }
      document.body.appendChild(btn);
    
    
    }

   

</script>

<?php
    include "dbconnect.php";
    $store_id = $_GET['store_id'];
    $user_id = $_SESSION['user_id'];
    // $conn = mysqli_connect('localhost', 'root', '', 'project');
    $select_sql = "SELECT * FROM store WHERE store_id='$store_id'";
    $s_result = mysqli_query($conn, $select_sql);
    $row = mysqli_fetch_array($s_result);
    $store_name = $row['store_name'];
    $store_img = $row['store_img'];
    $store_info = $row['store_info'];
    $store_lat = $row['store_lat'];
    $store_lng = $row['store_lng'];

    

    $attend_sql = "SELECT * FROM attend_cupon WHERE store_id = $store_id";
    $attend_result = mysqli_query($conn, $attend_sql);
    if($row = mysqli_fetch_assoc($attend_result)){
      $attend_cupon_info = $row['cupon_info'];
    }else{
      $attend_cupon_info = "등록된 출석쿠폰이 없습니다.";
    }
  ?>

  <!-- 가게 사진 -->
  <div class="shop_img">
    <img height="80px" src=<?=$store_img?> style="vertical-align:middle;">
      <span style="font-size:20px"><strong>&nbsp;&nbsp;<?=$store_name?></strong></span>
  </div>

  <!-- 지도에서 가게 위치 보는 버튼 -->
  <div class="shop_map">
    <img src="icon/location.png" height="25px">
    <a href="home.php?lat=<?=$store_lat?>&lng=<?=$store_lng?>">지도에서 위치 보기</a>
  </div>

  <!-- 지도 정보 보여주는 곳 -->
  <div class="shop_content">
    <img src="icon/information2.png" align="middle" height="30px" style="float: left;">
    <h4>&nbsp;&nbsp;정보</h4>

    <hr>

    <!-- 가게 설명 -->
    <div class="content_explanation">
      <?=$store_info?>
    </div>
    
    <!-- 가게 사진 올라가는 곳 -->
    <div id="content_img">
      
    </div>

  </div>

  <!-- 사용자의 출석 체크 -->
  <div class="container">
    <img src="icon/check2.png" align="middle" height="30px" style="float: left;">
    <h4>&nbsp;&nbsp;출석 쿠폰</h4>
    <hr>

    <div class="check_content">
      <p style="padding-left: 10px margin-left: 10px"><?=$attend_cupon_info?></p>
    </div>
    <div class="container_in">
    <?php
      $sql = "SELECT * FROM attend WHERE user_id=$user_id";
      $result = mysqli_query($conn, $sql);
      if($row = mysqli_fetch_assoc($result)){
        // var_dump($row);
        $num = $row['time'];
        


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
          // if($i === 3){
          //   echo("<img src=\"icon/checkbox3.png\" id=\"cup\" style=\"height: 33px; margin-left: 5px;\"><br>");
          // }
          // if($num >= 1){ // 받은 출석체크가 1개 이상일 경우
          //   echo("<img src=\"icon/checkbox4.png\" id=\"cup\" style=\"height: 33px; margin-left: 5px;\">");
          // }
          // if($i < $num){
          //   echo("<img src=\"icon/checkbox4.png\" id=\"cup\" style=\"height: 33px; margin-left: 5px;\">");
          //   if($i === 4){
          //     echo("<img src=\"icon/checkbox4.png\" id=\"cup\" style=\"height: 33px; margin-left: 5px;\"><br>");
          //   }
          // }else if($i > $num){
          //   if($i === 4){
          //     echo("<img src=\"icon/checkbox3.png\" id=\"cup\" style=\"height: 33px; margin-left: 5px;\"><br>");
          //   }
          //   echo("<img src=\"icon/checkbox3.png\" id=\"cup\" style=\"height: 33px; margin-left: 5px;\">");
        }
      }
      // else{
      //   // var_dump($row);
      //   for($i = 0; $i < 9; $i++){
      //     echo("<img src=\"icon/checkbox3.png\" id=\"cup\" style=\"height: 33px; margin-left: 5px;\">");
      //     if($i === 3){
      //       echo("<img src=\"icon/checkbox3.png\" id=\"cup\" style=\"height: 33px; margin-left: 5px;\"><br>");
      //     }
      //   }
      // }
    ?>
    </div>
    <!-- 출석 체크 이미지 -->
    
      <!-- <img src="icon/checkbox3.png" id="cup" style="height: 33px; margin-left: 5px;" onclick="change(cup)">
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
       -->
    </div>

  </div>

  <!-- 가게 쿠폰 올라가는 곳 -->
  <div class="coupon">
    <div class="coupon_name">
      <img src="icon/coupon3.png" height="35px" align="middle" style="float: left;">
      <h4>&nbsp;&nbsp;쿠폰</h4>


      

      <?php

        $cupon_sql = "SELECT * FROM cupon LEFT JOIN store ON cupon.store_id=store.store_id 
        WHERE store.store_id=$store_id";
        $cupon_result = mysqli_query($conn, $cupon_sql);
        
        // 가게가 쿠폰을 1개라도 등록한 경우
        if($cupon_result){
        // var_dump($_SESSION);
        // echo($_SESSION['user_id']);

          while($row = mysqli_fetch_array($cupon_result)){
            // var_dump($row);
            $name = $row['name'];
            $discount = $row['discount'];
            $start = $row['start'];
            $end = $row['end'];
            $cupon_id = $row['cupon_id'];
            // 쿠폰을 받은 경우 버튼을 비활성화한다.
            echo "<script>coupon('$store_id', '$cupon_id', '$name', '$discount', '$start', '$end');</script>";
          }
        }
        ?>
    </div>
    <hr>

    <!-- 쿠폰 올라가는 곳 -->


  </div>
  <br>
  <br>
  <br>
  <br>
  <button class="cancle" type="button" id="cancel" onclick="history.back();">돌아가기</button>
</body>
</html>