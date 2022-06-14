<!-- 검색부분 -->
<?php
    $searching = $_POST["search"];

    $con = mysqli_connect("localhost", "user1", "12345", "sample");
    $sql = "select * from game where name = '$searching'";
    $result =  mysqli_query($con, $sql);

    $match = mysqli_num_rows($result);

    if(!$match)
    {
        echo("
           <script>
             window.alert('해당하는 게임이 없습니다.')
             history.go(-1)
           </script>
         ");
    }
    else{
        $row = mysqli_fetch_array($result);
        $game_id = $row["game_id"];

        echo 
        "<script>
            window.location.href = './gameinfo.php?gameid=$game_id';
        </script>";
    }
?>