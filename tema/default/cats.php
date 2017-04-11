<!-- jQuery -->
<script src="http://code.jquery.com/jquery-latest.min.js"></script>

<!-- MenuMaker Plugin -->
<script src="https://s3.amazonaws.com/menumaker/menumaker.min.js"></script>

<style> 

.nav>li, .col-sm-9.mobilr {
	position: static !important;
	padding-bottom: 10px;
	}

#menu .dropdown-menu {width:100%; top:52px;}
#menu {	position: static !important;
    /*background-color: #229ac8;
    background-image: linear-gradient(to bottom, #23a1d1, #1f90bb);
    background-repeat: repeat-x;
    border-color: #1f90bb #1f90bb #145e7a;*/
    min-height: 40px;
	margin: 15px 0 0 0;
	float: right;
	font-family: Verdana;
}
#menu .nav>li>a {
    color: #3498db;
    padding: 10px 15px 20px 15px;
    min-height: 15px;
    background-color: transparent;
    font-size: 14px;
    font-weight: bold;	
	border-bottom: 2px solid white;
}
#menu .nav>li>a:hover,
#menu .nav>li.open>a {
    border-bottom: 2px solid #3498db;	
	color: red;
}
#menu .dropdown-menu {
    padding-bottom: 0;
	margin: 25px 0 0 0 !important;
}
#menu .dropdown-inner {
    display: table;
}
#menu .dropdown-inner ul {
    display: table-cell;
	padding: 10px 0 20px 0;
	min-width: 250px;
}
#menu .dropdown-inner a {
    min-width: 160px;
    display: block;
    padding: 3px 20px;
    clear: both;
    line-height: 26px;
    color: #fff;
    font-size: 14px;
}
#menu .dropdown-inner li a:hover {
    color: #d6d6d6;
}
#menu .dropdown-inner li a:hover span { 
	border-bottom: 1px solid #fff;
}
#menu .see-all {
    display: block;
    margin-top: 0.5em;
    border-top: 1px solid #DDD;
    padding: 3px 20px;
    -webkit-border-radius: 0 0 4px 4px;
    -moz-border-radius: 0 0 4px 4px;
    border-radius: 0 0 3px 3px;
    font-size: 12px;
}
#menu .see-all:hover,
#menu .see-all:focus {
    text-decoration: none;
    color: #ffffff;
    background-color: #229ac8;
    background-image: linear-gradient(to bottom, #23a1d1, #1f90bb);
    background-repeat: repeat-x;
}
#menu #category {
    float: left;
    padding-left: 15px;
    font-size: 16px;
    font-weight: 700;
    line-height: 40px;
    color: #fff;
    text-shadow: 0 1px 0 rgba(0, 0, 0, 0.2);
}
#menu .btn-navbar {
    font-size: 15px;
    font-stretch: expanded;
    color: #FFF;
    padding: 2px 10px;
    float: right;
    background-color: #3498db;
    background-image: linear-gradient(to bottom, #3498db, #1f90bb);
    background-repeat: repeat-x;
    border-color: #3498db #3498db #145e7a;
}
#menu .btn-navbar:hover,
#menu .btn-navbar:focus,
#menu .btn-navbar:active,
#menu .btn-navbar.disabled,
#menu .btn-navbar[disabled] {
    color: #ffffff;
    background-color: #229ac8;
}
@media (min-width: 1201px) {
    #menu .dropdown:hover .dropdown-menu {
        display: block;
    }
	.cats {
	border-bottom: 1px solid #ebe8e4;
	padding-bottom: 10px;
	font-weight: bold;
    margin-left: 20px;
	color: #fff;	
}
}
@media (max-width: 1200px) and (min-width: 768px) {
	.ulsol2 {
		    margin-left: 0;
	}
}
@media (max-width: 767px) {
	.ulsol {
		    float: left;
	}
}
@media (max-width: 1200px) {
	.col-sm-3.mobill {float:left;}
	.col-sm-9.mobilr {position:static;float:left;}
	.navbar {position:static;}
	.navbar-collapse {position: absolute; z-index:10000; left: 0px; width: 100%; background-color: rgb(255, 255, 255); margin-top:30px;}
	.cats {
	border-bottom: 1px solid #ebe8e4;
    padding: 0;
    font-weight: bold;
    margin-top: -30px;
    color: #000;	
}

    #menu {
        border-radius: 4px;
    }
    #menu div.dropdown-inner>ul.list-unstyled {
        display: block;
    }
    #menu div.dropdown-menu {
        margin-left: 0!important;
        padding-bottom: 10px;
    }
    #menu .dropdown-inner {
        display: block;
    }
    #menu .dropdown-inner a {
        width: 100%;
        color: #3498db;
    }
    #menu .dropdown-menu a:hover,
    #menu .dropdown-menu ul li a:hover {
    }
    #menu .see-all {
        margin-top: 0;
        border: none;
        border-radius: 0;
        color: #fff;
    }
	.pcmar{ padding-bottom: 0px !important;}
}
</style>

<nav id="menu" class="navbar">
   <div class="navbar-header"><span id="category" class="visible-xs"></span>
      <button type="button" class="btn btn-navbar navbar-toggle" data-toggle="collapse" data-target=".navbar-ex1-collapse"><i class="glyphicon glyphicon-align-justify"></i></button>
   </div>
   <div class="collapse navbar-collapse navbar-ex1-collapse">
      <ul class="nav navbar-nav">
