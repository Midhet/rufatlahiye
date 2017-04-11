<?php
	echo !defined("ADMIN") ? die("Hacking?") : null;
	session_destroy();
	go(URL."/admin",1);
?>
<div class="alert alert-success">Çıxış etdiniz. Yönləndirilirsiniz...</div>