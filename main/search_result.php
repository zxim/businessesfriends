<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="Mark Otto, Jacob Thornton, and Bootstrap contributors">
    <meta name="generator" content="Hugo 0.104.2">
    <title>Album example · Bootstrap v5.2</title>

    <link rel="canonical" href="https://getbootstrap.com/docs/5.2/examples/album/">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.9.1/font/bootstrap-icons.css">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v6.2.0/css/all.css">
    

    

<link href="bootstrap.min.css" rel="stylesheet">

    <style>
      .bd-placeholder-img {
        font-size: 1.125rem;
        text-anchor: middle;
        -webkit-user-select: none;
        -moz-user-select: none;
        user-select: none;
      }

      @media (min-width: 768px) {
        .bd-placeholder-img-lg {
          font-size: 3.5rem;
        }
      }

      .b-example-divider {
        height: 3rem;
        background-color: rgba(0, 0, 0, .1);
        border: solid rgba(0, 0, 0, .15);
        border-width: 1px 0;
        box-shadow: inset 0 .5em 1.5em rgba(0, 0, 0, .1), inset 0 .125em .5em rgba(0, 0, 0, .15);
      }

      .b-example-vr {
        flex-shrink: 0;
        width: 1.5rem;
        height: 100vh;
      }

      .bi {
        vertical-align: -.125em;
        fill: currentColor;
      }

      .nav-scroller {
        position: relative;
        z-index: 2;
        height: 2.75rem;
        overflow-y: hidden;
      }

      .nav-scroller .nav {
        display: flex;
        flex-wrap: nowrap;
        padding-bottom: 1rem;
        margin-top: -1px;
        overflow-x: auto;
        text-align: center;
        white-space: nowrap;
        -webkit-overflow-scrolling: touch;
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

.containers{
  position: fixed;
  bottom: -30px;
  width: 100%;
  background-color: white;
}

    </style>

    
  </head>
  <body>
    <?php
      include "dbconnect.php";
      session_start();
      $user_id = $_SESSION['user_id'];
      // $conn = mysqli_connect("localhost", "root", "", "project");      // DB 연결
      // 사용자 확인 후 사용자 프로필사진 가져오기
      $select_sql = "SELECT * FROM user WHERE user_id='$user_id'";
      $result = mysqli_query($conn, $select_sql);
      $row = mysqli_fetch_assoc($result);
      $user_profile = $row['user_img'];      
    ?>

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
          <form action="/project/main/search_result.php" class="w-100 me-3" method="get" role="search">
            <input type="search" class="form-control" placeholder="Search..." aria-label="Search"  name="search1">
          </form>

  
          <div class="flex-shrink-0 dropdown">
            <a href="#" class="d-block link-dark text-decoration-none dropdown-toggle" data-bs-toggle="dropdown" aria-expanded="false" style="padding-left:5px;">
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

<main>

  <section class="py-5 text-center container">
    <div class="row py-lg-5">
      <div class="col-lg-6 col-md-8 mx-auto">
        <h1 class="fw-light">가게 리스트</h1>
        <p class="lead text-muted">안녕하세요 가게리스트 입니다.</p>
        <p>
          <a href="#" class="btn btn-secondary my-2">음식점</a>
          <a href="#" class="btn btn-secondary my-2">옷가게</a>
          <a href="#" class="btn btn-secondary my-2">잡화점</a>
          <a href="#" class="btn btn-secondary my-2">엔터테이먼트</a>
          <a href="#" class="btn btn-secondary my-2">건강시설</a>
        </p>
      </div>
    </div>
  </section>
 

  <div class="album py-5 bg-light">
    <div class="container">

      <div class="row row-cols-1 row-cols-sm-2 row-cols-md-3 g-3">
        <!-- <div class="col"> -->
        <?php
         $search1 = $_GET['search1'];
                  
         if(!empty($search1[0])) {
       
           $sql1 = "SELECT * FROM store WHERE store_name LIKE '%$search1%' ORDER BY store_id DESC";
           $result1 = mysqli_query($conn,$sql1);
           $row = mysqli_fetch_assoc($result1);                
                          
         }
         else{
           $sql1 = "SELECT * FROM store";
       
           $result1 = mysqli_query($conn,$sql1);
       
           $row = mysqli_fetch_assoc($result1);
           
         }
        $sql = "select * from store order by store_id desc";   // 일련번호 내림차순 검색
        $result = mysqli_query($conn, $sql);         // SQL 명령 실행

        $total_record = mysqli_num_rows($result1); // 전체 글 수

                    $number = $total_record;            // 글 번호 매김
                        for ($i=0; $i<$total_record; $i++) {
                            mysqli_data_seek($result1, $i);       // 가져올 레코드로 위치(포인터) 이동         
                            $row = mysqli_fetch_assoc($result1); // 하나의 레코드 가져오기
                            $src         = $row["store_img"];     // 가게사진
                            $num         = $row["store_id"];       // 일련번호
                            $name        = $row["store_name"];      // 가게이름
                            $text        = $row["store_info"];      // 가게설명
        ?>
        
          <div class="col">
          <span class="card shadow-sm">
            <img src="<?=$src?>" width="100%" height="300px">

            <div class="card-body">
                
              <h2><?=$name?></h2>
              <p class="card-text"><?=$text?></p>
              <div class="d-flex justify-content-between align-items-center">
                <div class="btn-group">
                  <button type="button" class="btn btn-sm btn-outline-secondary" onclick="location.replace('store_inf2.php?store_id=<?=$num?>')">가게 정보</button>
                  <!-- <button type="button" class="btn btn-sm btn-outline-secondary">쿠폰</button> -->
                </div>
                <!-- <small class="text-muted">9 mins</small> -->
              </div>
            </div>
                </span>
        </div>

            <?php
                    $number--;
                    }
                    mysqli_close($conn);               
            ?>
        
            
          </div>
        </div>
      </div>
    </div>
  </div>

<hr>

  <div class="containers">
    <header class="d-flex flex-wrap justify-content-center py-3 mb-4 border-bottom">
      <!-- <a class="d-flex align-items-center mb-3 mb-md-0 me-md-auto text-dark text-decoration-none">
        <svg xmlns="http://www.w3.org/2000/svg" style="margin-right:8px" width="23" height="23" fill="currentColor" class="bi bi-shop" viewBox="0 0 16 16">
            <path d="M2.97 1.35A1 1 0 0 1 3.73 1h8.54a1 1 0 0 1 .76.35l2.609 3.044A1.5 1.5 0 0 1 16 5.37v.255a2.375 2.375 0 0 1-4.25 1.458A2.371 2.371 0 0 1 9.875 8 2.37 2.37 0 0 1 8 7.083 2.37 2.37 0 0 1 6.125 8a2.37 2.37 0 0 1-1.875-.917A2.375 2.375 0 0 1 0 5.625V5.37a1.5 1.5 0 0 1 .361-.976l2.61-3.045zm1.78 4.275a1.375 1.375 0 0 0 2.75 0 .5.5 0 0 1 1 0 1.375 1.375 0 0 0 2.75 0 .5.5 0 0 1 1 0 1.375 1.375 0 1 0 2.75 0V5.37a.5.5 0 0 0-.12-.325L12.27 2H3.73L1.12 5.045A.5.5 0 0 0 1 5.37v.255a1.375 1.375 0 0 0 2.75 0 .5.5 0 0 1 1 0zM1.5 8.5A.5.5 0 0 1 2 9v6h1v-5a1 1 0 0 1 1-1h3a1 1 0 0 1 1 1v5h6V9a.5.5 0 0 1 1 0v6h.5a.5.5 0 0 1 0 1H.5a.5.5 0 0 1 0-1H1V9a.5.5 0 0 1 .5-.5zM4 15h3v-5H4v5zm5-5a1 1 0 0 1 1-1h2a1 1 0 0 1 1 1v3a1 1 0 0 1-1 1h-2a1 1 0 0 1-1-1v-3zm3 0h-2v3h2v-3z"/>
          </svg>
        <span class="fs-4" style="padding: 8px;">Business Friends</span>
      </a> -->
      <ul class="nav nav-pills">
        <li class="nav-item"><a href="home.php" class="bi bi-house-door fa-2x" style="color: gray; padding: 8px 16px;" ></a></li>
        <li class="nav-item"><a class="bi bi-shop-window fa-2x" style="color: gray; padding: 8px 16px;"></a></li>
        <li class="nav-item"><a href="../store_board/store_board.php" class="bi bi-card-checklist fa-2x" style="color: gray; padding: 8px 16px;"></a></li>
        <li class="nav-item"><a href="information.php" class="bi bi-person-badge-fill fa-2x" style="color: gray; padding: 8px 16px;"></></a></li>
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

</main>

    <script src="../assets/dist/js/bootstrap.bundle.min.js"></script>

      
  </body>
</html>