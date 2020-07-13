<?php
include("connection.php");
session_start();
?>
<?php
$id=$_SESSION['cart'];
if($id==true){
}
else{
	header("location:index.php");
	}
	$update=mysqli_query($db,"UPDATE questions SET status=1 WHERE qno='$id'");
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
    <title>Question</title>
    <style type="text/css">
	.question{
		font-size:20px;
	}
	h1{
	text-align:center;
	color:green;
    }
	.image{
		position:relative;
		left:100px;
		top:40px;
	}
	#form{
			width:1000px;
			height:500px;
			margin:0 auto;
			padding:50px;
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
	#register{
			position:relative;
			left:150px;
		}
	.question{
		margin-left:20px;
	}
    </style>
</head>
<body>
    <h1>Solutions Portal</h1>
	<?php
	$sql_get=mysqli_query($db,"SELECT * FROM questions WHERE status=1 && qno='$id'");
	if($result=mysqli_fetch_assoc($sql_get))
		echo '<p class="question">Posted By: '.$result['rollno'].'</p>';
		echo '<p class="question">His Query is: '.$result['text'].'</p>';
		echo '<p><image class="image" src="'.$result['image'].'" height="50%" width="50%"><p>';
	
	?>
    <div class="container" id="form">
		<form method="post" enctype="multipart/form-data">
			<table class="tabler">
				<tr>
					<td>
						Post Your Solution :
					</td>
					<td>
					<textarea rows="6" cols="50" name="text"></textarea>
					</td>
				</tr>
				<tr>
					<td>
						uploadImg:
					</td>
					<td>
					<input type="file" name="uploadfile">
					</td>
				</tr>
				<tr>
					<td>
					</td>
					<td>
					<input type="submit" name="submit" value="submit" class="btn btn-warning" id="register">
					</td>
				</tr>
			</table>
		</form>
	</div>
<div>
<p>To Main Portal <a href="teacherportal.php">Click Here!</a></p>
</div>	
	<?php
	if(isset($_POST['submit'])){
	$roll=$result['rollno'];
	$text=$_POST['text'];
	$filename = $_FILES["uploadfile"]["name"];
	$temp_name  = $_FILES["uploadfile"]["tmp_name"];
	$folder = "teacher/".$filename;
	move_uploaded_file($temp_name,$folder);
	$query="INSERT INTO solutions(text,image,roll) VALUES ('$text','$folder','$roll')";
	if(mysqli_query($db,$query)){
		 echo "<script type='text/javascript'>alert('Answer Uploaded Successfully');</script>";
	}else{
		 echo "<script type='text/javascript'>alert('Failed');</script>";
	}
	}
	?>
		<!-- Optional JavaScript -->
		<!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>
</body>
</html>