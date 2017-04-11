<?php echo !defined("ADMIN") ? die("Hacking?") : null; ?>
<?php

	$query = query("SELECT * FROM about WHERE id = '1'");
	if (mysql_affected_rows() < 1){
		go(URL."/admin");
		exit;
	}

	$row = row($query);
?>

		<?php

			if ($_POST){

				$text_az = p("text_az");
				$text_eng = p("text_eng");
				$text_rus = p("text_rus");
				$status = p("status");

				if (!$text_az){
                    echo '<div class="alert alert-danger">Səhifə açıqlamasını boş buraxmaq olmaz.</div>';
				}else{
					$text_az =mysql_real_escape_string(htmlspecialchars($text_az));
					$text_eng =mysql_real_escape_string(htmlspecialchars($text_eng));
					$text_rus =mysql_real_escape_string(htmlspecialchars($text_rus));

						$update = query("UPDATE about SET
							text_az = '$text_az',
							text_eng = '$text_eng',
							text_rus = '$text_rus',
							status = '$status'
							WHERE id = '1'");

						if ($update){

                            echo '<div class="alert alert-success">Dəyişikliklər qeydə alındı. Yönləndirilirsiniz.</div>';
							go(URL."/admin/index.php?do=about", 1);
						}else {
                            echo '<div class="alert alert-danger">Mysql Xətası: '.mysql_Error().'</div>';
						}

				}

			}

		?>

<div class="col-sm-12 portlets ui-sortable">
    <div class="widget">
        <div class="widget-header transparent">
            <h2>Haqqında Bölümünü <strong>Redaktə</strong> Et</h2>
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

				<div class="tab-content">
					<div class="tab-pane fade active in" id="demo5-az"> 
					<section id="editor">
						<label>Açıqlama</label>
						<textarea id='edit' name="text_az" style="display: none;" ><?php echo ss($row["text_az"]); ?></textarea>
					</section>
						
					</div> <!-- / .tab-pane -->
					<div class="tab-pane fade" id="demo5-eng"> 
						  
						<section id="editor">
							<label>Açıqlama</label>
							<textarea id='edit2' name="text_eng" style="display: none;" ><?php echo ss($row["text_eng"]); ?></textarea>
						</section>
					</div> <!-- / .tab-pane -->
					<div class="tab-pane fade" id="demo5-rus"> 
						  
						<section id="editor">
							<label>Açıqlama</label>
							<textarea id='edit3' name="text_rus" style="display: none;" ><?php echo ss($row["text_rus"]); ?></textarea>
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
