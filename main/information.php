<!DOCTYPE html>
<html lang="ko">
  <head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v6.2.0/css/all.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.9.1/font/bootstrap-icons.css">
    <link href="bootstrap.min.css" rel="stylesheet">
    
    <title>유저페이지</title>

    <style>

      @import url('https://fonts.googleapis.com/css2?family=Nanum+Gothic&display=swap');

      html{
        font-family: 'Nanum Gothic', sans-serif;
      }
     
      a{
        text-decoration: none;
        color: black;
        color:gray;
      }

      a:active{
        color:none;
        text-decoration: none;
      }

      hr{
        height: 2px;
        border: none;
        background-color: rgb(221, 218, 218);
        margin-top: 5px;
      }

     

      .menu{
        list-style-position: inside;
        list-style: none;
        display: block;
      }

      .list{

        margin-bottom: 50px;
        
      }

      .container{
  position: fixed;
  bottom: -30px;
  width: 100%;
  background-color: white;
  z-index: 2;
}



    </style>
  </head>
  <?php
      include "dbconnect.php";
      session_start();
      $name = $_SESSION['user_name'];
      $user_id = $_SESSION['user_id'];
      $user_type = $_SESSION['user_type'];
      $etc = "기타";
      
      // $conn = mysqli_connect('localhost', 'root', '', 'project');
      $sql = "SELECT * FROM user WHERE user_id='$user_id'";
      $result = mysqli_query($conn, $sql);
      $row = mysqli_fetch_assoc($result);
      $user_profile = $row['user_img'];


      // 가게 사용자인 경우
      if($user_type != 1){
        $title = "내 가게 쿠폰 관리";
        $menu1 = '<li class="list"><img src="/project/main/icon/couponimg.png" height="33px" alt="" style="padding-left: 20px"><a href="../store_regi/cupon_regist.php" style="font-size:18px;">&nbsp;&nbsp;가게 쿠폰 등록하기</a></li>';
        $menu2 = '<li class="list"><img src="/project/main/icon/upload.png" height="33px" alt="" style="padding-left: 20px"><a href="../store_regi/store_regi.php" style="font-size:18px;">&nbsp;&nbsp;가게 등록하기</a></li>';
        $menu3 = '<li class="list"><img src="/project/main/icon/logout.png" height="37px" alt="" style="padding-left: 20px"><a href="../login/index.html" style="font-size:18px;">&nbsp;&nbsp;로그아웃</a></li>';
      }else{
        $title = "내 쿠폰 관리";
        $menu1 = '<li class="list"><img src="/project/main/icon/couponimg.png" height="35px" alt="" style="padding-left: 20px"><a href="my_cupon.php" style="font-size:15px; padding-left: 20px;">&nbsp;&nbsp;내가 받은 쿠폰</a></li>';
        $menu2 = '<li class="list"><img src="/project/main/icon/upload.png" height="37px" alt="" style="padding-left: 20px"><a href="attend_cupon.php" style="font-size:15px;">&nbsp;&nbsp;내가 받은 출석쿠폰</a></li>';
        $menu3 = '<li class="list"><img src="/project/main/icon/logout.png" height="37px" alt="" style="padding-left: 20px"><a href="../login/index.html" style="font-size:18px;">로그아웃</a></li>';
      }

    ?>
    

  <body> 
  <header class="py-3 mb-3 border-bottom">
      <div class="container-fluid d-grid gap-3 align-items-center" style="grid-template-columns: 1fr 2fr;">
        <div style="padding-top: 12px">
          <a class="d-flex align-items-center mb-3 mb-md-0 me-md-auto text-dark text-decoration-none">
            <svg xmlns="http://www.w3.org/2000/svg" style="margin-right:8px" width="23" height="23" fill="currentColor" class="bi bi-shop" viewBox="0 0 16 16">
                <path d="M2.97 1.35A1 1 0 0 1 3.73 1h8.54a1 1 0 0 1 .76.35l2.609 3.044A1.5 1.5 0 0 1 16 5.37v.255a2.375 2.375 0 0 1-4.25 1.458A2.371 2.371 0 0 1 9.875 8 2.37 2.37 0 0 1 8 7.083 2.37 2.37 0 0 1 6.125 8a2.37 2.37 0 0 1-1.875-.917A2.375 2.375 0 0 1 0 5.625V5.37a1.5 1.5 0 0 1 .361-.976l2.61-3.045zm1.78 4.275a1.375 1.375 0 0 0 2.75 0 .5.5 0 0 1 1 0 1.375 1.375 0 0 0 2.75 0 .5.5 0 0 1 1 0 1.375 1.375 0 1 0 2.75 0V5.37a.5.5 0 0 0-.12-.325L12.27 2H3.73L1.12 5.045A.5.5 0 0 0 1 5.37v.255a1.375 1.375 0 0 0 2.75 0 .5.5 0 0 1 1 0zM1.5 8.5A.5.5 0 0 1 2 9v6h1v-5a1 1 0 0 1 1-1h3a1 1 0 0 1 1 1v5h6V9a.5.5 0 0 1 1 0v6h.5a.5.5 0 0 1 0 1H.5a.5.5 0 0 1 0-1H1V9a.5.5 0 0 1 .5-.5zM4 15h3v-5H4v5zm5-5a1 1 0 0 1 1-1h2a1 1 0 0 1 1 1v3a1 1 0 0 1-1 1h-2a1 1 0 0 1-1-1v-3zm3 0h-2v3h2v-3z"/>
              </svg>
            <span style="font-size: 15px;">Business Friends</span>
          </a>
        </div>
  
        <div class="d-flex align-items-center">
          <form class="w-100 me-3" role="search">
            <input type="search" class="form-control" placeholder="Search..." aria-label="Search">
          </form>
  
          <div class="flex-shrink-0 dropdown">
            <a href="#" class="d-block link-dark text-decoration-none dropdown-toggle" data-bs-toggle="dropdown" aria-expanded="false">
              <img src=<?=$user_profile?> alt="mdo" width="32" height="32" class="rounded-circle">
            </a>
            <ul class="dropdown-menu text-small shadow">
              <li><a class="dropdown-item" href="#">New project...</a></li>
              <li><a class="dropdown-item" href="#">Settings</a></li>
              <li><a class="dropdown-item" href="#">Profile</a></li>
              <li><hr class="dropdown-divider"></li>
              <li><a class="dropdown-item" href="#">Sign out</a></li>
            </ul>
          </div>
        </div>
      </div>
    </header>
    
    
   
    <div class="userpage">
    
    <div style="padding-left: 20px">
    <img src=<?=$user_profile?> alt="mdo" width="32" height="32" class="rounded-circle"><h7 style="padding-left: 10px; color:gray;"><?=$user_id?></h7>
    </div>
      <!-- 유저 아이디 -->
      

      <hr>

      <!-- 메뉴 -->
      <ul class="menu" style="padding: 0px; color:gray;">

        <!-- 사용자가 받은 쿠폰이랑 출석체크 보는 곳-->
        <h4 style="padding-left: 20px"><?=$title?></h4>
        <br>
        <!-- <li><img src="../images/couponimg.png" height="35px" alt=""><a href="my_cupon.php" style="font-size:15px">&nbsp;&nbsp;내가 받은 쿠폰</a></li>
        <li><img src="../images/check2.png" height="37px" alt=""><a href="attend_cupon.html" style="font-size:15px">&nbsp;&nbsp;내가 받은 출석쿠폰</a></li> -->
        <?=$menu1?>
        <?=$menu2?>
        

        <!-- 가게 주인 인증하는 곳 -->
        <!-- <h4>가게 주인</h4>
        <li><img src="../images/certification.png" height="33px" alt=""><a href="#" style="font-size:15px">&nbsp;&nbsp;가게 주인 인증하기</a></li> -->

        
        <!-- 로그아웃하는 곳 -->
        <h4 style="padding-left: 20px"><?=$etc?></h4>
        <br>
        <?=$menu3?>
        <!-- <li><img src="../images/logout.png" height="33px" alt=""><a href="#" style="font-size:15px">&nbsp;&nbsp;로그아웃</a></li> -->

      </ul>

    </div> 


      <hr>

      <div class="container">
  <header class="d-flex flex-wrap justify-content-center py-3 mb-4 border-bottom">
    <ul class="nav nav-pills">
      <li class="nav-item"><a href="../main/home.php" class="bi bi-house-door fa-2x" style="color: gray; padding: 8px 16px;" ></a></li>
      <li class="nav-item"><a href="../main/store_list.php" class="bi bi-shop-window fa-2x" style="color: gray; padding: 8px 16px;"></a></li>
      <li class="nav-item"><a href="../store_board/store_board.php" class="bi bi-card-checklist fa-2x" style="color: gray; padding: 8px 16px;"></a></li>
      <li class="nav-item"><a class="bi bi-person-badge-fill fa-2x" style="color: gray; padding: 8px 16px;"></></a></li>
    </ul>
  </header>
</div>



  </body>
</html>