<?php

	define("GUVENLIK", true);
	require_once "../sistem/ayar.php";
	require_once "../sistem/fonksiyon.php";


$id = $_POST['id'];

$query = query("SELECT * FROM product_category WHERE parent_id = $id Order By id DESC  ");
echo '<option value="0">'.other(9).'</option>';
while ($row = row($query))
{
    echo '<option value="'.$row['id'].'">' . $row['name_'.langId()] . "</option>";
}

?>