<!-- GameScore 사이트 표시 -->
<!DOCTYPE html>
<html>
<head> 
<meta charset="utf-8">
<title>Welcom GameSScore</title>
<link rel="stylesheet" type="text/css" href="./css/common.css">
<link rel="stylesheet" type="text/css" href="./css/main.css">
<link rel="stylesheet" type="text/css" href="./css/gameinfo.css">
</head>
<body>
<header>
    <?php include "header.php";?>
</header>
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
?>
    <section>
        <div id="game_content">
            <div id ="game_intro">
            <div class="fb-share-button" data-href="https://localhost/home/gameinfo.php?gameid=<?=$gameid?>" data-layout="button" data-size="small"><a target="_blank" href="https://www.facebook.com/sharer/sharer.php?u=https%3A%2F%2Flocalhost%2Fhome&amp;src=sdkpreparse" class="fb-xfbml-parse-ignore">공유</a></div>
                <div id = "game_image">
                    <img src="<?= $row["picture_url"]?>"/>
                </div>
                <div id = "game_introduce">
                    <h2>게임이름 : <?= $row["name"]?> <a href="<?=$row["buy_url"]?>"><img src = "./img/site.webp" style ="height:20px; width:20px;" ></a></h2>
                    <h2> 점수 :  <?= $row["score"]?> </h2>
                    <h4>출시연도 : <?= $row["rel"]?></h4>
                    <h4>제작사 : <?= $row["name"]?></h4>
                    <span><?= $row["info"]?></span>
                </div>
            </div>
        </div>
        <div id="game_content">
            <div id ="game_review">
            <h3 id = "review_title">리뷰 <a href="make_review.php?gameid=<?=$gameid?>">리뷰작성하기</a></h3>
            <ul id = "review_ul">
<?php
    }
    $sql = "select *,review.id as review_id, members.id as user_id, review.point as review_point from review join members on review.user_id = members.num where game_id='$gameid' order by review.id desc";
    $result = mysqli_query($con, $sql);
    if (!$result)
        echo "리뷰가 없습니다.";
    else
    {
?>
    <li id="review_li">
                    <span>평가점수</span>
                    <span>리뷰내용</span>
                    <span>추천</span>
                    <span>작성자</span>
    </li>
<?php
        while( $row = mysqli_fetch_array($result))
        {
            
?>
                <li id="review_li">
                    <span><?=$row["score"]?></span>
                    <span><?=$row["content"]?></span>
                    <span><?=$row["review_point"]?></span>
                    <span><?=$row["user_id"]?></span>
                    <div id = "revise_point">
                    <span><a href = "update_review_point.php?point=1&gameid=<?= $gameid?>&id=<?=$row["review_id"]?>"><img src="./img/like.png" id="like"></a></span>
                    <span><a href = "update_review_point.php?point=-1&gameid=<?= $gameid?>&id=<?=$row["review_id"]?>"><img src="./img/unlike.png" id="like"></a></span>
                    </div>
                </li>
<?php
        }
    }
?>
        </ul>
        </div>
</div>
    </section>
<footer>
    	<?php include "footer.php";?>
</footer>
</body>
</html>