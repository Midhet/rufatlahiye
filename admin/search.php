<?php
    $key=$_GET['key'];
    $array = array();
    $con=mysql_connect("localhost","smart_rufat","@m3Okke&H]2d");
    $db=mysql_select_db("smart_rufat",$con);
    $query=mysql_query("SELECT * FROM products WHERE title_az LIKE '%{$key}%'");
    while($row=mysql_fetch_assoc($query))
    {
      $array[] = $row['title_az'];
    }
    echo json_encode($array);
?>
