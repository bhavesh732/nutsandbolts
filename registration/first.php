<!DOCTYPE html>
<html>

<head>
	<link rel="stylesheet" href="registration.css">
	<title></title>
</head>

<body>
	<?php
	function test_input($data)
	{
		$data = trim($data);
		$data = stripslashes($data);
		$data = htmlspecialchars($data);
		return $data;
	}
	$fname = $lname = $conno = $regno = $class = $email = $playscript = $script =  "";
	$fnameErr = $lnameErr = $emailErr = $error = $rerror = $playscriptErr = $scriptErr = $classErr = "";
	$validator = 0;


	if ($_SERVER["REQUEST_METHOD"] == "POST") {

		if (empty($_POST["FirstName"])) {
			$fnameErr = "First Name is required";
			$validator = 0;
		} else {
			$name = test_input($_POST["FirstName"]);
			// check if name only contains letters and whitespace
			if (!preg_match("/^[a-zA-Z ]*$/", $name)) {
				$fnameErr = "Only letters and white space allowed";
				$validator = 0;
			} else {
				$validator = $validator + 1;
			}
		}

		if (empty($_POST["LastName"])) {
			$lnameErr = "Last Name is required";
			$validator = 0;
		} else {
			$tname = test_input($_POST["LastName"]);
			// check if name only contains letters and whitespace
			if (!preg_match("/^[a-zA-Z ]*$/", $tname)) {
				$lnameErr = "Only letters and white space allowed";
				$validator = 0;
			} else {
				$validator = $validator + 1;
			}
		}

		if (empty($_POST["Email"])) {
			$emailErr = "Email is required";
			$validator = 0;
		} else {
			$email1 = test_input($_POST["Email"]);
			// check if e-mail address is well-formed
			if (!filter_var($email1, FILTER_VALIDATE_EMAIL)) {
				$emailErr = "Invalid email format";
				$validator = 0;
			} else {
				$validator = $validator + 1;
			}
		}

		if (array_key_exists('ContactNumber', $_POST)) {
			if (!preg_match('/^[0-9]{10}$/', $_POST['ContactNumber'])) {
				$error = 'Invalid Number!';
				$validator = 0;
			} else {
				$validator = $validator + 1;
			}
		}

		if (array_key_exists('Regno', $_POST)) {
			if (!preg_match('/^[0-9]{7}$/', $_POST['Regno'])) {
				$rerror = 'Invalid Number!';
				$validator = 0;
			} else {
				$validator = $validator + 1;
			}
		}

		if (empty($_POST["playscript"])) {
			$playscriptErr = "Script Category is required";
			$validator = 0;
		} else {
			$validator = $validator + 1;
		}

		if (empty($_POST["Class"])) {
			$classErr = "Class is required";
			$validator = 0;
		} else {
			$validator = $validator + 1;
		}

		if (empty($_POST["script"])) {
			$scriptErr = "Script is required";
			// $validator = 0;
		} else {
			$validator = $validator + 1;
		}

		// echo "VALIDATOR = ".$validator;

		if ($validator >= 7) {
			$fname = test_input($_POST['FirstName']);
			$lname = test_input($_POST['LastName']);
			$email = test_input($_POST['Email']);
			$conno = test_input($_POST['ContactNumber']);
			$regno = test_input($_POST['Regno']);
			$class = test_input($_POST['Class']);
			$playscript = test_input($_POST["playscript"]);
			$script = test_input($_POST["script"]);
		}
	}
	?>

	<?php 
	// echo "VALIDATOR = ".$validator;
	?>

	<div class="container">
		<div class="row justify-content-center">
			<div class="col-sm-12">
				<h3>Please Fill in Your Details</h3>
				<form method="post" class="error" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]) ?>">
					<input id="fname" type="text" name="FirstName" placeholder="First Name" required>*<span><br><?php echo $fnameErr ?></span><br>
					<input id="lname" type="text" name="LastName" placeholder="Last Name" required>*<span><br><?php echo $lnameErr ?></span><br>
					<input id="conno" type="text" name="ContactNumber" placeholder="Contact Number" required>*<span><br><?php echo $error ?></span><br>
					<input id="regno" type="text" name="Regno" placeholder="Registration Number" required>*<span><br><?php echo $rerror ?></span><br>
					<input id="class" type="text" name="Class" placeholder="Class" required>*<span><br><?php echo $classErr ?></span><br>
					<input id="email" type="text" name="Email" placeholder="Christ E-Mail" required>*<span><br><?php echo $emailErr ?></span><br>
					<div class="col">Choose your Script's Category <span class="error">*</span><br><span>(Based on completion, <strong>ANY GENRE</strong>)</span></div><?php echo $playscriptErr ?>
					<!-- <select id="category" class="formselect" name="Category" size="6" multiple required>
						<option value="Cat" disabled selected hidden>Choose your Categories</option>
						<option value="actor">Actor</option>
						<option value="backstage">Backstage</option>
						<option value="music">Music</option>
						<option value="dance">Dance</option>
						<option value="script">Script-Writer</option>
						<option value="media">Media-team</option>
					</select> -->
					<div class="radio1">
						<input class="radio" type="radio" id="fullscript" name="playscript" value="fullscript">
						<label for="fullscript">Full/Ready Script</label><br>
						<input class="radio" type="radio" id="halfscript" name="playscript" value="halfscript">
						<label for="halfscript">Half-ready script/Blue-print</label><br>
						<input class="radio" type="radio" id="idea" name="playscript" value="idea">
						<label for="idea">Idea for a Script</label>
					</div>
					<div class="col margtop">Enter Your Script's Summary <span class="error">*</span><br><span>(Limit : 500 characters)</span></div><?php echo $scriptErr ?>
					<textarea name="script" maxlength="500"><?php echo $script ?></textarea>
					<input type="submit" value="Submit Idea" class="submitbutton">
				</form>
			</div>
		</div>
	</div>

	<?php
	echo nl2br(
		"Name : " . $fname . " " . $lname . "\n" .
			"Contact number : " . $conno . "\n" .
			"Registration Number : " . $regno . "\n" .
			"Class : " . $class . "\n" .
			"E-Mail : " . $email . "\n" .
			"Script Category : " . $playscript."\n".
			"Script : " . $script
	);
	?>

</body>

</html>