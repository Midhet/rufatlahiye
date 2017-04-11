<?php echo !defined("ADMIN") ? die("Hacking?") : null; ?>
<?php

	$id = g("id");
	$query = query("SELECT * FROM products WHERE id = '$id'");
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
				$title_rus = p("title_rus");
				$description_az = p("description_az");
				$description_eng = p("description_eng");
				$description_rus = p("description_rus");
				$status = p("status");
				$alt_title_az = p("alt_title_az");
				$alt_title_eng = p("alt_title_eng");
				$alt_title_rus = p("alt_title_rus");
				$alt_description_rus = p("alt_description_rus");
				$alt_description_az = p("alt_description_az");
				$alt_description_eng = p("alt_description_eng");
				$file = p("file");
				$category_id = p("category_id");
				$product_id = p("product_id");
				$company_id = p("company_id");
				$type_id = p("type_id");
				
				if(empty($file)){
							$file = ss($row["file"]);
						}
				if (!$title_az || !$description_az){
                    echo '<div class="alert alert-danger">Xidmət başlığını və açıqlamasını boş buraxmaq olmaz.</div>';
				}else{
					$description_az =mysql_real_escape_string(htmlspecialchars($description_az));
					$description_eng =mysql_real_escape_string(htmlspecialchars($description_eng));

						$update = query("UPDATE products SET
							title_az = '$title_az',
							title_eng = '$title_eng',
							title_rus = '$title_rus',
							description_az = '$description_az',
							description_eng = '$description_eng',
							description_rus = '$description_rus',
							status = '$status',
							file = '$file',
							category_id = '$category_id',
							product_id = '$product_id',
							company_id = '$company_id',
							type_id = '$type_id',
							alt_title_az = '$alt_title_az',
							alt_title_eng = '$alt_title_eng',
							alt_title_rus = '$alt_title_rus',
						alt_description_az = '$alt_description_az',
						alt_description_eng = '$alt_description_eng',
						alt_description_rus = '$alt_description_rus'
							WHERE id = '$id'");

						if ($update){

                            echo '<div class="alert alert-success">Dəyişikliklər qeydə alındı. Yönləndirilirsiniz.</div>';
							go(URL."/admin/index.php?do=servisler", 1);
						}else {
                            echo '<div class="alert alert-danger">Mysql Xətası: '.mysql_Error().'</div>';
						}

				}

			}

		?>

