
<!-- 게임슬라이드 -->
<div class="swiper-container mySwiper">
  <!-- 슬라이드 컨텐츠가 들어갈 부분 -->
  <div class="swiper-wrapper">
<?php
    $con = mysqli_connect("localhost", "user1", "12345", "sample");
    $sql = "select * from game order by rand() desc limit 5";
    $result = mysqli_query($con, $sql);

    if (!$result)
        echo "게임정보가 없습니다.";
    else
    {
        while( $row = mysqli_fetch_array($result) )
        {
            if($row["score"]>4.0){
                $colorid = "blueback";
            }
            elseif($row["score"]>2.5){
                $colorid = "greenback";
            }
            else{
                $colorid = "redback";
            }
?>   
        <div class="swiper-slide"><a class="lia" href="gameinfo.php?gameid=<?=$row["game_id"]?>">
        <img src="<?=$row["picture_url"]?>"><div><span><?= $row["name"]?></span> <span id  = <?= $colorid?>>
        <?= $row["score"]?></span></div></a></div>
<?php
        }
    }
?>
</div>
  <!-- 좌우 눌러서 컨트롤이 가능한 버튼 추가시 -->
  <div class="swiper-button-prev"></div>
  <div class="swiper-button-next"></div>
  <!-- 페이지네이션 -->
  <div class="swiper-pagination"></div>
  <!-- 스크롤바 -->
  <div class="swiper-scrollbar"></div>
</div>


<div id="main_content">
    <div id="latest">
        <h4>공지사항</h4>
        <ul>
<!-- 최근 게시 글 DB에서 불러오기 -->
<?php
    $sql = "select * from board where role = 2 order by num desc limit 5";
    $result = mysqli_query($con, $sql);

    if (!$result)
        echo "게시판 DB 테이블(board)이 생성 전이거나 아직 게시글이 없습니다!";
    else
    {
        while( $row = mysqli_fetch_array($result) )
        {
            $regist_day = substr($row["regist_day"], 0, 10);
?>
                <li>
                    <span><?=$row["subject"]?></span>
                    <span><?=$row["name"]?></span>
                    <span><?=$regist_day?></span>
                </li>
<?php
        }
    }
?>
            </div>
            <div id="point_rank">
                <h4>게임점수 랭킹</h4>
                <pre>순위      게임이름      출시년도      점수</pre>
                <ul>
<!-- 포인트 랭킹 표시하기 -->
<?php
    $rank = 1;
    $sql = "select * from game order by score desc limit 5";
    $result = mysqli_query($con, $sql);

    if (!$result)
        echo "아직 등록된 게임이 없습니다!";
    else
    {
        while( $row = mysqli_fetch_array($result) )
        {
            $name  = $row["name"];        
            $id    = $row["rel"];
            $point = $row["score"];
?>
                <li>
                    <span><?=$rank?></span>
                    <span><?=$name?></span>
                    <span><?=$id?></span>
                    <span><?=$point?></span>
                </li>
<?php
            $rank++;
        }
    }

    mysqli_close($con);
?>
                </ul>
            </div>
</div>