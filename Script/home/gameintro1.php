

<!-- 게임슬라이드 -->
<div class="swiper-container mySwiper">
<h3>이달의 게임 순위!!!</h3>
  <!-- 슬라이드 컨텐츠가 들어갈 부분 -->
  <div class="swiper-wrapper">
<?php
    $con = mysqli_connect("localhost", "user1", "12345", "sample");
    $sql = "select * from game order by score desc";
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
  <div class="swiper-slide"><a class="lia" href="gameinfo.php?gameid=<?=$row["game_id"]?>"><img src="<?=$row["picture_url"]?>"><div><span><?= $row["name"]?></span> <span id  = <?= $colorid?>><?= $row["score"]?></span></div></a></div>
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
