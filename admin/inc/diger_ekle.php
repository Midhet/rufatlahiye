<?php echo !defined("ADMIN") ? die("Hacking?") : null; ?>

		<?php

			if ($_POST){

				$title = p("title");
				$description_az = p("description_az");
				$description_eng = p("description_eng");
				$description_rus = p("description_rus");
				$status = p("status");

				if (!$title){
					echo '<div class="alert alert-danger">Əlavə başlığını boş buraxmaq olmaz.</div>';
				}else {


						$insert = query("INSERT INTO others SET
						title = '$title',
						description_eng = '$description_eng',
						description_rus = '$description_rus',
						status = '$status',
						description_az = '$description_az'");

						if ($insert){
							echo '<div class="alert alert-success">Əlavə sahə əlavə olundu. Yönləndirilirsiniz.</div>';
							go(URL."/admin/index.php?do=diger", 1);
						}else {
							echo '<div class="alert alert-danger">Mysql Xətası: '.mysql_Error().'</div>';
						}


				}

			}

		?>

					<div class="col-sm-12 portlets ui-sortable">
						<div class="widget">
							<div class="widget-header transparent">
								<h2><strong>Əlavə Sahə</strong> Əlavə Et</h2>
							</div>
							<div class="widget-content padding">
								<form action="" method="post" role="form" id="NotEmptyValidator" novalidate="novalidate" class="bv-form">
								<ul id="demo5" class="nav nav-tabs nav-simple">
									<li class="active">
										<a href="#demo5-az" data-toggle="tab"><i class="fa fa-home"></i> Azərbaycan dili</a>
									</li>
									<li class="">
										<a href="#demo5-eng" data-toggle="tab">İngilis dili</a>
									</li>
									<li class="">
										<a href="#demo5-rus" data-toggle="tab">Rus dili</a>
									</li>
								</ul>

								<div class="form-group">
							<label>Başlıq</label>
							<input type="text" class="form-control"  name="title" >
						</div>
				<div class="tab-content">
					<div class="tab-pane fade active in" id="demo5-az">
						<div class="form-group">
							<label>Açıqlama</label>
							<input type="text" class="form-control"  name="description_az">
						</div>
					</div> <!-- / .tab-pane -->
					<div class="tab-pane fade" id="demo5-eng">
						<div class="form-group">
							<label>Açıqlama</label>
							<input type="text" class="form-control"  name="description_eng">
						</div>
					</div>  
					<div class="tab-pane fade" id="demo5-rus">
						<div class="form-group">
							<label>Açıqlama</label>
							<input type="text" class="form-control"  name="description_rus">
						</div>
					</div>  
				</div> <!-- / .tab-content --> 

									<div class="form-group">
									<label>Əlavənin vəziyyəti</label>
	                                    <select class="form-control" name="status">
	                                        <option value="1" <?php echo $row["status"] ? 'selected' : null; ?>>Açıq</option>
											<option value="0" <?php echo !$row["status"] ? 'selected' : null; ?>>Qapalı</option>
	                                    </select>
									</div>
								 <button type="submit" class="btn btn-primary">Əlavə et</button>
								<input type="hidden" value="">
								</form>
							</div>
						</div>
					</div>
