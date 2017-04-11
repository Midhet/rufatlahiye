<?php echo !defined("ADMIN") ? die("Hacking?") : null; ?>
<article  class="module width_3_quarter" style="padding-bottom: 20px; width: 95%">
<header>
<div style="float: right; font-size: 14px; font-weight: bold; padding: 6px 10px">
	<a href="<?php echo URL; ?>/admin/index.php?do=ilan_ekle">İlan Ekle</a>
</div>
<h3 class="tabs_involved">
ONAYLANMAMIŞ İLAN LİSTESİ
</h3></header>
<div class="tab_container">

	<?php
	$sayfa = g("s") ? g("s") : 1;
	$ksayisi = rows(query("SELECT id FROM posts  WHERE status = 0"));
	$limit = 10;
	$ssayisi = ceil($ksayisi/$limit);
	$baslangic = ($sayfa * $limit) - $limit;
	$query = query("SELECT * FROM post_view WHERE status = 0 LIMIT $baslangic, $limit");
	if (mysql_affected_rows()){
	?>

	<div id="tab1" class="tab_content">
	<table class="tablesorter" cellspacing="0">
	<thead>
		<tr>
			<th width="20px"></th>
			<th width="15%">Marka</th>
			<th width="15%">Model</th>
			<th width="10%">Yıl</th>
			<th width="20%">Fiyat</th>
			<th width="10%">Ekleyen</th>
			<th>Tarih</th>
			<th>İşlemler</th>
		</tr>
	</thead>
	<tbody>
		<?php
			while ($row = row($query)){
		?>
		<tr>
			<td><input type="checkbox"></td>
			<td><?php echo ss($row["markaname"]); ?></td>
			<td><?php echo ss($row["modelname"]); ?></td>
			<td><?php echo ss($row["year"]); ?></td>
			<td><?php echo ss($row["price"]); ?></td>
			<td><a href="<?php echo URL; ?>/admin/index.php?do=uye_duzenle&id=<?php echo $row["user_id"]; ?>"><?php echo ss($row["user_name"]); ?></a></td>
			<td><?php echo $row["add_time"]; ?></td>
			<td>
				<a href="<?php echo URL; ?>/admin/index.php?do=ilan_duzenle&id=<?php echo $row["postsid"]; ?>" title="Düzenle"><img src="images/icn_edit.png" alt=""/></a>
				<a onclick="return confirm('İlanı Silmek İstediğinize Emin misiniz?');" style="margin-left: 10px" href="<?php echo URL; ?>/admin/index.php?do=ilan_sil&id=<?php echo $row["postsid"]; ?>" title="Sil"><img src="images/icn_trash.png" alt=""/></a>
			</td>
		</tr>
		<?php } ?>
	</tbody>
	</table>

	<?php if ($ksayisi > $limit){ ?>
	<form action="" method="get">
		<input type="hidden" value="<?php echo g("do"); ?>" name="do" />
		<ul class="sayfala">
			<li><select name="s">
				<?php
					for ($i = 1; $i <= $ssayisi; $i++){
						echo '<option ';
						echo $i == $sayfa ? 'selected ' : null;
						echo 'value="'.$i.'">'.$i.'. Sayfa</option>';
					}
				?>
			</select></li>
			<li><button type="submit">GÖSTER</button></li>
		</ul>

	</form>
	<?php } ?>

	</div>

	<?php }else { ?>
	<h4 class="alert_warning">Siteye henüz hiç ilan eklenmemiş.</h4>
	<?php } ?>

</div>
</article>
