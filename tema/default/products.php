 <?php   
	$catname = other(4);
	$id = g("id");
    $querycat = query("SELECT * FROM product_category WHERE id = '$id' and status = 1 ");
	while($rowcat = row($querycat)){ 
		$catname = $rowcat["name_".langId()];
	}
 ?>
    <div class="main clearfix">
        <h1 class="cate_tit"><?php echo $catname;?></h1>
               <?php require_once "products_search_block.php"; ?> 
        
        <table class="proList">
            <tbody>
			<tr>
        <?php
			$catid = "= '$id'";
			if($id == ""){
			$catid = "!= 0";
			
			} 
		$query = query("SELECT * FROM products WHERE category_id $catid and status = 1 Order By id DESC ");
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
                        <a href="<?=url('products_single', $row["id"])?>"><img src="<?php echo URL . $row["file"]; ?>" ></a>
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