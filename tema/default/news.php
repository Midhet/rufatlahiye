
    <?php
    	$query = query("SELECT * FROM news WHERE status = 1 Order By id DESC  ");
    	if (mysql_affected_rows() < 1){
        echo "Səhifə Tapılmadı - ".SITE_TITLE;
      }else {
    ?> 	
		
		<div class="main clearfix">
		<h1 class="cate_tit"><?php echo other(8); ?></h1>
		<ul class="press_list">
						<?php while ($row = row($query)){ ?>
						<li>
							<a href="<?=url('news_single', $row["id"])?>"><img src="<?php echo URL . $row["file"]; ?>"></a>
											<div class="news_title"><a href="<?=url('news_single', $row["id"])?>"><?php echo ss($row["title_".langId()]); ?></a></div>
							<div class="news_des"><?php echo st(ss($row["alt_title_".langId()])); ?></div>
						</li>
						<?php }} ?>
					</ul> 
	</div>