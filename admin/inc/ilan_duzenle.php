<?php echo !defined("ADMIN") ? die("Hacking?") : null; ?>
<?php

	$id = g("id");
	$query = query("SELECT * FROM posts WHERE id = '$id'");
	if (mysql_affected_rows() < 1){
		go(URL."/admin");
		exit;
	}

	$row = row($query);
?>
		<?php echo !defined("ADMIN") ? die("Hacking?") : null; ?>
		<article class="module width_full">
			<header><h3>İlan düzenle</h3></header>
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
					$status = p("status");
					$info = p("info");

 					if (!$marka || !$model ){
						echo '<h4 class="alert_error">Tüm alanları doldurun.</h4>';
					}else {

							$update = query("UPDATE posts SET
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
							info = '$info',
							photo = '$photo',
							status = '$status'
							WHERE id = '$id'");

							if ($update){
								echo '<h4 class="alert_success">İlan başarıyla güncellendi.. Yönlendiriliyorsunuz..</h4>';
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
										echo $row["marka"] == $mnameRow["id"] ? 'selected ' : null;
										echo 'value="'.ss($mnameRow["id"]).'">'.ss($mnameRow["name"]).'</option>';
									}
								?>
							</select>
						</fieldset>
						<fieldset style="width:48%; float:right;">
							<label>MODEL</label>
							<select name="model"   style="width:92%;">
								<?php
								$marka_id = $row["marka"];
									$monameQuery = query("SELECT * FROM model WHERE marka_id = $marka_id  ORDER BY name ASC");
									while ($monameRow = row($monameQuery)){
										echo '<option ';
										echo $row["model"] == $monameRow["id"] ? 'selected ' : null;
										echo 'value="'.ss($monameRow["id"]).'">'.ss($monameRow["name"]).'</option>';
									}
								?>
							</select>
						</fieldset>
						<fieldset style="width:48%; float:left;">
							<label>YÜRÜYÜŞ MESAFESİ</label>
								<input type="number" name="distance" value="<?php echo ss($row["distance"]); ?>" style="width:92%; margin-left: 10px;">
						</fieldset>
						<fieldset style="width:48%; float:right;">
							<label>YIL</label>
							<select name="year" style="width:92%;">
								<?php
								for($yil = 2016; $yil > 1949; $yil--) {
								  echo "<option ";
									echo $row["year"] == $yil ? 'selected ' : null;
									echo " value='$yil'>" .$yil. "</option>";
								}
								?>
							</select>
						</fieldset>
						<fieldset style="width:48%; float:left;">
							<label>TİP</label>
							<select name="type" style="width:92%;">
								<option value="1" <?php echo $row["type"] == 1 ? 'selected' : null; ?>>Otomobil</option>
								<option value="2" <?php echo $row["type"] == 2 ? 'selected' : null; ?>>Pick-up</option>
								<option value="3" <?php echo $row["type"] == 3 ? 'selected' : null; ?>>Motosiklet</option>
								<option value="4" <?php echo $row["type"] == 4 ? 'selected' : null; ?>>Minivan</option>
								<option value="5" <?php echo $row["type"] == 5 ? 'selected' : null; ?>>Ticari</option>
								<option value="6" <?php echo $row["type"] == 6 ? 'selected' : null; ?>>Kiralık</option>
								<option value="7" <?php echo $row["type"] == 7 ? 'selected' : null; ?>>Klasik</option>
								<option value="8" <?php echo $row["type"] == 8 ? 'selected' : null; ?>>Modifiye</option>
							</select>
						</fieldset>
						<fieldset style="width:48%; float:right;">
							<label>DURUM</label>
							<select name="situation" style="width:92%;">
								<option value="1" <?php echo $row["situation"] == 1 ? 'selected' : null; ?>>Sıfır</option>
								<option value="2" <?php echo $row["situation"] == 2 ? 'selected' : null; ?>>2. El</option>
								<option value="3" <?php echo $row["situation"] == 3 ? 'selected' : null; ?>>Hasarlı</option>
							</select>
						</fieldset>
						<fieldset style="width:48%; float:left;">
							<label>VİTES</label>
							<select name="transmission" style="width:92%;">
								<option value="1" <?php echo $row["situation"] == 1 ? 'selected' : null; ?>>Otomatik</option>
								<option value="2" <?php echo $row["situation"] == 2 ? 'selected' : null; ?>>Manuel</option>
							</select>
						</fieldset>
						<fieldset style="width:48%; float:right;">
							<label>GÜÇ</label>
							<input type="number" value="<?php echo ss($row["hp"]); ?>" name="hp" style="width:92%; margin-left: 10px;">
						</fieldset>
						<fieldset style="width:48%; float:left;">
							<label>FİYAT</label>
							<input type="number" value="<?php echo ss($row["price"]); ?>" name="price" style="width:92%; margin-left: 10px;">
							</fieldset>
							<fieldset style="width:48%; float:right;">
								<label>MOTOR</label>
								<select name="engine" style="width:92%;">
									<?php
									for($motor = 100; $motor <= 10000; $motor+=100) {
										echo "<option ";
										echo $row["transmission"] == $motor ? 'selected ' : null;
										echo " value='$motor'>" .$motor. "</option>";
									}
									?>
								</select>
							</fieldset>
						<fieldset style="width:48%; float:left;">
							<label>DIŞ RENK</label>
							<select name="exterior_color" style="width:92%;">
								<option value="1" <?php echo $row["exterior_color"] == 1 ? 'selected' : null; ?>>Siyah</option>
								<option value="2" <?php echo $row["exterior_color"] == 2 ? 'selected' : null; ?>>Beyaz</option>
								<option value="3" <?php echo $row["exterior_color"] == 3 ? 'selected' : null; ?>>Kırmızı</option>
								<option value="4" <?php echo $row["exterior_color"] == 4 ? 'selected' : null; ?>>Yeşil</option>
								<option value="5" <?php echo $row["exterior_color"] == 5 ? 'selected' : null; ?>>Mavi</option>
							</select>
						</fieldset>
						<fieldset style="width:48%; float:right;">
							<label>İÇ RENK</label>
								<select name="interior_color" style="width:92%;">
									<option value="1" <?php echo $row["interior_color"] == 1 ? 'selected' : null; ?>>Siyah</option>
									<option value="2" <?php echo $row["interior_color"] == 2 ? 'selected' : null; ?>>Beyaz</option>
									<option value="3" <?php echo $row["interior_color"] == 3 ? 'selected' : null; ?>>Kırmızı</option>
									<option value="4" <?php echo $row["interior_color"] == 4 ? 'selected' : null; ?>>Yeşil</option>
									<option value="5" <?php echo $row["interior_color"] == 5 ? 'selected' : null; ?>>Mavi</option>
								</select>
						</fieldset>
						<fieldset style="width:48%; float:left;">
							<label>YAKIT</label>
							<select name="fuel" style="width:92%;">
								<option value="1" <?php echo $row["fuel"] == 1 ? 'selected' : null; ?>>Benzin</option>
								<option value="2" <?php echo $row["fuel"] == 2 ? 'selected' : null; ?>>Dizel</option>
								<option value="3" <?php echo $row["fuel"] == 3 ? 'selected' : null; ?>>Elektrik</option>
							</select>
						</fieldset>
						<fieldset style="width:48%; float:right;">
							<label>DİREKSİYON</label>
							<select name="steering_type" style="width:92%;">
								<option value="1" <?php echo $row["steering_type"] == 1 ? 'selected' : null; ?>>Modern</option>
								<option value="2" <?php echo $row["steering_type"] == 2 ? 'selected' : null; ?>>Klassik</option>
								<option value="3" <?php echo $row["steering_type"] == 3 ? 'selected' : null; ?>>Spor</option>
							</select>
						</fieldset>
						<fieldset style="width:48%; float:left;">
							<label>KOLTUK</label>
							<input type="number" value="<?php echo ss($row["seats"]); ?>" name="seats" style="width:92%; margin-left: 10px;">
						</fieldset>
						<fieldset style="width:48%; float:right;">
							<label>RESİM</label>
							<input type="text" value="<?php echo ss($row["photo"]); ?>" name="photo" style="width:92%; margin-left: 10px;">
						</fieldset>
						<fieldset style="width:100%; ">
							<label>AÇIKLAMA</label>
							<textarea type="text" name="info" style="width: 96%;margin-left: 10px;height: 75px;"><?php echo ss($row["info"]); ?></textarea>
						</fieldset>
						<fieldset>
							<label>İLAN ONAYI</label>
							<select name="status">
								<option value="0" <?php echo $row["status"] == 0 ? 'selected' : null; ?>>Onaylı Değil</option>
								<option value="1" <?php echo $row["status"] == 1 ? 'selected' : null; ?>>Onaylı</option>
							</select>
						</fieldset>
					</div>
					<footer>
						<div class="submit_link">
							<input type="submit" value="Kaydet" class="alt_btn">
						</div>
					</footer>
				</form>
		</article>

		<div class="spacer"></div>
