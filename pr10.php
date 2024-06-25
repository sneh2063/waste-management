<?php
	// Connect to the database
	$servername = "localhost";
	$username = "root";
	$password = "";
	$dbname = "user";
	$conn = mysqli_connect($servername, $username, $password, $dbname);
	
	// Check connection
	if (!$conn) {
		die("Connection failed: " . mysqli_connect_error());
	}
	// Handle form submission
	$hobbies_F ="";
	if ($_SERVER["REQUEST_METHOD"] == "POST") {
		$name = $_POST["txtName"];
		$email = $_POST["txtEmail"];
		$dob = $_POST["txtDate"];
		$address = $_POST["txtAdd"];
		$contact = $_POST["txtContact"];
		$gender = $_POST["rbtnGen"];
		$dept = $_POST["drpDept"];
		$hobbies = $_POST["chkHobby"];
		for ($i=0; $i<sizeof ($hobbies);$i++) 
		{  
			$hobbies_F= $hobbies_F . "$hobbies[$i]".", ";  
		}
			
		$target_dir = "img/";
		$target_file = $target_dir . basename($_FILES["fileID"]["name"]);
		$uploadOk = 1;
		$imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));
		// Check if image file is a actual image or fake image
		if(isset($_POST["submit"])) {
		  $check = getimagesize($_FILES["fileID"]["tmp_name"]);
		  if($check !== false) {
			echo "File is an image - " . $check["mime"] . ".";
			$uploadOk = 1;
		  } else {
			echo "File is not an image.";
			$uploadOk = 0;
		  }
		}
		if ($uploadOk == 0) {
		  echo "Sorry, your file was not uploaded.";
		// if everything is ok, try to upload file
		} else {
			echo "Sorry, there was an error uploading your file.";
		  }
		}
		
		
		$pass = $_POST["txtPass"];
		
		// Prepare and execute the SQL query
		$insertsql = "INSERT INTO tabel (Name, Email, DOB, Address, Contact, Gender, Department, Hobbies, UploadID, Password) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?)";
		$stmt = mysqli_prepare($conn, $insertsql);
		if ($stmt) {
			mysqli_stmt_bind_param($stmt, "ssssssssss", $name, $email, $dob, $address, $contact, $gender, $dept, $hobbies_F, $target_file, $pass);
			if (mysqli_stmt_execute($stmt)) {
				$sql = "SELECT * FROM tabel";
				$result = mysqli_query($conn, $sql);
				
				echo '<script>alert("Data Successfully Stored!!!")</script>';
				
				if ($result) {
					// Start building the HTML table
					echo "<table border='1'>";
					echo "<tr><th>Name</th><th>Email</th><th>DOB</th><th>Address</th><th>Contact</th><th>Gender</th><th>Department</th><th>Hobbies</th><th>File Upload</th><th>Password</th></tr>";
					while ($row = mysqli_fetch_assoc($result)) {
						echo "<tr>";
						echo "<td>" . $row['name'] . "</td>";
						echo "<td>" . $row['email'] . "</td>";
						echo "<td>" . $row['dob'] . "</td>";
						echo "<td>" . $row['address'] . "</td>";
						echo "<td>" . $row['contact'] . "</td>";
						echo "<td>" . $row['gender'] . "</td>";
						echo "<td>" . $row['department'] . "</td>";
						echo "<td>" . $row['hobbies'] . "</td>";
						echo "<td>" . $row['UploadID'] . "</td>";
						echo "<td>" . $row['Password'] . "</td>";
						echo "</tr>";
					}
				}
				echo "</table>";
			} 
			else {
				echo "Error: " . mysqli_error($conn);
			}
			mysqli_stmt_close($stmt);
		} 
		else 
		{
			echo "Error: " . mysqli_error($conn);
		}
	
	// Close the database connection
	mysqli_close($conn);
?>