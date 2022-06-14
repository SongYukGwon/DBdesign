<meta charset="utf-8">
<?php
    session_start();
    if (isset($_SESSION["userid"])) $userid = $_SESSION["userid"];
    else $userid = "";
    if (isset($_SESSION["username"])) $username = $_SESSION["username"];
    else $username = "";

    if ( !$userid )
    {
        echo("
                    <script>
                    alert('리뷰는 로그인 후 이용해 주세요!');
                    history.go(-1)
                    </script>
        ");
                exit;
    }

    $subject = $_POST["subject"];
    $content = $_POST["content"];
    $gameid = $_GET['gameid'];
    $num = $_SESSION["num"];
	$subject = htmlspecialchars($subject, ENT_QUOTES);
	$content = htmlspecialchars($content, ENT_QUOTES);

	$con = mysqli_connect("localhost", "user1", "12345", "sample");

	$sql = "insert into review (content, score, game_id, user_id) ";
	$sql .= "values('$content','$subject','$gameid', '$num')";
	mysqli_query($con, $sql);  // $sql 에 저장된 명령 실행

	// 포인트 부여하기
  	$point_up = 100;

	$sql = "select point from members where id='$userid'";
	$result = mysqli_query($con, $sql);
	$row = mysqli_fetch_array($result);
	$new_point = $row["point"] + $point_up;
	$sql = "update members set point=$new_point where id='$userid'";

    //평균점수구하기
    $sql = "select * from review where game_id='$gameid'";
	$result = mysqli_query($con, $sql);
    $total = 0;
    $count = 0;
    while( $row = mysqli_fetch_array($result) )
    {
        $count += 1;
        $total += $row["score"];
    }

    $avg = $total / $count;

    $sql = "update game set score = $avg where game_id='$gameid'";
	mysqli_query($con, $sql);
	mysqli_close($con);                // DB 연결 끊기
	echo "
	   <script>
	    location.href = 'gameinfo.php?gameid=$gameid';
	   </script>
	";
?>

  
