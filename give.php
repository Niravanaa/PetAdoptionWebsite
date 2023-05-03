<?php
session_start();

$wrong_password = false;
$nonexistant_username = false;

$user_is_logged_in = false;

if (isset($_SESSION["username"]) && isset($_SESSION["password"])) {
	$user_is_logged_in = true; } 
else if ($_SERVER["REQUEST_METHOD"] == "POST") {
	$filecontent = file_get_contents("login.txt");
	$accounts = explode("\n", $filecontent);
for ($i = 0; $i < sizeof($accounts) - 1; $i++) {
	$account = explode(":", $accounts[$i]);
	if ($_POST["username"] === $account[0]) {
		if ($_POST["password"] !== $account[1]) {
			$wrong_password = true;
			break; } 
		else {
			$_SESSION["username"] = $_POST["username"];
			$_SESSION["password"] = $_POST["password"];
			$user_is_logged_in = true; } }

if (!$wrong_password && !$user_is_logged_in) {
	$nonexistant_username = true; } } }

// Increment the ID counter by reading the last line in the file
if (filesize("./availablepets.txt") !== 0) {
	$lastLine = trim(fgets(fopen("./availablepets.txt", "r")));
	$id = (int)explode(":", $lastLine)[0] + 1;
} else {
	$id = 1;
}  

$successfully_submitted = false;
$pet_already_exists = false;

if($_SERVER["REQUEST_METHOD"] == "POST" && $user_is_logged_in && sizeof($_POST) - 2 !== 0) {
	// Get the form data
	$petType = $_POST['petType'];
	$breed = $_POST['breed'];
	$age = $_POST['age'];
	$gender = $_POST['gender'];
	$dogFriendly = $_POST['dogFriendly'];
	$catFriendly = $_POST['catFriendly'];
	$familyFriendly = $_POST['familyFriendly'];
	$comments = $_POST['comments'];
	$ownerName = $_POST['ownerName'];
	$ownerEmail = $_POST['ownerEmail'];

	// Get the file name and tmp file location
	$fileName = $_FILES['image-file']['name'];
	$tmpName = $_FILES['image-file']['tmp_name'];

	$filecontent = file_get_contents("availablepets.txt");
	$pets = explode('\n', $filecontent);
	for ($i = 0; $i < sizeof($pets) - 1; $i++) {
		$petData = explode(":", $pets[$i]);
		if ($petData[2] == $petType && 
			$petData[3] === $breed &&
			$petData[4] === $age && 
			$petData[5] === $gender &&
			$petData[6] === $dogFriendly &&
			$petData[7] === $catFriendly &&
			$petData[8] === $familyFriendly &&
			$petData[9] === $comments &&
			$petData[10] === $ownerName &&
			$petData[11] === $ownerEmail &&
			$petData[12] === $fileName) {
			$pet_already_exists = true;
			break;
		}
	}

	if (!$pet_already_exists)
	{
		// Move the file to a permanent location
		move_uploaded_file($tmpName, "uploads/" . $fileName);

		// Open the file in append mode
		$file = fopen("availablepets.txt", "a");

		// Write the form data to the file
		fwrite($file, "$id:" . $_SESSION['username'] . ":$petType:$breed:$age:$gender:$dogFriendly:$catFriendly:$familyFriendly:$comments:$ownerName:$ownerEmail:$fileName\n");

		// Close the file
		fclose($file);

		$successfully_submitted = true;
	}
}

require_once 'header_footer_navbar.php';
?>

<!--Name + ID: Nirav Patel #40248940-->
<!--Section: W-->
<!--Assignment 3 - Question 4-->

