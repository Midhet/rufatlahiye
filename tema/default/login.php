<div class="main_wrapper">
  <?php

		if (session("login") && session("user_type") == 2){
			go(URL."/");

		}else {

		if ($_POST){

			$user_name = p("user_name");
			$password = md5(p("password"));

			if (!$user_name || !$password){
				echo "Kullanıcı adı ve Şifre Boş Bırakılamaz..";
			}else {

				$query = query("SELECT * FROM users WHERE user_name = '$user_name' && password = '$password' && user_type = 2");
				if (mysql_affected_rows()){

					$row = row($query);
					$session = array(
						"login" => true,
						"id" => $row["id"],
						"user_type" => $row["user_type"],
						"user_name" => $row["user_name"]
					);
					session_olustur($session);

					go(URL."/");

				}else {
					echo "<font color='red'>Kullanıcı adı ve ya şifre yalnış.</font>";
				}

			}

		}

	?>
<form class="" action="" method="post">
  <div class="sell_box sell_box_5">
    <h2><strong>Kullanıcı</strong> girişi</h2>
    <div class="input_wrapper">
      <label><span>* </span><strong>Kullanıcı adı: </strong></label>
      <input name="user_name" type="text" class="txb"/>
    </div>
    <div class="input_wrapper last">
      <label><span>* </span><strong>Şifre:</strong></label>
      <input name="password" type="password" class="txb"/>
    </div>
    <div class="sell_submit_wrapper">
      <input type="submit" value="Giriş" class="sell_submit"/>
      <div class="clear"></div>
    </div>
    <div class="sell_submit_wrapper">
      <a href="/register" class="sell_submit"/>Kayd ol</>
      <div class="clear"></div>
    </div>
    <div class="clear"></div>
  </div>

</form>
</div>
<?php

}

?>
