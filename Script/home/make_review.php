<?php
    $gameid = $_GET["gameid"];
    $con = mysqli_connect("localhost", "user1", "12345", "sample");
    $sql = "select * from game where game_id='$gameid'";
    $result = mysqli_query($con, $sql);
    if (!$result)
        echo "게임정보가 없습니다.";
    else
    {
        $row = mysqli_fetch_array($result);
    }
?>

<!DOCTYPE html>
<html>
<head> 
<meta charset="utf-8">
<title>리뷰작성하기</title>
<link rel="stylesheet" type="text/css" href="./css/common.css">
<link rel="stylesheet" type="text/css" href="./css/board.css">
<script>
  function check_input() {
      if (!document.board_form.content.value)
      {
          alert("내용을 입력하세요!");    
          document.board_form.content.focus();
          return;
      }
      document.board_form.submit();
   }
</script>
</head>
<body> 
<header>
    <?php include "header.php";?>
</header>
<section>
   	<div id="board_box">
	    <h3 id="board_title">
        <?= $row["name"]?> > 리뷰 쓰기
		</h3>
	    <form  name="board_form" method="post" action="review_insert.php?gameid=<?=$gameid?>" enctype="multipart/form-data">
	    	 <ul id="board_form">	
	    		<li>
	    			<span class="col1">점수 : </span>
	    			<span class="col2">
						<span><input name="subject" type="radio" value = "1">1점</span>
						<span><input name="subject" type="radio" value = "2">2점</span>
						<span><input name="subject" type="radio" value = "3">3점</span>
						<span><input name="subject" type="radio" value = "4">4점</span>
						<span><input name="subject" type="radio" value = "5">5점</span>
					</span>
	    		</li>	    	
	    		<li id="text_area">	
	    			<span class="col1">내용 : </span>
	    			<span class="col2">
	    				<textarea name="content"></textarea>
	    			</span>
	    		</li>
	    	    </ul>
	    	<ul class="buttons">
				<li><button type="button" onclick="check_input()">완료</button></li>
				<li><button type="button" onclick="location.href='board_list.php'">목록</button></li>
			</ul>
	    </form>
	</div> <!-- board_box -->
</section> 
<footer>
    <?php include "footer.php";?>
</footer>
</body>
</html>
