<!DOCTYPE html>
<html>
<head> 
<meta charset="utf-8">
<title>Welcom GameSScore</title>
<link rel="stylesheet" type="text/css" href="./css/common.css">
<link rel="stylesheet" type="text/css" href="./css/main.css">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/Swiper/4.5.1/css/swiper.min.css">
<script src="https://developers.kakao.com/sdk/js/kakao.js"></script>
<!-- 페북공유 -->
<meta property="og:type" content="website">
<meta property="og:title" content="test">
<meta property="og:description" content="test">
<meta property="og:image" content="data:image/png;base64,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">
<meta property="og:url" content="localhost/home">

</head>
<body> 
	<header>
    	<?php include "header.php";?>
    </header>
	<section>
	    <?php include "main.php";?>
	</section>
	<footer>	
    	<?php include "footer.php";?>
    </footer>
</body>
<script src="https://unpkg.com/swiper/swiper-bundle.min.js"></script>
<script src="./js/Swiper.js"></script>
</html>