<!DOCTYPE html>
<html lang="en">
	<head>
		<meta charset="utf-8">
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
		<link rel="stylesheet" type="text/css" href="style.css">
		<title>Whiskers and Wags Adoption Co. - Give a Pet</title>
	</head>
	<body onload="validateGiveForm()">
		<div class="position-fixed" id="dog"></div>
		<div class="position-fixed" id="staring"></div>
		<div class="container rounded-1 px-2 py-2 mx-auto my-2" style="background-color: #e1f2fc">
			<?php	
				putHeader($user_is_logged_in);

				putNavbar($user_is_logged_in);
			?>
			<div class="container rounded-1 px-2 py-2 my-2" style="background-color: #98A8F8">
				<div class="container">
					<div class="row">
						<div class="col-md-6 offset-md-3">
							<div class="card shadow-lg">
								<div class="card-body"> <?php 
									if (!$user_is_logged_in) { 
										echo '
									<div class="card-header">
										<h2 class="card-title text-center">Login</h2>
									</div>';
									if ($wrong_password) {
										echo '
									<p class="text-center">
										<b>You entered the wrong password for that particular username.</b>
									</p>';
									}
									if ($nonexistant_username && !$wrong_password) {
										echo '
									<p class="text-center">
										<b>The username you entered does not exist in our database, please create an account!</b>
									</p>';
									}
									echo '
									<form method="post" action="give.php">
										<div class="mb-3">
											<label for="username" class="form-label">Username</label>
											<input type="text" id="username" name="username" class="form-control" required>
										</div>
										<div class="mb-3">
											<label for="password" class="form-label">Password</label>
											<input type="password" id="password" name="password" class="form-control" required>
										</div>
										<button type="submit" class="btn btn-primary">Log In</button>
									</form>';
									} else {
									if ($pet_already_exists) {
										echo '
									<div class="text-center my-2">
											<b>This pet was already submitted.</b>
									</div>';
									}
									echo '
									<div class="card-header">
										<h2 class="card-title text-center">Pet Adoption Form</h2>
									</div>';
									if ($successfully_submitted) {
										echo '
									<div class="text-center my-2">
										<b>Your pet has been successfully submitted.</b>
									</div>';
									}
									echo '
									<form id="giveForm" method="post" enctype="multipart/form-data" novalidate>
										<div class="mb-3">
											<label for="petType" class="form-label">Pet Type:</label>
											<select class="form-select" id="petType" name="petType" required>
												<option value="">Select Pet Type</option>
												<option value="cat">Cat</option>
												<option value="dog">Dog</option>
											</select>
										</div>
										<div class="mb-3">
											<label for="breed" class="form-label">Breed:</label>
											<input type="text" class="form-control" id="breed" name="breed" placeholder="Enter breed" required>
										</div>
										<div class="mb-3">
											<label for="age" class="form-label">Age:</label>
											<select class="form-select" id="age" name="age" required>
												<option value="">Select Age Range</option>
												<option value="0-1 year">0-1 year</option>
												<option value="1-2 years">1-2 years</option>
												<option value="2-5 years">2-5 years</option>
												<option value="5+ years">5+ years</option>
											</select>
										</div>
										<div class="mb-3">
											<label for="gender" class="form-label">Gender:</label>
											<select class="form-select" id="gender" name="gender" required>
												<option value="">Select Gender</option>
												<option value="male">Male</option>
												<option value="female">Female</option>
											</select>
										</div>
										<div class="mb-3">
											<label for="dogFriendly" class="form-label">Gets along with other dogs:</label>
											<select class="form-select" id="dogFriendly" name="dogFriendly" required>
												<option value="">Select Option</option>
												<option value="yes">Yes</option>
												<option value="no">No</option>
											</select>
										</div>
										<div class="mb-3">
											<label for="catFriendly" class="form-label">Gets along with other cats:</label>
											<select class="form-select" id="catFriendly" name="catFriendly" required>
												<option value="">Select Option</option>
												<option value="yes">Yes</option>
												<option value="no">No</option>
											</select>
										</div>
										<div class="mb-3">
											<label for="familyFriendly" class="form-label">Suitable for a family with small children:</label>
											<select class="form-select" id="familyFriendly" name="familyFriendly" required>
												<option value="">Select Option</option>
												<option value="yes">Yes</option>
												<option value="no">No</option>
											</select>
										</div>
										<div class="mb-3">
											<label for="comments" class="form-label">Tell Us About Your Pet:</label>
											<textarea class="form-control" id="comments" name="comments" rows="3" required></textarea>
										</div>
										<div class="mb-3">
											<label for="picture" class="form-label">Picture of Pet:</label>
											<br> <input type="file" id="image-file" name="image-file" accept=".jpg,.jpeg,.png" required>
										</div>
										<div class="mb-3">
											<label for="ownerName" class="form-label">Current Owner\'s Name:</label>
											<input type="text" class="form-control" id="ownerName" name="ownerName" placeholder="Enter owner\'s name" required>
										</div>
										<div class="mb-3">
											<label for="ownerEmail" class="form-label">Current Owner\'s Email:</label>
											<input type="email" class="form-control" id="ownerEmail" name="ownerEmail" placeholder="Enter owner\'s email" required>
										</div>
										<div class="text-center">
											<button type="submit" class="btn btn-primary me-2">Submit</button>
											<button type="reset" class="btn btn-secondary">Clear</button>
										</div>
									</form>';
									} ?> 
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
			<?php
				putFooter($user_is_logged_in);
			?>
		</div>
		<script src="script.js"></script>
		<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
	</body>
</html>