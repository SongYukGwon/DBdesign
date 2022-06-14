<?php
#리캡차
$captcha = $_POST['g-recaptcha-response'];
$secretKey = '6Ld4UC4gAAAAADGM316sYJsLD-8dR8AUBHMvSyQM';
$ip = $_SERVER['REMOTE_ADDR'];

$data = array(
  'secret' => $secretKey,
  'response' => $captcha,
  'ip' => $ip
);

$parameter = http_build_query($data);
$url = "https://www.google.com/recaptcha/api/siteverify?".$parameter;

$response = file_get_contents($url);
$responseKeys = json_decode($response, true);

if ($responseKeys["success"]) {
  $id   = $_POST["decide_id"];
    $pass = $_POST["pass"];
    $name = $_POST["name"];
    $email1  = $_POST["email1"];
    $email2  = $_POST["email2"];

    $email = $email1."@".$email2;
    $regist_day = date("Y-m-d (H:i)");  // 현재의 '년-월-일-시-분'을 저장

              
    $con = mysqli_connect("localhost", "user1", "12345", "sample");

	$sql = "insert into members(id, pass, name, email, regist_day, level, point) ";
	$sql .= "values('$id', '$pass', '$name', '$email', '$regist_day', 9, 0)";

	mysqli_query($con, $sql);  // $sql 에 저장된 명령 실행
    mysqli_close($con);     

    echo "
	      <script>
	          location.href = 'index.php';
	      </script>
	  ";
} else {
  	echo '<script>
			alert(\'로봇이 아님을 인증해주세요\');
			history.go(-1);
		  </script>';
}
?>


   
