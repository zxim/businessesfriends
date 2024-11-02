<!DOCTYPE html>
<html lang="en">
<head>
  <?php
    session_start();
    $user_id = $_SESSION['user_id'];
    // var_dump($_SESSION);
    $conn = mysqli_connect('localhost', 'root', '', 'project');
    if(isset($conn)){ // DB연동 성공 시
      $sql = "SELECT * FROM store WHERE user_id='$user_id'";
      $result = mysqli_query($conn, $sql);
      $row = mysqli_fetch_assoc($result);
      if(isset($row)){ // 가게 등록이 된 경우
        echo("<script>alert('이미 가게가 등록되었습니다.');location.replace('../main/information.php');</script>");
      }
    }else{
      echo("<script>alert('DB ERROR');location.replace('../main/information.php');</script>");
    }
  ?>

  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">

  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.0/jquery.min.js"></script>

  <!-- 가게 등록하는 폼 -->
  <title>가게 등록하는 폼</title>
   
  <style>

    @import url('https://fonts.googleapis.com/css2?family=Nanum+Gothic&display=swap');
    
    html{
      font-family: 'Nanum Gothic', sans-serif;
    }

    body{
      margin: 20px;
    }
    
    hr{
      height: 2px;
      border: none;
      background-color: rgb(221, 218, 218);
      margin-top: 5px;
    }

    li {
      list-style: none;
    }
  
    img {
      width: 200px;
      height: 200px;
    }
  
    /* .real-upload {
      display: none;
    } */

    
    /*.upload {
      width: 200px;
      height: 200px;
      background-color: antiquewhite;
    }*/

    .image-preview {
      width: 200px;
      height: 200px;
      display: flex;
    }

    /* 가게 이름 적는 곳 */
    #storename{
      height: 40px;
      width: 90%;
      justify-content: center;
      /* border:none; */
      font-size:1em;
      padding-left: 5px;
      border-radius: 5px;
      /* display:inline; */
      outline:none;
      box-sizing: border-box;
      color:black;
      border: 2px solid rgb(221, 218, 218);
      font-family: 'Nanum Gothic', sans-serif; 
    }
    /* 가게 위치 적는 곳 */
    #s_address, #de_address{
      height: 40px;
      width: 70%;
      justify-content: center;
      /* border:none; */
      font-size:1em;
      padding-left: 5px;
      border-radius: 5px;
      /* display:inline; */
      outline:none;
      box-sizing: border-box;
      color:black;
      border: 2px solid rgb(221, 218, 218);
      font-family: 'Nanum Gothic', sans-serif; 
    }

    input[type=text]::placeholder{
      font-family: 'Nanum Gothic', sans-serif; 
    }

    /* 가게 소개 */
    #store_info{
      font-family: 'Nanum Gothic', sans-serif; 
      height: 200px;
      width: 90%;
      font-size: 17px;
      padding: 5px;
      border-radius: 5px;
      display:inline;
      outline:none;
      box-sizing: border-box;
      color:black;
      border: 2px solid rgb(221, 218, 218);
    }

    #box1 { 
      /* border:solid; */
      /* border:none; */
      width: 80%; 
      height: 200px;
      border-radius: 5px;
      border: 2px solid rgb(221, 218, 218);
    }

    .box2 { border:solid; width: 100px; height: 30px;}

    /* 가게 이름 */
    #box4 { 
      margin-bottom: 30px; 
      padding: 20px #222
    }

    /* 가게 이미지 */
    #box5 { 
      /* border: 1px solid;  */
      margin-bottom: 30px;
      padding: 20px #222
    }

    /* 가게 소개 */
    #box6 { 
      /* border: 1px solid;  */
      margin-bottom: 10px; 
      padding: 20px #222
    }

    #box7 { 
      /* border:solid;  */
      width: 1000px; 
      height: 30px;
    }

    .cancle{
      font-family: 'Nanum Gothic', sans-serif; 
      padding: 12px;
      border-radius: 5px;
      background-color: #d2e2fe; 
      border: none;
      /* display:inline; */
    }
    .addressbtn{
      font-family: 'Nanum Gothic', sans-serif; 
      padding: 12px;
      border-radius: 5px;
      background-color: #637cb7; 
      border: none;
      margin-top: 10px;
      color: white;
      /* float: right; */
      /* margin-bottom: 10px; */
    }
    button[type=submit]{
      font-family: 'Nanum Gothic', sans-serif; 
      padding: 12px;
      border-radius: 5px;
      background-color: #d2e2fe; 
      border: none;
      display:inline;
    }

    .nameclass{
      text-align:center;
    }

    .box6class{
      text-align:center;
    }

    ul{
      margin-left: auto;
      margin-right: auto;
    }

    .select{
      justify-content: center;
      vertical-align:middle;
      display: inline;
      text-align:center;
      margin-left: 20px;
    }

    .select select{
      display: inline;
      justify-content: center;
      text-align:center;
      vertical-align:middle;
      width: 90%;
      border-radius: 5px;
      height: 40px; 
      border: 2px solid rgb(221, 218, 218);
      font-size: 17px;
      
    }
    .select option{
      vertical-align:middle;
      /* font-size: 17px; */
    }

    /* select:focus { 
      border-color: #aaa;
      box-shadow: 0 0 1px 3px rgba(59, 153, 252, .7);
      box-shadow: 0 0 0 3px -moz-mac-focusring;
      color: #222;
      outline: none;
    }*/

    

  </style>
