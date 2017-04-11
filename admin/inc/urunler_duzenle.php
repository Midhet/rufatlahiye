<?php echo !defined("ADMIN") ? die("Hacking?") : null; ?>
<?php

	$id = g("id");
	$query = query("SELECT * FROM product_product WHERE id = '$id'");
	if (mysql_affected_rows() < 1){
		go(URL."/admin");
		exit;
	}

	$row = row($query);
?>

		<?php

			if ($_POST){

				$name_az = p("name_az");
				$name_eng = p("name_eng");
				$name_rus = p("name_rus");
				
				if (!$name_az){
                    echo '<div class="alert alert-danger">Başlığı boş buraxmaq olmaz.</div>';
				}else{

						$update = query("UPDATE product_product SET
							name_az = '$name_az',
							name_eng = '$name_eng',
							name_rus = '$name_rus'
							WHERE id = '$id'");

						if ($update){

                            echo '<div class="alert alert-success">Dəyişikliklər qeydə alındı. Yönləndirilirsiniz.</div>';
							go(URL."/admin/index.php?do=urunler", 1);
						}else {
                            echo '<div class="alert alert-danger">Mysql Xətası: '.mysql_Error().'</div>';
						}

				}

			}

		?>

<div class="col-sm-12 portlets ui-sortable">
    <div class="widget">
        <div class="widget-header transparent">
            <h2>Bölməni <strong>Redaktə</strong> Et</h2>
        </div>
        <div class="widget-content padding">
            <form action="" method="post" role="form" enctype="multipart/form-data" id="NotEmptyValidator" novalidate="novalidate" class="bv-form">
                <ul id="demo5" class="nav nav-tabs nav-simple">
					<li class="active">
						<a href="#demo5-az" data-toggle="tab"><i class="fa fa-home"></i> Azərbaycan dili</a>
					</li>
					<li class="">
						<a href="#demo5-eng" data-toggle="tab">İngilis dili</a>
					</li>
					<li class="">
						<a href="#demo5-rus" data-toggle="tab">Rus dili</a>
					</li>
				</ul>

				<div class="tab-content">
					<div class="tab-pane fade active in" id="demo5-az">
						<div class="form-group">
							<label>Başlıq</label>
							<input type="text" class="form-control"  name="name_az"   value="<?php echo ss($row["name_az"]); ?>">
						</div>
					</div> <!-- / .tab-pane -->
					<div class="tab-pane fade" id="demo5-eng">
						<div class="form-group">
							<label>Başlıq</label>
							<input type="text" class="form-control"  name="name_eng"   value="<?php echo ss($row["name_eng"]); ?>">
						</div>
					</div>  <!-- / .tab-pane -->
					<div class="tab-pane fade" id="demo5-rus">
						<div class="form-group">
							<label>Başlıq</label>
							<input type="text" class="form-control"  name="name_rus"   value="<?php echo ss($row["name_rus"]); ?>">
						</div>
					</div>  
				</div> <!-- / .tab-content -->  
                <button type="submit" class="btn btn-primary">Qeyd et</button>
                <input type="hidden" value="">
            </form>
			 
        </div>
    </div>
</div>
