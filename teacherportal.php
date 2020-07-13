<?php
include("connection.php");
session_start();
?>
<?php
if(!$db){
	echo mysqli_connect_error();
}
$name=$_SESSION['username'];
if($name==true){
}
else{
	header("location:index.php");
	}
$sql_get=mysqli_query($db,"SELECT * FROM teachers WHERE name='$name'");
$result1=mysqli_fetch_assoc($sql_get);
?>
<?php
if(isset($_POST['submit'])){
$name=$result1['name'];
$subject=$_POST['subject'];
$text=$_POST['text'];
$query="INSERT INTO work(name,text,subject) VALUES ('$name','$text','$subject')";
if(mysqli_query($db,$query)){
	 echo "<script type='text/javascript'>alert('Data Submitted');</script>";
}else{
	 echo "<script type='text/javascript'>alert('Failed');</script>";
}
}
?>
<!DOCTYPE html>
<html>
<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <script src="https://kit.fontawesome.com/a076d05399.js"></script>
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
    <title>Faculty</title>
    <style type="text/css">
        #msg{
            border-radius: 50%;
            position: relative;
            top:-10px;
            left: -10px;
        }
        .clear{
            clear: both;
        }
        p{
            margin:10px;
        }
        input{
            margin: 10px;
        }
		.navi{
			font-size:15px;
			margin:20px;
			font-weight:bold;
		}
		.tabler{
			border-collapse: collapse;
			margin:25px 0;
			min-width:400px;
			border-radius:5px 5px 0 0;
			overflow:hidden;
		}
		.tabler td{
			padding: 12px 15px;
		}
		#logo{
			color:blue;
			font-weight:bold;
			font-size:30px;
		}
    </style>
</head>
<body>
           
	<nav class="navbar navbar-expand-lg navbar-light bg-light">
		<div class="container">
			<a class="navbar-brand" href="#" id="logo">Teacher Portal</a>
			<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
								<?php
								  $sql=mysqli_query($db,"SELECT * FROM questions WHERE status=0 && subject='".$result1['subject']."'");
								  $count=mysqli_num_rows($sql);
								?>
				<span class="navbar-toggler-icon"></span>
				</button>
				<?php echo '<spam class="navi">Name:'.$result1['name'].'</spam>';?>
				<?php echo '<spam class="navi">FacultyId:'.$result1['userid'].'</spam>';?>
				<?php echo '<spam class="navi">Branch:'.$result1['branch'].'</spam>'?>
				<div class="collapse navbar-collapse" id="navbarSupportedContent">
					<ul class="navbar-nav ml-auto"> 
						<li class="nav-item dropdown">
							<a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
							<i class="fas fa-envelope"></i> <span class="badge badge-primary" id="msg"><?php echo $count; ?></span>
							</a>
							<div class="dropdown-menu" aria-labelledby="navbarDropdown">
								<?php
								$sql=mysqli_query($db,"SELECT * FROM questions WHERE status=0 && subject='".$result1['subject']."'");
								if(mysqli_num_rows($sql)>0){
									while($result=mysqli_fetch_assoc($sql)){
										$_SESSION['cart']=$result['qno'];
										echo '<a class="dropdown-item text-primary" href="solution.php">'.$result['text'].'</a>';
										echo '<div class="dropdown-divider"></div>';
									}
								}
								else{
									echo '<a class="dropdown-item text-danger" href="#"><i class="fas fa-frown"></i> sorry no queries yet</a>';
								}
								?>								
								
									  
							</div>
						</li>
						<a  class="nav-link ml-auto" href="logout.php"><i class="fas fa-sign-out-alt"></i></a>
					</ul>
				</div>
		</div>
	</nav>
	<div class="container">
		<form method="post" enctype="multipart/form-data">
			<table class="tabler">
				<tr>
					<td>
						Subject:
					</td>
					<td>
					<select name="subject">
						<option>Java</option>
						<option>Python</option>
						<option>C</option>
						<option>Rprogramming</option>
						<option>MATLab</option>
						<option>DSD</option>
						<option>DS</option>
					</select>
					</td>
				</tr>
				<tr>
					<td>
						Post work to be Done for next lab by Students :
					</td>
					<td>
					<textarea rows="6" cols="50" name="text"></textarea>
					</td>
				</tr>
				<tr>
					<td>
					</td>
					<td>
					<input type="submit" name="submit" value="submit" class="btn btn-warning">
					</td>
				</tr>
			</table>
		</form>
	</div>
	<p>To View the works Posted by Faculty <a href="work.php">Click Here!</a></p>
		<!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>
</body>
</html>