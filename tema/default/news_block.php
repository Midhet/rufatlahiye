
    <?php
    	$query = query("SELECT * FROM news WHERE status = 1 Order By id DESC LIMIT 6 ");
    	if (mysql_affected_rows() < 1){
        echo "Xəbər əlavə olunmayıb - ".SITE_TITLE;
      }else {


    ?>

    <div class="tab-news">
        <h3><?php echo other(8); ?></h3>
        <div class="hd">
            <ul>
                <?php while ($row = row($query)){ ?>
                <li><a href="<?=url('news_single', $row["id"])?>"><?php echo ss($row["title_".langId()]); ?></a>
                    <span class="caret"></span>
                </li>
                <?php } ?>
            </ul>
        </div>
        <div class="news-pic-box">
            <div class="bd">
                <?php
                $query2 = query("SELECT * FROM news WHERE status = 1 Order By id DESC LIMIT 6 ");
                while ($row2 = row($query2)){ ?>
                <div class="newsPic">
                    <a href="<?=url('news_single', $row2["id"])?>"><img style=" max-height: 280px; " src="<?php echo $row2["file"]; ?>" /></a>
                </div>
                <?php } ?>
            </div>
        </div>
    </div>

    <script type="text/javascript">
        jQuery(".tab-news").slide({effect:"left",autoPlay:false});
    </script>

        <?php } ?>

 
