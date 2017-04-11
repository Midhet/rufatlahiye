<?php
$marka = p("marka");
$model = p("model");
$price1 = p("price1") == "" ? 0 : p("price1");
$price2 = p("price2") == "" ? 100000000 : p("price2");
$year1 = p("year1") == "" ? 0 : p("year1");
$year2 = p("year2") == "" ? 2017 : p("year2");
	$query = query("SELECT postsid, markaname, modelname, photo, price, year, distance, engine FROM post_view WHERE status = 1 and marka LIKE '%$marka%' and model LIKE '%$model%' and year >= '$year1' and year <= '$year2'  and price >= '$price1' and price <= '$price2' Order By postsid DESC");
	if (mysql_affected_rows() < 1){
    echo "İlan Bulunamadı.";
  }else {


?>

<div class="main_wrapper">
  <div class="catalog_sidebar">

    <?php require_once "search_block.php"; ?>

  </div>
  <div class="main_catalog">
    <ul class="catalog_list">
      <?php while ($row = row($query)){?>


        <li>
          <a href="/index.php?do=post&id=<?php echo $row["postsid"]; ?>">
            <img src="<?php echo $row["photo"]; ?>" alt=""/>
            <div class="description">Yıl: <?php echo $row["year"]; ?><br/>Motor: <?php echo $row["engine"]; ?>
              <br/>Yürüyüş: <?php echo $row["distance"]; ?> km</div>
            <div class="title"><?php echo $row["markaname"]; ?> - <?php echo $row["modelname"]; ?> <span class="price">$<?php echo $row["price"]; ?></span></div>
          </a>
        </li>



      <?php }} ?>
    </ul>
  </div>
  <div class="clear"></div>
</div>
