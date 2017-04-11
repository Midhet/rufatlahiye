<!-- jQuery -->
<script src="http://code.jquery.com/jquery-latest.min.js"></script>

<!-- MenuMaker Plugin -->
<script src="https://s3.amazonaws.com/menumaker/menumaker.min.js"></script>
 
<style>@import url(http://fonts.googleapis.com/css?family=Open+Sans);
#cssmenu,
#cssmenu ul,
#cssmenu ul li,
#cssmenu ul li a,
#cssmenu #menu-button {
  margin: 0;
  padding: 0;
  border: 0;
  list-style: none;
  line-height: 1;
  display: block;
  position: relative;
  -webkit-box-sizing: border-box;
  -moz-box-sizing: border-box;
  box-sizing: border-box;
}
#cssmenu:after,
#cssmenu > ul:after {
  content: ".";
  display: block;
  clear: both;
  visibility: hidden;
  line-height: 0;
  height: 0;
}
#cssmenu #menu-button {
  display: none;
}
#cssmenu {
  font-family: Cambria, 'Open Sans', sans-serif;
  line-height: 1;
  width: auto;
  float: right;
  margin: 6px;
}
#menu-line {
  position: absolute;
  bottom: 0;
  left: 0;
  height: 3px;
  background: #009ae1;
  -webkit-transition: all 0.25s ease-out;
  -moz-transition: all 0.25s ease-out;
  -ms-transition: all 0.25s ease-out;
  -o-transition: all 0.25s ease-out;
  transition: all 0.25s ease-out;
}
#cssmenu > ul > li {
  float: left;
  font-weight: bold;
}
#cssmenu.align-center > ul {
  background: #ffffff;
  font-size: 0;
  text-align: center;
}
#cssmenu.align-center > ul > li {
  display: inline-block;
  float: none;
}
#cssmenu.align-center ul ul {
  text-align: left;
}
#cssmenu.align-right > ul > li {
  float: right;
}
#cssmenu.align-right ul ul {
  text-align: right;
}
#cssmenu > ul > li > a {
  padding: 20px;
  font-size: 14px;
  text-decoration: none;
  text-transform: none;
  color: #000000;
  -webkit-transition: color .2s ease;
  -moz-transition: color .2s ease;
  -ms-transition: color .2s ease;
  -o-transition: color .2s ease;
  transition: color .2s ease;
}
#cssmenu > ul > li:hover > a,
#cssmenu > ul > li.active > a {
  color: #009ae1;
}
#cssmenu > ul > li.has-sub > a {
  padding-right: 25px;
}
#cssmenu > ul > li.has-sub > a::after {
  position: absolute;
  top: 21px;
  right: 10px;
  width: 4px;
  height: 4px;
  border-bottom: 1px solid #000000;
  border-right: 1px solid #000000;
  content: "";
  -webkit-transform: rotate(45deg);
  -moz-transform: rotate(45deg);
  -ms-transform: rotate(45deg);
  -o-transform: rotate(45deg);
  transform: rotate(45deg);
  -webkit-transition: border-color 0.2s ease;
  -moz-transition: border-color 0.2s ease;
  -ms-transition: border-color 0.2s ease;
  -o-transition: border-color 0.2s ease;
  transition: border-color 0.2s ease;
}
#cssmenu > ul > li.has-sub:hover > a::after {
  border-color: #009ae1;
}
#cssmenu ul ul {
  position: absolute;
  left: -9999px;
}
#cssmenu li:hover > ul {
  left: auto;
}
#cssmenu.align-right li:hover > ul {
  right: 0;
}
#cssmenu ul ul ul {
  margin-left: 100%;
  top: 0;
}
#cssmenu.align-right ul ul ul {
  margin-left: 0;
  margin-right: 100%;
}
#cssmenu ul ul li {
  height: 0;
  -webkit-transition: height .2s ease;
  -moz-transition: height .2s ease;
  -ms-transition: height .2s ease;
  -o-transition: height .2s ease;
  transition: height .2s ease;
}
#cssmenu ul li:hover > ul > li {
  height: 32px;
}
#cssmenu ul ul li a {
  border: 1px solid #3498db;
  padding: 10px 20px;
  width: 180px;
  font-size: 12px;
  background: #f9f9f9;
  text-decoration: none;
  color: #4a4a4a;
  -webkit-transition: color .2s ease;
  -moz-transition: color .2s ease;
  -ms-transition: color .2s ease;
  -o-transition: color .2s ease;
  transition: color .2s ease;
}
#cssmenu ul ul li:hover > a,
#cssmenu ul ul li a:hover {
  color: #000;
}
#cssmenu ul ul li.has-sub > a::after {
  position: absolute;
  top: 13px;
  right: 10px;
  width: 4px;
  height: 4px;
  border-bottom: 1px solid #dddddd;
  border-right: 1px solid #dddddd;
  content: "";
  -webkit-transform: rotate(-45deg);
  -moz-transform: rotate(-45deg);
  -ms-transform: rotate(-45deg);
  -o-transform: rotate(-45deg);
  transform: rotate(-45deg);
  -webkit-transition: border-color 0.2s ease;
  -moz-transition: border-color 0.2s ease;
  -ms-transition: border-color 0.2s ease;
  -o-transition: border-color 0.2s ease;
  transition: border-color 0.2s ease;
}
#cssmenu.align-right ul ul li.has-sub > a::after {
  right: auto;
  left: 10px;
  border-bottom: 0;
  border-right: 0;
  border-top: 1px solid #dddddd;
  border-left: 1px solid #dddddd;
}
#cssmenu ul ul li.has-sub:hover > a::after {
  border-color: #ffffff;
}
#cssmenu.small-screen {
  width: 100%;
}
#cssmenu.small-screen ul {
  background: #ffffff;
  width: 100%;
  display: none;
}
#cssmenu.small-screen.align-center > ul,
#cssmenu.small-screen.align-right ul ul {
  text-align: left;
}
#cssmenu.small-screen ul li,
#cssmenu.small-screen ul ul li,
#cssmenu.small-screen ul li:hover > ul > li {
  width: 100%;
  height: auto;
  border-top: 1px solid rgba(120, 120, 120, 0.15);
}
#cssmenu.small-screen ul li a,
#cssmenu.small-screen ul ul li a {
  width: 100%;
}
#cssmenu.small-screen > ul > li,
#cssmenu.small-screen.align-center > ul > li,
#cssmenu.small-screen.align-right > ul > li {
  float: none;
  display: block;
}
#cssmenu.small-screen ul ul li a {
  padding: 20px 20px 20px 30px;
  font-size: 12px;
  color: #000000;
  background: none;
}
#cssmenu.small-screen ul ul li:hover > a,
#cssmenu.small-screen ul ul li a:hover {
  color: #000000;
}
#cssmenu.small-screen ul ul ul li a {
  padding-left: 40px;
}
#cssmenu.small-screen ul ul,
#cssmenu.small-screen ul ul ul {
  position: relative;
  left: 0;
  right: auto;
  width: 100%;
  margin: 0;
}
#cssmenu.small-screen > ul > li.has-sub > a::after,
#cssmenu.small-screen ul ul li.has-sub > a::after {
  display: none;
}
#cssmenu.small-screen #menu-line {
  display: none;
}
#cssmenu.small-screen #menu-button {
  display: block;
  padding: 20px;
  color: #000000;
  cursor: pointer;
  font-size: 12px;
  text-transform: none;
}
#cssmenu.small-screen #menu-button::after {
  content: '';
  position: absolute;
  top: 20px;
  right: 20px;
  display: block;
  width: 15px;
  height: 2px;
  background: #000000;
}
#cssmenu.small-screen #menu-button::before {
  content: '';
  position: absolute;
  top: 25px;
  right: 20px;
  display: block;
  width: 15px;
  height: 3px;
  border-top: 2px solid #000000;
  border-bottom: 2px solid #000000;
}
#cssmenu.small-screen .submenu-button {
  position: absolute;
  z-index: 10;
  right: 0;
  top: 0;
  display: block;
  border-left: 1px solid rgba(120, 120, 120, 0.15);
  height: 52px;
  width: 52px;
  cursor: pointer;
}
#cssmenu.small-screen .submenu-button::after {
  content: '';
  position: absolute;
  top: 21px;
  left: 26px;
  display: block;
  width: 1px;
  height: 11px;
  background: #000000;
  z-index: 99;
}
#cssmenu.small-screen .submenu-button::before {
  content: '';
  position: absolute;
  left: 21px;
  top: 26px;
  display: block;
  width: 11px;
  height: 1px;
  background: #000000;
  z-index: 99;
}
#cssmenu.small-screen .submenu-button.submenu-opened:after {
  display: none;
}
#cssmenu.small-screen.select-list {
  padding: 5px;
}
</style>

