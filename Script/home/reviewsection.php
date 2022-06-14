<div id="main_content">
    <div id="review_rankl">
        <h4>최근리뷰</h4>
        <ul>
<!-- 최근 게시 글 DB에서 불러오기 -->
<?php
    $sql = "select * from review join game on review.game_id = game.game_id order by review.id desc limit 5";
    $result = mysqli_query($con, $sql);

    if (!$result)
        echo "게시판 DB 테이블(board)이 생성 전이거나 아직 게시글이 없습니다!";
    else
    {
        while( $row = mysqli_fetch_array($result) )
        {
?>
                <li>
                    <span><?=$row["content"]?></span>
                    <span><?=$row["name"]?></span>
                </li>
<?php
        }
    }
?>
            </div>
            <div id="review_rankr">
                <h4>인기 리뷰</h4>
                <ul>
<!-- 포인트 랭킹 표시하기 -->
<?php
    $sql = "select *, members.id as user_name, review.point as point from review join game on review.game_id = game.game_id join members on review.user_id = members.num order by review.point desc limit 5";
    $result = mysqli_query($con, $sql);

    if (!$result)
        echo "아직 등록된 게임이 없습니다!";
    else
    {
?>

<?php
        while( $row = mysqli_fetch_array($result) )
        {
?>
                <li>
                    <span><?=$row["content"]?></span>
                    <span><?=$row["point"]?></span>
                    <span><?=$row["user_name"]?></span>
                </li>
<?php
        }
    }

    mysqli_close($con);
?>
                </ul>
            </div>
        </div>