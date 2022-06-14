<!-- 포인트 변환 부분 -->
<?php
    $point = $_GET["point"];
    $id = $_GET["id"];
    $gameid = $_GET["gameid"];

    if(isset($_COOKIE["record"])){
        $record = $_COOKIE["record"];
        $li = explode(",", $record);
        if (in_array($id, $li)){
            $check = 0;
            echo "
            <script>
                location.href = 'gameinfo.php?gameid=$gameid';
            </script>
        ";
        }
        else{
            $check = 1;
        }
    }
    else{
        $record = "";
        $check = 1;
    }
    
    if($check == 1){
        $con = mysqli_connect("localhost", "user1", "12345", "sample");
        $sql = "select * from review where id = $id";
        $result = mysqli_query($con, $sql);
        if (!$result)
            echo "게임정보가 없습니다.";
        else
        {
            $row = mysqli_fetch_array($result);
        }
        if (isset($row)){
            $t_point = $row["point"];
            $t_point += $point;
            $sql = "update review set point = $t_point where id =$id";
    
            mysqli_query($con, $sql);
       
        }
    
        mysqli_close($con);  
        $record = $record.",".$id;
        setcookie("record", $record, time()+3600);
        echo "
            <script>
                location.href = 'gameinfo.php?gameid=$gameid';
            </script>
        ";
    }
    
?>