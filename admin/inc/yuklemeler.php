 <?php echo !defined("ADMIN") ? die("Hacking?") : null; ?>
	<?php

			if ($_POST){
				$pproduct = p("product");
				$query = query("SELECT id FROM products WHERE title_az = '$pproduct'"); 
				$row = row($query);
				$product = $row['id'];
				
				$title_az = p("title_az");
				$title_eng = p("title_eng");
				$title_rus = p("title_rus");
				$date = p("date");
				$file = p("file");
				

					if (!$product){
                    echo '<div class="alert alert-danger">Xanaları boş buraxmaq olmaz.</div>';
					}else { 
							 
							$insert = query("INSERT INTO product_file SET
							product_id = '$product',
							title_az = '$title_az',
							title_eng = '$title_eng',
							title_rus = '$title_rus',
							date = '$date',
							file = '$file'");

							if ($insert){
									echo '<div class="alert alert-success">Fayl əlavə olundu.</div>';
							}else {
								echo '<div class="alert alert-danger">Mysql Xətası: '.mysql_Error().'</div>';
							}
						   
						
						 	
					}
				}
		?>	
 <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script> 
	<script>
	$(document).ready(function(){
	$('input.typeahead').typeahead({
		name: 'typeahead',
		remote:'/admin/search.php?key=%QUERY',
		limit : 10
	});
});
	</script>
	 



<div class="row">

<div class="col-md-12">
	<div class="widget" style="min-height: 500px;">
		<div class="widget-header transparent">
			<h2><strong>Məhsullar və Yükləmələri</strong></h2>
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
				<input type="text" name="product" class="typeahead tt-query form-control" autocomplete="off" spellcheck="false" placeholder="Məhsul başlığı" required>
		
			</div> 
		<div class="tab-content">
			<div class="tab-pane fade active in" id="demo5-az">
				<div class="form-group">
					<input type="text" name="title_az" class="form-control" placeholder="Başlıq yazın" required>
				</div> 
			</div> 
			<div class="tab-pane fade" id="demo5-eng">
				<div class="form-group">
					<input type="text" name="title_eng" class="form-control" placeholder="Başlıq yazın" required>
				</div> 
			</div> 
			<div class="tab-pane fade" id="demo5-rus">
				<div class="form-group">
					<input type="text" name="title_rus" class="form-control" placeholder="Başlıq yazın" required>
				</div> 
			</div> 
		</div> 
			<div class="form-group">
				<input type="text" name="date" class="form-control datepicker-input" data-mask="99-99-9999" placeholder="dd-mm-yyyy">
			</div> 
			<!--div class="form-group">
				<input type="file" name="dosya" class="btn btn-default" style=" width: 100%; " title="Yüklənəcək faylı seçin">
			</div--> 
			<div class="form-group">
				<div id="message"></div>
			</div>
			<div class="form-group">
				<input type="submit"   value="Əlavə et" class="submit btn btn-danger" />
			</div>
		</form>
		
		 <form id="uploadimage" action="" method="post" enctype="multipart/form-data"> 
<hr id="line">
<label>Fayl yüklə</label>
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
		
		
		
		

  <table style="margin-top: 80px;" data-sortable="" class="table table-hover" data-sortable-initialized="true">
<thead>
	<tr>
		<th>Məhsul</th>
		<th>Başlıq</th>
		<th>Tarix</th>
		<th>Fayl</th>
		<th></th>
	</tr>
</thead> 
<tbody> 
		<?php
			$query3 = query("SELECT * FROM product_file ORDER BY id DESC");
			if (mysql_affected_rows()){
		
			while ($row3 = row($query3)){
				$product_id = $row3['product_id'];
				$query4 = query("SELECT title_az FROM products WHERE id = $product_id");
				$row4 = row($query4);

		?>
		<tr>
			<td class="col-md-3">
				<strong><?php echo $row4['title_az']; ?></strong> 
			</td> 
			<td class="col-md-4">
				<strong><?php echo $row3['title_az']; ?></strong>
			</td> 
			<td class="col-md-2">
				<strong><?php echo $row3['date']; ?></strong>
			</td> 
			<td class="col-md-1">
				<strong><a href="<?php echo URL . $row3['file']; ?>" target="_blank"><i class="fa fa-file"></i></a></strong>
			</td> 
			<td class="col-md-2">
				<a onclick="return confirm('Silmək istədiyinizdən əminsiniz?');" href="<?php echo URL; ?>/admin/index.php?do=yukleme_sil&id=<?php echo $row3["id"]; ?>" class="label label-danger"><i class="fa fa-trash-o"></i> Sil</a>
			</td>

		</tr>
		<?php } ?>

										</tbody>
									</table>
								</div>
							</div>
						</div>
					</div>
				</div>



	<?php }else { ?>
	<div class="alert alert-danger">Əlavə edilməyib.</div>
	<?php } ?>
		
		 

</tbody>
				</table>
		</div>
	</div>
</div>
				</div>


 
