<?php

	$id = g("id");
	$query = query("SELECT * FROM news WHERE id = '$id'");
	if (mysql_affected_rows() < 1){
    $title = "Səhifə Tapılmadı - ".SITE_TITLE;

  }else {
    $row = row($query);
		$title = ss($row["title_".langId()]);
		$alt_title = ss($row["alt_title_".langId()]);
   $description = html_entity_decode($row["description_".langId()]);
   $photo = strip_tags(ss($row["photo"]));
   $add_time = strip_tags(ss($row["add_time"]));
  			}
?>


<div id="wraper">
    <div class="main clearfix">
        <div class="cl"></div>
        <div class="post_body">
            <h1 class="post_tit"><?php echo $title; ?></h1>
            <div class="news_info"><?php echo $alt_title; ?></div>
            <div class="news_cont">
                <?php echo ss($description); ?>
            </div> 
			<br/>
			<div class="paylas">
				<span class='st_facebook_large' displayText='Facebook'></span>
				<span class='st_twitter_large' displayText='Tweet'></span>
				<span class='st_googleplus_large' displayText='Google +'></span>
				<span class='st_linkedin_large' displayText='LinkedIn'></span>
				<span class='st_whatsapp_large' displayText='WhatsApp'></span>
				<span class='st_email_large' displayText='Email'></span>
			</div>

        </div>
    </div>
</div>