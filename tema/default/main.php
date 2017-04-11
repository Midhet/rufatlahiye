
    <div id="index_col">
        
        <?php require_once "products_block.php"; ?>
        <?php require_once "banner_block.php"; ?>
        <?php require_once "news_block.php"; ?>
        <div id="ico-two" class="ind_stories">
            <h4><?php echo other(5); ?></h4>
            <div class="stories_tj">
                <div class="more-rss"><a class="more-btn" href="<?=url();?>about" title="more">more</a></div>
                <div class="stortj_con">
                    <h5>SmartSafety advanced security technology safeguards Toledo Cathedral</h5>
                    <p>The Toledo Cathedral is one of the three 13th-century High Gothic cathedrals and is considered, in the opinion of some authorities, to be the magnum opus of the Gothic style worldwide. In</p>
                    <p class="r_m"><a href="<?=url();?>about" title="Read more &gt;">Read more &gt;</a></p>
                </div>
            </div>
        </div>
    </div>

<style>
    .box{ width:350px; height:200px; z-index:10000; position:fixed; right: 10px; bottom: 10px;}
    .close{ width:26px; height:26px; line-height:26px; text-align:center; position:absolute; top:0; right:0;
        cursor:pointer; filter: alpha(opacity=80); opacity: .80; background-color:#FFFFFF; font-size: 22px;}

    @media (max-width: 768px) {
        .box {
            right: 20%;
        }
    }
</style>