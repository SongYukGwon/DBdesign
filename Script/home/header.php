<?php
    session_start();
    if (isset($_SESSION["userid"])) $userid = $_SESSION["userid"];
    else $userid = "";
    if (isset($_SESSION["username"])) $username = $_SESSION["username"];
    else $username = "";
    if (isset($_SESSION["userlevel"])) $userlevel = $_SESSION["userlevel"];
    else $userlevel = "";
    if (isset($_SESSION["userpoint"])) $userpoint = $_SESSION["userpoint"];
    else $userpoint = "";
?>
<div id="fb-root"></div>
<script async defer crossorigin="anonymous" 
src="https://connect.facebook.net/ko_KR/sdk.js#xfbml=1&version=v14.0" 
nonce="6O9r5KqZ"></script>
<script>
// function facebookShare(){
// 	var facebook = 'https://www.facebook.com/sharer/sharer.php?u=';
// 	window.open(facebook + 'localhost/');
// }
</script>
        <div id="top">
                <a href="index.php" id = "logo"><img src = "./img/logo.PNG"/></a>
            <ul id="top_menu">  
            <form name ="search_form" method ="post" action = "search.php">
                <li><input type = "text" name = "search" ><button type="submit" >검색</button></li>
            </form> 
<?php
    if(!$userid) {
?>                
                <li><a href="member_form.php">회원 가입</a> </li>
                <li> | </li>
                <li><a href="login_form.php">로그인</a></li>
<?php
    } else {
                $logged = $username."(".$userid.")님[Level:".$userlevel.", Point:".$userpoint."]";
?>
                <li><?=$logged?> </li>
                <li> | </li>
                <li><a href="logout.php">로그아웃</a> </li>
                <li> | </li>
                <li><a href="member_modify_form.php">정보 수정</a></li>
                <div class="fb-share-button" data-href="https://www.inven.co.kr/" data-layout="button_count" data-size="small">
                 <a target="_blank" href="https://www.facebook.com/sharer/sharer.php?u=https%3A%2F%2Fwww.inven.co.kr%2F&amp;src=sdkpreparse"
                  class="fb-xfbml-parse-ignore">공유</a></div>
<?php
    }
?>
<?php
    if($userlevel==1) {
?>
                <li> | </li>
                <li><a href="admin.php">관리자 모드</a></li>
<?php
    }
?>
            </ul>
        </div>
        <div id="menu_bar">
            <ul>  
                <li><a href="index.php">HOME</a></li>
                <li><a href="game.php">GameScore</a></li>                               
                <li><a href="board_list.php">자유게시판</a></li>
                <li><a href="notice_list.php">공지사항</a></li>
                <li><a href="message_box.php?mode=send">쪽지</a></li>
            </ul>
        </div>

<script type="text/javascript">
  Kakao.init('f291545d7fd95478e987e6256f4da39a'); // 초기화

  function sendLink() { // 카카오톡 공유하기
    Kakao.Link.sendDefault({
      objectType: 'text',
      text: '기본 템플릿으로 제공되는 텍스트 템플릿은 텍스트를 최대 200자까지 표시할 수 있습니다. 텍스트 템플릿은 텍스트 영역과 하나의 기본 버튼을 가집니다. 임의의 버튼을 설정할 수도 있습니다. 여러 장의 이미지, 프로필 정보 등 보다 확장된 형태의 카카오링크는 다른 템플릿을 이용해 보낼 수 있습니다.',
      link: {
        mobileWebUrl: 'https://developers.kakao.com/docs/js/kakaotalklink#텍스트-템플릿-보내기',
        webUrl: 'https://developers.kakao.com/docs/js/kakaotalklink#텍스트-템플릿-보내기',
      },
    })
  }
</script>