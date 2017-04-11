<?php

	echo !defined("GUVENLIK") ? die("Erisim Engellendi.") : null;


	// SQL INJECTIONLAR
	if (ini_get('magic_quotes_gpc')) {
		function clean($data) {
			if (is_array($data)) {
				foreach ($data as $key => $value) {
					$data[clean($key)] = clean($value);
				}
			} else {
				$data = stripslashes($data);
			}

			return $data;
		}

		$_GET = clean($_GET);
		$_POST = clean($_POST);
		$_COOKIE = clean($_COOKIE);
	}


	function klasor_listele($dizin){
		$dizinAc = opendir($dizin) or die ("Dizin Bulunamadı!");
		while ($dosya = readdir($dizinAc)){
			if (is_dir($dizin."/".$dosya) && $dosya != '.' && $dosya != '..'){
				echo "<option ";
				echo $dosya == TEMA_DIR ? 'selected' : null;
				echo " value='{$dosya}'>{$dosya}</option>";
			}
		}
	}




	function p($par, $st = false){
		if ($st){
			return htmlspecialchars(addslashes(trim($_POST[$par])));
		}else {
			return addslashes(trim($_POST[$par]));
		}
	}

	function g($par){
		return strip_tags(trim(addslashes($_GET[$par])));
	}

	function kisalt($par, $uzunluk = 50){
		if (strlen($par) > $uzunluk){
			$par = mb_substr($par, 0, $uzunluk, "UTF-8")."..";
		}
		return $par;
	}

	function go($par, $time = 0){
		if ($time == 0){
			header("Location: {$par}");
		}else {
			header("Refresh: {$time}; url={$par}");
		}
	}

	function session($par){
		if ($_SESSION[$par]){
			return $_SESSION[$par];
		}else {
			return false;
		}
	}

	function cookie($par){
		if ($_COOKIE[$par]){
			return $_COOKIE[$par];
		}else {
			return false;
		}
	}

	function ss($par){
		return stripslashes($par);
	}
	function st($par){
		return strip_tags($par);
	}

	function other($par){

		## Diger Alanlar ##
		$query = mysql_query("SELECT description_".langId()." FROM others WHERE status = 1 and id = $par");
		$diger = mysql_fetch_array($query);

		return $diger["description_".langId()];
	}

	function session_olustur($par){
		foreach ($par as $anahtar => $deger){
			$_SESSION[$anahtar] = $deger;
		}
	}

	function sef_link($baslik){
		$bul = array('Ç', 'Ş', 'Ğ', 'Ü', 'İ', 'Ö', 'ç', 'ş', 'ğ', 'ü', 'ö', 'ı', '-');
		$yap = array('c', 's', 'g', 'u', 'i', 'o', 'c', 's', 'g', 'u', 'o', 'i', ' ');
		$perma = strtolower(str_replace($bul, $yap, $baslik));
		$perma = preg_replace("@[^A-Za-z0-9\-_]@i", ' ', $perma);
		$perma = trim(preg_replace('/\s+/',' ', $perma));
		$perma = str_replace(' ', '-', $perma);
		return $perma;
	}

	function query($query){
		return mysql_query($query);
	}

	function row($query){
		return mysql_fetch_array($query);
	}

	function rows($query){
		return mysql_num_rows($query);
	}

	function eposta ($adsoyad, $eposta, $konu, $mesaj){
		$header = "MIME-Version: 1.0\r\n";
		$header .= "Content-type: text/html; charset=utf-8\r\n";
		$header .= "From: {$adsoyad} <{$eposta}>\r\n";
		$header .= "Reply-To: {$adsoyad} <{$eposta}>\r\n";
		$mesaj = '<div style="padding: 10px; font-size: 17px; font-weight: bold">'.$konu.'</div>
		<div style="margin: 10px 0; border: 1px solid #ddd; padding: 10px; color: #333">'.nl2br($mesaj).'</div>
		<div style="border-top: 1px solid #ddd; padding: 10px 0; font-style: oblique; color: #aaa">Tüm Hakları Saklıdır. &copy; 2016</div>';
		if(mail(EPOSTA, $konu, $mesaj, $header)){
			return true;
		}else {
			return true;
		}
	}


	function getAy($ay){
		if ($ay == "1"){
			$ay = "Ocak";
		} elseif ($ay == "2"){
			$ay = "Şubat";
		} elseif ($ay == "3"){
			$ay = "Mart";
		} elseif ($ay == "4"){
			$ay = "Nisan";
		} elseif ($ay == "5"){
			$ay = "Mayıs";
		} elseif ($ay == "6"){
			$ay = "Haziran";
		} elseif ($ay == "7"){
			$ay = "Temmuz";
		} elseif ($ay == "8"){
			$ay = "Ağustos";
		} elseif ($ay == "9"){
			$ay = "Eylül";
		} elseif ($ay == "10"){
			$ay = "Ekim";
		} elseif ($ay == "11"){
			$ay = "Kasım";
		} elseif ($ay == "12"){
			$ay = "Aralık";
		}
		return $ay;
	}
	function url($do = '',$id = 0)
	{
		if( $id > 0 )
			return '/'.langId().'/'.$do.'/'.$id;	

		else
			return '/'.langId().'/'.$do;		
	}
	function langId()
	{
		$_GET['lang'] = isset($_GET['lang']) ? $_GET['lang'] : 'az';
		if( ! in_array($_GET['lang'], array('az', 'eng', 'rus') ) )
		{
			$_GET['lang'] = 'az';
		}		
		return $_GET['lang'];		
	}
	

?>
