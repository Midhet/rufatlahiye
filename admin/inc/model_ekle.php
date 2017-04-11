<?php echo !defined("ADMIN") ? die("Hacking?") : null; ?>
<article class="module width_full">
	<header><h3>Model Ekle</h3></header>
		<?php

			if ($_POST){

				$marka_id = p("marka_id");
				$name = p("name");

				if (!$name){
					echo '<h4 class="alert_error">Gerekli alanları doldurmalısınız..</h4>';
				}else {

					$query = query("SELECT id FROM model WHERE marka_id = '$marka_id' and name = '$name' ");
					if (mysql_affected_rows()){
						echo '<h4 class="alert_error">Bu Markanın böyle bir Modeli adı bulunuyor, başka bir ad deneyin..</h4>';
					}else {

						$insert = query("INSERT INTO model SET
						marka_id = '$marka_id',
						name = '$name'");

						if ($insert){
							echo '<h4 class="alert_success">Model başarıyla oluşturuldu.. Yönlendiriliyorsunuz..</h4>';
							go(URL."/admin/index.php?do=modeller", 1);
						}else {
							echo '<h4 class="alert_error">Mysql Hatası: '.mysql_Error().'</h4>';
						}

					}

				}

			}

		?>
		<form action="" method="post">
			<div class="module_content">
				<fieldset>
					<label>MARKA İSMİ</label>
					<select name="marka_id">
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
				<fieldset>
					<label>MODEL İSMİ</label>
					<input type="text" name="name" />
				</fieldset>
			</div>
			<footer>
				<div class="submit_link">
					<input type="submit" value="Model Ekle" class="alt_btn">
				</div>
			</footer>
		</form>
</article>

<div class="spacer"></div>
