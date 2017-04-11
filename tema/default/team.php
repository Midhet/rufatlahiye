    <?php
    	$query = query("SELECT * FROM team WHERE status = 1 Order By id ASC  ");
    	if (mysql_affected_rows() < 1){
        echo "Haber Bulunamadı - ".SITE_TITLE;
      }else {


    ?>
	
	<section id="theteam" class="team-block">
    <div class="container">
        <div class="row">
            <div class="col-sm-12" style=" padding-top: 50px; ">
                <h2><?php echo other(30); ?></h2>
            </div>
        </div>
        <?php while ($row = row($query)){ ?>
            <div class="col-sm-3" data-animate="zoomIn" data-delay="300">
 
                <a data-toggle="modal" data-target="#myModal<?php echo $row["id"]; ?>" class="gallery-item ">
                    <img src="<?php echo $row["file"]; ?>">
                </a>
				
		  <!-- Modal -->
		  <div class="modal fade" id="myModal<?php echo $row["id"]; ?>" role="dialog">
			<div class="modal-dialog">
			
			  <!-- Modal content-->
			  <div class="modal-content">
				<div class="modal-header">
				  <button type="button" class="close" data-dismiss="modal">&times;</button>
				  <h4 class="modal-title"><?php echo $row["name_".langId()]; ?></h4>
				</div>
				<div class="modal-body">
				  <p><?php echo html_entity_decode($row["description_".langId()]); ?></p>
				</div>
				<div class="modal-footer">
				  <button type="button" class="btn btn-default" data-dismiss="modal"><?php echo other(42); ?></button>
				</div>
			  </div>
			  
			</div>
		  </div> 
                <div class="btn-group pull-right">
				<a href="mailto:<?php echo $row["mail"]; ?>" class="btn btn-link"><i class="icon-envelope"></i></a>
				</div>
                <a href="javascript:;" class="gallery-item-title"><?php echo $row["name_".langId()]; ?></a>
                <b><?php echo $row["job_".langId()]; ?></b>
            </div>
			<?php } ?>
        </div>
    </div>
</section>
<?php } ?>