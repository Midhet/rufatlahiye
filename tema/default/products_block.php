
<div id="srcollPic">
            <div class="leftLoop">
                <h3 class="showTit"><?php echo other(7); ?></h3>
                <div class="hd"><a class="next"></a><a class="prev"></a></div>
                <div class="bd">
                    <ul class="picList">
<?php
$query = query("SELECT * FROM products WHERE status = 1 ORDER BY id DESC");

 while ($row = row($query)){
	  
 ?>  
                        <li>
                            <div class="pic">
								<a href="<?=url('products_single', $row["id"])?>" title="IPC-HFW5830E-Z"><img src="<?php echo URL . $row["file"]; ?>"/></a>
							</div>
                            <div class="title"><a href="<?=url('products_single', $row["id"])?>" ><?php echo ss($row["title_".langId()]); ?></a></div>
                            <div class="des"><?php echo kisalt(strip_tags(ss($row["alt_title_".langId()])), 200); ?></div>
                        </li>						
<?php } ?>
                    </ul>
                </div>
            </div>
            <script type="text/javascript">jQuery(".leftLoop").slide({mainCell:".bd ul",effect:"leftLoop",trigger:"click",vis:4});</script>
        </div>