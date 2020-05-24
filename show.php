<?php 
	
	$errors = "";

	// connect to database
	$db = mysqli_connect("localhost", "root", "", "todo");
	

	// delete task
	if (isset($_GET['del_task'])) {
		$id = $_GET['del_task'];

		mysqli_query($db, "DELETE FROM task WHERE id=".$id);
		header('location: show.php');
	}

	// select all tasks if page is visited or refreshed

?>
<!DOCTYPE html>
<html>



<body>



	<table>
		<thead>
			<tr>
				<th>N</th>
				<th>Tasks</th>
				<th style="width: 60px;">Action</th>
			</tr>
		</thead>

		<tbody>
			<?php 
			$tasks = mysqli_query($db, "SELECT * FROM task");
			$i = 1; while ($row = mysqli_fetch_array($tasks)) { ?>
				<tr>
					<td> <?php echo $i; ?> </td>
					<td class="task"> <?php echo $row['title']; ?> </td>
					<td class="task"> <?php echo $row['date']; ?> </td>
					<td class="delete"> 
						<a href="show.php?del_task=<?php echo $row['id'] ?>">x</a> 
					</td>
				</tr>
			<?php $i++; } ?>	
		</tbody>
	</table>

</body>
</html>