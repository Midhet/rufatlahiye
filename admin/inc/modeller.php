<?php echo !defined("ADMIN") ? die("Hacking?") : null; ?>
<article  class="module width_3_quarter" style="padding-bottom: 20px; width: 95%">
<header>
<div style="float: right; font-size: 14px; font-weight: bold; padding: 6px 10px">
	<a href="<?php echo URL; ?>/admin/index.php?do=model_ekle">Model Ekle</a>
</div>
<h3 class="tabs_involved">
MODELLER
</h3></header>
<div class="tab_container">

	<?php
	$query = query("SELECT model.id as modelid,marka_id,marka.name as markaname,model.name as modelname FROM model left join marka on marka_id=marka.id ORDER BY model.name ASC");
	if (mysql_affected_rows()){
	?>

	<div id="tab1" class="tab_content">
	<table class="tablesorter" cellspacing="0">
	<thead>
		<tr>
			<th width="20px"></th>
			<th width="35%">Model Adı</th>
			<th width="35%">Marka Adı</th>
			<th>İD</th>
			<th>İşlemler</th>
		</tr>
	</thead>
	<tbody>
		<?php
			while ($row = row($query)){
		?>
		<tr>
			<td><input type="checkbox"></td>
			<td><?php echo ss($row["modelname"]); ?></td>
			<td><?php echo ss($row["markaname"]); ?></td>
			<td><?php echo $row["modelid"]; ?></td>
			<td>
				<a href="<?php echo URL; ?>/admin/index.php?do=model_duzenle&id=<?php echo $row["modelid"]; ?>" title="Düzenle"><img src="images/icn_edit.png" alt=""/></a>
				<a onclick="return confirm('Bu modeli Silmek İstediğinize Emin misiniz?');" style="margin-left: 10px" href="<?php echo URL; ?>/admin/index.php?do=model_sil&id=<?php echo $row["modelid"]; ?>" title="Sil"><img src="images/icn_trash.png" alt=""/></a>
			</td>
		</tr>
		<?php } ?>
	</tbody>
	</table>
	</div>

	<?php }else { ?>
	<h4 class="alert_warning">Siteye henüz hiç model eklenmemiş.</h4>
	<?php } ?>

</div>
</article>
