
<?php

	$id = g("id");
	$query = query("SELECT * FROM pages WHERE id = '$id' and status = 1");
	if (mysql_affected_rows() < 1){
    $title = "Səhifə Tapılmadı - ".SITE_TITLE;

  }else {
    $row = row($query);
   $title = ss($row["title_".langId()]);
   $description = html_entity_decode($row["description_".langId()]);
  			}
?>

<section class="hero-banner ">
        <div class="container text-center">

            <div class="row">
                <div class="col-sm-10 col-sm-offset-1">
                    <h1 class="text-primary"><?php echo $title; ?></h1>
                    <div class="row text-justify">
                        <div class="col-sm-12 foto">
                            <?php echo ss($description); ?>
							<br><br>
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
        </div>
    </section>
