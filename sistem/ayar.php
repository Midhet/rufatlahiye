<?php

	session_start();
	ob_start("ob_gzhandler");

	echo !defined("GUVENLIK") ? die("Erisim Engellendi") : null;

	## Hataları Gizle ##  
	error_reporting(0);

	## Bağlantı Değişkenleri ##
	$host 	= "localhost";
	$user 	= "smart_rufat";
	$pass 	= "@m3Okke&H]2d";
	$db	= "smart_rufat";

	## Mysql Bağlantısı ##
	$baglan = mysql_connect($host, $user, $pass) or die (mysql_Error());

	## Veritabanı Seçimi ##
	mysql_select_db($db, $baglan) or die (mysql_Error());

	## Karakter Sorunu ##
	mysql_query("SET CHARACTER SET 'utf8'");
	mysql_query("SET NAMES 'utf8'");

	## Genel Ayarları ##
	$query = mysql_query("SELECT * FROM settings");
	$ayar = mysql_fetch_array($query);

		## Sabitler ##
		define("PATH", realpath("."));
		define("URL", $ayar["site"]);
		define("TEMA_URL", $ayar["site"]."/tema/".$ayar["theme"]);
		define("TEMA", PATH."/tema/".$ayar["theme"]);
		define("TEMA_DIR", $ayar["theme"]);
		define("SITE_TITLE", $ayar["title"]);
		define("SITE_DESC", $ayar["description"]);
		define("SITE_KEYW", $ayar["keywords"]);
		define("EPOSTA", $ayar["email"]); 

?>
