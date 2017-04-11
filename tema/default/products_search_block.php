<div class="form-div">
            <form method="POST" action="products_search">
                <p class="axtarp">AXTARIŞ</p>
                <select name="cat_id1" style="width:90px;" >
                    <option value="0"><?php echo other(9); ?></option>
                    <?php
                    $query = query("SELECT * FROM product_category  Order By name_az ASC  ");

                    while ($row = row($query)){ ?>
                        <option value="<?php echo $row["id"]; ?>"><?php echo $row["name_".langId()]; ?></option>
                    <?php } ?>
                </select>
                <select name="cat_id2" style="width:90px;" >
                     <option value="0"><?php echo other(9); ?></option>
                    <?php
                    $query = query("SELECT * FROM product_product  Order By name_az ASC  ");

                    while ($row = row($query)){ ?>
                        <option value="<?php echo $row["id"]; ?>"><?php echo $row["name_".langId()]; ?></option>
                    <?php } ?>
                </select>
                <select name="cat_id3"  style="width:90px;">
                     <option value="0"><?php echo other(9); ?></option>
                    <?php
                    $query = query("SELECT * FROM product_company  Order By name_az ASC  ");

                    while ($row = row($query)){ ?>
                        <option value="<?php echo $row["id"]; ?>"><?php echo $row["name_".langId()]; ?></option>
                    <?php } ?>
                </select>
                <select name="cat_id4" style="width:90px;">
                     <option value="0"><?php echo other(9); ?></option>
                    <?php
                    $query = query("SELECT * FROM product_type  Order By name_az ASC  ");

                    while ($row = row($query)){ ?>
                        <option value="<?php echo $row["id"]; ?>"><?php echo $row["name_".langId()]; ?></option>
                    <?php } ?>
                </select>
                <input class="button axtarbut" type="submit" value="Axtar" >
            </form> 	
				</div>