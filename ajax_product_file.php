<?php
if(isset($_FILES["file"]["type"]))
{
$validextensions = array("pdf", "tar", "zip", "rar", "docx", "doc", "jpg", "png");
$fotoadi = time().$_FILES["file"]["name"];
$temporary = explode(".", $fotoadi);
$file_extension = end($temporary);
 
if ($_FILES["file"]["error"] > 0)
{
echo "Return Code: " . $_FILES["file"]["error"] . "<br/><br/>";
}
else
{
if (file_exists("upload/" . $fotoadi)) {
echo $fotoadi . " <span id='invalid'><b>already exists.</b></span> ";
}
else
{
$sourcePath = $_FILES['file']['tmp_name']; // Storing source path of the file in a variable
$targetPath = "upload/".$fotoadi; // Target path where file is to be stored
move_uploaded_file($sourcePath,$targetPath) ; // Moving Uploaded file

$fotoinput = '/upload/' . $fotoadi;

echo "<label>Şəkil yükləndi!</label> <input type='text' name='file' class='form-control'  value='" .$fotoinput. "'>" ; 
}
}
 
}
?>