<?php echo !defined("ADMIN") ? die("Hacking?") : null; ?>
<article class="module width_full">
	<header><h3>İlan Ekle</h3></header>
	<?php

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
						go(URL."/admin/index.php?do=ilanlar", 1);

					}else {
						echo '<h4 class="alert_error">Mysql Hatası: '.mysql_Error().'</h4>';
					}
			}

		}

	?>
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
					$.ajax({url: 'inc/model_sec.php?svalue='+selectvalue,
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
		<form action="" method="post">
			<div class="module_content">
				<fieldset style="width:48%; float:left;">
					<label>MARKA</label>
					<select name="marka"  id="list-select" style="width:92%;">
						<option>Seçin</option>
						<?php
							$mnameQuery = query("SELECT * FROM marka ORDER BY name ASC");
							while ($mnameRow = row($mnameQuery)){
								echo '<option ';
								echo 'value="'.ss($mnameRow["id"]).'">'.ss($mnameRow["name"]).'</option>';
							}
						?>
					</select>
				</fieldset>
				<fieldset style="width:48%; float:right;">
					<label>MODEL</label>
					<select name="model"  id="list-target" style="width:92%;">
					</select>
				</fieldset>
				<fieldset style="width:48%; float:left;">
					<label>YÜRÜYÜŞ MESAFESİ</label>
						<input type="number" name="distance" style="width:92%; margin-left: 10px;">
				</fieldset>
				<fieldset style="width:48%; float:right;">
					<label>YIL</label>
					<select name="year" style="width:92%;">
						<option>Seçin</option>
						<?php
						for($yil = 2016; $yil > 1949; $yil--) {
						  echo "<option value='$yil'>" .$yil. "</option>";
						}
						?>
					</select>
				</fieldset>
				<fieldset style="width:48%; float:left;">
					<label>TİP</label>
					<select name="type" style="width:92%;">
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
				</fieldset>
				<fieldset style="width:48%; float:right;">
					<label>DURUM</label>
					<select name="situation" style="width:92%;">
						<option>Seçin</option>
						<option value="1">Sıfır</option>
						<option value="2">2. El</option>
						<option value="3">Hasarlı</option>
					</select>
				</fieldset>
				<fieldset style="width:48%; float:left;">
					<label>VİTES</label>
					<select name="transmission" style="width:92%;">
						<option>Seçin</option>
						<option value="1">Otomatik</option>
						<option value="2">Manuel</option>
					</select>
				</fieldset>
				<fieldset style="width:48%; float:right;">
					<label>GÜÇ</label>
					<input type="number" name="hp" style="width:92%; margin-left: 10px;">
				</fieldset>
				<fieldset style="width:48%; float:left;">
					<label>FİYAT</label>
					<input type="number" name="price" style="width:92%; margin-left: 10px;">
					</fieldset>
					<fieldset style="width:48%; float:right;">
						<label>MOTOR</label>
						<select name="engine" style="width:92%;">
							<option>Seçin</option>
							<?php
							for($motor = 100; $motor <= 10000; $motor+=100) {
							  echo "<option>" .$motor. "</option>";
							}
							?>
						</select>
					</fieldset>
				<fieldset style="width:48%; float:left;">
					<label>DIŞ RENK</label>
					<select name="exterior_color" style="width:92%;">
						<option>Seçin</option>
						<option value="1">Siyah</option>
						<option value="2">Beyaz</option>
						<option value="3">Kırmızı</option>
						<option value="4">Yeşil</option>
						<option value="5">Mavi</option>
					</select>
				</fieldset>
				<fieldset style="width:48%; float:right;">
					<label>İÇ RENK</label>
					<select name="interior_color" style="width:92%;">
						<option>Seçin</option>
						<option value="1">Siyah</option>
						<option value="2">Beyaz</option>
						<option value="3">Kırmızı</option>
						<option value="4">Yeşil</option>
						<option value="5">Mavi</option>
					</select>
				</fieldset>
				<fieldset style="width:48%; float:left;">
					<label>YAKIT</label>
					<select name="fuel" style="width:92%;">
						<option>Seçin</option>
						<option value="1">Benzin</option>
						<option value="2">Dizel</option>
						<option value="3">Elektrik</option>
					</select>
				</fieldset>
				<fieldset style="width:48%; float:right;">
					<label>DİREKSİYON</label>
					<select name="steering_type" style="width:92%;">
						<option>Seçin</option>
						<option value="1">Modern</option>
						<option value="2">Klassik</option>
						<option value="3">Spor</option>
					</select>
				</fieldset>
				<fieldset style="width:48%; float:left;">
					<label>KOLTUK</label>
					<input type="number" name="seats" style="width:92%; margin-left: 10px;">
				</fieldset>
				<fieldset style="width:48%; float:right;">
					<label>RESİM</label>
					<input type="text" name="photo" style="width:92%; margin-left: 10px;">
				</fieldset>
				<fieldset style="width:100%; ">
					<label>AÇIKLAMA</label>
					<textarea type="text" name="info" style="width: 96%;margin-left: 10px;height: 75px;"></textarea>
				</fieldset>
			</div>
			<footer>
				<div class="submit_link">
					<input type="submit" value="İlan Ekle" class="alt_btn">
				</div>
			</footer>
		</form>
</article>

<div class="spacer"></div>
