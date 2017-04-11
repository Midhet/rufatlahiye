
<?php

	$query = query("SELECT * FROM about WHERE id = '1' and status = 1");
	if (mysql_affected_rows() < 1){
    $text = "Səhifə Tapılmadı - ".SITE_TITLE;

  }else {
    $row = row($query);
   $text = html_entity_decode($row["text_".langId()]);
  			}
?>

<section class="hero-banner bg-grey-1  "  id="company">
    <div class="container text-center">
        <div class="row">
            <div class="col-sm-10 col-sm-offset-1">
                <h2 class="text-primary"  style=" padding-top: 100px; "><?php echo other(29); ?></h2><hr>
                <div class="row text-justify"> 
                    <div class="col-sm-12 foto">
                        <?php echo ss($text); ?> 
                    </div> 
                </div>
            </div>
        </div>
    </div>
</section>
