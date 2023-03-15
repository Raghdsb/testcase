<?php

$currentDirectory = getcwd();
$uploadDirectory = "\uploads\ ";
$fileName = $_FILES['the_file']['name'];
$fileTmpName  = $_FILES['the_file']['tmp_name'];
$tmp = explode('.', $fileName);
$fileExtension = end($tmp);
$uploadPath = $currentDirectory . $uploadDirectory . basename($fileName); 
if (isset($_POST['submit'])) {
 $didUpload = move_uploaded_file($fileTmpName, $uploadPath);
    if ($didUpload) {
      header("Location: http://localhost/login-form-18/login-form-18/index.php");
    } 
}

?>