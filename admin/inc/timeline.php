<?php echo !defined("ADMIN") ? die("Hacking?") : null; ?>

<?php
	$query = query("SELECT * FROM timeline ORDER BY year ASC");
	if (mysql_affected_rows()){
	?>

<div class="row">

					<div class="col-md-12">
						<div class="widget">
							<div class="widget-header transparent">
								<h2><strong>Timeline</strong></h2>
							</div>
							<div class="widget-content">

								<div class="table-responsive">
									<table data-sortable="" class="table table-hover" data-sortable-initialized="true">
										<thead>
											<tr>
												<th>Nömrə</th>
												<th>Tarix</th>
												<th>Başlıq</th>
												<th>Vəziyyəti</th>
												<th>Redaktə</th>
												<th>Sil</th>
											</tr>
										</thead>

										<tbody>
										<?php
			while ($row = row($query)){

		?>
		<tr>
			<td class="col-md-1"><?php echo $row["id"]; ?></td>
			<td class="col-md-3">
				<strong><?php echo ss($row["year"]); ?></strong>
			</td>
			<td class="col-md-3">
				<strong><?php echo ss($row["title_az"]); ?></strong>
			</td>
			<td class="col-md-2">
			<?php

				if ($row["status"] != 0)
					echo "<span class='label label-success'>Açıq</span>";
				else
					echo "<span class='label label-default'>Qapalı</span>";

			?>


			</td>
			<td class="col-md-2">
				<a onclick="return confirm('Redaktə etmək istədiyinizdən əminsiniz?');" href="<?php echo URL; ?>/admin/index.php?do=timeline_duzenle&id=<?php echo $row["id"]; ?>" class="label label-success"><i class="fa fa-cog"></i> Redaktə et</a>
			</td>
			<td class="col-md-1">
				<a onclick="return confirm('Silmək istədiyinizdən əminsiniz?');" href="<?php echo URL; ?>/admin/index.php?do=timeline_sil&id=<?php echo $row["id"]; ?>" class="label label-danger"><i class="fa fa-trash-o"></i> Sil</a>
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
	<div class="alert alert-danger">Timeline boşdur.</div>
	<?php } ?>
