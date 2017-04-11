<?php echo !defined("ADMIN") ? die("Hacking?") : null; ?>

	<?php
	$sayfa = g("s") ? g("s") : 1;
	$ksayisi = rows(query("SELECT id FROM users"));
	$limit = 10;
	$ssayisi = ceil($ksayisi/$limit);
	$baslangic = ($sayfa * $limit) - $limit;
	$query = query("SELECT * FROM users ORDER BY id DESC LIMIT $baslangic, $limit");
	if (mysql_affected_rows()){
	?>
	<div class="row">
			<div class="col-md-12">
					<div class="widget">
							<div class="widget-header transparent">
									<h2><strong>Bütün</strong> İstifadəçilər</h2>
							</div>
							<div class="widget-content">

									<div class="table-responsive">
											<table data-sortable="" class="table table-hover" data-sortable-initialized="true">
													<thead>
													<tr>
															<th>Nömrə</th>
															<th>İstifadəçi Adı</th>
															<th>E-mail</th>
															<th>Tarix</th>
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
																			<strong><?php echo ss($row["user_name"]); ?></strong>
																	</td>
																	 <td class="col-md-3">
																			<strong><?php echo ss($row["user_email"]); ?></strong>
																	</td>
																	 <td class="col-md-3">
																			<strong><?php echo ss($row["register_date"]); ?></strong>
																	</td>
																	<td class="col-md-1">
																			<a onclick="return confirm('Redaktə etmək istədiyinizdən əminsiniz?');" href="<?php echo URL; ?>/admin/index.php?do=uye_duzenle&id=<?php echo $row["id"]; ?>" class="label label-success"><i class="fa fa-cog"></i> Redaktə et</a>
																	</td>
																	<td class="col-md-1">
																			<a onclick="return confirm('Silmək istədiyinizdən əminsiniz?');" href="<?php echo URL; ?>/admin/index.php?do=uye_sil&id=<?php echo $row["id"]; ?>" class="label label-danger"><i class="fa fa-trash-o"></i> Sil</a>
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
	<div class="alert alert-danger">Xəbər əlavə edilməyib.</div>
<?php } ?>
