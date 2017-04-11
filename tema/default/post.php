
<?php

	$id = g("id");
	$query = query("SELECT * FROM post_view WHERE postsid = '$id'");
	if (mysql_affected_rows() < 1){
    $title = "İlan bulunamadı.";

  }else {
    $row = row($query);
	$postsid = ss($row["postsid"]);
	$markaname = ss($row["markaname"]);
   $modelname = ss($row["modelname"]);
   $price = ss($row["price"]);
   $distance = ss($row["distance"]);
   $engine = ss($row["engine"]);
   $photo = ss($row["photo"]);
   $type = ss($row["type"]);
	 if ($type == 1) {
	 	$type = "Otomobil";
	} elseif ($type == 2) {
		$type = "Pick-up";
	} elseif ($type == 3) {
		$type = "Motosiklet";
	} elseif ($type == 4) {
		$type = "Minivan";
	} elseif ($type == 5) {
		$type = "Ticari";
	} elseif ($type == 6) {
		$type = "Kiralık";
	} elseif ($type == 7) {
		$type = "Klasik";
	} elseif ($type == 8) {
		$type = "Modifiye";
	}
   $situation = ss($row["situation"]);
	 if ($situation == 1) {
	 	$situation = "Sıfır";
	} elseif ($situation == 2) {
		$situation = "2. El";
	} elseif ($situation == 3) {
		$situation = "Hasarlı";
	}
   $transmission = ss($row["transmission"]);
	 if ($transmission == 1) {
	 	$transmission = "Otomatik";
	} elseif ($transmission == 2) {
		$transmission = "Manuel";
	}
   $hp = ss($row["hp"]);
   $exterior_color = ss($row["exterior_color"]);
	 if ($exterior_color == 1) {
	 	$exterior_color = "Siyah";
	} elseif ($exterior_color == 2) {
		$exterior_color = "Beyaz";
	} elseif ($exterior_color == 3) {
		$exterior_color = "Kırmızı";
	} elseif ($exterior_color == 4) {
		$exterior_color = "Yeşil";
	} elseif ($exterior_color == 5) {
		$exterior_color = "Mavi";
	}
   $interior_color = ss($row["interior_color"]);
	 if ($interior_color == 1) {
	 	$interior_color = "Siyah";
	} elseif ($interior_color == 2) {
		$interior_color = "Beyaz";
	} elseif ($interior_color == 3) {
		$interior_color = "Kırmızı";
	} elseif ($interior_color == 4) {
		$interior_color = "Yeşil";
	} elseif ($interior_color == 5) {
		$interior_color = "Mavi";
	}
   $fuel = ss($row["fuel"]);
   $steering_type = ss($row["steering_type"]);
	 if ($steering_type == 1) {
	 	$steering_type = "Modern";
	} elseif ($steering_type == 2) {
		$steering_type = "Klassik";
	} elseif ($steering_type == 3) {
		$steering_type = "Spor";
	}

   $seats = ss($row["seats"]);
   $info = ss($row["info"]);
   $year = ss($row["year"]);
   $user_name = ss($row["user_name"]);
	 $add_time = ss($row["add_time"]);
	 $phone = ss($row["phone"]);
	 $first_name = ss($row["first_name"]);
	 $last_name = ss($row["last_name"]);
	 $company = ss($row["company"]);
	 $user_email = ss($row["user_email"]);
	 $views = ss($row["views"]);

	 for ($a = 0; $a < 1; $a++) {
		 $views = $views + 1;
  	 query("UPDATE posts SET
  	 views = '$views'
  	 WHERE id = $postsid");
	 }

  			}
?>


<div class="main_wrapper">
  <div class="cars_id">
    <div class="id">İlan numarası: <span><?php echo $postsid; ?></span></div>
    <div class="views">İzlenilme: <?php echo $views; ?></div>
  </div>
  <h1><strong><?php echo $markaname; ?></strong> - <?php echo $modelname; ?></h1>
  <div class="car_image_wrapper car_group">
    <div class="big_image">
      <a href="<?php echo $photo; ?>?v=1" class="car_group">
        <img src="<?php echo TEMA_URL; ?>/images/zoom.png" alt="" class="zoom"/>
        <img src="<?php echo $photo; ?>" alt=""/>
      </a>
    </div>
    <div class="small_img">
      <a href="<?php echo $photo; ?>?v=1" class="car_group">
        <img src="<?php echo $photo; ?>" alt=""/>
      </a>
			<a href="<?php echo $photo; ?>?v=1" class="car_group">
        <img src="<?php echo $photo; ?>" alt=""/>
      </a>
			<a href="<?php echo $photo; ?>?v=1" class="car_group">
        <img src="<?php echo $photo; ?>" alt=""/>
      </a>
			<a href="<?php echo $photo; ?>?v=1" class="car_group">
        <img src="<?php echo $photo; ?>" alt=""/>
      </a>
			<a href="<?php echo $photo; ?>?v=1" class="car_group">
        <img src="<?php echo $photo; ?>" alt=""/>
      </a>
    </div>
  </div>
  <div class="car_characteristics">
    <a href="#" class="print"></a>
    <div class="price">$ <?php echo $price; ?> <span>* Pazarlık payı var</span></div>
    <div class="clear"></div>
    <div class="features_table">
      <div class="line grey_area">
        <div class="left">Yürüyüş Mesafesi:</div>
        <div class="right"><?php echo $distance ; ?> km</div>
      </div>
      <div class="line">
        <div class="left">Yıl:</div>
        <div class="right"><?php echo $year ; ?></div>
      </div>
			<div class="line grey_area">
        <div class="left">Tip:</div>
        <div class="right"><?php echo $type ; ?></div>
      </div>
      <div class="line">
        <div class="left">Durum:</div>
        <div class="right"><?php echo $situation ; ?></div>
      </div>
			<div class="line grey_area">
        <div class="left">Vites:</div>
        <div class="right"><?php echo $transmission ; ?></div>
      </div>
      <div class="line">
        <div class="left">Güç:</div>
        <div class="right"><?php echo $hp ; ?></div>
      </div>
      <div class="line">
        <div class="left">Motor:</div>
        <div class="right"><?php echo $engine ; ?></div>
      </div>
			<div class="line grey_area">
        <div class="left">Dış renk:</div>
        <div class="right"><?php echo $exterior_color ; ?></div>
      </div>
      <div class="line">
        <div class="left">İç renk:</div>
        <div class="right"><?php echo $interior_color ; ?></div>
      </div>
			<div class="line grey_area">
        <div class="left">Direksiyon:</div>
        <div class="right"><?php echo $steering_type ; ?></div>
      </div>
      <div class="line">
        <div class="left">Koltuk:</div>
        <div class="right"><?php echo $seats ; ?></div>
      </div>
    </div>
  </div>
  <div class="clear"></div>
  <div class="info_box">
    <div class="car_contacts">
      <h2><strong>Açıklama</strong></h2>
      <p><?php echo $info; ?></p>
      <div class="left">
        <div class="phones detail single_line spaced"><?php echo $phone; ?></div>
        <div class="email detail single_line"><a href="mailto:<?php echo $user_email; ?>" class="markered"><?php echo $user_email; ?></a></div>
      </div>
      <div class="right">
        <div class="addr detail single_line"><?php echo $company; ?></div>
        <div class="web detail single_line"><?php echo $first_name. " " .$last_name; ?></div>
      </div>
      <div class="clear"></div>
    </div>
  </div>
  <div class="car_sidebar">
<?php require '/news_block.php'; ?>
	</div>
  <div class="clear"></div>
</div>
