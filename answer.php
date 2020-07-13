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
	$update=mysqli_query($db,"UPDATE solutions SET status=1 WHERE answerno='$id'");
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
    <title>Solution</title>
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
    </style>
</head>
<body>
    <h1>Solutions Portal</h1>
	<?php
	$sql_get=mysqli_query($db,"SELECT * FROM solutions WHERE status=1 &&  answerno='$id'");
	if($result=mysqli_fetch_assoc($sql_get))
		echo '<p class="question">Answer for previous query is: '.$result['text'].'</p>';
		echo '<p><image class="image" src="'.$result['image'].'" height="50%" width="50%"><p>';
	
	?>
	
		<!-- Optional JavaScript -->
		<!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>
</body>
</html>