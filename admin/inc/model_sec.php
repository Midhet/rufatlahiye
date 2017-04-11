<?php
error_reporting (0);
$connection = mysqli_connect("localhost", "root", "", "uti510");

$selectvalue = mysqli_real_escape_string($connection, $_GET['svalue']);

mysqli_select_db($connection, "uti510");
$result = mysqli_query($connection, "SELECT * FROM model WHERE marka_id = '$selectvalue'");

echo '<option value="">Seçin...</option>';
while($row = mysqli_fetch_array($result))
  {
    echo '<option value="'.$row['id'].'">' . $row['name'] . "</option>";
  }

mysqli_free_result($result);
mysqli_close($connection);

?>
