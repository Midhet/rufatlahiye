
<?php

	$query = query("SELECT * FROM about WHERE id = '1' and status = 1");
	if (mysql_affected_rows() < 1){
    $text = "Səhifə Tapılmadı - ".SITE_TITLE;

  }else {
    $row = row($query);
   $text = html_entity_decode($row["text_".langId()]);
  			}
?>


<div class="main clearfix">
    <h1 class="cate_tit"><?php echo other(5); ?></h1>
    <div class="post_body article_info">
       <?php echo ss($text); ?>
    </div>
</div>