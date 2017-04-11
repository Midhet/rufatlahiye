<?php echo !defined("ADMIN") ? die("Hacking?") : null; ?>
<?php

	$id = g("id");
	$query = query("SELECT * FROM team WHERE id = '$id'");
	if (mysql_affected_rows() < 1){
		go(URL."/admin");
		exit;
	}

	$row = row($query);
?>

		<?php

			if ($_POST){

				$name_az = p("name_az");
				$job_az = p("job_az");
				$name_eng = p("name_eng");
				$job_eng = p("job_eng");
				$description_az = p("description_az");
				$description_eng = p("description_eng");
				$facebook = p("facebook");
				$twitter = p("twitter");
				$linkedin = p("linkedin");
				$mail = p("mail");
				$status = p("status");
				$link = p("link");
				$file = p("file");
				
				if(empty($file)){
							$file = ss($row["file"]);
						}
				if (!$name_az){
                    echo '<div class="alert alert-danger">Üzv adını boş buraxmaq olmaz.</div>';
				}else{
					$description_az = mysql_real_escape_string(htmlspecialchars($description_az));
					$description_eng = mysql_real_escape_string(htmlspecialchars($description_eng));
						$update = query("UPDATE team SET
						name_az = '$name_az',
						job_az = '$job_az',
						name_eng = '$name_eng',
						job_eng = '$job_eng',
						description_az = '$description_az',
						description_eng = '$description_eng',
						facebook = '$facebook',
						twitter = '$twitter',
						linkedin = '$linkedin',
						mail = '$mail',
						status = '$status',
						link = '$link',
						file = '$file'
							WHERE id = '$id'");

						if ($update){

                            echo '<div class="alert alert-success">Dəyişikliklər qeydə alındı. Yönləndirilirsiniz.</div>';
							go(URL."/admin/index.php?do=team", 1);
						}else {
                            echo '<div class="alert alert-danger">Mysql Xətası: '.mysql_Error().'</div>';
						}

				}

			}

		?>

<div class="col-sm-12 portlets ui-sortable">
    <div class="widget">
        <div class="widget-header transparent">
            <h2>Üzvü <strong>Redaktə</strong> Et</h2>
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
												<label>Adı</label>
												<input type="text" class="form-control"  name="name_az"  value="<?php echo ss($row["name_az"]); ?>">
										</div>
										<div class="form-group">
												<label>Vəzifəsi</label>
												<input type="text" class="form-control"  name="job_az"  value="<?php echo ss($row["job_az"]); ?>">
										</div>
										<section id="editor">
											<label>Açıqlama</label>
											<textarea id='edit' name="description_az" style="display: none;" ><?php echo ss($row["description_az"]); ?></textarea>
										</section>
									</div> <!-- / .tab-pane -->
									<div class="tab-pane fade" id="demo5-profile">
										<div class="form-group">
												<label>Adı</label>
												<input type="text" class="form-control"  name="name_eng"  value="<?php echo ss($row["name_eng"]); ?>">
										</div>
										<div class="form-group">
												<label>Vəzifəsi</label>
												<input type="text" class="form-control"  name="job_eng"  value="<?php echo ss($row["job_eng"]); ?>">
										</div>
										<section id="editor">
											<label>Açıqlama</label>
											<textarea id='edit2' name="description_eng" style="display: none;" ><?php echo ss($row["description_eng"]); ?></textarea>
										</section>
									</div>  
								</div> <!-- / .tab-content -->
								<div class="form-group">
										<label>Facebook</label>
										<input type="text" class="form-control"  name="facebook" value="<?php echo ss($row["facebook"]); ?>">
								</div>
								<div class="form-group">
										<label>Twitter</label>
										<input type="text" class="form-control"  name="twitter" value="<?php echo ss($row["twitter"]); ?>">
								</div>
								<div class="form-group">
										<label>Linkedin</label>
										<input type="text" class="form-control"  name="linkedin" value="<?php echo ss($row["linkedin"]); ?>">
								</div>
								<div class="form-group">
										<label>E-mail</label>
										<input type="text" class="form-control"  name="mail" value="<?php echo ss($row["mail"]); ?>">
								</div>
								<div class="form-group">
										<label>Link</label>
										<input type="text" class="form-control"  name="link" value="<?php echo ss($row["link"]); ?>">
								</div>

                <div class="form-group">
                    <label>İş vəziyyəti</label>
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
