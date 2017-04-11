<!DOCTYPE html>
<html dir="ltr" lang="en">
<meta http-equiv="content-type" content="text/html;charset=utf-8" />
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title><?php echo SITE_TITLE; ?></title>
<meta name="keywords" content="<?php echo SITE_KEYW; ?>" />
<meta name="description" content="<?php echo SITE_DESC; ?>" />
<link href="<?php echo TEMA_URL; ?>/images/favicon.png" rel="icon" />
<link href="<?php echo TEMA_URL; ?>/css/style.css" type="text/css" rel="stylesheet" />
<script type="text/javascript" src="<?php echo TEMA_URL; ?>/js/jquery.js"></script>
<script type="text/javascript" id="st_insights_js" src="http://w.sharethis.com/button/buttons.js?publisher=5f463474-7117-4884-82ee-46a42ed2fd16"></script>
<script type="text/javascript">stLight.options({publisher: "5f463474-7117-4884-82ee-46a42ed2fd16", doNotHash: false, doNotCopy: false, hashAddressBar: false});</script>
</head>
<body>
<div id="header">
	<div id="logo">
        <a href="<?=url()?>">
            <img src="<?php echo TEMA_URL; ?>/images/logo.png" />
        </a>
    </div>
	<div id="top_right">
		<div id="language">
		<ul id="group" class="dropdown">
			<li class="item01"><a href="#none" class="dir group" title="Language/Region"><?php echo other(2);?></a>
				<ul>
                    <li><a href="/az/">Azərbaycan dili</a></li>
                    <li><a href="/rus/">Pусский</a></li>
                    <li><a href="/eng/">English</a></li>
</ul>			</li>
			<script type="text/javascript">
				$('.item01').hover(function(){
					$(this).find('ul').show();
				}, function(){
					$(this).find('ul').hide();
				});
			</script>
		</ul>
		</div>
		<!--div id="search_top">
		<form method="post" action="/">
			<input type="text" name="pro_name" size="27" class="btn_txt_top" value="" />
			<input type="submit" class="btn_go_top" value="" />
		</form>
		</div-->
	</div>	
</div>
<div id="mainNav">
	<ul class="block">
		<li class="u1" onMouseOver="this.className='u1 u1_over'" onMouseOut="this.className='u1'">
            <a class="a1" href="<?=url();?>"><?php echo other(3); ?></a>
         </li>
		<li class="u1" onMouseOver="this.className='u1 u1_over'" onMouseOut="this.className='u1'">
            <a class="a1" href="<?=url();?>products"><?php echo other(4); ?></a>
         </li>
		<li class="u1" onMouseOver="this.className='u1 u1_over'" onMouseOut="this.className='u1'">
            <a class="a1" href="<?=url();?>news"><?php echo other(8); ?></a>
         </li>
		<li class="u1" onMouseOver="this.className='u1 u1_over'" onMouseOut="this.className='u1'">
            <a class="a1" href="<?=url();?>about"><?php echo other(5); ?></a>
         </li>
		<li class="u1" onMouseOver="this.className='u1 u1_over'" onMouseOut="this.className='u1'">
            <a class="a1" href="<?=url();?>contact"><?php echo other(6); ?></a>
         </li>
	</ul>
	<div class="cl"></div>
</div>


<?php
$actual_link = "$_SERVER[HTTP_HOST]$_SERVER[REQUEST_URI]";
if("$_SERVER[HTTP_HOST]/" == $actual_link ||
   "$_SERVER[HTTP_HOST]/az/" == $actual_link ||
   "$_SERVER[HTTP_HOST]/eng/" == $actual_link  ||
   "$_SERVER[HTTP_HOST]/rus/" == $actual_link){
 require_once "slider.php";
}
?>

<div id="wraper">
<?php tema_icerik();?>
</div>

<style>
#footPara {
padding: 1.5em 0 0 0;
}
#footPara .para-item {
padding: 0 50px 0 0;
}
#footPara #paraA ul {
width: 100%;
}
</style>
<div id="footer">
	<p id="copyright">&copy; 2017 SmartSafety &nbsp;&nbsp;
    </p>
</div>

</body>

</html>