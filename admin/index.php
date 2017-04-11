<?php
	define("GUVENLIK", true);
	require_once "../sistem/ayar.php";
	require_once "../sistem/fonksiyon.php";
	define("ADMIN", true);
?><html>
    <head>
        <meta charset="UTF-8">
        <title>Maker Group - <?php echo SITE_TITLE; ?></title>   
        <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no" />
        <meta name="apple-mobile-web-app-capable" content="yes" />
        <meta name="description" content="">
        <meta name="keywords" content="coco bootstrap template, coco admin, bootstrap,admin template, bootstrap admin,">
        <meta name="author" content="Maker Group - Rufat Valizadeh">

        <!-- Base Css Files -->
        <link href="assets/libs/jqueryui/ui-lightness/jquery-ui-1.10.4.custom.min.css" rel="stylesheet" />
        <link href="assets/libs/bootstrap/css/bootstrap.min.css" rel="stylesheet" />
        <link href="assets/libs/font-awesome/css/font-awesome.min.css" rel="stylesheet" />
        <link href="assets/libs/fontello/css/fontello.css" rel="stylesheet" />
        <link href="assets/libs/animate-css/animate.min.css" rel="stylesheet" />
        <link href="assets/libs/nifty-modal/css/component.css" rel="stylesheet" />
        <link href="assets/libs/magnific-popup/magnific-popup.css" rel="stylesheet" /> 
        <link href="assets/libs/ios7-switch/ios7-switch.css" rel="stylesheet" /> 
        <link href="assets/libs/pace/pace.css" rel="stylesheet" />
        <link href="assets/libs/sortable/sortable-theme-bootstrap.css" rel="stylesheet" />
        <link href="assets/libs/bootstrap-datepicker/css/datepicker.css" rel="stylesheet" />
        <link href="assets/libs/jquery-icheck/skins/all.css" rel="stylesheet" />
        <!-- Code Highlighter for Demo -->
        <link href="assets/libs/prettify/github.css" rel="stylesheet" />
        
                <!-- Extra CSS Libraries Start -->
                <link href="assets/libs/bootstrap-select/bootstrap-select.min.css" rel="stylesheet" type="text/css" />
                <link href="assets/libs/summernote/summernote.css" rel="stylesheet" type="text/css" />
                <link href="assets/css/style.css" rel="stylesheet" type="text/css" />
                <!-- Extra CSS Libraries End -->
        <link href="assets/css/style-responsive.css" rel="stylesheet" />

        <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
        <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
        <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
        <script src="https://oss.maxcdn.com/libs/respond.js/1.3.0/respond.min.js"></script>
        <![endif]-->
 <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.4.0/css/font-awesome.min.css">
  <link rel="stylesheet" href="<?php echo URL; ?>/admin/assets/froala/css/froala_editor.css">
  <link rel="stylesheet" href="<?php echo URL; ?>/admin/assets/froala/css/froala_style.css">
  <link rel="stylesheet" href="<?php echo URL; ?>/admin/assets/froala/css/plugins/code_view.css">
  <link rel="stylesheet" href="<?php echo URL; ?>/admin/assets/froala/css/plugins/colors.css">
  <link rel="stylesheet" href="<?php echo URL; ?>/admin/assets/froala/css/plugins/emoticons.css">
  <link rel="stylesheet" href="<?php echo URL; ?>/admin/assets/froala/css/plugins/image_manager.css">
  <link rel="stylesheet" href="<?php echo URL; ?>/admin/assets/froala/css/plugins/image.css">
  <link rel="stylesheet" href="<?php echo URL; ?>/admin/assets/froala/css/plugins/line_breaker.css">
  <link rel="stylesheet" href="<?php echo URL; ?>/admin/assets/froala/css/plugins/table.css">
  <link rel="stylesheet" href="<?php echo URL; ?>/admin/assets/froala/css/plugins/char_counter.css">
  <link rel="stylesheet" href="<?php echo URL; ?>/admin/assets/froala/css/plugins/video.css">
  <link rel="stylesheet" href="<?php echo URL; ?>/admin/assets/froala/css/plugins/fullscreen.css">
  <link rel="stylesheet" href="<?php echo URL; ?>/admin/assets/froala/css/plugins/file.css">

  <link rel="stylesheet" href="<?php echo URL; ?>/admin/assets/froala/css/themes/dark.css">

  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/codemirror/5.3.0/codemirror.min.css">
        <link rel="shortcut icon" href="<?php echo URL; ?>/admin/assets/img/favicon.ico">
        <link rel="apple-touch-icon" href="<?php echo URL; ?>/admin/assets/img/apple-touch-icon.png" />
        <link rel="apple-touch-icon" sizes="57x57" href="<?php echo URL; ?>/admin/assets/img/apple-touch-icon-57x57.png" />
        <link rel="apple-touch-icon" sizes="72x72" href="<?php echo URL; ?>/admin/assets/img/apple-touch-icon-72x72.png" />
        <link rel="apple-touch-icon" sizes="76x76" href="<?php echo URL; ?>/admin/assets/img/apple-touch-icon-76x76.png" />
        <link rel="apple-touch-icon" sizes="114x114" href="<?php echo URL; ?>/admin/assets/img/apple-touch-icon-114x114.png" />
        <link rel="apple-touch-icon" sizes="120x120" href="<?php echo URL; ?>/admin/assets/img/apple-touch-icon-120x120.png" />
        <link rel="apple-touch-icon" sizes="144x144" href="<?php echo URL; ?>/admin/assets/img/apple-touch-icon-144x144.png" />
        <link rel="apple-touch-icon" sizes="152x152" href="<?php echo URL; ?>/admin/assets/img/apple-touch-icon-152x152.png" />
    </head>
    <body class="fixed-left">

	<?php

		if (session("login") && session("user_type") == 1){
			require_once "inc/default.php";
		}else {

		if ($_POST){

			$user_name = p("user_name");
			$password = md5(p("password"));

			if (!$user_name || !$password){
				echo "<script>alert('İstifadəçi adı və ya şifrə boş buraxılmamalıdır.');</script>";
			}else {

				$query = query("SELECT * FROM users WHERE user_name = '$user_name' && password = '$password' && user_type = 1");
				if (mysql_affected_rows()){

					$row = row($query);
					$session = array(
						"login" => true,
						"id" => $row["id"],
						"user_type" => $row["user_type"],
						"user_name" => $row["user_name"]
					);
					session_olustur($session);

					go(URL."/admin");

				}else {
					echo "<script>alert('Belə bir istifadəçi tapılmadı.');</script>";
				}

			}

		}

	?>
  
	<!-- Begin page -->
	<div class="container">
		<div class="full-content-center">
			<p class="text-center"><a href="#"><img style=" width: 50%; " src="https://maker.az/templates/Default/images/logo.png" alt="Logo"></a></p>
			<div class="login-wrap animated flipInX">
				<div class="login-block">
					<form role="form"  action="" method="post">
						<div class="form-group login-input">
						<i class="fa fa-user overlay"></i>
						<input type="text" name="user_name" class="form-control text-input" placeholder="İstifadəçi adı">
						</div>
						<div class="form-group login-input">
						<i class="fa fa-key overlay"></i>
						<input type="password" name="password" class="form-control text-input" placeholder="Şifrə">
						</div>
						
						<div class="row">
							<div class="col-sm-12">
								<button type="submit" class="btn btn-success btn-block">Giriş</button>
							</div>
						</div>
					</form>
				</div>
			</div>
			
		</div>
	</div>
	<!-- the overlay modal element -->
	<div class="md-overlay"></div>
	<!-- End of eoverlay modal -->

	<?php

		}

	?>
	<script>
		var resizefunc = [];
	</script>
	<!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
	<script src="assets/libs/jquery/jquery-1.11.1.min.js"></script>
	<script src="assets/js/typeahead.min.js"></script>
	<script src="assets/libs/bootstrap/js/bootstrap.min.js"></script>
	<script src="assets/libs/jqueryui/jquery-ui-1.10.4.custom.min.js"></script>
	<script src="assets/libs/jquery-ui-touch/jquery.ui.touch-punch.min.js"></script>
	<script src="assets/libs/jquery-detectmobile/detect.js"></script>
	<script src="assets/libs/jquery-animate-numbers/jquery.animateNumbers.js"></script>
	<script src="assets/libs/ios7-switch/ios7.switch.js"></script>
	<script src="assets/libs/fastclick/fastclick.js"></script>
	<script src="assets/libs/jquery-blockui/jquery.blockUI.js"></script>
	<script src="assets/libs/bootstrap-bootbox/bootbox.min.js"></script>
	<script src="assets/libs/jquery-slimscroll/jquery.slimscroll.js"></script>
	<script src="assets/libs/jquery-sparkline/jquery-sparkline.js"></script>
	<script src="assets/libs/nifty-modal/js/classie.js"></script>
	<script src="assets/libs/nifty-modal/js/modalEffects.js"></script>
	<script src="assets/libs/sortable/sortable.min.js"></script>
	<script src="assets/libs/bootstrap-fileinput/bootstrap.file-input.js"></script>
	<script src="assets/libs/bootstrap-select/bootstrap-select.min.js"></script>
	<script src="assets/libs/bootstrap-select2/select2.min.js"></script>
	<script src="assets/libs/magnific-popup/jquery.magnific-popup.min.js"></script> 
	<script src="assets/libs/pace/pace.min.js"></script>
	<script src="assets/js/apps/notes.js"></script>
	<script src="assets/libs/bootstrap-datepicker/js/bootstrap-datepicker.js"></script>
	<script src="assets/libs/jquery-icheck/icheck.min.js"></script>

	<!-- Demo Specific JS Libraries -->
	<script src="assets/libs/prettify/prettify.js"></script>

	<script src="assets/js/init.js"></script>
	<!-- Page Specific JS Libraries -->
	<script src="assets/libs/bootstrap-select/bootstrap-select.min.js"></script>
	<script src="assets/libs/bootstrap-inputmask/inputmask.js"></script>
	<script src="assets/libs/summernote/summernote.js"></script>
	<script src="assets/libs/upload/script.js"></script>
	<script src="assets/js/pages/forms.js"></script>
  <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/codemirror/5.3.0/codemirror.min.js"></script>
  <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/codemirror/5.3.0/mode/xml/xml.min.js"></script>
  <script type="text/javascript" src="<?php echo URL; ?>/admin/assets/froala/js/froala_editor.min.js"></script>
  <script type="text/javascript" src="<?php echo URL; ?>/admin/assets/froala/js/plugins/align.min.js"></script>
  <script type="text/javascript" src="<?php echo URL; ?>/admin/assets/froala/js/plugins/code_beautifier.min.js"></script>
  <script type="text/javascript" src="<?php echo URL; ?>/admin/assets/froala/js/plugins/code_view.min.js"></script>
  <script type="text/javascript" src="<?php echo URL; ?>/admin/assets/froala/js/plugins/colors.min.js"></script>
  <script type="text/javascript" src="<?php echo URL; ?>/admin/assets/froala/js/plugins/draggable.min.js"></script>
  <script type="text/javascript" src="<?php echo URL; ?>/admin/assets/froala/js/plugins/emoticons.min.js"></script>
  <script type="text/javascript" src="<?php echo URL; ?>/admin/assets/froala/js/plugins/font_size.min.js"></script>
  <script type="text/javascript" src="<?php echo URL; ?>/admin/assets/froala/js/plugins/font_family.min.js"></script>
  <script type="text/javascript" src="<?php echo URL; ?>/admin/assets/froala/js/plugins/image.min.js"></script>
  <script type="text/javascript" src="<?php echo URL; ?>/admin/assets/froala/js/plugins/file.min.js"></script>
  <script type="text/javascript" src="<?php echo URL; ?>/admin/assets/froala/js/plugins/image_manager.min.js"></script>
  <script type="text/javascript" src="<?php echo URL; ?>/admin/assets/froala/js/plugins/line_breaker.min.js"></script>
  <script type="text/javascript" src="<?php echo URL; ?>/admin/assets/froala/js/plugins/link.min.js"></script>
  <script type="text/javascript" src="<?php echo URL; ?>/admin/assets/froala/js/plugins/lists.min.js"></script>
  <script type="text/javascript" src="<?php echo URL; ?>/admin/assets/froala/js/plugins/paragraph_format.min.js"></script>
  <script type="text/javascript" src="<?php echo URL; ?>/admin/assets/froala/js/plugins/paragraph_style.min.js"></script>
  <script type="text/javascript" src="<?php echo URL; ?>/admin/assets/froala/js/plugins/video.min.js"></script>
  <script type="text/javascript" src="<?php echo URL; ?>/admin/assets/froala/js/plugins/table.min.js"></script>
  <script type="text/javascript" src="<?php echo URL; ?>/admin/assets/froala/js/plugins/url.min.js"></script>
  <script type="text/javascript" src="<?php echo URL; ?>/admin/assets/froala/js/plugins/entities.min.js"></script>
  <script type="text/javascript" src="<?php echo URL; ?>/admin/assets/froala/js/plugins/char_counter.min.js"></script>
  <script type="text/javascript" src="<?php echo URL; ?>/admin/assets/froala/js/plugins/inline_style.min.js"></script>
  <script type="text/javascript" src="<?php echo URL; ?>/admin/assets/froala/js/plugins/save.min.js"></script>
  <script type="text/javascript" src="<?php echo URL; ?>/admin/assets/froala/js/plugins/fullscreen.min.js"></script>
  <script type="text/javascript" src="<?php echo URL; ?>/admin/assets/froala/js/plugins/quote.min.js"></script>
  <script type="text/javascript" src="<?php echo URL; ?>/admin/assets/js/typeahead.min.js"></script>

  <script>
    $(function(){
      $('#edit,#edit2, #edit3').froalaEditor({
        theme: 'dark'
      })
    });
  </script>
	</body>
</html>
