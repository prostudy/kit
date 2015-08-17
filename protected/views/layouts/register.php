<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">

	<meta name="viewport" content="width=device-width, initial-scale=1.0" />
	<meta name="description" content="nyce kit sgdp" />
	<meta name="author" content="" />

	<title><?= Constants::TAG_TITLE?></title>

	<link rel="stylesheet" href="http://fonts.googleapis.com/css?family=Arimo:400,700,400italic">
	<link rel="stylesheet" href="<?=Yii::app()->request->baseUrl;?>/assets/css/fonts/linecons/css/linecons.css">
	<link rel="stylesheet" href="<?=Yii::app()->request->baseUrl;?>/assets/css/fonts/fontawesome/css/font-awesome.min.css">
	<link rel="stylesheet" href="<?=Yii::app()->request->baseUrl;?>/assets/css/bootstrap.css">
	<link rel="stylesheet" href="<?=Yii::app()->request->baseUrl;?>/assets/css/xenon-core.css">
	<link rel="stylesheet" href="<?=Yii::app()->request->baseUrl;?>/assets/css/xenon-forms.css">
	<link rel="stylesheet" href="<?=Yii::app()->request->baseUrl;?>/assets/css/xenon-components.css">
	<link rel="stylesheet" href="<?=Yii::app()->request->baseUrl;?>/assets/css/xenon-skins.css">
	<link rel="stylesheet" href="<?=Yii::app()->request->baseUrl;?>/assets/css/custom.css">

	<!-- <script src="<?=Yii::app()->request->baseUrl;?>/assets/js/jquery-1.11.1.min.js"></script> -->

	<!-- HTML5 shim and Respond.js IE8 support of HTML5 elements and media queries -->
	<!--[if lt IE 9]>
		<script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
		<script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
	<![endif]-->


</head>

<body class="page-body">

	
	
	<div class="page-container"><!-- add class "sidebar-collapsed" to close sidebar by default, "chat-visible" to make chat appear always -->
			
		<!-- Add "fixed" class to make the sidebar fixed always to the browser viewport. -->
		<!-- Adding class "toggle-others" will keep only one menu item open at a time. -->
		<!-- Adding class "collapsed" collapse sidebar root elements and show only icons. -->
		
	
		<div class="main-content" style="">
					
			
			<div class="page-title">
			
				<div class="title-env">
					<img src="http://pmstudykit.com/kitsgdp/images/nyce_logo.png" alt="" width="200">
				</div>
			
			<div class="breadcrumb-env">
					<ol class="breadcrumb bc-1">
						<li>
							<a href="<?php echo Yii::app()->createAbsoluteUrl("Site/login"); ?>"><i class="fa-home"></i>Iniciar sesión</a>
						</li>
						<li>
							<a href="<?php echo Yii::app()->createAbsoluteUrl("Register"); ?>">Registrar Código</a>
						</li>
					</ol>	
				</div>
				
			</div>
			
			
			<?php echo $content;?>
				
			<!-- Main Footer -->
			<!-- Choose between footer styles: "footer-type-1" or "footer-type-2" -->
			<!-- Add class "sticky" to  always stick the footer to the end of page (if page contents is small) -->
			<!-- Or class "fixed" to  always fix the footer to the end of page -->
			<footer class="main-footer sticky footer-type-1" style="margin-top: 546px;">
				
				<div class="footer-inner">
					<?php require_once 'chunks/footer.php';?>
				</div>
			</footer>
		</div>
	
	</div>


	<!-- Bottom Scripts -->
	<script src="assets/js/bootstrap.min.js"></script>
	<script src="assets/js/TweenMax.min.js"></script>
	<script src="assets/js/resizeable.js"></script>
	<script src="assets/js/joinable.js"></script>
	<script src="assets/js/xenon-api.js"></script>
	<script src="assets/js/xenon-toggles.js"></script>


	<!-- JavaScripts initializations and stuff -->
	<script src="assets/js/xenon-custom.js"></script>


</body>
</html>