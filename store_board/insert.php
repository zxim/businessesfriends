<?php
	include "session.php"; 	// 세션 처리
	include "dbconnect.php";
	if (!$userid) {
		echo "
				<script>
				alert('게시판 글쓰기는 로그인 후 이용해 주세요!');
				history.go(-1)
				</script>
		";
		exit;
	}
	// var_dump($_FILES);
	if(!empty($_SESSION['store_id'])){
		$store_id = $_SESSION['store_id'];
	}else{
		echo("<script>alert('먼저 가게 등록을 해야합니다.');location.replace('store_board.php');</script>");
	}
	$file = $_FILES['upfile'];
	$file_num = count($file['name']); // 파일의 개수 받기
	$file_name = $file['name'];
	$file_type = $file['type'];
	$file_tmp_name = $file['tmp_name'];
	$insert_file_tmp = ""; // 데이터베이스에 넣을 여러개 파일 경로


    // $subject = $_POST["subject"];		// 제목
    $content = $_POST["content"];		// 내용

// 	//$subject = htmlspecialchars($subject, ENT_QUOTES);	// 제목 HTML 특수문자 변환
	$content = htmlspecialchars($content, ENT_QUOTES);	// 내용 HTML 특수문자 변환 
	$regist_day = date("Y-m-d");  // UTC 기준 현재의 '년-월-일 (시:분)'

	// $upload_dir = 'board_picture/';
	for($i = 0; $i < $file_num; $i++){
		if($file_type)
		$upload_dir = 'board_picture/'.$file_name[$i];
		// 파일 업로드
		if(!move_uploaded_file($file_tmp_name[$i], $upload_dir)){
			echo("<script>alert('파일 업로드 실패 ($i)); location.replace('form.php'); </script>");
		}else{ // 파일 업로드 성공 시
			$insert_file_tmp = $insert_file_tmp.'|'.$upload_dir;
		}
	}
	// var_dump($insert_file_tmp);

	$sql = "SELECT * FROM store WHERE store_id=$store_id";
	$result = mysqli_query($conn, $sql);
	$row = mysqli_fetch_assoc($result);
	$store_name = $row['store_name'];

	$sql = "INSERT INTO store_board (id, name, content, regist_day, file_name) VALUES ('$store_id', '$store_name', '$content', '$regist_day', '$insert_file_tmp');";
	$result = mysqli_query($conn, $sql);
	if($result){
		echo("<script>alert('게시물이 업로드되었습니다.');location.replace('store_board.php')</script>");
	}else{
		echo("<script>alert('게시물 업로드 실패!');location.replace('store_board.php');</script>");
	}
// 	if ($upfile_name && !$upfile_error)
// 	{
// 		$file = explode(".", $upfile_name);
// 		$file_name = $file[0];
// 		$file_ext  = $file[1];

// 		$copied_file_name = date("Y_m_d");
// 		$copied_file_name .= ".".$file_ext;
// 		$uploaded_file = $upload_dir.$copied_file_name;

// 		// for($i=0; $i<count($_FILES["upfile"]["name"]); $i++){
// 		// 	move_uploaded_file($tmpName[$i], $uploadDir.$upfile_name[$i]); // 디렉토리에 저장하기
// 		// 	array_push($fileNames, $upfile_name[$i]); // 가공해서 배열에 넣기
// 		// 	$arrayString = implode(",", $fileNames); // 배열을 문자열로 만들기
// 		//  }

// 		if( $upfile_size  > 10000000 ) {
// 				echo("
// 				<script>
// 				alert('업로드 파일 크기가 지정된 용량(10MB)을 초과합니다!<br>파일 크기를 체크해주세요! ');
// 				history.go(-1);
// 				</script>
// 				");
// 				exit;
// 		}

// 		if (!move_uploaded_file($upfile_tmp_name, $uploaded_file) )
// 		{
// 				echo("
// 					<script>
// 					alert('파일을 지정한 디렉토리에 복사하는데 실패했습니다.');
// 					history.go(-1)
// 					</script>
// 				");
// 				exit;
// 		}
// 	}
// 	else 
// 	{
// 		$upfile_name      = "";
// 		$upfile_type      = "";
// 		$copied_file_name = "";
// 	}

//     // $con = mysqli_connect("localhost", "root", "", "project");
// 	$sql = "insert into store_board (id, name, content, regist_day, ";
// 	$sql .= "file_name, file_type, file_copied) ";
// 	$sql .= "values('$userid', '$username', '$content', '$regist_day', ";
// 	$sql .= "'$upfile_name', '$upfile_type', '$copied_file_name')";

// 	mysqli_query($conn, $sql);  // $sql에 저장된 명령 실행

// 	mysqli_close($conn);       // DB 연결 끊기

// 	// 목록 페이지로 이동
// 	echo "<script>
// 	    location.replace('store_board.php');
// 	   </script>";
// ?>