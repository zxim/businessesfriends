<!DOCTYPE html>
<html lang="ko">
<head>
  <?php
    session_start();
    include "dbconnect.php";
    // $conn = mysqli_connect('localhost', 'root', '', 'project');
    $user_id = $_SESSION['user_id'];
    // user가 받은 cupon정보와 store_id를 받기 위한 sql문
    $cupon_sql = "SELECT * FROM cupon LEFT JOIN user_cupon 
                  ON cupon.cupon_id=user_cupon.cupon_id WHERE user_cupon.user_id='$user_id'
                  ORDER BY cupon.store_id ASC;";
    $cupon_result = mysqli_query($conn, $cupon_sql);
  ?>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width">

  <title>내 쿠폰함</title>

  <style>

    @import url('https://fonts.googleapis.com/css2?family=Nanum+Gothic&display=swap');

    html{
      font-family: 'Nanum Gothic', sans-serif;
    }

    body {
      margin: 20px;
      /* justify-content: center; */
      background-color: #ffffff;
      /* text-align: center; */
    }

    .shop_img{
       margin-bottom: 10px;
    }

    .shop_coupon{
      margin-top: 20px;
      margin:auto;
    }

    .couponbox{
      margin-top: 10px;
      width: 50%;
      height: 6px;
      border: 0;
      border-top-left-radius: 5px;
      border-bottom-left-radius: 5px;
      background-color: #ffffff;
      border: 3px solid #d2e2fe;
      padding: 30px;
      margin: 0 auto;
      float: left;
      line-height: 10px;
      text-align: center;
      justify-content: center;
    }

    .couponbutton{
      height: 72px;
      border: 2px solid #d2e2fe;
      background-color: #d2e2fe;
      color: rgb(0, 0, 0);
      border-top-right-radius: 5px;
      border-bottom-right-radius: 5px;
      padding: 5px;
      margin-bottom: 10px;
    }

    hr{
      width: 99%;
      height: 2px;
      border: none;
      background-color: rgb(221, 218, 218);
      margin-top: 5px;
    }

    /* @media(max-width:450px){
      .couponbox{
        
      }
    } */

    .a2{
      font-size:5px;
    }


  </style>
</head>
<body>
<img src="icon/back.png" onclick="history.back();" style="width: 25px; float: right;">
  <h4>내 쿠폰함</h4>
  <hr>

  <script>

    function cp(cupon_text, cupon_date, cupon_id){
      let div = document.createElement('div');
      div.classList.add('couponbox');
      let a1 = document.createElement('a');
      let a2 = document.createElement('a');
      a2.classList.add('a2');
      let br = document.createElement('br');
      let text = document.createTextNode(cupon_text);
      let date = document.createTextNode(cupon_date);
      a1.appendChild(text);
      a2.appendChild(date);
      div.appendChild(a1);
      div.appendChild(br);
      div.appendChild(a2);
      document.body.appendChild(div);

      let btn = document.createElement('input');
      btn.setAttribute("type", "button");
      btn.setAttribute("onclick", "location.replace('cupon_QRcode.php?cupon_id=" + cupon_id + "');");
      btn.setAttribute("value", "사용하기");
      btn.classList.add('couponbutton');
      document.body.appendChild(btn);
    }

    // src: 가게이미지경로, name: 가게이름
    function store(src, name){
      // let bf= new Array(num);
      let br = document.createElement('br');
      let pic = document.createElement('img');
      document.body.appendChild(br);
      //pic.classList.add('couponbox');
      pic.setAttribute('src', src);
      pic.setAttribute('style', "height:30px;width:30px");
      // pic.src = src;
      // pic.height = "30px";
      document.body.appendChild(pic);

      let storename = document.createElement('span');
      let nametext = document.createTextNode(name);
      storename.appendChild(nametext);
      document.body.appendChild(storename);

      document.write("<hr>");        
    }

    </script>

    <?php
      
      // 받은 쿠폰이 있다면
      if($cupon_result){
        $compare_id = '0';
        while($row = mysqli_fetch_array($cupon_result)){
          $store_id = $row['store_id'];
          $cupon_id = $row['cupon_id'];
          $text = $row['name']." ".$row['discount'];
          $date = "(".$row['start']." ~ ".$row['end'].")";
          //비교id와 가게id를 비교해 다른 경우 store_name을 가져온다.(가게이름 나타내는 경우)
          if($compare_id === $store_id){
              echo "<br><script>cp('$text', '$cupon_id');</script>";
            }else{ // 쿠폰을 나타내는 경우
              $store_sql = "SELECT * FROM store WHERE store_id='$store_id'";
              $store_result = mysqli_query($conn, $store_sql);
              $store_row = mysqli_fetch_array($store_result);
              $store_name = $store_row['store_name'];
              $store_img = $store_row['store_img'];
              $compare_id = $store_id;
              echo "<script>store('$store_img', '$store_name'); cp('$text', '$date', '$cupon_id');</script>";
            }

          }

        }
  ?>
    <br><br>
    <!-- <button type="button" onclick="history.back();">돌아가기</button> -->
  

 
</body>
</html>