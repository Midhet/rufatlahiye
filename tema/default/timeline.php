<style>
 @media only screen and (min-width: 1201px) {
 #timeline2 {
	 display: block !important;
 }
 
 
 }
 @media only screen and (max-width: 1200px) {
 #timeline2 {
	 display: none !important;
 }
 
 
 }
 </style>
    <?php
    	$query = query("SELECT * FROM timeline WHERE status = 1 Order By year ASC ");
    	if (mysql_affected_rows() < 1){
        echo "".SITE_TITLE;
      }else {


    ?>
	
 <section id="timeline2" style="background-color: #e5e5e5; padding-bottom: 60px; ">



    <div class="container ">
        <div class="row">
            <div class="col-sm-12" style=" padding-top: 80px; ">
                <h2><?php echo other(31); ?></h2>
            </div>
        </div>
		<div id="about">
	    <div class="hr" ></div>
	    <div id="slider">
	    	<div class="container">        	
	        	<ul id="history">            
	    <?php 
		$say = 0;
		while ($row = row($query)){
			$say++;
		?>
		
      <li>
			<a href="javascript:mD(<?php echo $say;?>)" 
				<?php
				if($say == 1){
				echo 'class="a"';	
				}
				?>
			id="h<?php echo $say;?>">
				<?php echo ss($row["year"]);?>
			</a>
	  </li>
    <?php } ?>         	    
	                	
	      
	            </ul>
	            <input type="hidden" id="tP" value="16"/>
	        </div>
	    </div>    
	    <div class="hr" ></div>
	    <div id="sliderDetail">
	    	<div class="container">
	        	<a href="javascript:mL()" class="mNav d" id="mLeft"></a>
	            <a href="javascript:mR()" class="mNav" id="mRight"></a>
	        	<div id="detailHolder">   
				
	      <?php 
		  
		  $query2 = query("SELECT * FROM timeline WHERE status = 1 Order By year ASC ");
		  $says = 0;
		  while ($row2 = row($query2)){
			
			$says++;
		  ?> 
         	    
	                	<div class="detail" id="d<?php echo $says;?>"> 
	                            <h1><?php echo ss($row2["title_".langId()]);?></h1>
	                            <div class="detailBody">
	                               <?php echo html_entity_decode(ss($row2["description_".langId()])); ?>
	                            </div>
	                        </div> 
			 <?php } ?> 
	                  
	            </div>
	        </div>
	    </div>
	</div>
			
    </div>
 
</section>
    <script src="<?php echo TEMA_URL; ?>/assets/js/actions.js"></script>
    <script src="<?php echo TEMA_URL; ?>/assets/js/cufon-yui.js"></script>
    <script src="<?php echo TEMA_URL; ?>/assets/js/helvetica.font.js"></script>
    <script src="<?php echo TEMA_URL; ?>/assets/js/avenir.font.js"></script>

	
	<script type="text/javascript">	
		Cufon.replace('.menu a', { fontFamily: 'Verdana' , 
			hover: true
		});
		Cufon.replace('#brandNav a', { fontFamily: 'Verdana' , 
			hover: true
		});
		Cufon.replace('#catSelect li a', { fontFamily: 'Verdana' , 
			hover: true
		});
		Cufon.replace('#collectionMenu a', { fontFamily: 'Verdana' , 
			hover: true
		});
		Cufon.replace('.moreBtn span', { fontFamily: 'Verdana' , 
			hover: true
		});
		Cufon.replace('.action span', { fontFamily: 'Verdana' , 
			hover: true
		});	
		Cufon.replace('h3', { fontFamily: 'Verdana' , 
			hover: true
		});
		Cufon.replace('h2', { fontFamily: 'Verdana' , 
			hover: true
		});
		Cufon.replace('h1', { fontFamily: 'Verdana' , 
			hover: true
		});
		Cufon.replace('#collectionTop h1', { fontFamily: 'Verdana' , 
			hover: true
		});
		Cufon.replace('#history li a', { fontFamily: 'Verdana' , 
			hover: true
		});
	</script>
	<?php } ?>  