<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width">
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.0/jquery.min.js"></script>
        <link rel="canonical" href="https://getbootstrap.com/docs/5.2/examples/album/">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.9.1/font/bootstrap-icons.css">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v6.2.0/css/all.css">
    
    <link href="bootstrap.min.css" rel="stylesheet">

        <title>홈 화면</title>
    
    </head>
    <body>
        <?php
            //위치가 지정된 경우
            if(empty($_GET)){
                $lat = 37.5642135;
                $lng = 127.0016985; 
            }else{
                $lat = $_GET['lat'];
                $lng = $_GET['lng'];
                
            }
        ?>

        <!-- 지도 -->
        <div id="map" style="width:100%;height:100vh;">
            
        </div>

        <div id="store_info">
            <!-- 가게 정보 표시공간 -->
        </div>

        <section>
        
            <div class="location" >
                <h5></h5>
                <img src="icon/search.png" width="20" style="position:absolute; background-color:white; top:25px; left:20px;">
                <input type="text" id="address" placeholder=" &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; 위치검색"/>
                <input type="button" id="button" value="검색"/>

                <div class="btndiv">
                    <button class="lobtn" id="all">모든 가게</button>
                    <button class="lobtn" id="restaurant" value="음식점">음식점</button>
                    <button class="lobtn" id="clothingStore" value="옷가게">옷가게</button>
                    <button class="lobtn" id="groceryStore" value="잡화점">잡화점</button>
                    <button class="lobtn" id="entertainment" value="엔터테이먼트">엔터테인먼트</button>
                    <button class="lobtn" id="health" value="건강시설">건강시설</button>
                </div>
                

                <!-- <input type="image" id="button" src="../main/img/serch4.png"/> -->
                <!-- <br/> <br/> style="display: inline-block;"-->
            </div>

            <!-- <button onclick="startMyLocation();" class="button"><img src="/main/img/My_location.png">내위치</button> -->
        
            <!-- <input type="image" class="button"  width="100" alt=""> -->

           

            <input id="myLocation" type="image" class="button2" src="icon/marker.jpg"  width="100" alt="">
            <!-- <button type="button", id="myLocation", style="background-color:red;"><img src="../store_regi/images/location.png", class="button2"></button> -->
            <div class="container" style="padding-top:10px;">
                <header class="d-flex flex-wrap justify-content-center border-bottom">
                    <!-- <a href="/" class="d-flex align-items-center mb-3 mb-md-0 me-md-auto text-dark text-decoration-none"> -->
                        <!-- <svg xmlns="http://www.w3.org/2000/svg" style="margin-right:8px" width="23" height="23" fill="currentColor" class="bi bi-shop" viewBox="0 0 16 16"> -->
                            <!-- <path d="M2.97 1.35A1 1 0 0 1 3.73 1h8.54a1 1 0 0 1 .76.35l2.609 3.044A1.5 1.5 0 0 1 16 5.37v.255a2.375 2.375 0 0 1-4.25 1.458A2.371 2.371 0 0 1 9.875 8 2.37 2.37 0 0 1 8 7.083 2.37 2.37 0 0 1 6.125 8a2.37 2.37 0 0 1-1.875-.917A2.375 2.375 0 0 1 0 5.625V5.37a1.5 1.5 0 0 1 .361-.976l2.61-3.045zm1.78 4.275a1.375 1.375 0 0 0 2.75 0 .5.5 0 0 1 1 0 1.375 1.375 0 0 0 2.75 0 .5.5 0 0 1 1 0 1.375 1.375 0 1 0 2.75 0V5.37a.5.5 0 0 0-.12-.325L12.27 2H3.73L1.12 5.045A.5.5 0 0 0 1 5.37v.255a1.375 1.375 0 0 0 2.75 0 .5.5 0 0 1 1 0zM1.5 8.5A.5.5 0 0 1 2 9v6h1v-5a1 1 0 0 1 1-1h3a1 1 0 0 1 1 1v5h6V9a.5.5 0 0 1 1 0v6h.5a.5.5 0 0 1 0 1H.5a.5.5 0 0 1 0-1H1V9a.5.5 0 0 1 .5-.5zM4 15h3v-5H4v5zm5-5a1 1 0 0 1 1-1h2a1 1 0 0 1 1 1v3a1 1 0 0 1-1 1h-2a1 1 0 0 1-1-1v-3zm3 0h-2v3h2v-3z"/> -->
                        <!-- </svg> -->
                        <!-- <span class="fs-4" style="padding: 8px;">Simple header</span> -->
                    <!-- </a> -->
                    <ul class="nav nav-pills">
                        <li class="nav-item"><a class="bi bi-house-door fa-2x" style="color: gray; padding: 8px 16px;" ></a></li>
                        <li class="nav-item"><a href="store_list.php" class="bi bi-shop-window fa-2x" style="color: gray; padding: 8px 16px;"></a></li>
                        <li class="nav-item"><a href="../store_board/store_board.php" class="bi bi-card-checklist fa-2x" style="color: gray; padding: 8px 16px;"></a></li>
                        <li class="nav-item"><a href="information.php" class="bi bi-person-badge-fill fa-2x" style="color: gray; padding: 8px 16px;"></></a></li>
                    </ul>
                </header>
            </div>
        </section>
    <style>

        @import url('https://fonts.googleapis.com/css2?family=Nanum+Gothic&display=swap');

        *{
            font-family: 'Nanum Gothic', sans-serif;
        }

        body {
            margin: 0;
        }

        .location{
            /* background: #ffff; */
            position: absolute;
            /* position: static; */
            /* width: 90%; */
            width: 90%;
            /* top: 6%; */
            margin-left: 20px;
            top: 0;
            /* left: 10%; */
            vertical-align:middle;
        }

        #address{
            width: 80%;
            height: 50px;
            box-shadow:  1px 1px 2px 6px rgba(0, 0, 0, 0.05);
            border: none;
            border-radius: 10px;
            vertical-align:middle;
            background-color: #fff;
            margin-left: 10px;
        }

        #button{
            width:50px;
            height: 50px;
            border: none;
            border-radius: 10px;
            color: #7f8081;
            box-shadow:  1px 1px 2px 6px rgba(0, 0, 0, 0.05);
            
        }

        .btndiv{
            margin-left: 10px;
            text-align: center;
        }

        .lobtn{
            margin-top: 10px;
            padding: 5px;
            border: none;
            box-shadow: 1px 2px 8px -2px grey;
            /* background-color: #5f9cec; */
            background-color: rgb(150, 162, 194);
            border-radius: 5px;
            color: white;
        }

        @keyframes move { /* @keyframes 뒤에 애니메이션을 대표하는 임의의 이름 move를 부여 */
            from { /* 애니메이션 시작 시점 */
                bottom: 0;
            }
            to { /* 애니메이션 종료 시점 */
                bottom: 80px;
            }
        }

        #store_info{
            margin:0 auto; 
            width: 90%;
            background-color: #ffffff;
            position: fixed;
            bottom: 80px;
            left: 50%;
            transform: translateX( -50% );
            /* box-shadow: 20px 20px 20px grey; */
            box-shadow: 0 2px 8px -1px grey;
            border: none;
            border-radius: 10px;
            animation-name: move; /* @keyframes에 지정한 이름을 여기다 쓴다 */
            animation-duration: 4s; 
        }
        
        /* 가게 사진 */
        .store_img{
            width: 10px;
            margin-left: 10px;
            margin-top: 10px;
            border-radius: 10px;
            display:inline-block;
            vertical-align:middle;
            overflow: hidden;
            object-fit: cover;
        }

        /* 가게 이름 */
        .store_name{
            font-size: 1.2em;
            /* float: left; */
            margin-left: 10px;
            display:inline-block;
        }

        /* 가게 주소 */
        .store_address{
            font-size: 10px;
            /* padding: 30px; */
            margin-left: 10px;
            vertical-align:middle;
            /* display:inline-block; */
        }

        /* 가게 내용 */
        .store_info{
            padding: 10px;
        }

        a, a:visited {
            text-decoration: none;
        }

        /* 가게 링크 */
        .store_link{
            margin-left: 10px;
            margin-bottom: 10px;
            display: block;
            /* position: relative; */
            /* float: left; */
            width: 65px;
            /* height: 2000px; */
            padding: 0;
            /* margin: 10px 20px 10px 0; */
            /* font-weight: 15px; */
            text-align: center;
            /* font-size: 15px; */
            /* height: 20px; */
            line-height: 25px;
            color: #7f8081;
            border-radius: 5px;
            border: none;
            transition: all 0.2s ;
            background: #d2e2fe;
        }
        .store{
            float: left;
        }

        /* .store_link:hover{ */
            /* background: #01939A; */
        /* } */

        li{list-style:none}

        a{text-decoration:none;font-size:14px}

      

        .button{
            position: absolute;
            /* bottom: 30px; */
            bottom: 50%;
            left: 2.5%;
            height: 40px;
            width: 40px;
            background-color: #fff;
            border-radius: 8px;
            box-shadow:  1px 1px 2px 6px rgba(0, 0, 0, 0.1);
            
        }
        .button2{
            position: relative;
            height: 40px;
            width: 40px;
            right:3%;
            bottom:225px;
            float: right;
            background-color: #fff;
            border-radius: 8px;
            box-shadow:  1px 1px 2px 6px rgba(0, 0, 0, 0.1);
        }

        .container{
            position: fixed;
            bottom: 0;
            background-color: white;
        }

     
    </style>

    
        <script>
            // 현재위치 마커표시 완료 O
            // DB연동해서 마커 표시하기 
            // 자신의 위치 기준 km반경 내 가게만 뜨도록
            var watchId;
            var lat = <?=$lat?>, lng = <?=$lng?>;
            var map, marker, circle;
            var radius = 200;
            var geocoder;
            let restaurant = document.getElementById('restaurant');
            let searchelement = document.getElementById("button");
            let myLocation = document.getElementById("myLocation");
            let all = document.getElementById('all');
            var m_lat, m_lng, s_id, s_img;
            var latitude, longitude;
            var user_lat, user_lng;
            var s_marker;
            var s_markers = []; // 생성된 모든 마커들
            var bound_check = false;
    

            // map init
            function storeMap_init(){
                geocoder = new google.maps.Geocoder();
                // db연동해서 가게 위도경도를 읽어 가게있는 위치에 marker표시 추가하기
                map = new google.maps.Map(document.getElementById("map"),
                {
                    center: new google.maps.LatLng(lat, lng),
                    zoom: 15
                });

                function createMarker(s_id, lat, lng, name, address, info, img, category){
                    s_marker = new google.maps.Marker({
                        position: new google.maps.LatLng(lat, lng),
                        map: map,
                        id: s_id, 
                        category: category, // 카테고리 설정
                    });

                    // 가게 지도 누르면 뜨는거
                    new google.maps.event.addListener(s_marker, "click", function(){
                       let list = document.getElementById('store_info');
                       let s_image = document.createElement('img');
                       s_image.classList.add('store_img');
                       let map_div = document.getElementById('map');
                       map.setZoom(16);
                       map.setCenter(new google.maps.LatLng(lat, lng));
                       // 마커 클릭 시 지도 축소
                    //    document.getElementById('map').style.height ='600px';
                       // div초기화
                       list.innerHTML = '';
                       // 가게 이미지 이미지 등록 안한경우
                       if(img == ''){
                        s_image.setAttribute('src', '/project/store_regi/store_img/restaurant.jpg');
                        s_image.setAttribute('style', 'height:50px;width:50px');
                       }else{
                        s_image.setAttribute('src', img);
                        s_image.setAttribute('style', 'height:50px;width:50px');
                       }

                       // 가게 이름
                       let st_name = document.createElement('span');
                       st_name.style.fontWeight = 'bold';
                       st_name.classList.add('store_name');
                       st_name.append(document.createTextNode(name));
                       
                       // 가게 주소
                       let st_address = document.createElement('p');
                       st_address.classList.add('store_address');
                       st_address.append(document.createTextNode(address));

                       // 가게 정보 링크
                       let st_link = document.createElement('a');
                       //let st_link = document.createElement('button');
                       st_link.classList.add('store_link');
                       let link = 'store_inf2.php?store_id=' + s_id;

                       // 가게 쿠폰
                       st_link.setAttribute('href', link);
                       st_link.append(document.createTextNode('가게정보'));

                       // list에 자식 태그들 추가
                       list.append(s_image);
                       list.append(st_name);
                       list.append(st_address);
                       //list.append(st_info);
                       list.append(st_link);
                    //    list.setAttribute('style', 'background-color:red;margin:auto;position:relative;top:-3500px;width:90%;height:300px;z-index:1;');
                    })
                    s_markers.push(s_marker);
                }
                
                 // 현재 지도에 띄워진 모든 마커 지우기
                 function removeAllMarker(){
                    for(let i = 0; i < s_markers.length; i++){
                        s_markers[i].setMap(null);
                    }
                }

                // 모든 마커 보이기
                function showAllMarker(){
                    for(let i = 0; i < s_markers.length; i++){
                        s_markers[i].setMap(map);
                    }
                }

                // 범위의 중앙값을 받아서 범위에 해당하는 마커를 보이게하는 메소드
                function bound_Marker_Create(s_lat, s_lng){
                    removeAllMarker();
                    // s_markers에서 범위에 해당하는 마커만 다시 보이기
                    for(let i = 0; i < s_markers.length; i++){
                        let m_lat = s_markers[i].position.lat();
                        let m_lng = s_markers[i].position.lng();
                        if(mapBounds(s_lat, s_lng, m_lat, m_lng, 3)){ // 범위에 해당하는 마커
                            s_markers[i].setMap(map);
                        }
                    }
                    bound_check = true;
                }

                // 카테고리별 마커만 뜨게하기
                function category_Marker(category){
                    removeAllMarker();
                    for(let i = 0; i < s_markers.length; i++){
                        if(category === s_markers[i].category){
                            s_markers[i].setMap(map);
                        }
                    }
                }

                $(document).ready(function(){
                    $.ajax({
                        url: "../main/getLatLngDB.php",
                        type: "POST",
                        dataType: 'json',
                        success: function(data){
                            for(var i = 0; i < data.length; i++){
                                // 위치, 가게 이름, 정보, 사진, 가게 설명 등 DB통해서 받기                                
                                // store id와 latitude, longitude를 서버로부터 받아서 마커 표시 및 infowindow설정
                                s_id = data[i]['store_id'];
                                s_name = data[i]['store_name'];
                                s_info = data[i]['store_info'];
                                m_lat = data[i]['store_lat'];
                                m_lng = data[i]['store_lng'];
                                s_address = data[i]['store_ad'];
                                s_img = data[i]['store_img'];
                                s_category = data[i]['store_category'];

                                createMarker(s_id, m_lat, m_lng, s_name, s_address, s_info, s_img, s_category);

                                console.log("s_id: " + s_id + ", lat: " + m_lat + ", lng: " + m_lng + "category: " + s_category);
                            }
                        }

                    })
                    restaurant.addEventListener('click', function(){
                        category_Marker(restaurant.value);
                        // console.log(restaurant.value);
                    });
                    all.addEventListener('click', function(){
                        showAllMarker();
                    });
                    clothingStore.addEventListener('click', function(){
                        category_Marker(clothingStore.value);
                    });
                    groceryStore.addEventListener('click', function(){
                        category_Marker(groceryStore.value);
                    });
                    entertainment.addEventListener('click', function(){
                        category_Marker(entertainment.value);
                    });
                    health.addEventListener('click', function(){
                        category_Marker(health.value);
                    });
                    
                })

                 // 예외처리 해야함
                function searchAddress(){
                    geocoder.geocode({
                        address: document.getElementById("address").value
                    }, (results, status) => {
                        if(status == google.maps.GeocoderStatus.OK){
                            s_lat = results[0].geometry.location.lat();
                            s_lng = results[0].geometry.location.lng();
                            map.setCenter(new google.maps.LatLng(s_lat, s_lng));
                            removeAllMarker();
                            bound_Marker_Create(s_lat, s_lng);
                            map.setZoom(15);
                        }else{
                            alert("Geocode was not successful for the following reason: " + status);
                        }
                    });
                }

                // geolocation활성화
                function startMyLocation(){
                    if(navigator.geolocation){
                        watchId = navigator.geolocation.getCurrentPosition(myCallBack);
                    }else{
                        alert('지오로케이션이 지원되지 않습니다.');
                    }
                }
                
                // geolocation 성공함수
                function myCallBack(position){
                    console.log("startMyLocation Start...");
                    user_lat = position.coords.latitude;
                    user_lng = position.coords.longitude;
                    console.log("lat: " + user_lat + "lng: " + user_lng);
                    map.setCenter(new google.maps.LatLng(user_lat, user_lng));
                    bound_Marker_Create(user_lat, user_lng);
                    map.setZoom(15);
                }
                myLocation.addEventListener('click', startMyLocation);
                searchelement.addEventListener('click', searchAddress);
            }

            //중앙의 위도, 경도를 받아 범위에 있는 마커의 경우 true 반환
            function mapBounds(lat, lng, in_lat, in_lng, km){
                let lat_diff = km * 0.009;
                let lng_diff = km * 0.0112;
                let west = lng - lng_diff;
                let east = lng + lng_diff;
                let north = lat + lat_diff;
                let south = lat - lat_diff;
                
                if(in_lat <= north && in_lat >= south){
                    if(in_lng >= west && in_lng <= east){
                        console.log("범위내 marker위치 lat: " + in_lat + "lng: " + in_lng);
                        return true;
                    }else{ 
                        console.log("lat가 범위에 없습니다.");
                        return false;
                    }
                }else{
                    console.log("lng가 범위에 없습니다.");
                    return false;
                }
            }
        
            // geolocation.watchPosition 정지
            function stopMyLocation(){
                if(navigator.geolocation){
                    console.log("stopMyLocation Start...");
                    navigator.geolocation.clearWatch(watchId);
                }else{
                    alert("지오로케이션이 지원되지 않습니다.");
                }
            }

        </script>

        <div id="display"></div>
        <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyAoR_fav02PF9KxLHR6M1IAQRF2a2yqlho&libraries=places&callback=storeMap_init" async defer></script>
        
        
    </body>
</html>