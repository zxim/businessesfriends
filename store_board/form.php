<?php
		include "session.php"; 	// 세션 처리
?>
<!DOCTYPE html>
<html lang="ko">
  <head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width">
    <link rel="stylesheet" href="test123.css">

    <title>게시글 올리는 폼</title>

    <style>

      @import url('https://fonts.googleapis.com/css2?family=Nanum+Gothic&display=swap');

      *{
        font-family: 'Nanum Gothic', sans-serif;
      }

      .bt{
        background-color: gray;
        width: 100px;
        height: 35px;
        border-radius : 50px 50px 50px 50px;
        border: 0;
        float: right;
        margin-top: 10px;
      }

      hr{
        height: 1px;
        border: none;
        background-color: rgb(221, 218, 218);
      }

      img{
        height: 40px;
        width: 40px;
        margin-top: 15px;
        margin-bottom: 10px;
        margin-left: 10px;
        margin-right: 5px;
        border-radius: 70%;
        vertical-align:middle;
        overflow: hidden;
        object-fit: cover;
      }

      .text{
        margin-top: 5px;
        text-align:center;
      }

      textarea{
        font-size: 1.1em;
        width: 400px;
        height: 100px;
        border: 1px solid rgb(221, 218, 218);
        resize: none;
        border-radius: 5px;
        box-shadow: 0 1px 3px rgba(0,0,0,0.12), 0 1px 2px rgba(0,0,0,0.24);
      }

    


    </style>
  </head>

  <body>
    <?php
      include "dbconnect.php";
      // $conn = mysqli_connect('localhost', 'root', '', 'project');
      if(!empty($_SESSION['store_id']))
      {
        $store_id = $_SESSION['store_id'];
      }else{ // 가게 등록이 안되어 있는경우
        echo("<script>alert('먼저 가게 등록을 해야합니다.');location.replace('store_board.php');</script>");
      }
      $sql = "SELECT * FROM store WHERE store_id=$store_id";
      $result = mysqli_query($conn, $sql);
      $row = mysqli_fetch_array($result);
      $store_img = $row['store_img'];

    ?>
  <form name="board" method="post" action="insert.php" enctype="multipart/form-data">

    <h4 style="margin-left: 10px;">글쓰기</h4>
    
    <hr>

    <input type="submit" value="올리기" class="bt">

    <div class="imgs">
      <img src=<?=$store_img?> style="vertical-align:middle;">
      <span><strong><?=$username?></strong></span>
    </div>


    <div class="wrapper">
    
    


      <div class="box">
        <div class="js--image-preview"></div>
        <div class="upload-options">
          <label>
          <span><input type="file" name="upfile[]" accept="image/*" multiple="multiple" /></span>
          </label>
        </div>
      </div>





    <div class="text">
      <textarea name="content" placeholder="내용을 입력해주세요"></textarea>
    </div>

    </form>
    <button type='button' onclick="location.replace('store_board.php');">취소하기</button>
  </body>


  <script>
    function initImageUpload(box) {
      // let uploadField = box.querySelector('.image-upload');
    
      // uploadField.addEventListener('change', getFile);
    
      function getFile(e){
        let file = e.currentTarget.files[0];
        checkType(file);
      }
      
      function previewImage(file){
        let thumb = box.querySelector('.js--image-preview'),
            reader = new FileReader();
    
        reader.onload = function() {
          thumb.style.backgroundImage = 'url(' + reader.result + ')';
        }
        reader.readAsDataURL(file);
        thumb.className += ' js--no-default';
      }
    
      function checkType(file){
        let imageType = /image.*/;
        if (!file.type.match(imageType)) {
          throw 'Datei ist kein Bild';
        } else if (!file){
          throw 'Kein Bild gewählt';
        } else {
          previewImage(file);
        }
      }
      
    }
    
    // initialize box-scope
    var boxes = document.querySelectorAll('.box');
    
    for (let i = 0; i < boxes.length; i++) {
      let box = boxes[i];
      initDropEffect(box);
      initImageUpload(box);
    }
    
    
    
    /// drop-effect
    function initDropEffect(box){
      let area, drop, areaWidth, areaHeight, maxDistance, dropWidth, dropHeight, x, y;
      
      // get clickable area for drop effect
      area = box.querySelector('.js--image-preview');
      area.addEventListener('click', fireRipple);
      
      function fireRipple(e){
        area = e.currentTarget
        // create drop
        if(!drop){
          drop = document.createElement('span');
          drop.className = 'drop';
          this.appendChild(drop);
        }
        // reset animate class
        drop.className = 'drop';
        
        // calculate dimensions of area (longest side)
        areaWidth = getComputedStyle(this, null).getPropertyValue("width");
        areaHeight = getComputedStyle(this, null).getPropertyValue("height");
        maxDistance = Math.max(parseInt(areaWidth, 10), parseInt(areaHeight, 10));
    
        // set drop dimensions to fill area
        drop.style.width = maxDistance + 'px';
        drop.style.height = maxDistance + 'px';
        
        // calculate dimensions of drop
        dropWidth = getComputedStyle(this, null).getPropertyValue("width");
        dropHeight = getComputedStyle(this, null).getPropertyValue("height");
        
        // calculate relative coordinates of click
        // logic: click coordinates relative to page - parent's position relative to page - half of self height/width to make it controllable from the center
        x = e.pageX - this.offsetLeft - (parseInt(dropWidth, 10)/2);
        y = e.pageY - this.offsetTop - (parseInt(dropHeight, 10)/2) - 30;
        
        // position drop and animate
        drop.style.top = y + 'px';
        drop.style.left = x + 'px';
        drop.className += ' animate';
        e.stopPropagation();
        
      }
    }
    
    
        
    </script>


</html>