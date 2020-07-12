<?php 	
	session_start();
	ob_start();
	require_once 'config/init.php';
	require_once 'actions.php';
?>
<!DOCTYPE html>
<html lang="">
<head>
	<meta charset = "utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width-device width, initial-scale-1">
	<title>AID</title>
	<script src="assets/js/jquery.min.js"></script>
	<link rel="stylesheet" href="assets/css/bootstrap.css">
	<link rel="stylesheet" href="assets/css/style.css">
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
	
	<!--Getting the ckeditor jquery library-->
	<script src="assets/js/ckeditor.js"></script>
	
	<!--Google map integration-->
	<script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyDyv2JRXeM49mFnltwH0yZmUIsVWMfmQzk"></script>
	<meta name="google-site-verification" content="o3BqQVHlEa7EJp64_Alj-RpRmvJlHIOBkxECRXrmTTs" />
	
	<!--Google Analytics Api integration-->
	<!-- Global site tag (gtag.js) - Google Analytics -->
    <script async src="https://www.googletagmanager.com/gtag/js?id=UA-129643306-1"></script>
    <script>
      window.dataLayer = window.dataLayer || [];
      function gtag(){dataLayer.push(arguments);}
      gtag('js', new Date());
    
      gtag('config', 'UA-129643306-1');
    </script>
    
    <script async src="//pagead2.googlesyndication.com/pagead/js/adsbygoogle.js"></script>
    <script>
      (adsbygoogle = window.adsbygoogle || []).push({
        google_ad_client: "ca-pub-9225830739896862",
        enable_page_level_ads: true
      });
    </script>

</head>
<body>