<div class="main_wrapper">
  <?php

  	$id = g("id");
  	$query = query("SELECT * FROM users WHERE id = '$id'");
  	if (mysql_affected_rows() < 1 || session("id") != $id){
  		go(URL."/");
  		exit;
  	}

  	$row = row($query);

    			if ($_POST){

    				$user_name = p("user_name");
    				if (p("password")){
    					$password = md5(p("password"));
    				}else {
    					$password = $row["password"];
    				}
    				$last_name = p("last_name");
    				$first_name = p("first_name");
    				$user_name = p("user_name");
    				$user_email = p("user_email");
    				$gender = p("gender");
    				$company = p("company");
    				$phone = p("phone");

    				if (!$user_name || !$user_email){
    					echo '<h4 class="alert_error">Kullanıcı adı, e-posta
    								 alanlarını mutlaka doldurmanız gerekiyor..</h4>';
    				}else {
    						$update = query("UPDATE users SET
    							user_name = '$user_name',
    							last_name = '$last_name',
    							first_name = '$first_name',
    							password = '$password',
    							user_email = '$user_email',
    							gender = '$gender',
    							company = '$company',
    							phone = '$phone'
    							WHERE id = '$id'");

    						if ($update){
    								echo '<h4 class="alert_success">Profiliniz başarıyla düzenlendi.</h4>';
                    go(URL."/index.php?do=profile&id=".session("id"), 1);
    							}else {
    								echo '<h4 class="alert_error">Bu kullanıcı adı ve ya e-posta daha önce kayıt olundu,
    								 lütfen başka bir e-posta ve ya kullanıcı adı girin.</h4>';
    							}



    				}

    			}
  ?>

<form class="" action="" method="post">
  <div class="sell_box sell_box_5">
    <h2><strong>Kullanıcı</strong> profili</h2>
    <div class="input_wrapper">
      <label><span>* </span><strong>Kullanıcı adı: </strong></label>
      <input  value="<?php echo ss($row["user_name"]); ?>" name="user_name" type="text" class="txb"/>
    </div>
    <div class="input_wrapper">
      <label><span>* </span><strong>İsim: </strong></label>
      <input  value="<?php echo ss($row["first_name"]); ?>"  name="first_name" type="text" class="txb"/>
    </div>
    <div class="input_wrapper">
      <label><span>* </span><strong>Soyisim: </strong></label>
      <input name="last_name" type="text" class="txb"   value="<?php echo ss($row["last_name"]); ?>" />
    </div>
    <div class="input_wrapper last">
      <label><span>* </span><strong>E-posta:</strong></label>
      <input name="user_email" type="text" class="txb"  value="<?php echo ss($row["user_email"]); ?>" />
    </div>
    <div class="select_wrapper">
      <label><strong>Cinsiyyet: </strong></label>
      <select name="gender" class="select_5">
        <option>Seçin</option>
        <option <?php echo $row["gender"] == Erkek ? 'selected' : null; ?> value="Erkek">Erkek</option>
        <option <?php echo $row["gender"] == Kadın ? 'selected' : null; ?> value="Kadın">Kadın</option>
      </select>
    </div>
    <div class="input_wrapper">
      <label><span>* </span><strong>Telefon: </strong></label>
      <input name="phone" type="text" class="txb"  value="<?php echo ss($row["phone"]); ?>" />
    </div>
    <div class="input_wrapper">
      <label><span>* </span><strong>Şirket ve ya kuruluş: </strong></label>
      <input name="company" type="text" class="txb"  value="<?php echo ss($row["company"]); ?>" />
    </div>
    <div class="input_wrapper last">
      <label><span>* </span><strong>Şifre:</strong></label>
      <input name="password" type="password" class="txb"/>
    </div>
    <div class="clear"></div>
  </div>
  <div class="sell_submit_wrapper">
    <input type="submit" value="Kaydet" class="sell_submit"/>
    <div class="clear"></div>
  </div>
</form>
</div>
