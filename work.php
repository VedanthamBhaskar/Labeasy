<?php
include("connection.php");
session_start();
$name=$_SESSION['username'];
if($name==true){}
else{
	header("location:index.php");
	}
?>
<?php
if(!$db){
	echo mysqli_connect_error();
}
?>
<html>
<head>
	<!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">

	<title>Works</title>
	<style type="text/css">
		.contenttable{
			border-collapse: collapse;
			margin:25px 0;
			min-width:400px;
			border-radius:5px 5px 0 0;
			overflow:hidden;
			box-shadow:0 0 20px rgba(0,0,0,0.15);
		}
		.contenttable thead tr{
			background-color:#009879;
			color:#ffffff;
			text-align:left;
			font-weight:bold;
		}
		
		.contenttable th 
		.contenttable td{
			padding: 12px 15px;
		}
		.contenttable tbody tr{
			border-bottom:1px solid #dddddd;
		}
		.contenttable tbody tr:nth-of-type(even){
			background-color:#f3f3f3;
		}
		.contenttable tbody tr:last-of-type{
			border-bottom:2px solid #009879;
		}
	</style>
</head>
<body>
<div class="conatainer">
<table class="table contenttable">
  <thead>
    <tr>
      <th scope="col">#</th>
      <th scope="col">Sir</th>
      <th scope="col">subject</th>
      <th scope="col">work</th>
    </tr>
  </thead>
  <tbody>
  <?php
	$sr=1;
	$sql_get=mysqli_query($db,"SELECT * FROM work WHERE status=0");
		while($result=mysqli_fetch_assoc($sql_get)):?>
    <tr>
      <th scope="row"><?php echo $sr++; ?></th>
      <td><?php echo  $result['name']; ?></td>
      <td><?php echo $result['subject']; ?></td>
	  <td><?php echo $result['text']; ?></td>
	  <?php endwhile ?>
    </tr>
  </tbody>
</table>
</div>
	
	<!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>
</body>
</html>