<?php echo !defined("ADMIN") ? die("Hacking?") : null; ?>
<?php

	$id = g("id");
	$query = query("SELECT * FROM others WHERE id = '$id'");
	if (mysql_affected_rows() < 1){
		go(URL."/admin");
		exit;
	}

	$row = row($query);
?>

		<?php

			if ($_POST){

				$title = p("title");
				$description_az = p("description_az");
				$description_eng = p("description_eng");
				$description_rus = p("description_rus");
				$status = p("status");

				if (!$title || !$description_az){
                    echo '<div class="alert alert-danger">Əlavə başlığını və açıqlamasını boş buraxmaq olmaz.</div>';
				}else{
					$description =mysql_real_escape_string(htmlspecialchars($description));

						$update = query("UPDATE others SET
							title = '$title',
							description_az = '$description_az',
							description_eng = '$description_eng',
							description_rus = '$description_rus',
							status = '$status'
							WHERE id = '$id'");

						if ($update){

                            echo '<div class="alert alert-success">Dəyişikliklər qeydə alındı. Yönləndirilirsiniz.</div>';
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
            <h2>Əlavəni <strong>Redaktə</strong> Et</h2>
        </div>
        <div class="widget-content padding">
            <form action="" method="post" role="form" enctype="multipart/form-data" id="NotEmptyValidator" novalidate="novalidate" class="bv-form">
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
							<input type="text" class="form-control"  name="title"   value="<?php echo ss($row["title"]); ?>">
						</div>
				<div class="tab-content">
					<div class="tab-pane fade active in" id="demo5-az">
						<div class="form-group">
							<label>Açıqlama</label>
							<input type="text" class="form-control"  name="description_az"  value="<?php echo ss($row["description_az"]); ?>">
						</div>
					</div> <!-- / .tab-pane -->
					<div class="tab-pane fade" id="demo5-eng">
						<div class="form-group">
							<label>Açıqlama</label>
							<input type="text" class="form-control"  name="description_eng"  value="<?php echo ss($row["description_eng"]); ?>">
						</div>
					</div>  <!-- / .tab-pane -->
					<div class="tab-pane fade" id="demo5-rus">
						<div class="form-group">
							<label>Açıqlama</label>
							<input type="text" class="form-control"  name="description_rus"  value="<?php echo ss($row["description_rus"]); ?>">
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
                <button type="submit" class="btn btn-primary">Qeyd et</button>
                <input type="hidden" value="">
            </form>
        </div>
    </div>
</div>
