<?php
	$id = g("id");
	$query = query("SELECT * FROM products WHERE id = '$id' and status = 1");
	if (mysql_affected_rows() < 1){
    $title = "Səhifə Tapılmadı - ".SITE_TITLE;

  }else {
    $row = row($query);
	$title = ss($row["title_".langId()]);
	$alt_title = ss($row["alt_title_".langId()]);
	$description = html_entity_decode($row["description_".langId()]);
	$alt_description = html_entity_decode($row["alt_description_".langId()]);
	$photo = strip_tags(ss($row["photo"]));
	$add_time = strip_tags(ss($row["add_time"]));
   
	$catid = $row["category_id"];
	$query2 = query("SELECT * FROM product_category WHERE id = '$catid'");
	$row2 = row($query2);
	$catname = ss($row2["name_".langId()]);
	
   
   
   
  			}
			
			
?>
 
  <style>
    .tab-drag{
       
        color: #414141;
        jerry:expression(cellSpacing="0");
        width:100%;
        border-spacing:0px;
    }
    .desc{
        color: #414141;
    }
    #foot-seo-block .content {
         color: #414141;
    }
    #div_left{
         border: 1px solid #DDDDDD;
    }
     #div_right{
         border: 1px solid #DDDDDD;
     }
</style>
      
	<div class="main clearfix">
		<h1 class="cate_tit"><a href="/<?php echo langId()."/products/".$catid; ?>"><?php echo $catname; ?></a></h1>
		<div class="new_product_info">
	<table cellpadding="3">
		<tr>
						<td align="center" valign="middle" class="product_image">
                <img src="<?php echo URL . $row["file"]; ?>" alt="IPC-HFW5830E-Z" title="IPC-HFW5830E-Z" />
            </td>
						<td class="product_desc">
				<h2><?php echo $title; ?></h2>
				<div class="desc font28"><?php echo $alt_title; ?></div>
                <style>.product_desc img{width:100%}</style>
				<div class="desc">
                 <?php echo $alt_description; ?>
				 
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
			</td>
		</tr>
	</table>
	<div id="tabs" class="htabs">
		<a href="#tab-specifications" style="border-left: 1px solid #DDDDDD;"><span class="icon-specifications"></span>
		<?php echo other(1);?></a>
		<a href="#tab-accessories" ><span class="icon-accessories"></span><?php echo other(11);?></a>
		<a href="#tab-download" ><span class="icon-download"></span><?php echo other(10);?></a>
	</div>
	<div id="tab-specifications" class="tab-content">
		<div style="width:100%;" id="div_left">
	<div class="div-drop ui-droppable">
		<?php echo $description; ?>
	</div>
</div>
	</div> 
	<div id="tab-accessories" class="tab-content" style="display: block;">
				<ul class="tab-accessories-list"> 
				 <?php 
				 $rowid = $row["id"];
				$query3 = query("SELECT accessory_id  FROM product_accessory WHERE product_id = $rowid Order By id DESC ");
				 
				 if (mysql_affected_rows() < 1){
						}else {
				
				 while ($row3 = row($query3)){ 
				 $rowac = $row3["accessory_id"];
				 $query4 = query("SELECT * FROM products WHERE id = $rowac  and status = 1 Order By id DESC ");
					$row4 = row($query4);
				 ?>
					<li>
						<a href="<?=url('products_single', $row4["id"])?>">
									<img src="<?php echo URL . $row4["file"]; ?>" >
						</a>
								
						<div class="tab-down-photo-info">
							<h4 class="menu_name">
								<a href="<?=url('products_single', $row4["id"])?>">
									<?php echo ss($row4["title_".langId()]); ?>
								</a>
							</h4>				
							<h4>
								<a href="<?=url('products_single', $row4["id"])?>">
									<?php echo st(ss($row4["alt_title_".langId()])); ?>
								</a>
							</h4>
						</div>	
					</li>
						<?php }} ?> 
				</ul>
		<div style="clear:both;"></div>
	</div>
	<div id="tab-download" class="tab-content" >
			<table class="table">
				<tbody><tr>
					<th bgcolor="#EEEEEE">Title</th>
					<th bgcolor="#EEEEEE" width="110">Date</th>
					<th bgcolor="#EEEEEE" width="130">Download</th>
				</tr>
				 <?php 
				 $rowid = $row["id"];
				$query9 = query("SELECT *  FROM product_file WHERE product_id = $rowid Order By id DESC ");
				 
				 if (mysql_affected_rows() < 1){
						}else {
				
				 while ($row9 = row($query9)){ 
				 
				 ?>				
				<tr>
					<td><?php echo ss($row9["title_".langId()]); ?></td>
					<td><?php echo $row9["date"]; ?></td>
					<td><a href="<?php echo URL . $row9["file"]; ?>" target="_blank"><img src="<?php echo TEMA_URL; ?>/images/pdf.jpg" alt=""></a>
					</td>
				</tr>
				<?php }} ?> 								
												
				</tbody>
			</table>
	</div>
</div>
<script type="text/javascript" src="<?php echo TEMA_URL; ?>/js/tabs.js"></script>
<script type="text/javascript" src="<?php echo TEMA_URL; ?>/js/tabs_new.js"></script>
<script type="text/javascript">
$(function(){
	$('#tabs a').tabs();
	$('#tabs1 a').tabs();
});
</script>

	</div>
	