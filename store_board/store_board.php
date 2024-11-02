<!DOCTYPE html>
<html lang="ko">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width">
  <link href="bootstrap.min.css" rel="stylesheet">
  <link rel="stylesheet" href="https://use.fontawesome.com/releases/v6.2.0/css/all.css">
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.9.1/font/bootstrap-icons.css">
  
  
  <title>가게 게시글 내용</title>
 
</head>
<body>
    <?php
        include "session.php";
        include "dbconnect.php";
        // $con = mysqli_connect("localhost", "root", "", "project");      // DB 연결
        $user_id = $_SESSION['user_id'];
        $sql = "SELECT * FROM user WHERE user_id='$user_id'";
        $result = mysqli_query($conn, $sql);
        $row = mysqli_fetch_assoc($result);
        $user_img = $row['user_img'];
        $index1 = 1;
        $index2 = 1;
        $s_index = 1;
    ?>

  <header class="py-3 mb-3 border-bottom">
    <div class="container-fluid d-grid gap-3 align-items-center" style="grid-template-columns: 1fr 2fr 0.5fr;">
      <div style="padding-top: 12px">
        <a class="d-flex align-items-center mb-3 mb-md-0 me-md-auto text-dark text-decoration-none">
          <svg xmlns="http://www.w3.org/2000/svg" style="margin-right:8px" width="23" height="23" fill="currentColor" class="bi bi-shop" viewBox="0 0 16 16">
              <path d="M2.97 1.35A1 1 0 0 1 3.73 1h8.54a1 1 0 0 1 .76.35l2.609 3.044A1.5 1.5 0 0 1 16 5.37v.255a2.375 2.375 0 0 1-4.25 1.458A2.371 2.371 0 0 1 9.875 8 2.37 2.37 0 0 1 8 7.083 2.37 2.37 0 0 1 6.125 8a2.37 2.37 0 0 1-1.875-.917A2.375 2.375 0 0 1 0 5.625V5.37a1.5 1.5 0 0 1 .361-.976l2.61-3.045zm1.78 4.275a1.375 1.375 0 0 0 2.75 0 .5.5 0 0 1 1 0 1.375 1.375 0 0 0 2.75 0 .5.5 0 0 1 1 0 1.375 1.375 0 1 0 2.75 0V5.37a.5.5 0 0 0-.12-.325L12.27 2H3.73L1.12 5.045A.5.5 0 0 0 1 5.37v.255a1.375 1.375 0 0 0 2.75 0 .5.5 0 0 1 1 0zM1.5 8.5A.5.5 0 0 1 2 9v6h1v-5a1 1 0 0 1 1-1h3a1 1 0 0 1 1 1v5h6V9a.5.5 0 0 1 1 0v6h.5a.5.5 0 0 1 0 1H.5a.5.5 0 0 1 0-1H1V9a.5.5 0 0 1 .5-.5zM4 15h3v-5H4v5zm5-5a1 1 0 0 1 1-1h2a1 1 0 0 1 1 1v3a1 1 0 0 1-1 1h-2a1 1 0 0 1-1-1v-3zm3 0h-2v3h2v-3z"/>
            </svg>
          <span style="font-size: 15px;">Business Friends</span>
        </a>
      </div>

  <div class="d-flex align-items-center">
     <form action="store_board_search.php"  class="w-100 me-3"  method="get" role="search">
            <input type="search" class="form-control" placeholder="Search..." aria-label="Search" name="search1">
        </form>

      <div class="flex-shrink-0 dropdown">
          <a href="#" class="d-block link-dark text-decoration-none dropdown-toggle" data-bs-toggle="dropdown" aria-expanded="false" style="padding-left:5px;">
            <img src=<?=$user_img?> alt="mdo" width="32" height="32" class="rounded-circle">
          </a>
          <ul class="dropdown-menu text-small shadow">
            <li><a class="dropdown-item" href="#">New project...</a></li>
            <li><a class="dropdown-item" href="#">Settings</a></li>
            <li><a class="dropdown-item" href="#">Profile</a></li>
            <li><hr class="dropdown-divider"></li>
            <li><a class="dropdown-item" href="#">Sign out</a></li>
          </ul>
      </div>
     
        <!-- <button onclick="location.replace('form.php');">게시글 등록</button> -->
      </div>

         <?php
          if(!empty($_SESSION['store_id'])){
            echo("<a href=\"form.php\" class=\"btn btn-secondary my-2\">작성</a>");
          }
        ?>
      <!-- <button onclick=\"location.replace('form.php');\">작성</button> -->

  </div>
  </header>


  <div style="padding-bottom: 10px; padding-left: 5px;">
  <?php    
    $sql = "select * from store_board LEFT JOIN store on store.store_id = store_board.id where regist_day > '2020-11-01 (12:00)' order by num desc";       // 유저 이름 검색
    $result = mysqli_query($conn, $sql);         // SQL 명령 실행
    


    $total_record = mysqli_num_rows($result); // 전체 글 수
    $number = $total_record;            // 글 번호 매김

    while($row = mysqli_fetch_assoc($result)){
      $file_name    = $row["file_name"]; // 여러개 파일경로 받기      
    
      $name        = $row["store_name"];  //가게이름
      $regist_day  = $row["regist_day"];    // 작성일
      $src         = $row["store_img"];   // 가게사진
      $num         = $row["num"];             // 일련번호
      $id            = $row["id"];             // 아이디
      $subject     = $row["subject"];       // 글제목
      $content       = $row["content"];         // 글내용

      $files_tmp = explode('|', $file_name); 

  ?>
    <img src=<?=$src?> alt="mdo" width="32" height="32" class="rounded-circle">
    <span style="color: gray;"><strong><?=$name?></strong></span>
    <span style="color: gray;">ㆍ<?=$regist_day?></span>
  </div>

 
  
  <!-- <div class="slider"> -->
       <?php
          echo("<div class='slider'>");
          for($i = 1; $i < count($files_tmp); $i++){
            $file_tmp = $files_tmp[$i];
            if($i === 1){
              echo("<input type='radio' name='slide$s_index' id='slide$index1' checked='checked'> ");
            }else{
              echo("<input type='radio' name='slide$s_index' id='slide$index1'> ");
            }
            $index1++;
          }
        ?>

    <!-- <ul id="imgholder" class="imgs"> -->
        <?php
          echo("<ul id=\"imgholder$s_index\" class=\"imgs\">");
        //게시 사진 출력
          for($i = 1; $i < count($files_tmp); $i++){
            $file_tmp = $files_tmp[$i];
            echo("<li><img src=$file_tmp width='400px' height='400px'></li>");
          }
          echo('</ul>');
          $s_index++;
        ?>
        
    <!-- </ul>
    <div class="bullets"> -->
        <?php
        echo('<div class="bullets">');
        // 이미지 이동 버튼생성
          for($i = 1; $i < count($files_tmp); $i++){
            $file_tmp = $files_tmp[$i];
            echo("<label for='slide$index2'>&nbsp;</label>");
            $index2++;
          }
          echo('</div></div>');
        ?>
        <!-- <label for="slide1">&nbsp;</label>
        <label for="slide2">&nbsp;</label>
        <label for="slide3">&nbsp;</label>
        <label for="slide4">&nbsp;</label> -->
    <!-- </div>
</div> -->

  <div>
  <img src="./data/emptyheart.png" height="40px" style="padding-left:10px; padding-top:10px;">

  <img src="./data/comment.png" height="40px" style="padding-left:3px; padding-top:10px;">
  
  </div>

  </div>

  <div style="padding-left:10px; padding-top:30px;">
      <?=$content?><br><br>

   </div>

  <div class="flex-shrink-0 dropdown" style="padding-left:10px; padding-top:30px;">
   <div class="comment_list" style="list-style:none;">
            
        </div>
      

      
      <section class="feed_desc_wrap">
                            
        
    </section>

    <hr>
   <section class="post_comment_wrap" style="padding-bottom: 100px;">
    
    <img src=<?=$user_img?> alt="mdo" width="30" height="30" class="rounded-circle">
    <input id="post_comment_input" type="text" placeholder="댓글 달기..." style="border:none; outline: 0;" />
    <button class="post_comment_btn" style="background-color:rgba(0,0,0,0); color:rgb(31, 177, 221); border:none; padding-left: 13em;">게시</button>
    
    <hr>
  
  </section>
    
  </div>
 


  </div>
 
 
  <hr>
  
  <?php
    $number--;
    }
    mysqli_close($conn);               
  ?>

   <hr>