<div id="cssmenu"> 
<ul> 
<?php
$query = query("SELECT * FROM cats WHERE status = 1 and sub_cat = 0 and sub_cat2 = 0 ORDER BY order_no ASC");

 while ($row = row($query)){
	$id = $row["id"];
 ?>
   <li><a href="<?php echo ss($row["url"]); ?>"><?php echo ss($row["title"]); ?></a>
   <?php 
	  $query2 = query("SELECT * FROM cats WHERE status = 1 and sub_cat = '$id' ORDER BY order_no ASC");
	  if(mysql_affected_rows() < 1){

	  }else{
   ?>
      <ul>
	  <?php
  while($row2 = row($query2)){
	  
?>	  
	 <li><a href="<?php echo ss($row2["url"]); ?>"><?php echo ss($row2["title"]); ?></a></li>
	  
<?php } ?>
          
      </ul> 
	  
   
 <?php } ?>
   <?php 
	  $query3 = query("SELECT * FROM cats WHERE status = 1 and sub_cat2 = '$id' ORDER BY order_no ASC");
	  if(mysql_affected_rows() < 1){

	  }else{
   ?>
      <ul class="menusol">
	  <?php
  while($row3 = row($query3)){
	  
?>	  
	 <li><a href="<?php echo ss($row3["url"]); ?>"><?php echo ss($row3["title"]); ?></a></li>
	  
<?php } ?>
          
      </ul> 
	  
   
 <?php } ?>
 </li> 
 <?php
  }
  ?>
</ul>
</div> 
 
<script type="text/javascript">

$("#cssmenu").menumaker({
    title: "",
    breakpoint: 768,
    format: "multitoggle"
});

$("#cssmenu").prepend("<div id='menu-line'></div>");

var foundActive = false, activeElement, linePosition = 0, menuLine = $("#cssmenu #menu-line"), lineWidth, defaultPosition, defaultWidth;

$("#cssmenu > ul > li").each(function() {
  if ($(this).hasClass('active')) {
    activeElement = $(this);
    foundActive = true;
  }
});

if (foundActive === false) {
  activeElement = $("#cssmenu > ul > li").first();
}

defaultWidth = lineWidth = activeElement.width();

defaultPosition = linePosition = activeElement.position().left;

menuLine.css("width", lineWidth);
menuLine.css("left", linePosition);

$("#cssmenu > ul > li").hover(function() {
  activeElement = $(this);
  lineWidth = activeElement.width();
  linePosition = activeElement.position().left;
  menuLine.css("width", lineWidth);
  menuLine.css("left", linePosition);
}, function() {
  menuLine.css("left", defaultPosition);
  menuLine.css("width", defaultWidth);
});
	</script>

 
    

