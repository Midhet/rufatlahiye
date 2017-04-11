
	<?php

if (!session("login") && session("user_type") == !2){
  	go(URL."/login");

}else {
		if ($_POST){

			$marka = p("marka");
			$model = p("model");
			$type = p("type");
			$year = p("year");
			$situation = p("situation");
			$distance = p("distance");
			$transmission = p("transmission");
			$price = p("price");
			$engine = p("engine");
			$hp = p("hp");
			$exterior_color = p("exterior_color");
			$interior_color = p("interior_color");
			$fuel = p("fuel");
			$steering_type = p("steering_type");
			$seats = p("seats");
			$photo = p("photo");
			$info = p("info");
			$user_id = $_SESSION["id"];

			if (!$marka || !$model ){
				echo '<h4 class="alert_error">Tüm alanları doldurun.</h4>';
			}else {

					$insert = query("INSERT INTO posts SET
					marka = '$marka',
					model = '$model',
					type = '$type',
					year = '$year',
					situation = '$situation',
					distance = '$distance',
					transmission = '$transmission',
					price = '$price',
          engine = '$engine',
          hp = '$hp',
					exterior_color = '$exterior_color',
					interior_color = '$interior_color',
					steering_type = '$steering_type',
					seats = '$seats',
					user_id = '$user_id',
					info = '$info',
					photo = '$photo'
					");

					if ($insert){
						echo '<h4 class="alert_success">İlan başarıyla eklendi.. Yönlendiriliyorsunuz..</h4>';
						go(URL."/index.php?do=profile&id=".session("id"), 1);

					}else {
						echo '<h4 class="alert_error">Mysql Hatası: '.mysql_Error().'</h4>';
					}
			}

		}

	?>
  <div class="main_wrapper">

    	<script type="text/javascript">

    			$(document).ready(function($) {
    				var list_target_id = 'list-target'; //first select list ID
    			  var list_select_id = 'list-select'; //second select list ID
    			  var initial_target_html = '<option value="">Önce Marka seçin...</option>'; //Initial prompt for target select

    			$('#'+list_target_id).html(initial_target_html); //Give the target select the prompt option

    			$('#'+list_select_id).change(function(e) {
    				//Grab the chosen value on first select list change
    				var selectvalue = $(this).val();

    				//Display 'loading' status in the target select list
    				$('#'+list_target_id).html('<option value="">Yükleniryor...</option>');

    				if (selectvalue == "") {
    						//Display initial prompt in target select if blank value selected
    					 $('#'+list_target_id).html(initial_target_html);
    				} else {
    					//Make AJAX request, using the selected value as the GET
    					$.ajax({url: '/admin/inc/model_sec.php?svalue='+selectvalue,
    								 success: function(output) {
    										//alert(output);
    										$('#'+list_target_id).html(output);
    								},
    							error: function (xhr, ajaxOptions, thrownError) {
    								alert(xhr.status + " "+ thrownError);
    							}});
    						}
    				});
    			});
    	</script>
  <form class="" action="" method="post">
    <div class="sell_box sell_box_5">
      <h2><strong>İlan</strong> ekle</h2>
      <div class="select_wrapper">
        <label><strong>Marka: </strong></label>
          <select name="marka"  id="list-select"  class="select_5">
      			<option>Seçin</option>
      			<?php
      				$mnameQuery = query("SELECT * FROM marka ORDER BY name ASC");
      				while ($mnameRow = row($mnameQuery)){
      					echo '<option ';
      					echo 'value="'.ss($mnameRow["id"]).'">'.ss($mnameRow["name"]).'</option>';
      				}
      			?>
      		</select>
      </div>
      <div class="select_wrapper">
        <label><strong>Model: </strong></label>
          <select name="model"  id="list-target" style=" border: 1px solid #D1D5DC; border-radius: 3px; background: #FFFFFF; display: block; color: #798FA1; font-size: 13px; height: 28px; line-height: 28px; font-family: 'PTSansRegular',Arial,sans-serif; padding: 1px 0 0 11px; box-shadow: 0 1px 0 0 #FFFFFF; width: 205px; background: url(../images/select_marker.gif) no-repeat right 13px #FFFFFF; ">
      		</select>
      </div>
      <div class="input_wrapper">
        <label><span>* </span><strong>Yürüyüş Mesafesi: </strong></label>
        <input name="distance" type="number" class="txb"/>
      </div>
      <div class="select_wrapper last">
        <label><strong>Yıl: </strong></label>
          <select name="year" class="select_5">
      			<option>Seçin</option>
            <?php
              for($yil = 2016; $yil > 1949; $yil--) {
                echo "<option value='$yil'>" .$yil. "</option>";
              }
            ?>
      		</select>
      </div>
      <div class="select_wrapper">
        <label><strong>Tip: </strong></label>
          <select name="type" class="select_5">
            <option>Seçin</option>
						<option value="1">Otomobil</option>
						<option value="2">Pick-up</option>
						<option value="3">Motosiklet</option>
						<option value="4">Minivan</option>
						<option value="5">Ticari</option>
						<option value="6">Kiralık</option>
						<option value="7">Klasik</option>
						<option value="8">Modifiye</option>
      		</select>
      </div>
      <div class="select_wrapper ">
        <label><strong>Durum: </strong></label>
          <select name="situation" class="select_5">
            <option>Seçin</option>
						<option value="1">Sıfır</option>
						<option value="2">2. El</option>
						<option value="3">Hasarlı</option>
      		</select>
      </div>
      <div class="select_wrapper ">
        <label><strong>Vites: </strong></label>
          <select name="transmission" class="select_5">
            <option>Seçin</option>
						<option value="1">Otomatik</option>
						<option value="2">Manuel</option>
      		</select>
      </div>
      <div class="input_wrapper last">
        <label><span>* </span><strong>Güç: </strong></label>
        <input type="number" name="hp" class="txb"/>
      </div>
      <div class="input_wrapper">
        <label><span>* </span><strong>Fiyat: </strong></label>
        <input type="number" name="price" class="txb"/>
      </div>
      <div class="select_wrapper ">
        <label><strong>Motor: </strong></label>
          <select name="transmission" class="select_5">
            <option>Seçin</option>
            <?php
            for($motor = 100; $motor <= 10000; $motor+=100) {
              echo "<option>" .$motor. "</option>";
            }
            ?>
      		</select>
      </div>
      <div class="select_wrapper ">
        <label><strong>Dış renk: </strong></label>
          <select name="exterior_color" class="select_5">
            <option>Seçin</option>
            <option value="1">Siyah</option>
						<option value="2">Beyaz</option>
						<option value="3">Kırmızı</option>
						<option value="4">Yeşil</option>
						<option value="5">Mavi</option>
      		</select>
      </div>
      <div class="select_wrapper last">
        <label><strong>İç renk: </strong></label>
          <select name="interior_color" class="select_5">
            <option>Seçin</option>
            <option value="1">Siyah</option>
						<option value="2">Beyaz</option>
						<option value="3">Kırmızı</option>
						<option value="4">Yeşil</option>
						<option value="5">Mavi</option>
      		</select>
      </div>
      <div class="select_wrapper ">
        <label><strong>Direksiyon: </strong></label>
          <select name="steering_type" class="select_5">
            <option>Seçin</option>
            <option value="1">Modern</option>
						<option value="2">Klassik</option>
						<option value="3">Spor</option>
      		</select>
      </div>
      <div class="input_wrapper">
        <label><span>* </span><strong>Koltuk: </strong></label>
        <input type="number" name="seats" class="txb"/>
      </div>
      <div class="input_wrapper">
        <label><span>* </span><strong>Resim: </strong></label>
        <input type="text" name="photo" class="txb"/>
      </div>
      <div class="input_wrapper last">
        <label><span>* </span><strong>Açıklama: </strong></label>
        <textarea style="height: 80px;" name="info" class="txb"></textarea>
      </div>
      <div class="clear"></div>
    </div>
    <div class="sell_submit_wrapper">
      <input type="submit" value="Kaydet" class="sell_submit"/>
      <div class="clear"></div>
    </div>
  </form>
  </div>
<?php } ?>