<div class="container">
  <header class="d-flex flex-wrap justify-content-center py-3 mb-4 border-bottom">
    <!-- <a class="d-flex align-items-center mb-3 mb-md-0 me-md-auto text-dark text-decoration-none">
      <svg xmlns="http://www.w3.org/2000/svg" style="margin-right:8px" width="23" height="23" fill="currentColor" class="bi bi-shop" viewBox="0 0 16 16">
          <path d="M2.97 1.35A1 1 0 0 1 3.73 1h8.54a1 1 0 0 1 .76.35l2.609 3.044A1.5 1.5 0 0 1 16 5.37v.255a2.375 2.375 0 0 1-4.25 1.458A2.371 2.371 0 0 1 9.875 8 2.37 2.37 0 0 1 8 7.083 2.37 2.37 0 0 1 6.125 8a2.37 2.37 0 0 1-1.875-.917A2.375 2.375 0 0 1 0 5.625V5.37a1.5 1.5 0 0 1 .361-.976l2.61-3.045zm1.78 4.275a1.375 1.375 0 0 0 2.75 0 .5.5 0 0 1 1 0 1.375 1.375 0 0 0 2.75 0 .5.5 0 0 1 1 0 1.375 1.375 0 1 0 2.75 0V5.37a.5.5 0 0 0-.12-.325L12.27 2H3.73L1.12 5.045A.5.5 0 0 0 1 5.37v.255a1.375 1.375 0 0 0 2.75 0 .5.5 0 0 1 1 0zM1.5 8.5A.5.5 0 0 1 2 9v6h1v-5a1 1 0 0 1 1-1h3a1 1 0 0 1 1 1v5h6V9a.5.5 0 0 1 1 0v6h.5a.5.5 0 0 1 0 1H.5a.5.5 0 0 1 0-1H1V9a.5.5 0 0 1 .5-.5zM4 15h3v-5H4v5zm5-5a1 1 0 0 1 1-1h2a1 1 0 0 1 1 1v3a1 1 0 0 1-1 1h-2a1 1 0 0 1-1-1v-3zm3 0h-2v3h2v-3z"/>
        </svg>
      <span class="fs-4" style="padding: 8px;">Business Friends</span>
    </a>-->
    <ul class="nav nav-pills">
      <li class="nav-item"><a href="../main/home.php" class="bi bi-house-door fa-2x" style="color: gray; padding: 8px 16px;" ></a></li>
      <li class="nav-item"><a href="../main/store_list.php" class="bi bi-shop-window fa-2x" style="color: gray; padding: 8px 16px;"></a></li>
      <li class="nav-item"><a href="" class="bi bi-card-checklist fa-2x" style="color: gray; padding: 8px 16px;"></a></li>
      <li class="nav-item"><a href="../main/information.php" class="bi bi-person-badge-fill fa-2x" style="color: gray; padding: 8px 16px;"></></a></li>
    </ul>
  </header>
