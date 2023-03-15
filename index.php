<!doctype html>
<html lang="en">
  <head>
  	<title>test case</title>
	
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

	<link href="https://fonts.googleapis.com/css?family=Lato:300,400,700&display=swap" rel="stylesheet">

	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
	
	<link rel="stylesheet" href="css/style.css">
	
	</head>
	<body>
		
	
		<!--  -->
	<section class="ftco-section">
		<div class="container">
			<div class="row justify-content-center">
				<div class="col-md-6 text-center mb-5">
					<h2 class="heading-section">Test For Fun </h2>
				</div>
			</div>
			<div class="row justify-content-center">
				<div class="col-md-6 col-lg-5">
					<div class="login-wrap p-4 p-md-5">
		      	<div class="icon d-flex align-items-center justify-content-center">
		      		<span class="fa fa-user-o"></span>
		      	</div>
		      	<!-- action="update.php" method="POST" -->
						<form >
		      		<div class="form-group">
		      			<input type="text" id="uname" class="form-control rounded-left" placeholder="Username" required>
		      		</div>
	            <div class="form-group d-flex">
	              <input type="password" id="upass"class="form-control rounded-left" placeholder="Password" required>
	            </div>

	            <div class="form-group">
	            	<button type="button" onclick="tests()" class="btn btn-primary rounded submit p-3 px-5">log in </button>
	            </div>
	          </form>
	        </div>
				</div>	       					

			</div>
		</div>
	</section>

    <script>
function redirectgame(){
	location.replace('http://localhost/login-form-18/login-form-18/theball.html');
}

function tests(){

var name="<?php echo $name; ?>"
 
var id="<?php echo $idd; ?>"


 const inname=document.getElementById("uname").value

 const inpass=document.getElementById("upass").value
 

if(name ==inname && id ==inpass){

	location.replace('http://localhost/login-form-18/login-form-18/update.php');
}
else{

	window.alert("error");
	location.reload()
}

}
 
	</script>
	<script src="js/jquery.min.js"></script>
  <script src="js/popper.js"></script>
  <script src="js/bootstrap.min.js"></script>
  <script src="js/main.js"></script>

	</body>
</html>
<?php

require('vendor/autoload.php');
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

$sql = "SELECT * FROM `logincred` WHERE 1;";
$result = $conn->query($sql);


	$name="";
	$idd="";
if ($result->num_rows > 0) {
  // output data of each row
  while($row = $result->fetch_assoc()) {
	$name=$row["Username"];
	$idd=$row["Password"];
    // echo "id: " . $row["ID"]. " - Name: " . $row["Username"]. " " . $row["Password"]. "<br>";
  }
} else {
//   echo "0 results";
}?>
