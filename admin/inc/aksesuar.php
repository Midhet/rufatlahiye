 <?php echo !defined("ADMIN") ? die("Hacking?") : null; ?>
	<?php

			if ($_POST){
				$pproduct = p("product");
				$paccessory = p("accessory");
				$query = query("SELECT id FROM products WHERE title_az = '$pproduct'"); 
				$row = row($query);
				$query2 = query("SELECT id FROM products WHERE title_az = '$paccessory'"); 
				$row2 = row($query2);

				$product = $row['id'];
				$accessory = $row2['id'];

					if (!$product || !$accessory){
                    echo '<div class="alert alert-danger">Xanaları boş buraxmaq olmaz.</div>';
					}else {
							$query6 = query("SELECT * FROM product_accessory WHERE product_id = '$product' and accessory_id = '$accessory'");
							if (mysql_affected_rows()){
								
								echo '<div class="alert alert-danger">'.$pproduct.' məhsuluna '.$paccessory.' aksesuarı daha öncə əlavə olunub.</div>';
								
							}else{
								$insert = query("INSERT INTO product_accessory SET
								product_id = '$product',
								accessory_id = '$accessory'");

								if ($insert){
									echo '<div class="alert alert-success">Aksesuar əlavə olundu.</div>';
									//go(URL."/admin/index.php?do=aksesuar", 1);
								}else {
									echo '<div class="alert alert-danger">Mysql Xətası: '.mysql_Error().'</div>';
								}
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
			<h2><strong>Məhsullar və Aksesuarları</strong></h2>
		</div>
		<div class="widget-content">
		<form action="" method="post" role="form" enctype="multipart/form-data" id="NotEmptyValidator" novalidate="novalidate" class="bv-form">
 			<div class="col-md-5">
				<input type="text" name="product" class="typeahead tt-query form-control" autocomplete="off" spellcheck="false" placeholder="Başlıq yazın" required>
		
			</div> 
			<div class="col-md-5">
				<input type="text" name="accessory" class="typeahead tt-query form-control" autocomplete="off" spellcheck="false" placeholder="Başlıq yazın" required>
			</div> 
			<div class="col-md-2">
				<input type="submit" value="Əlavə et" class="submit btn btn-danger" />
			</div>
		</form>

  <table data-sortable="" class="table table-hover" data-sortable-initialized="true">
<thead>
	<tr>
		<th>Məhsul</th>
		<th>Aksesuar</th>
		<th></th>
	</tr>
</thead> 
<tbody> 
		<?php
			$query3 = query("SELECT * FROM product_accessory ORDER BY id DESC");
			if (mysql_affected_rows()){
		
			while ($row3 = row($query3)){
				$product_id = $row3['product_id'];
				$accessory_id = $row3['accessory_id'];
				$query4 = query("SELECT title_az FROM products WHERE id = $product_id");
				$row4 = row($query4);
				$query5 = query("SELECT title_az FROM products WHERE id = $accessory_id");
				$row5 = row($query5);

		?>
		<tr>
			<td class="col-md-5">
				<strong><?php echo $row4['title_az']; ?></strong> 
			</td> 
			<td class="col-md-5">
				<strong><?php echo $row5['title_az']; ?></strong>
			</td> 
			<td class="col-md-2">
				<a onclick="return confirm('Silmək istədiyinizdən əminsiniz?');" href="<?php echo URL; ?>/admin/index.php?do=aksesuar_sil&id=<?php echo $row3["id"]; ?>" class="label label-danger"><i class="fa fa-trash-o"></i> Sil</a>
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


 
