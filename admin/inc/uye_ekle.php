<?php echo !defined("ADMIN") ? die("Hacking?") : null; ?>
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
				$user_type = p("user_type");

				if (!$user_name || !$password || !$user_email || !$user_type){
					echo '<div class="alert alert-danger">Vacib (*) bölmələri doldurun.</div>';
				}else {

								query("INSERT INTO users SET
								user_name = '$user_name',
								last_name = '$last_name',
								first_name = '$first_name',
								password = '$password',
								user_email = '$user_email',
								gender = '$gender',
								company = '$company',
								phone = '$phone',
								user_type = '$user_type'");

						if (mysql_insert_id() != 0){
								echo '<div class="alert alert-success">Yeni istifadəçi əlavə olundu. Yönləndirilirsiniz.</div></h4>';
								go(URL."/admin/index.php?do=uyeler", 1);
							}else {
								echo '<div class="alert alert-danger">Bu istifadəçi adı və ya e-mail daha öncə əlavə olunub. Zəhmət olmazsa, başqa istifadəçi adı və ya e-mail ünvanı seçin.</div>';
							}



				}

			}

		?>

					<div class="col-sm-12 portlets ui-sortable">
						<div class="widget">
							<div class="widget-header transparent">
								<h2><strong>İstifadəçi</strong> Əlavə Et</h2>
							</div>
							<div class="widget-content padding">
								<form action="" method="post" role="form" id="NotEmptyValidator" novalidate="novalidate" class="bv-form">
									<div class="col-sm-4 portlets ui-sortable">
											<div class="form-group">
											<label>(*) İstifadəçi Adı</label>
											<input required type="text" class="form-control"  name="user_name" value="<?php echo $row["user_name"]; ?>">
										  </div>
										  <div class="form-group">
											<label>Ad</label>
											<input type="text" class="form-control"  name="first_name" value="<?php echo $row["first_name"]; ?>">
										  </div>
										  <div class="form-group">
											<label>Soyad</label>
											<input type="text" class="form-control"  name="last_name" value="<?php echo $row["last_name"]; ?>">
										  </div>
									</div>
									<div class="col-sm-4 portlets ui-sortable">
											<div class="form-group">
											<label>(*) Şifrə</label>
											<input required type="password" class="form-control"  name="password" value="<?php echo $row["password"]; ?>">
										  </div>
										  <div class="form-group">
											<label>(*) E-mail</label>
											<input required type="email" class="form-control"  name="user_email" value="<?php echo $row["user_email"]; ?>">
										  </div>
										  <div class="form-group">
											<label>Telefon</label>
											<input type="text" class="form-control"  name="phone" value="<?php echo $row["phone"]; ?>">
										  </div>
									</div>
									<div class="col-sm-4 portlets ui-sortable">
											<div class="form-group">
											<label>Cinsiyyət</label>
												<select  class="form-control" name="gender">
													<option>Seçin</option>
													<option value="Kişi">Kişi</option>
													<option value="Qadın">Qadın</option>
												</select>
										  </div>
										  <div class="form-group">
											<label>(*) İstifadəçi Vəzifəsi</label>
													<select required class="form-control" name="user_type">
														<option>Seçin</option>
														<?php
															$ugroupQuery = query("SELECT * FROM user_type ORDER BY id ASC");
															while ($ugroupRow = row($ugroupQuery)){
																echo '<option ';
																echo 'value="'.$ugroupRow["id"].'">'.ss($ugroupRow["name"]).'</option>';
															}
														?>
													</select>
										  </div>
										  <div class="form-group">
											<label>Şirkət</label>
											<input type="text" class="form-control"  name="company" value="<?php echo $row["company"]; ?>">
										  </div>
									</div>
								  <button type="submit" class="btn btn-primary">Əlavə et</button>
								<input type="hidden" value="">
								</form>
							</div>
						</div>
					</div>
