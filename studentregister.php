<?php
include("connection.php");
session_start();
?>
<?php
if(isset($_POST['register'])){
$s1=$_POST['name'];	
$s2=$_POST['roll'];
$s3=$_POST['branch'];
$s4=$_POST['section'];
$s5=$_POST['email'];
$s6=$_POST['phone'];
$s7=$_POST['password'];
$s8=$_POST['password2'];

if(!$db){
  echo 	mysqli_connect_error();
}
if($s7==$s8){
	$s7=md5($s8);
	$query="INSERT INTO students(name,roll,branch,section,email,phone,password) VALUES ('$s1','$s2','$s3','$s4','$s5','$s6','$s7')";
	if(mysqli_query($db,$query)){
		echo "<script>alert('Registered Successfully')</script>";
		$_SESSION['username']=$s1;
		header("location:studentportal.php");
	}
}
else{
	$_SESSION['message']="The Two Passwords do not match";
}
}
?>
<html>
<head>
	<!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">

	<title>Student Registeration</title>
	<style type="text/css">
		h1{
			text-align:center;
			font-weight:bold;
			color:green;
		}
		#form{
			width:1000px;
			height:500px;
			margin:0 auto;
			padding:35px;
			margin-left:435px;
		}
		input,select{
			margin-left:10px;
		}
		.tabler{
			border-collapse: collapse;
			margin:25px 0;
			min-width:400px;
			border-radius:5px 5px 0 0;
			overflow:hidden;
			box-shadow:0 0 20px rgba(0,0,0,0.15);
		}
		.tabler td{
			padding: 12px 15px;
		}
		.register{
			position:relative;
			left:150px;
		}
		#error{
			text-align: center;
			color: red;
		}
	</style>
</head>
<body>
<div id='heading'>
	<h1>Student Registeration</h1>
</div>
<?php
        if(isset($_SESSION['message'])){
            echo "<div id='error'>".$_SESSION['message']."</div>";
            unset($_SESSION['message']);
        }
?>
<div id="form" class="container">
	<form method="post" action="studentregister.php">
		<table class="tabler">
		<tr>
			<td>
				Name:
			</td>
			<td>
				<input type="text" name="name">
			</td>
		</tr>
		<tr>
			<td>
				RollNumber:
			</td>
			<td>
				<input type="text" name="roll">
			</td>
		</tr>
		<tr>
			<td>
				Branch:
			</td>
			<td>
				<select name="branch">
					<option>CSE</option>
					<option>ECE</option>
					<option>EEE</option>
					<option>CE</option>
					<option>ME</option>
					<option>CST</option>
					<option>ECT</option>
				</select>
			</td>
		</tr>
		<tr>
			<td>
				Section:
			</td>
			<td>
				<select name="section">
					<option>A</option>
					<option>B</option>
					<option>C</option>
					<option>D</option>
				</select>
			</td>
		</tr>
		<tr>
			<td>
				EmailId:
			</td>
			<td>
				<input type="email" name="email">
			</td>
		</tr>
		<tr>
			<td>
				Phone Number:
			</td>
			<td>
				<input type="text" name="phone">
			</td>
		</tr>
		<tr>
			<td>
				Password:
			</td>
			<td>
				<input type="password" name="password">
			</td>
		</tr>
		<tr>
			<td>
				ConfirmPassword:
			</td>
			<td>
				<input type="password" name="password2">
			</td>
		</tr>
		</table>
		<input type="submit" value="Register" name="register" class="btn btn-success register">
	</form>
</div>
	
	<!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>
</body>
</html>