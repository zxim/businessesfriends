<!DOCTYPE html>
<html lang="ko">
<head>
  <?php
    session_start();
    include "dbconnect.php";
    $user_id = $_SESSION['user_id'];
    $store_id = $_SESSION['store_id'];
  ?>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width">

  <title>내 가게 정보</title>

  <style>

    @import url('https://fonts.googleapis.com/css2?family=Nanum+Gothic&display=swap');
    
    html{
      font-family: 'Nanum Gothic', sans-serif;
    }

    body {
      margin: 50px;
      /* justify-content: center; */
      background-color: #ffffff;
      /* text-align: center; */
    }

    hr{
      height: 2px;
      border: none;
      background-color: rgb(221, 218, 218);
      margin-top: 5px;
    }

    /* 가게 사진 */
    .img{
      margin-top: 50px;
      margin-bottom: 50px;
    }

    /* 전화번호 찍는 곳 */
    input[type=tel]{
      width: 75%;
      height: 50px;
      border:none;
      font-size:1em;
      padding-left: 5px;
      /* font-style: oblique; */
      border-top-left-radius: 5px;
      border-bottom-left-radius: 5px;
      display:inline;
      outline:none;
      box-sizing: border-box;
      color:black;
      border: 2px solid #d2e2fe;
    }

    .text{
      width: 75%;
      height: 50px;
      border:none;
      font-size:1em;
      padding-left: 5px;
      /* font-style: oblique; */
      border-top-left-radius: 5px;
      border-bottom-left-radius: 5px;
      display:inline;
      outline:none;
      box-sizing: border-box;
      color:black;
      border: 2px solid gray;
      margin-bottom: 10px;
    }

    /* 쿠폰 이름, 할인내역 올리는 곳 */
    /* input[type=text]{ */
    #name, #discount{
      justify-content: center;
      width: 86%;
      height: 50px;
      border:none;
      font-size:1em;
      padding-left: 5px;
      border-radius: 5px;
      display:inline;
      outline:none;
      box-sizing: border-box;
      color:black;
      border: 2px solid rgb(221, 218, 218);
      
    }

    input[type=text]::placeholder{
      font-family: 'Nanum Gothic', sans-serif;
      
    }

    input[type=date]{
      justify-content: center;
      font-family: 'Nanum Gothic', sans-serif;
      width: 40%;
      height: 50px;;
      border:none;
      font-size:1em;
      padding-left: 5px;
      /* font-style: oblique; */
      border-radius: 5px;
      /* border-bottom-left-radius: 5px; */
      display:inline;
      outline:none;
      box-sizing: border-box;
      color:black;
      border: 2px solid rgb(221, 218, 218);
    }
    
    /* 보내는 버튼 */
    .submit-btn{
      height: 50px;
      /* border:none; */
      background-color: #d2e2fe;
      border: 1px solid #d2e2fe;
      border-top-right-radius: 5px;
      border-bottom-right-radius: 5px;
      /* font-size:1em; */
      color:black;
      outline:none;
      display:inline;
      margin-left: -10px;
      box-sizing: border-box;
    }

    .submit-btn2{
      /* margin-top: 2px; */
      height: 50px;
      /* border:none; */
      background-color: gray;
      border: 1px solid gray;
      border-top-right-radius: 5px;
      border-bottom-right-radius: 5px;
      /* font-size:1em; */
      color:black;
      outline:none;
      display:inline;
      margin-left: -10px;
      box-sizing: border-box;
      color: white;
    }

    .bt{
      text-align: center;
    }

    #regist{
      /* height: 50px; */
      padding: 12px;
      border-radius: 5px;
      background-color: #d2e2fe; 
      border: none;
      
      display:inline;
    }

    #cancel{
      /* height: 50px; */
      padding: 12px;
      border-radius: 5px;
      background-color: #d2e2fe; 
      border: none;
      display:inline;
      /* width:200px; */
      margin: auto;
      
    }

    /* input[type=button]:hover{ 
      background-color: lightgray;
    }*/

    .center_class{
      text-align: center;
    }

    .cuponbox{
      /* margin-top: 10px; */
      width: 54%;
      height: 6px;
      /* font-size: 6x; */
      border-top-left-radius: 5px;
      border-bottom-left-radius: 5px;
      background-color: #ffffff;
      /* background-color: black; */
      border: 2px #d2e2fe;
      padding: 30px;
      margin: 0 auto;
      float: left;
      line-height: 10px;
    }

    .cupon_name{
      /* font-size: 10px; */
    }
    .cupon_date{
      font-size: 5px;
    }

    .da{
      display: inline;
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

    /* .cancel{
      widt
    } */
    
    

  </style>
</head>
<body>
    <script>
      var div, text, btn

      function cp(id, name, start, end, discount){
        div = document.createElement('div');
        div.classList.add("cuponbox");
        // div.classList.add('couponbox');
        p1 = document.createElement('a');
        p2 = document.createElement('a');
        br = document.createElement('br');
        p1.className = "cupon_name";
        p2.className = "cupon_date";
        text = document.createTextNode(name + " " + discount);
        text2 = document.createTextNode(" (" + start + " ~ " + end + "까지)");
        p1.appendChild(text);
        p2.appendChild(text2);
        div.appendChild(p1);
        div.appendChild(br);
        div.appendChild(p2);

        document.body.appendChild(div);

        btn = document.createElement('input');
        btn.setAttribute("type", "submit");
        btn.setAttribute("value", "쿠폰 삭제");
        btn.setAttribute("onclick", "location.replace('cupon_delete.php?cupon_id=" + id + "');");
        btn.classList.add('couponbutton');
        document.body.appendChild(btn);

      }
    </script>
  

  <?php
    $sql = "SELECT * FROM store WHERE store_id='$store_id'";
    $result = mysqli_query($conn, $sql);

    if($store_id === NULL){
      echo "<script>alert('가게등록을 해야합니다.');location.replace('../main/information.php');</script>";
    }else{ // SESSION에 store_id가 있을때
        // 가게 정보 상단에 띄우기(DB연동)
        if(!empty($row = mysqli_fetch_array($result))){
          $store_name = $row['store_name'];
          $store_img = $row['store_img'];
        }else{
          echo "<script>alert('가게정보가 없습니다.');location.replace('../main/information.php');</script>";
        }

        $sql = "SELECT * FROM cupon LEFT JOIN store ON cupon.store_id=store.store_id WHERE store.store_id='$store_id';";
        $result = mysqli_query($conn, $sql);

        $sql1 = "SELECT * FROM attend_cupon WHERE store_id=$store_id";
        $result1 = mysqli_query($conn, $sql1);
        if($row = mysqli_fetch_assoc($result1)){
          $attend_cupon_info = $row['cupon_info'];
        }
  ?>




  <div class="img">
    <img src=<?=$store_img?> height="80px" style="vertical-align:middle;">
    <span style="font-size:20px"><strong>&nbsp;&nbsp;<?=$store_name?></strong></span>
    <!-- <button height="80px" style="">버튼</button> -->

    <div style="float:right; border: 2px solid #d2e2fe; padding-left: 10px; padding-right: 5px; padding-top: 5px; border-radius:15px;">
       <img src="images/qr7.png" height="50px" id="qrCheck">
      <div>
        <p style="  margin-top:-2px; font-size:11px;">쿠폰 QR 체크</p>
      </div>
    </div>

    
   

  <div class="check">
    <img src="../main/icon/check2.png" align="middle" height="30px" style="float: left;">
    <h4>&nbsp;&nbsp;출석쿠폰</h4>
    
    
      <?php
        if(isset($attend_cupon_info)){
          echo("<form class=\"center_class\" method='POST' action=\"attend_cupon_update.php\">");
          echo("<input name=\"attend_cupon\" class=\"text\" type=\"text\" value=\"$attend_cupon_info\">");
          echo("<input type=\"submit\" value=\"수정하기\" class=\"submit-btn2\">");
        }else{
          echo("<form class=\"center_class\" method='POST' action=\"attend_cupon_regist.php\">");
          echo("<input name=\"attend_cupon\" class=\"text\" type=\"text\" placeholder=\"출석쿠폰 내용을 입력해주세요\">");
          echo("<input type=\"submit\" value=\"설정하기\" class=\"submit-btn2\">");
        }
      ?>
      <!-- <input name="attend_cupon" class="text" type="text" placeholder="출석쿠폰 내용을 입력해주세요">
      <input type="submit" value="설정하기" class="submit-btn2"> -->
      <p style="font-size: 10px; margin-top: 0; margin-bottom: 20px">(예시 10번 출석하면 몇 프로 할인)</p>
    </form>

    <form class="center_class" method='POST' action="attend_cupon.php">
      <!-- <p style="font-size: 15px;">(예시 10번 출석하면 몇 프로 할인)</p> -->
      
      <input type="tel" name="tel" class="text-field" placeholder="전화번호를 입력하세요">
      <input type="submit" value="출석체크" class="submit-btn">
    </form>
  </div>

  
  </div>

  <form action="cupon_regi_process.php" method="post">

  <div style="margin-top:10px;">
    <img src="../main/icon/upload.png" align="middle" height="30px" style="float: left;">
    <h4>&nbsp;&nbsp;쿠폰 등록하기</h4><br>
  </div>
  

  <div class="center_class">
    <input name="name" type="text" id="name" style="margin-bottom: 5px;" placeholder="쿠폰 이름을 적어주세요"><br>
    <input name="start" type="date" id="start"> ~ <input name="end" type="date" id="end"><br>
    <input name="discount" type="text" id="discount" style="margin-top: 5px;" placeholder="할인 이벤트 내역"><br><br>
  </div>
  
  <div class="bt">
    <button type="submit" id="regist">쿠폰등록</button>
  </div>
  </form>

  <div style="margin-top:15px;">
    <img src="../main/icon/couponimg.png" align="middle" height="30px" style="float: left; ">
    <h4>&nbsp;&nbsp;내가 올린 쿠폰</h4>
    <?php
   // 세션을 통해 가게가 등록되어 있는지 확인한다.
   
      //등록된 쿠폰이 있는 경우
      while($row = mysqli_fetch_array($result)){
        // echo $row['cupon_name'];
        $cupon_id = $row['cupon_id'];
        $cupon_name = $row['name'];
        $cupon_start = $row['start'];
        $cupon_end = $row['end'];
        $cupon_discount = $row['discount'];
        echo("<script>cp('$cupon_id', '$cupon_name', '$cupon_start', '$cupon_end', '$cupon_discount');</script>");
      }
     }
    ?>
  </div>
  <br>
  <br>
  <br>
  <br>
  <br>
  <br>

  <button class="cancel" type="button" id="cancel" onclick="location.replace('../main/information.php');">취소하기</button>

  <script>
        document.getElementById('cancel').addEventListener('click', function(){
        window.close();
      });

      document.getElementById('qrCheck').addEventListener('click', function(){
        location.replace('../jsQR-master/docs/index.html');
      })

    

    

    // document.getElementById('regits').addEventListener('click', function(){
                
    // });

  </script>


</body>
</html>