</div>

<div class="footer">
  <a href="http://faceboo.com">
      <img src="https://bakey-api.codeit.kr/files/629/images/facebook.png" height="20">
  </a>
  <a href="http://faceboo.com">
      <img src="https://bakey-api.codeit.kr/files/629/images/instagram.png" height="20">
  </a>
  <a href="http://faceboo.com">
      <img src="https://bakey-api.codeit.kr/files/629/images/twitter.png" height="20">
  </a>
</div>

 <style>

    @import url('https://fonts.googleapis.com/css2?family=Nanum+Gothic&display=swap');

    html{
      font-family: 'Nanum Gothic', sans-serif;
    }

    body {
      justify-content: center;
      background-color: white;
    }

    hr{
      height: 1px;
      border: none;
      background-color: gray;  
    }
    

    .slider{
    width: 400px;
    height: 400px;
    position: relative;
    margin: 0 auto;
    overflow: hidden; /* 현재 슬라이드 오른쪽에 위치한 나머지 슬라이드 들이 보이지 않도록 가림 */
}
.slider input[type=radio]{
    display: none;
}

.container{
  position: fixed;
  bottom: -30px;
  width: 100%;
  background-color: white;
  z-index: 2;
}



ul.imgs{
    padding: 0;
    margin: 0;
    list-style: none;    
}
ul.imgs li{
    position: absolute;
    left: 640px;
    transition-delay: 0.5s; /* 새 슬라이드가 이동해 오는 동안 이전 슬라이드 이미지가 배경이 보이도록 지연 */

    padding: 0;
    margin: 0;
}


