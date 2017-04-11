<?php

	echo !defined("ADMIN") ? die("Hacking?") : null;
	$query = query("SELECT * FROM settings");
	$row = row($query);

?>
		<?php

			if ($_POST){

				$site = p("site", true);
				$title = p("title", true);
				$description = p("description", true);
				$keywords = p("keywords", true);
				$status = p("status", true);
				$theme = p("theme");
				$email = p("email");

				if (!$site || !$title){
					echo '<div class="alert alert-danger">Önəmli bölmələri boş buaxmayın.</div>';
				}else {

					$update = query("UPDATE settings SET
					site = '$site',
					title = '$title',
					description = '$description',
					keywords = '$keywords',
					status = '$status',
					theme = '$theme',
					email = '$email'");

					if ($update){
						echo '<div class="alert alert-success">Yeni nizamlamalar qeydə alındı.. Yönləndirilirsiniz.</div>';
						go(URL."/admin/index.php?do=".g("do"), 1);
					}else {
						echo '<div class="alert alert-danger">Mysql Xətası: '.mysql_Error().'</div>';
					}

				}

			}

		?>

					<div class="col-sm-12 portlets ui-sortable">
						<div class="widget">
							<div class="widget-header transparent">
								<h2>Sayt <strong>Nizamlamaları</strong></h2>
							</div>
							<div class="widget-content padding">
								<form action="" method="post" role="form" id="NotEmptyValidator" novalidate="novalidate" class="bv-form">
								  <div class="form-group">
									<label>Domen</label>
									<input type="text" class="form-control"  name="site" value="<?php echo $row["site"]; ?>">
								  </div>
								  <div class="form-group">
									<label>Başlıq</label>
									<input type="text" class="form-control"  name="title" value="<?php echo $row["title"]; ?>">
								  </div>
								  <div class="form-group">
									<label>Açıqlama</label>
									<textarea class="form-control" style="height: 80px; resize: none;" name="description"><?php echo ss($row["description"]); ?></textarea>
								  </div>
								  <div class="form-group">
									<label>Açar sözlər</label>
									<textarea class="form-control" style="height: 80px; resize: none;" name="keywords"><?php echo ss($row["keywords"]); ?></textarea>
								  </div>
									<div class="form-group">
									<label>Sayt vəziyyəti</label>
	                                    <select class="form-control" name="status">
	                                        <option value="1" <?php echo $row["status"] ? 'selected' : null; ?>>Açıq</option>
											<option value="0" <?php echo !$row["status"] ? 'selected' : null; ?>>Qapalı</option>
	                                    </select>
									</div>
									<div class="form-group">
									<label>Dizayn</label>
	                                    <select class="form-control" name="theme">
	                                        <?php klasor_listele("../tema"); ?>
	                                    </select>
									</div>
								  <div class="form-group">
									<label>E-mail</label>
									<input type="text" class="form-control"  name="email" value="<?php echo $row["email"]; ?>">
								  </div>
								  <button type="submit" class="btn btn-primary">Qeyd et</button>
								<input type="hidden" value="">
								</form>
							</div>
						</div>
					</div>
