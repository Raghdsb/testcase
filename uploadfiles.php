<?php
$servername = "localhost";
$username = "";
$password = "";
$dbname = "adminlog";
// Create connection
$conn = new mysqli($servername, $username, $password,$dbname);

// Check connection
if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
}

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
      echo $uploadPath;
    } 
}
$sql = "INSERT INTO `files-count` ( `link`) VALUES ('$uploadPath')";
$result = $conn->query($sql);

if ($conn->query($sql) === TRUE) {
    header("Location: http://localhost/login-form-18/login-form-18/index.php");
 
exit;
  } else {
    echo "Error: " . $sql . "<br>" . $conn->error;
  }
  
  $conn->close();
?>