.bullets{
    position: absolute;
    left: 50%;
    transform: translateX(-50%);
    bottom: 20px;
    z-index: 2;
}
.bullets label{
    display: inline-block;
    border-radius: 50%;
    background-color: rgba(0,0,0,0.55);
    width: 15px;
    height: 15px;
    cursor: pointer;
}
/* 현재 선택된 불릿 배경 흰색으로 구분 표시 */
.slider input[type=radio]:nth-child(1):checked~.bullets>label:nth-child(1){
    background-color: #fff;
}
.slider input[type=radio]:nth-child(2):checked~.bullets>label:nth-child(2){
    background-color: #fff;
}
.slider input[type=radio]:nth-child(3):checked~.bullets>label:nth-child(3){
    background-color: #fff;
}
.slider input[type=radio]:nth-child(4):checked~.bullets>label:nth-child(4){
    background-color: #fff;
}



.slider input[type=radio]:nth-child(1):checked~ul.imgs>li:nth-child(1){
    left: 0;
    transition: 0.5s;
    z-index:1;
}
.slider input[type=radio]:nth-child(2):checked~ul.imgs>li:nth-child(2){
    left: 0;
    transition: 0.5s;
    z-index:1;
}
.slider input[type=radio]:nth-child(3):checked~ul.imgs>li:nth-child(3){
    left: 0;
    transition: 0.5s;
    z-index:1;
}
.slider input[type=radio]:nth-child(4):checked~ul.imgs>li:nth-child(4){
    left: 0;
    transition: 0.5s;
    z-index:1;
}




.footer{
  
  margin-top: 40px;
  margin-bottom: 40px;
  justify-content: center!important;
  display: flex!important;

}

.footer a{
    margin-left: 10px;
    margin-right: 10px;
    text-decoration:none;
}

  </style>

<script src="bootstrap.bundle.min.js"></script>

<script>
const postCommentInFeed = () => {
  const commentInput = document.getElementById('post_comment_input');
  const commentPostBtn = document.getElementsByClassName('post_comment_btn')[0];

  // 댓글 입력시 요소 생성
  const addNewComment = () => {
    const newCommentLocation = document.getElementsByClassName('comment_list')[0];
    const newComment = document.createElement('li');

    newComment.innerHTML = `
      <div class="user_desc">
        <em>iAmUser</em>
        <span>${commentInput.value}</span>
      </div>
    `;

    newCommentLocation.appendChild(newComment);
    commentInput.value = '';
  }


  // 사용자 입력 들어올 시, 게시 버튼 활성화
  commentInput.addEventListener('keyup', () => {
    commentInput.value ? commentPostBtn.style.opacity = '1' : commentPostBtn.style.opacity = '.3';
    if (window.event.keyCode === 13 && commentInput.value) {
      addNewComment();
    }
  });

  // 댓글 게시
  commentPostBtn.addEventListener('click', () => {
    if (commentInput.value) {
      addNewComment();
    } else {
      alert('댓글이 입력되지 않았습니다 😳');
    }
  })
}


postCommentInFeed();

    
  </script>

</body>
</html>