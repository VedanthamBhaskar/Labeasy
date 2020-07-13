<?php
include("connection.php");
?>
<?php
session_start();
if(isset($_POST['login1'])){     
        	$username=$_POST['tname'];
        	$password=md5($_POST['tpass']);
        	$sql="SELECT * FROM teachers WHERE name='$username' AND password='$password'";
        	$query=mysqli_query($db,$sql);
        	if(mysqli_num_rows($query)==1){
        		$_SESSION['message']="You are now loggedin";
        		$_SESSION['username']=$username;
        		header("location:teacherportal.php");
        	}else{
        		$_SESSION['message']="UserId/Password doesn't match";
        	}
            
    } 
?>
<?php
if(isset($_POST['login2'])){     
        	$username=$_POST['sname'];
        	$password=md5($_POST['spass']);
        	$sql="SELECT * FROM students WHERE name='$username' AND password='$password'";
        	$query=mysqli_query($db,$sql);
        	if(mysqli_num_rows($query)==1){
        		$_SESSION['message']="You are now loggedin";
        		$_SESSION['username']=$username;
        		header("location:studentportal.php");
        	}else{
        		$_SESSION['message']="UserId/Password doesn't match";
        	}
            
    } 
?>

<!DOCTYPE html>
<html>
<head>
	<!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">

	<title>LabEasy</title>
	<style type="text/css">
		body{
			
		}
		#teacherform{
			padding: 100px;
			margin: 50px 100px;
			float: left;
		}
		#studentform{
			padding: 100px;
			margin: 50px 100px;
			float: left;
		}
		#student{
			font-size: 20px;
			color: #4200FF ;
			font-weight:bold;
		}
		#teacher{
			font-size: 20px;
			color: #C70039;
			font-weight:bold;
		}
		.login{
			background-color: green;
			color: white;
		}
		.clear{
			clear: both;
		}
		.login{
			float: left;
			margin-right: 10px;
		}
		#heading{
			margin:0 auto;
			font-size: 30px;
			text-align: center;
			font-weight:bold;
		}
		a,a:hover{
			color: white;
			text-decoration: none;
		}
		#error{
			text-align: center;
			color: red;
		}
	</style>
</head>
<body>
<div id='heading'>
	<h1>LabEasy</h1>
</div>
<?php
        if(isset($_SESSION['message'])){
            echo "<div id='error'>".$_SESSION['message']."</div>";
            unset($_SESSION['message']);
        }
?>
	<div class="clear"></div>

	<div class="conatiner" id="teacherform">
		<form action="index.php" method="post">
			<p id="teacher">Teacher</p>
			<p><input type="text" name="tname"  placeholder="UserId"></p>
			<p><input type="password" name="tpass"  placeholder="password"></p>
			<p  class="login"><input type="submit" name="login1" value="login" class="btn btn-success"></p>
			<p><button class="btn btn-primary"><a href="teacherregister.php">Register</a></button></p>
		</form>
	</div>

	<div class="conatiner" id="studentform">
		<form action="index.php" method="post">
			<p id="student">Student</p>
			<p><input type="text" name="sname"  placeholder="UserId"></p>
			<p><input type="password" name="spass"  placeholder="password"></p>
			<p  class="login"><input type="submit"  name="login2" value="login" class="btn btn-success"></p>
			<p><button class="btn btn-primary"><a href="studentregister.php">Register</a></button></p>
		</form>
	</div>
	<!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>
</body>
</html>