</head>

<body>



  <h4>가게 등록하기</h4>

  <hr>

  <form action="insertDB.php" method="post" enctype="multipart/form-data">

    <div id = "box4">
      <h4>가게 이름</h4>
      <!-- <div style="float:left; margin-right:10px" class="box2" name='result'></div> -->
      <div class="nameclass">
        <input type="text" name='storename' id="storename" maxlength='20' placeholder="가게 이름을 적어주세요">
      </div>
      
      <!-- <button type="button">이름설정</button><br><br> -->
    </div>

    <h4>가게 카테고리</h4>
    <div class="select" >
      <select name='category'>
        <option value="음식점" selected>음식점</option>
        <option value="옷가게" selected>옷가게</option>
        <option value="잡화점" selected>잡화점</option>
        <option value="엔터테이먼트" selected>엔터테이먼트</option>
        <option value="건강시설" selected>건강시설</option>
      </select>
    </div>

    


    <div id = "box5">
      <h4>가게 이미지</h4>
      <input type="file" class="real-upload" accept="image/*" name="store_img">
      <div class="upload"></div>
      <ul id="box1" class="image-preview"></ul>
      </div>
      <!-- <br> -->
    </div>


    <div id = "box6">
      <h4>가게 소개</h4>
      <div class="box3" name='result2'> </div> 
      <!-- <br> -->
      <div class="box6class">
        <textarea name="content" id="store_info" rows="15" cols="33"></textarea>  <br><br>
      </div>
      
    </div>

    <h4>가게 위치</h4>
    <input type="hidden" id="s_latitude" name="latitude"/>
    <input type="hidden" id="s_longitude" name="longitude"/>
    <input type="text" id="s_address" name="address">
    <button class="addressbtn" type="button" onclick="excute_mappopup();">위치설정</button>
    <br>
    
    <p style="font-size:14px;">상세 주소</p>
    <input type="text" id="de_address" name="de_address">
    
    <br><br>

    <div style="text-align: center;">
      <button type="submit" id="submit">등록하기</button>
      <button class="cancle" type="button" id="cancel" onclick="history.back();">등록취소</button>
    </div>
    
  </form>

  <p id="target"></p>

  <!-- <input type="submit"><br> -->

  <script>
    var map_popup;
    var ad_cookie;
    var lat = document.getElementById('s_latitude');
    var lng = document.getElementById('s_longitude');
    var ad = document.getElementById('s_address')
    var submit, cancel;

    submit = document.getElementById('submit').addEventListener('click', function(){
      alert('가게 인증 등록이 완료되었습니다.');
      location.replace('../store_inf/store_inf.html');
    });

    cancel = document.getElementById('cancel').addEventListener('click', function(){
      history.back();
    })


    function excute_mappopup(){
      map_popup = window.open("map_regi.html", "위치설정");
    }

    function setChiledValue(latitude, longitude, address){
      lat.value = latitude;
      lng.value = longitude;
      ad.value = address;
      alert('latitude: ' + lat.value + 'longitude : ' + lng.value + 'address : ' + ad.value);
    }

    function getAddressCookie(){
      var cookieData = document.cookie.split('=');
      cValue = cookieData[1];
      return unescape(cValue);
    }

    function getImageFiles(e) {
      const uploadFiles = [];
      const files = e.currentTarget.files;
      const imagePreview = document.querySelector('.image-preview');
      const docFrag = new DocumentFragment();
        
        
      if ([...files].length >= 7) {
        alert('이미지는 최대 6개 까지 업로드가 가능합니다.');
        return
      }
  
      // 파일 타입 검사
      [...files].forEach(file => {
        if (!file.type.match("image/.*")) {
          alert('이미지 파일만 업로드가 가능합니다.');
          return
        }
  
          // 파일 갯수 검사
        if ([...files].length < 7) {
          uploadFiles.push(file);
          const reader = new FileReader();
          reader.onload = (e) => {
            const preview = createElement(e, file);
            imagePreview.appendChild(preview);
          };
          reader.readAsDataURL(file);
        }
      });
    }
  
    function createElement(e, file) {
      const li = document.createElement('li');
      const img = document.createElement('img');
      img.setAttribute('src', e.target.result);
      img.setAttribute('data-file', file.name);
      li.appendChild(img);

      return li;
    }
  
    const realUpload = document.querySelector('.real-upload');
    const upload = document.querySelector('.upload');

    upload.addEventListener('click', () => realUpload.click());

    realUpload.addEventListener('change', getImageFiles);

    function printName()  {
      const name = document.getElementById('storename').value;
      document.getElementById("result").innerText = name;
    }

  </script>
</body>
</html>