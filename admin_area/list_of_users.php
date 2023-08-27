
<div id="insert-pro">
	<h1>VIEW USERS</h1>
	<table class="table">
		<thead class="tbhead">
			<tr>
				<th>No. </th>
				<th>Username</th>
				<th>First Name</th>
				<th>Middle Name</th>
				<th>Last Name</th>
				<th>Contact Number</th>
				<th>Address</th>
				<th>Gender</th>
				<th>Birthdate</th>
				<th>Delete</th>
			</tr>
		</thead>
		<tbody class="tbbody">
		<?php
		include('connect.php');
		$get_users="Select * from `user_table`";
		$results=mysqli_query($con,$get_users);
		$number=0;
		while($row=mysqli_fetch_assoc($results)){
			$user_id=$row['user_id'];
			$username=$row['username'];
			$fname=$row['fname'];
			$mname=$row['mname'];
			$lname=$row['lname'];
			$contact_num=$row['contact_num'];
			$address=$row['address'];
			$gender=$row['gender'];
			$birthdate=$row['birthdate'];
			$number++;
			echo "<tr>
				<td>$number</td>
				<td>$username</td>
				<td>$fname</td>
				<td>$mname</td>
				<td>$lname</td>
				<td>$contact_num</td>
				<td>$address</td>
				<td>$gender</td>
				<td>$birthdate</td>
				<td><a href='admin.php?delete_user=$user_id'><i class='fa fa-times' aria-hidden='true'></i></td>
			</tr>";
		}
		
		?>
			
		</tbody>
	</table>
</div>