<?php
$query = query("SELECT * FROM cats WHERE status = 1 and sub_cat = 0 and sub_cat2 = 0 and sub_cat3 = 0 and sub_cat4 = 0 ORDER BY order_no ASC");

 while ($row = row($query)){
	$id = $row["id"];
 ?>
    

<?php 
	  $query2 = query("SELECT * FROM cats WHERE status = 1 and sub_cat2 = 0 and sub_cat = '$id' and sub_cat3 = 0 and sub_cat4 = 0 ORDER BY order_no ASC");
	  if(mysql_affected_rows() < 1){
 ?>
 <li class="dropdown"><a class="pcmar" href="<?php echo url($row["url"]); ?>" class="dropdown-toggle" ><?php echo ss($row["title_".langId()]); ?></a> 
	<?php  }else{
   ?>
   <li class="dropdown"><a class="pcmar" href="<?php echo url($row["url"]); ?>" data-toggle="dropdown" class="dropdown-toggle" ><?php echo ss($row["title_".langId()]); ?></a> 
			
            <div class="dropdown-menu">			<div class="container ulsol2">		    <div class="row">			<div class="col-sm-12">
               <div class="dropdown-inner">
                  <ul class="list-unstyled ulsol">
				  <?php if($id == "11"){ ?>
					  <h6 class="cats"><?php 
							$basliq = other(23);
					  if("" == $basliq){
						  
						  echo "&nbsp;";
						  
					  }else{
						  echo $basliq;
					  }
						  ?></h6>
				  <?php } ?>
				  <?php if($id == "9"){ ?>
					  <h6 class="cats"><?php 
							$basliq2 = other(25);
					  if("" == $basliq2){
						  
						  echo "&nbsp;";
						  
					  }else{
						  echo $basliq2;
					  }
						  ?></h6>
				  <?php } ?>
				  
 <?php
  while($row2 = row($query2)){
	  
?>	  
	 <li><a href="<?php echo url($row2["url"]); ?>"><span><?php echo ss($row2["title_".langId()]); ?></span></a></li>
	  
<?php } ?> 
                  </ul> 
<?php 
	  $query3 = query("SELECT * FROM cats WHERE status = 1 and sub_cat = 0 and sub_cat2 = '$id' and sub_cat3 = 0 and sub_cat4 = 0 ORDER BY order_no ASC");
	  if(mysql_affected_rows() < 1){

	  }else{
   ?>				  
                  <ul class="list-unstyled ulsol">
				  <?php if($id == "11"){ ?>
					  <h6 class="cats"><?php 
							$basliq3 = other(24);
					  if("" == $basliq3){
						  
						  echo "&nbsp;";
						  
					  }else{
						  echo $basliq3;
					  }
						  ?></h6>
				  <?php } ?>
 <?php
  while($row3 = row($query3)){
	  
?>	  
	 <li><a href="<?php echo url($row3["url"]); ?>"><span><?php echo ss($row3["title_".langId()]); ?></span></a></li>
	  
<?php } ?> 
                  </ul>
<?php 
	  $query4 = query("SELECT * FROM cats WHERE status = 1 and sub_cat = 0 and sub_cat3 = '$id' and sub_cat2 = 0 and sub_cat4 = 0 ORDER BY order_no ASC");
	  if(mysql_affected_rows() < 1){

	  }else{
   ?>				  
                  <ul class="list-unstyled ulsol">
				  <?php if($id == "11"){ ?>
					  <h6 class="cats"><?php 
							$basliq4 = other(27);
					  if("" == $basliq4){
						  
						  echo "&nbsp;";
						  
					  }else{
						  echo $basliq4;
					  }
						  ?></h6>
				  <?php } ?>
 <?php
  while($row4 = row($query4)){
	  
?>	  
	 <li><a href="<?php echo url($row4["url"]); ?>"><span><?php echo ss($row4["title_".langId()]); ?></span></a></li>
	  
<?php } ?> 
                  </ul>
<?php } ?> <?php 
	  $query5 = query("SELECT * FROM cats WHERE status = 1 and sub_cat = 0 and sub_cat4 = '$id' and sub_cat3 = 0 and sub_cat2 = 0 ORDER BY order_no ASC");
	  if(mysql_affected_rows() < 1){

	  }else{
   ?>				  
                  <ul class="list-unstyled ulsol">
				  <?php if($id == "11"){ ?>
					  <h6 class="cats"><?php 
							$basliq5 = other(28);
					  if("" == $basliq5){
						  
						  echo "&nbsp;";
						  
					  }else{
						  echo $basliq5;
					  }
						  ?></h6>
				  <?php } ?>
 <?php
  while($row5 = row($query5)){
	  
?>	  
	 <li><a href="<?php echo url($row5["url"]); ?>"><span><?php echo ss($row5["title_".langId()]); ?></span></a></li>
	  
<?php } ?> 
                  </ul>
<?php } ?> <?php } ?> 
               </div>
            </div>		</div>		</div>		</div>
<?php
  }
  ?>
</li> 
 <?php
  }
  ?>
      </ul>
   </div>
</nav>


