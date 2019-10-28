<!DOCTYPE html>

<?php include 'db.php';  

$page = (isset($_GET['page']) ? (int)$_GET['page'] : 1);
$perPage = (isset($_GET['per-page']) &&(int) ($_GET['per-page']) <= 50 ? (int) $_GET['per-page'] : 5);
$start = ($page > 1) ? ($page * $perPage) - $perPage : 0;


 $sql = "select * from uloha limit ".$start." , ".$perPage." ";
 $total = $db->query("select * from uloha")->num_rows;
 $pages = ceil($total / $perPage);


$rows = $db->query($sql);

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
	<div class="container">
		<div class="row" style="margin-top: 70px;">
				<center><h1>Todo list</h1></center>
					<div class="col-md-10 col-md-offset-1">
						<table class="table table-hover">
							<button type="button" data-target = "#myModal" data-toggle="modal"class="btn-btn-success">Add task</button>
							<button type="button" class="btn-btn-default pull-right" onclick="print()">Print</button>
								<hr><br>
								
								<!-- Modal -->
	<div id="myModal" class="modal fade" role="dialog">
	  <div class="modal-dialog">

	    <!-- Modal content-->
	    <div class="modal-content">
	      <div class="modal-header">
	        <button type="button" class="close" data-dismiss="modal">&times;</button>
	        <h4 class="modal-title">Add task</h4>
	      </div>
	      <div class="modal-body">
	        <form method="post" action= "add.php">

	        	<div class="form-group">
	        		<label>Name task</label>
	        		<input type="text" required name="task" class="form-control">
	        	</div>
	        	<input type="submit" name="send" value="poslat" class="btn btn-success">
	        </form>
	      </div>
	      <div class="modal-footer">
	        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
	      </div>
	    </div>
	 </div>
</div>
		
		<!--search-->

	<div class="col-md-12 text-center">
		<p>Search</p>
			<form action="search.php" method="post" class="form-group">
				<input type= "text" placeholder="Search"  name= "search" class="form-control"></input>
			</form>

	</div>

		<!--table-->

		<table class="table table-hover">
			<thead>
				<tr>
					<th>ID.</th>
					<th>Name</th>
				</tr>
			</thead>
			<tbody>

				<!--button edit, delete-->	

				<tr>
					 <?php while($row = $rows->fetch_assoc()):?>
					  <th><?php echo $row['id'] ?></th>
					  <td class="col-md-10"><?php echo $row['name'];?></td>
					  <td><a href="update.php?id=<?php echo $row['id'];?>" class="btn btn-success">Edit</a></td>
					  <td><a href="delete.php?id=<?php echo $row['id'];?>" class="btn btn-danger">Delete</a></td>
				</tr>
					<?php endwhile; ?>
							  
			</tbody>
		</table>

		<center>

			<!--pagination-->	

		 	<ul class="pagination">
				<?php for($i = 1; $i <= $pages; $i++): ?>
				<li><a href="?page=<?php echo $i; ?>&per-page =<?php echo $perPage;?>"><?php echo $i; ?></a></li>
				<?php endfor; ?>
			</ul>
		</center>
											
			</div>
		</div>
	</div>


</body>
</html>