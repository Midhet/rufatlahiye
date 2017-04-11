<?php echo !defined("ADMIN") ? die("Hacking?") : null; ?>

<?php
	$query = query("SELECT * FROM subscribe ORDER BY id DESC");
	if (mysql_affected_rows()){
	?>

<div class="row">

					<div class="col-md-12">
						<div class="widget">
							<div class="widget-header transparent">
								<h2><strong>Abunələr</strong></h2>
							</div>
							<div class="widget-content">

								<div class="table-responsive">
									<table data-sortable="" class="table table-hover" data-sortable-initialized="true">
										<thead>
											<tr>
												<th>Nömrə</th>
												<th>E-mail</th>
												<th>Sil</th>
											</tr>
										</thead>

										<tbody>
										<?php
			while ($row = row($query)){

		?>
		<tr>
			<td class="col-md-2"><?php echo $row["id"]; ?></td>
			<td class="col-md-8">
				<strong><?php echo ss($row["email"]); ?></strong>
			</td>
			<td class="col-md-1">
				<a onclick="return confirm('Silmək istədiyinizdən əminsiniz?');" href="<?php echo URL; ?>/admin/index.php?do=abone_sil&id=<?php echo $row["id"]; ?>" class="label label-danger"><i class="fa fa-trash-o"></i> Sil</a>
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
	<div class="alert alert-danger">Abunə yoxdur.</div>
	<?php } ?>
