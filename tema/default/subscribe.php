

<?php

			if ($_POST){

				$email = p("email"); 

						$insert = query("INSERT INTO subscribe SET
						email = '$email'");

						if ($insert){
							go(URL."/subscribe");
						}else {
							echo '<div class="alert alert-danger">Mysql Xətası: '.mysql_Error().'</div>';
						}


			}

		?>
 
 <section class="subscribe-block text-center">
        <div class="container">
            <div class="row">
                <div class="col-sm-6 col-sm-offset-3">
                    <h2 style=" margin: 0; "><?php echo other(15); ?></h1>
                    <p><?php echo other(14); ?></p>
                    <form action="" role="form" method="post">
                            <input type="email" placeholder="<?php echo other(16); ?>" name="email" id="subscribe-input" class="form-control input-lg" required>
                            <button class="btn btn-primary btn-lg subscribe-btn" type="submit"><?php echo other(17); ?></button>
                    </form>
                </div>
        </div>
    </section> 