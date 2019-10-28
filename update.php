<!DOCTYPE html>
<?php include 'db.php';  

$id = (int)$_GET ['id'];

$sql = "select * from uloha where id = '$id' ";


$rows = $db->query($sql);

$row = $rows->fetch_assoc();

if(isset($_POST['send'])){
	

$task = htmlspecialchars($_POST['task']);
$sql = "update  uloha set name = '$task' where id = '$id' ";
$db->query($sql);

header('location: index.php');
}
?>

<html>
<head>


<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" >
 
<!-- Optional theme -->
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap-theme.min.css" >
 
<!-- JQuery -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.0/jquery.min.js"></script>
 
<!-- Latest compiled and minified JavaScript -->
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.19/css/jquery.dataTables.css">
  
<script type="text/javascript" charset="utf8" src="https://cdn.datatables.net/1.10.19/js/jquery.dataTables.js"></script>
	
<title>TODO APP</title>
</head>

<!--body-->

<body>
	
	<!--container-->

	<div class="container">
		<div class="row" style="margin-top: 70px;">
				<center>
					<h1>Update Todo list</h1>
				</center>
	<div class="col-md-10 col-md-offset-1">
		<table class="table">
			<hr><br>

 	<!--form-->

    <form method="post">

     	<div class="form-group">
        	<label>Name task</label>
        	<input type="text" required name="task" value="<?php echo $row['name'];?>" class="form-control">
        </div>
        	<input type="submit" name="send" value="poslat" class="btn btn-success">&nbsp;
        	<a href="index.php" class="btn btn-warning">Back</a>
     </form>
      
	</div>
		</table>
		</div>
	</div>
</div>
</body>
</html>