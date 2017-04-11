<?php echo !defined("ADMIN") ? die("Hacking?") : null;?>
<article style="padding-bottom: 20px" class="module width_full">
	<header><h3>Sil</h3></header>
	<?php

		$id = g("id");
		$delete = query("DELETE FROM product_file WHERE id = '$id'");
		if ($delete){
			echo '<h4 class="alert_success">Silindi.. Yönləndirilirsiniz...</h4>';
			go(URL."/admin/index.php?do=yuklemeler", 1);
		}else {
			echo '<h4 class="alert_error">Mysql Hatası: '.mysql_Error().'</h4>';
		}

	?>
</article>

<div class="spacer"></div>
