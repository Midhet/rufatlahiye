<div class="main_wrapper">
  <?php

    if ($_POST){

      $user_name = p("user_name");
      $last_name = p("last_name");
      $first_name = p("first_name");
      $user_name = p("user_name");
      $password = md5(p("password"));
      $user_email = p("user_email");
      $gender = p("gender");
      $company = p("company");
      $phone = p("phone");

      if (!$user_name || !$password || !$user_email){
        echo '<h4 class="alert_error">Kullanıcı adı, şifre, e-posta
               alanlarını mutlaka doldurmanız gerekiyor..</h4>';
      }else {

              query("INSERT INTO users SET
              user_name = '$user_name',
              last_name = '$last_name',
              first_name = '$first_name',
              password = '$password',
              user_email = '$user_email',
              gender = '$gender',
              company = '$company',
              phone = '$phone'");

          if (mysql_insert_id() != 0){
              echo '<h4 class="alert_success">Üye başarıyla eklendi.. Yönlendiriliyorsunuz..</h4>';
              go(URL."/index.php?do=login", 2);
            }else {
              echo '<h4 class="alert_error">Bu kullanıcı adı ve ya e-posta daha önce kayıt olundu,
               lütfen başka bir e-posta ve ya kullanıcı adı girin.</h4>';
            }



      }

    }

  ?>
<form class="" action="" method="post">
  <div class="sell_box sell_box_5">
    <h2><strong>Kullanıcı</strong> kaydı</h2>
    <div class="input_wrapper">
      <label><span>* </span><strong>Kullanıcı adı: </strong></label>
      <input name="user_name" type="text" class="txb"/>
    </div>
    <div class="input_wrapper">
      <label><span>* </span><strong>İsim: </strong></label>
      <input name="first_name" type="text" class="txb"/>
    </div>
    <div class="input_wrapper">
      <label><span>* </span><strong>Soyisim: </strong></label>
      <input name="last_name" type="text" class="txb"/>
    </div>
    <div class="input_wrapper last">
      <label><span>* </span><strong>E-posta:</strong></label>
      <input name="user_email" type="text" class="txb"/>
    </div>
    <div class="select_wrapper">
      <label><strong>Cinsiyyet: </strong></label>
      <select name="gender" class="select_5">
        <option>Seçin</option>
        <option value="Erkek">Erkek</option>
        <option value="Kadın">Kadın</option>
      </select>
    </div>
    <div class="input_wrapper">
      <label><span>* </span><strong>Telefon: </strong></label>
      <input name="phone" type="text" class="txb"/>
    </div>
    <div class="input_wrapper">
      <label><span>* </span><strong>Şirket ve ya kuruluş: </strong></label>
      <input name="company" type="text" class="txb"/>
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
