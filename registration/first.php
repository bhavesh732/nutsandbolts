<!DOCTYPE html>
<html>

<head>
	<link rel="stylesheet" href="style.css">
	<title></title>
</head>

<body>
	<div class="container">
		<div class="row justify-content-center">
			<div class="col-sm-6">
				<h3>Please Fill in Your Details</h3>
				<form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]) ?>">
					<input id="fname" type="text" name="FirstName" placeholder="First Name" required><br><?php echo $fname ?>
					<input id="lname" type="text" name="LastName" placeholder="Last Name" required><br><?php echo $lname ?>
					<input id="conno" type="text" name="ContactNumber" placeholder="Contact Number" required><br><?php echo $error ?>
					<input id="regno" type="text" name="Regno" placeholder="Registration Number" required><br><?php echo $rerror ?>
					<input id="class" type="text" name="Class" placeholder="Class" required><br><?php echo $error ?>
					<input id="email" type="text" name="Email" placeholder="E-Mail" required><br><?php echo $emailErr ?>
					<button class="formbutton">Choose your Categories</button>
					<select id="category" class="formselect" name="Category" size="6" multiple required>
						<option value="Cat" disabled selected hidden>Choose your Categories</option>
						<option value="actor">Actor</option>
						<option value="backstage">Backstage</option>
						<option value="music">Music</option>
						<option value="dance">Dance</option>
						<option value="script">Script-Writer</option>
						<option value="media">Media-team</option>
					</select>
					<input type="submit" value="Register" class="submitbutton">
				</form>
			</div>
		</div>
	</div>

	<?php
	$name = $lname = $conno = $regno = $class = $email = "";

	function test_input($data)
	{
		$data = trim($data);
		$data = stripslashes($data);
		$data = htmlspecialchars($data);
		return $data;
	}

	if ($_SERVER["REQUEST_METHOD"] == "POST") {
		$fname = test_input($_POST['FirstName']);
		$lname = test_input($_POST['LastName']);
		$conno = test_input($_POST['ContactNumber']);
		$regno = test_input($_POST['Regno']);
		$class = test_input($_POST['Class']);
		$email = test_input($_POST['Email']);
		echo nl2br("Name : " . $fname . " " . $lname . "\n" .
			"Contact number : " . $conno . "\n" .
			"Registration Number : " . $regno . "\n" .
			"Class : " . $class . "\n" .
			"E-Mail : " . $email);
	}

	$fnameErr=$lnameErr=$emailErr=$error=$rerror="";

	if (empty($_POST["fname"])) {
		$fnameErr = "First Name is required";
	} else {
		$name = test_input($_POST["fname"]);
		// check if name only contains letters and whitespace
		if (!preg_match("/^[a-zA-Z ]*$/", $name)) {
			$fnameErr = "Only letters and white space allowed";
		}
	}

	if (empty($_POST["lname"])) {
		$lnameErr = "Last Name is required";
	} else {
		$name = test_input($_POST["lname"]);
		// check if name only contains letters and whitespace
		if (!preg_match("/^[a-zA-Z ]*$/", $name)) {
			$lnameErr = "Only letters and white space allowed";
		}
	}

	if (empty($_POST["Email"])) {
		$emailErr = "Email is required";
	} else {
		$email = test_input($_POST["Email"]);
		// check if e-mail address is well-formed
		if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
			$emailErr = "Invalid email format";
		}
	}

	if (array_key_exists('ContactNumber', $_POST['ContactNumber'])) {
		if (!preg_match('/^[0-9]{10}$/', $_POST['ContactNumber'])) {
			$error = 'Invalid Number!';
		}
	}

	if (array_key_exists('Regno', $_POST['Regno'])) {
		if (!preg_match('/^[0-9]{10}$/', $_POST['Regno'])) {
			$rerror = 'Invalid Number!';
		}
	}

	?>
</body>

</html>