<?php echo !defined("ADMIN") ? die("Hacking?") : null; ?>
 <?php
	$sayfa = g("s") ? g("s") : 1;
	$ksayisi = rows(query("SELECT id FROM news"));
	$limit = 100;
	$ssayisi = ceil($ksayisi/$limit);
	$baslangic = ($sayfa * $limit) - $limit;
	$query = query("SELECT news.id as newsid, status, title_az, add_time, user_id, user_name FROM news LEFT JOIN users ON news.user_id = users.id    ORDER BY news.id DESC LIMIT $baslangic, $limit");
	if (mysql_affected_rows()){
?>

        <div class="row">
            <div class="col-md-12">
                <div class="widget">
                    <div class="widget-header transparent">
                        <h2><strong>Bütün</strong> Xəbərlər</h2>
                    </div>
                    <div class="widget-content">

                        <div class="table-responsive">
                            <table data-sortable="" class="table table-hover" data-sortable-initialized="true">
                                <thead>
                                <tr>
                                    <th>Nömrə</th>
                                    <th>Başlıq</th>
                                    <th>Tarix</th>
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
                                        <td class="col-md-1"><?php echo $row["newsid"]; ?></td>
                                        <td class="col-md-5">
                                            <strong><?php echo ss($row["title_az"]); ?></strong>
                                        </td>
                                         <td class="col-md-2">
                                            <strong><?php echo ss($row["add_time"]); ?></strong>
                                        </td>
                                        <td class="col-md-1">
                                            <?php

                                            if ($row["status"] != 0)
                                                echo "<span class='label label-success'>Açıq</span>";
                                            else
                                                echo "<span class='label label-default'>Qapalı</span>";

                                            ?>


                                        </td>
                                        <td class="col-md-1">
                                            <a onclick="return confirm('Redaktə etmək istədiyinizdən əminsiniz?');" href="<?php echo URL; ?>/admin/index.php?do=icerik_duzenle&id=<?php echo $row["newsid"]; ?>" class="label label-success"><i class="fa fa-cog"></i> Redaktə et</a>
                                        </td>
                                        <td class="col-md-1">
                                            <a onclick="return confirm('Silmək istədiyinizdən əminsiniz?');" href="<?php echo URL; ?>/admin/index.php?do=icerik_sil&id=<?php echo $row["newsid"]; ?>" class="label label-danger"><i class="fa fa-trash-o"></i> Sil</a>
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
