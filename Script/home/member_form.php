<!DOCTYPE html>
<html>
<head> 
<meta charset="utf-8">
<title>회원가입</title>
<link rel="stylesheet" type="text/css" href="./css/common.css">
<link rel="stylesheet" type="text/css" href="./css/member.css">
<script>

   function check_input()
   {
      if (!document.member_form.decide_id.value) {
          alert("아이디를 입력하세요!");    
          document.member_form.id.focus();
          return;
      }

      if (!document.member_form.pass.value) {
          alert("비밀번호를 입력하세요!");    
          document.member_form.pass.focus();
          return;
      }

      if (!document.member_form.pass_confirm.value) {
          alert("비밀번호확인을 입력하세요!");    
          document.member_form.pass_confirm.focus();
          return;
      }

      if (!document.member_form.name.value) {
          alert("이름을 입력하세요!");    
          document.member_form.name.focus();
          return;
      }

      if (!document.member_form.email1.value) {
          alert("이메일 주소를 입력하세요!");    
          document.member_form.email1.focus();
          return;
      }

      if (!document.member_form.email2.value) {
          alert("이메일 주소를 입력하세요!");    
          document.member_form.email2.focus();
          return;
      }

      if (document.member_form.pass.value != 
            document.member_form.pass_confirm.value) {
          alert("비밀번호가 일치하지 않습니다.\n다시 입력해 주세요!");
          document.member_form.pass.focus();
          document.member_form.pass.select();
          return;
      }
        document.member_form.submit();
   }

   function decide(){
        document.getElementById("decide_id").value = document.getElementById("id").value
        document.getElementById("id").disabled = true
        document.getElementById("join_button").disabled = false
        document.getElementById("check_button").value = "다른 ID로 변경"
        document.getElementById("check_button").setAttribute("onclick", "change()")
    }

    function change(){
        document.getElementById("id").disabled = false
        document.getElementById("id").value = ""
        document.getElementById("join_button").disabled = true
        document.getElementById("check_button").value = "ID 중복 검사"
        document.getElementById("check_button").setAttribute("onclick", "check_id()")
    }

   function check_id() {
     window.open("member_check_id.php?id=" + document.member_form.id.value,
         "IDcheck",
          "left=700,top=300,width=350,height=200,scrollbars=no,resizable=yes");
   }
</script>
<script src='https://www.google.com/recaptcha/api.js'></script>
</head>
<body>
	<header>
    	<?php include "header.php";?>
    </header>
	<section>
		<div id="main_img_bar">
            <img src="./img/main_img.png">
        </div>
        <div id="main_content">
      		<div id="join_box">
          	<form  name="member_form" method="post" action="member_insert.php">
			    <h2>회원 가입</h2>
    		    	<div class="form id">
				        <div class="col1">아이디</div>
				        <div class="col2">
							<input id="id" type="text" name="id">
				        </div>  
				        <div class="col3">
                            <input type="button" id="check_button" value="ID 중복 검사" onclick="check_id();"></p>
				        </div>
                        <input type="hidden" name="decide_id" id="decide_id">      
			       	</div>
			       	<div class="clear"></div>

			       	<div class="form">
				        <div class="col1">비밀번호</div>
				        <div class="col2">
							<input type="password" name="pass">
				        </div>                 
			       	</div>
			       	<div class="clear"></div>
			       	<div class="form">
				        <div class="col1">비밀번호 확인</div>
				        <div class="col2">
							<input type="password" name="pass_confirm">
				        </div>                 
			       	</div>
			       	<div class="clear"></div>
			       	<div class="form">
				        <div class="col1">이름</div>
				        <div class="col2">
							<input type="text" name="name">
				        </div>                 
			       	</div>
			       	<div class="clear"></div>
			       	<div class="form email">
				        <div class="col1">이메일</div>
				        <div class="col2">
							<input type="text" name="email1">@<input type="text" name="email2">
				        </div>                 
			       	</div>
                    <div id="google_recaptha">
                            <div class="g-recaptcha" data-sitekey="6Ld4UC4gAAAAAJvKriDYGnXV_PjX4a2vvEhaOAyX"></div>
                    </div>
			       	<div class="clear"></div>
			       	<div class="bottom_line"> </div>
			       	<div class="buttons">
	                    <button type="button" id="join_button" style ="position:relative; left: 5px; " onclick="check_input()" disabled = true>가입하기</button>&nbsp;
	           		</div>
                    </div>
           	</form>
        	</div> <!-- join_box -->
        </div> <!-- main_content -->
	</section> 
	<footer>
    	<?php include "footer.php";?>
    </footer>
</body>
</html>

