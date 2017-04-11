 <?php 
	$cat_id4 = p("cat_id4"); 
	$cat_id3 = p("cat_id3"); 
	$cat_id2 = p("cat_id2"); 
	$cat_id1 = p("cat_id1");  
  ?>
    <div class="main clearfix">
        <h1 class="cate_tit"><?php echo $catname;?></h1>
        <?php require_once "products_search_block.php"; ?>
        
        <table class="proList">
            <tbody>
			<tr>
        <?php
			
		if($cat_id1==0){
			$cat_id1 = "!=0";
		} else {
			$cat_id1 = "=".$cat_id1;
		}	
		if($cat_id2==0){
			$cat_id2 = "!=0";
		} else {
			$cat_id2 = "=".$cat_id2;
		}		
		if($cat_id3==0){
			$cat_id3 = "!=0";
		} else {
			$cat_id3 = "=".$cat_id3;
		}		
		if($cat_id4==0){
			$cat_id4 = "!=0";
		} else {
			$cat_id4 = "=".$cat_id4;
		}	
		
		$query = query("SELECT * FROM products WHERE category_id $cat_id1 and product_id $cat_id2 and company_id $cat_id3 and type_id $cat_id4 and status = 1 Order By id DESC ");
		$say = 3;
		$uc = 3;
    	if (mysql_affected_rows() < 1){
        echo "Məhsul Tapılmadı - ".SITE_TITLE;
			}else {
    ?>
				 <?php while ($row = row($query)){
				$mod = $say % $uc; 
				$say++;


				 ?>
				<td align="center" valign="top">
                    <div class="pro-img">
                        <a href="<?=url('products_single', $row["id"])?>"><img src="<?php echo URL . $row["file"]; ?>" alt="HAC-EB2401"></a>
                    </div>
                    <div class="pro-des">
                        <h3><a href="<?=url('products_single', $row["id"])?>"><?php echo ss($row["title_".langId()]); ?></a></h3>
                        <p><?php echo st(ss($row["alt_title_".langId()])); ?></p>
                    </div>
                    <!--span class="new_tag"></span-->
				</td> 
				<?php 
				$mod = $say % $uc;
if($mod == 0){
		echo ' </tr>';
}

}

if($mod != 0){
		echo ' </tr>';
}

				
				
				} ?>
					
            </tr>
            </tbody></table>
        <!--div class="fenye">
            <div class="pagination">
                <a href="http://www.dahuasecurity.com/products_category/hdcvi-camera-388_1.html">Home</a> <a href="http://www.dahuasecurity.com/products_category/hdcvi-camera-388_1.html">Prev</a>
                <a href="http://www.dahuasecurity.com/products_category/hdcvi-camera-388_1.html" class="current">1</a>
                <a href="http://www.dahuasecurity.com/products_category/hdcvi-camera-388_2.html">2</a>
                <a href="http://www.dahuasecurity.com/products_category/hdcvi-camera-388_3.html">3</a>
                <a href="http://www.dahuasecurity.com/products_category/hdcvi-camera-388_4.html">4</a>
                <a href="http://www.dahuasecurity.com/products_category/hdcvi-camera-388_5.html">5</a>
                <a href="http://www.dahuasecurity.com/products_category/hdcvi-camera-388_6.html">6</a>
                <a href="http://www.dahuasecurity.com/products_category/hdcvi-camera-388_7.html">7</a>
                <a href="http://www.dahuasecurity.com/products_category/hdcvi-camera-388_2.html">Next</a> <a href="http://www.dahuasecurity.com/products_category/hdcvi-camera-388_8.html">Last</a>
            </div> 
        </div-->
    </div> 