<div class="col-sm-12 portlets ui-sortable">
    <div class="widget">
        <div class="widget-header transparent">
            <h2>Xidməti <strong>Redaktə</strong> Et</h2>
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
				<div class="form-group  col-xs-3"> 
						<label>Bölmə</label>
						<select class="form-control" name="category_id">
							<option>Seçin</option>
							<?php
								$mnameQuery = query("SELECT * FROM product_category ORDER BY name_az ASC");
								while ($mnameRow = row($mnameQuery)){
									echo '<option ';
									echo $row["category_id"] == $mnameRow["id"] ? 'selected ' : null;
									echo 'value="'.ss($mnameRow["id"]).'">'.ss($mnameRow["name_az"]).'</option>';
								}
							?>
									</select>
								</div>
								<div class="form-group col-xs-3"> 
									<label>Növü</label>
									<select class="form-control" name="product_id">
										<option>Seçin</option>
										<?php
											$mnameQuery = query("SELECT * FROM product_product ORDER BY name_az ASC");
											while ($mnameRow = row($mnameQuery)){
												echo '<option ';
												echo $row["product_id"] == $mnameRow["id"] ? 'selected ' : null;
												echo 'value="'.ss($mnameRow["id"]).'">'.ss($mnameRow["name_az"]).'</option>';
											}
										?>
									</select>
								</div>
								<div class="form-group col-xs-3"> 
									<label>Marka</label>
									<select class="form-control" name="company_id">
										<option>Seçin</option>
										<?php
											$mnameQuery = query("SELECT * FROM product_company ORDER BY name_az ASC");
											while ($mnameRow = row($mnameQuery)){
												echo '<option ';
												echo $row["company_id"] == $mnameRow["id"] ? 'selected ' : null;
												echo 'value="'.ss($mnameRow["id"]).'">'.ss($mnameRow["name_az"]).'</option>';
											}
										?>
									</select>
								</div>
								<div class="form-group col-xs-3"> 
									<label>Xüsusiyyət</label>
									<select class="form-control" name="type_id">
										<option>Seçin</option>
										<?php
											$mnameQuery = query("SELECT * FROM product_type ORDER BY name_az ASC");
											while ($mnameRow = row($mnameQuery)){
												echo '<option ';
												echo $row["type_id"] == $mnameRow["id"] ? 'selected ' : null;
												echo 'value="'.ss($mnameRow["id"]).'">'.ss($mnameRow["name_az"]).'</option>';
											}
										?>
									</select>
								</div>

				<div class="tab-content">
					<div class="tab-pane fade active in" id="demo5-az"> 
						<div class="form-group">
							<label>Başlıq</label>
							<input type="text" class="form-control"  name="title_az"   value="<?php echo ss($row["title_az"]); ?>">
						</div>
						<div class="form-group">
							<label>Qısa Başlıq</label>
							<input type="text" class="form-control"  name="alt_title_az"   value="<?php echo ss($row["alt_title_az"]); ?>">
						</div>
						<section id="editor">
							<label>Qısa Açıqlama</label>
							<textarea id='edit' name="alt_description_az" style="display: none;" ><?php echo ss($row["alt_description_az"]); ?></textarea>
						</section>
						<section id="editor">
							<label>Açıqlama</label>
							<textarea id='edit' name="description_az" style="display: none;" ><?php echo ss($row["description_az"]); ?></textarea>
						</section>
					</div> <!-- / .tab-pane -->
					<div class="tab-pane fade" id="demo5-eng">
						<div class="form-group">
							<label>Başlıq</label>
							<input type="text" class="form-control"  name="title_eng"   value="<?php echo ss($row["title_eng"]); ?>">
						</div>
						<div class="form-group">
							<label>Qısa Başlıq</label>
							<input type="text" class="form-control"  name="alt_title_eng"   value="<?php echo ss($row["alt_title_eng"]); ?>">
						</div>
						  
						<section id="editor">
							<label>Qısa Açıqlama</label>
							<textarea id='edit' name="alt_description_eng" style="display: none;" ><?php echo ss($row["alt_description_eng"]); ?></textarea>
						</section>
						<section id="editor">
							<label>Açıqlama</label>
							<textarea id='edit2' name="description_eng" style="display: none;" ><?php echo ss($row["description_eng"]); ?></textarea>
						</section>
					</div> <!-- / .tab-pane -->
					<div class="tab-pane fade" id="demo5-rus">
						<div class="form-group">
							<label>Başlıq</label>
							<input type="text" class="form-control"  name="title_rus"   value="<?php echo ss($row["title_rus"]); ?>">
						</div>
						<div class="form-group">
							<label>Qısa Başlıq</label>
							<input type="text" class="form-control"  name="alt_title_rus"   value="<?php echo ss($row["alt_title_rus"]); ?>">
						</div>
						  
						<section id="editor">
							<label>Qısa Açıqlama</label>
							<textarea id='edit' name="alt_description_rus" style="display: none;" ><?php echo ss($row["alt_description_rus"]); ?></textarea>
						</section>
						<section id="editor">
							<label>Açıqlama</label>
							<textarea id='edit3' name="description_rus" style="display: none;" ><?php echo ss($row["description_rus"]); ?></textarea>
						</section>
					</div>  
				</div> <!-- / .tab-content --> 

                <div class="form-group">
                    <label>Xidmətin vəziyyəti</label>
                    <select class="form-control" name="status">
                        <option value="1" <?php echo $row["status"] ? 'selected' : null; ?>>Açıq</option>
                        <option value="0" <?php echo !$row["status"] ? 'selected' : null; ?>>Qapalı</option>
                    </select>
                </div>
<div class="form-group">
	
	<div id="message"></div>
								</div>
								 <button type="submit" class="btn btn-primary">Qeyd et</button>
                <input type="hidden" value="">
            </form>
			 <form id="uploadimage" action="" method="post" enctype="multipart/form-data">
<div id="image_preview"><img id="previewing" style="max-width: 150px; max-height: 150px;" src="<?php echo ss($row["file"]); ?>" /></div>
<hr id="line">
<label>Əsas şəkil</label>
<div id="selectImage">

<input class="btn btn-info" type="file" name="file" title="Seçin" id="file" required />
<input type="submit" value="Yüklə" class="submit btn btn-danger" />
</div>
</form>
 

<script type="text/javascript">
	
$.ajax({
url: "/ajax_php_file.php", // Url to which the request is send
type: "POST",             // Type of request to be send, called as method
data: new FormData(this), // Data sent to server, a set of key/value pairs (i.e. form fields and values)
contentType: false,       // The content type used when sending data to the server.
cache: false,             // To unable request pages to be cached
processData:false,        // To send DOMDocument or non processed data file it is set to false
success: function(data)   // A function to be called if request succeeds
{
$('#loading').hide();
$("#message").html(data);
}
});
	</script>
	
							</div>
						</div>
					</div>
