<?php echo !defined("ADMIN") ? die("Hacking?") : null; ?>
<?php

	$id = g("id");
	$query = query("SELECT * FROM pages WHERE id = '$id'");
	if (mysql_affected_rows() < 1){
		go(URL."/admin");
		exit;
	}

	$row = row($query);
?>

		<?php

			if ($_POST){

				$title_az = p("title_az");
				$title_eng = p("title_eng");
				$description_az = p("description_az");
				$description_eng = p("description_eng");
				$status = p("status");

				if (!$title_az || !$description_az){
                    echo '<div class="alert alert-danger">Səhifə başlığını və açıqlamasını boş buraxmaq olmaz.</div>';
				}else{
					$description_az =mysql_real_escape_string(htmlspecialchars($description_az));
					$description_eng =mysql_real_escape_string(htmlspecialchars($description_eng));

						$update = query("UPDATE pages SET
							title_az = '$title_az',
							title_eng = '$title_eng',
							description_az = '$description_az',
							description_eng = '$description_eng',
							status = '$status'
							WHERE id = '$id'");

						if ($update){

                            echo '<div class="alert alert-success">Dəyişikliklər qeydə alındı. Yönləndirilirsiniz.</div>';
							go(URL."/admin/index.php?do=sabit_sayfalar", 1);
						}else {
                            echo '<div class="alert alert-danger">Mysql Xətası: '.mysql_Error().'</div>';
						}

				}

			}

		?>

<div class="col-sm-12 portlets ui-sortable">
    <div class="widget">
        <div class="widget-header transparent">
            <h2>Səhifəni <strong>Redaktə</strong> Et</h2>
        </div>
        <div class="widget-content padding">
            <form action="" method="post" role="form" enctype="multipart/form-data" id="NotEmptyValidator" novalidate="novalidate" class="bv-form">
                <ul id="demo5" class="nav nav-tabs nav-simple">
					<li class="active">
						<a href="#demo5-home" data-toggle="tab"><i class="fa fa-home"></i> Azərbaycan dili</a>
					</li>
					<li class="">
						<a href="#demo5-profile" data-toggle="tab">İngilis dili</a>
					</li>
				</ul>

				<div class="tab-content">
					<div class="tab-pane fade active in" id="demo5-home">
						<div class="form-group">
							<label>Başlıq</label>
							<input type="text" class="form-control"  name="title_az"   value="<?php echo ss($row["title_az"]); ?>">
						</div>
						<section id="editor">
							<label>Açıqlama</label>
							<textarea id='edit' name="description_az" style="display: none;" ><?php echo ss($row["description_az"]); ?></textarea>
						</section>
					</div> <!-- / .tab-pane -->
					<div class="tab-pane fade" id="demo5-profile">
						<div class="form-group">
							<label>Başlıq</label>
							<input type="text" class="form-control"  name="title_eng"   value="<?php echo ss($row["title_eng"]); ?>">
						</div> 
						<section id="editor">
							<label>Açıqlama</label>
							<textarea id='edit2' name="description_eng" style="display: none;" ><?php echo ss($row["description_eng"]); ?></textarea>
						</section>
					</div>  
				</div> <!-- / .tab-content --> 

                <div class="form-group">
                    <label>Səhifənin vəziyyəti</label>
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
