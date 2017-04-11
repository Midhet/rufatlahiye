<?php

	define("GUVENLIK", true);

	require_once "sistem/ayar.php";
	require_once "sistem/sistem.php";

	if ($ayar["status"] == 1){
		// site açık
		require(TEMA."/index.php");
	}else {
		// site kapalı
		echo "Saytda Texniki İşlər Gedir. Səbriniz üçün təşəkkürlər.";
	}

?>
