<?php

	echo !defined("ADMIN") ? die("Hacking?") : null;
	$query = query("SELECT * FROM settings");
	$row = row($query);

?>
		<?php

			if ($_POST){
				$notes = p("notes");
					$notes =mysql_real_escape_string(htmlspecialchars($notes));


					$update = query("UPDATE settings SET notes = '$notes'");
					
					if ($update){

                            echo '<div class="alert alert-success">Dəyişikliklər qeydə alındı. Yönləndirilirsiniz.</div>';
							go(URL."/admin/", 0);
						}else {
                            echo '<div class="alert alert-danger">Mysql Xətası: '.mysql_Error().'</div>';
						}
			}

		?>

<div class="col-sm-12 portlets ui-sortable">
    <div class="widget">
        <div class="widget-header transparent">
            <h2>Qeyd <strong>Dəftəri</strong></h2>
        </div>
        <div class="widget-content padding">
            <form action="" method="post" role="form" enctype="multipart/form-data" id="NotEmptyValidator" novalidate="novalidate" class="bv-form">
						<section id="editor">
							<label>Açıqlama</label>
							<textarea id='edit' name="notes" style="display: none;" ><?php echo ss($row["notes"]); ?></textarea>
						</section>

                <button type="submit" class="btn btn-primary">Qeyd et</button>
                <input type="hidden" value="">
            </form>
        </div>
    </div>
</div>