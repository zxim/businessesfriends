<html>
    <head>
        <?php
            include "dbconnect.php";
            session_start();
            $cupon_id = $_GET['cupon_id'];
            $user_id = $_SESSION['user_id'];
            $store_id = $_SESSION['store_id'];
            $URL = "https://www.businessesfriends.net/project/main/cupon_use_process.php?cupon_id=".$cupon_id."&user_id=".$user_id;
            $encode_URL = urlencode($URL);
            // $conn = mysqli_connect('localhost', 'root', '', 'project');
            // store_id 받기
            $sql = "SELECT * FROM cupon LEFT JOIN store ON cupon.store_id=store.store_id WHERE cupon_id=$cupon_id";
            $result = mysqli_query($conn, $sql);
            $row = mysqli_fetch_assoc($result);
            $store_img = $row['store_img'];
            $store_name = $row['store_name'];
            $cupon_name = $row['name'];
            $cupon_start = $row['start'];
            $cupon_end = $row['end'];
            $cupon_discount = $row['discount'];
        ?>
    <meta name="viewport" content="width=device-width">
    </head>
    <body>
        <img class="icon" id="close" src="icon/x2.png">
        <!-- <h4>QR코드</h4> -->
        <div class="QR">
            <img class="img" src=<?=$store_img?>>
            <span style="font-size:15px"><strong>&nbsp;&nbsp;<?=$store_name?></strong></span>

            <div class="content">
                <span style="font-size:17px"><?=$cupon_name." ".$cupon_discount?></span>
            </div>

            <iframe src='https://chart.apis.google.com/chart?cht=qr&chl=<?=$encode_URL?>&chld=H%7C2&chs=144' style="width:145px;height:145px"></iframe>
            
            <div class="date">
                <span style="font-size:12px"><?=$cupon_start." ~ ".$cupon_end?></span>
            </div>

        </div>
        <div class="thank">
            <span style="font-size:15px">이용해 주셔서 감사합니다</span>
        </div>

        <!-- <div class="btn"> -->
            <!-- <button>나가기</button> -->
        <!-- </div> -->

        <script>
            document.getElementById('close').addEventListener('click', function(){
                location.replace('my_cupon.php');
            });
        </script>
        <!-- <iframe src='https://chart.apis.google.com/chart?cht=qr&chl=https://www.businessesfriends.net/main/home.php&chld=H%7C2&chs=144' style="width:145px;height:145px"></iframe> -->
    </body>

    <style>

        @import url('https://fonts.googleapis.com/css2?family=Nanum+Gothic&display=swap');

        html{
            font-family: 'Nanum Gothic', sans-serif;
        }

        body{
            background-color: #d2e2fe;
            margin-top: 150px;
            overflow:hidden
            
        }

        .icon{
            position: fixed;
            left: 15px;
            top: 20px;
            width: 20px;;
        }

        .QR{
            width: 300px;
            height: 400px;
            border-radius: 30px;
            margin: 0 auto;
            background-color: white;
            box-shadow: 0 2px 8px -1px grey;
        }

        .img{
            margin-left: 30px;
            margin-top: 20px;
            margin-bottom: 10px;
            width: 50px;
            height: 50px;
            vertical-align:middle;
            border-radius: 10px;
            overflow: hidden;
            object-fit: cover;
        }

        .content{
            text-align: center;
            margin-top: 30px;
            margin-left: 10px;
            margin-right: 10px;
        }

        .date{
            text-align: center;
            margin-top: 10px;
        }

        iframe{
            margin-left: 80px;
            margin-top: 40px;
        }

        .thank{
            margin-top: 20px;
            text-align: center;
        }

        .btn{
            /* position: fixed; */
            /* bottom: 10%; */
            /* left: 40%; */
            margin-top: 50px;
            text-align: center;
        }

        button{
            background-color: rgb(91, 111, 179);
            border: none;
            width: 90px;
            height: 40px;
            border-radius: 20px;
            color: white;
        }

    </style>
</html>