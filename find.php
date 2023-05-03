<?php
session_start();

$user_is_logged_in = false;
$display_search = false;

if (isset($_SESSION["username"]) && isset($_SESSION["password"])) {
    $user_is_logged_in = true;
}

if ($_SERVER["REQUEST_METHOD"] == "POST" && sizeof($_POST) - 2 !== 0)
{
  $display_search = true;
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
		<link rel="stylesheet" type="text/css" href="style.css">
		<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
		<title>Whiskers and Wags Adoption Co. - Find a Pet</title>
	</head>
	<body onload="validateTextArea()">
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
								<div class="card-body">
									<?php if (!$display_search) echo '
									<div class="card-header">
										<h2 class="card-title text-center">Find a Pet</h2>
									</div>
									<form method="post" action="find.php" novalidate>
										<div class="mb-3">
											<label for="pet-type" class="form-label">Pet Type:</label>
											<select id="pet-type" name="pet-type" class="form-select">
												<option value="">Doesn\'t matter</option>
												<option value="dog">Dog</option>
												<option value="cat">Cat</option>
											</select>
										</div>
										<div class="mb-3">
											<label for="breed" class="form-label">Breed:</label>
											<textarea class="form-control" id="breed" name="breed" rows="1"></textarea>
										</div>
										<div class="mb-3 text-center">
											<input class="form-check-input" type="checkbox" value="" name="mixed-breed" id="mixed-breed">
											<label class="form-check-label ps-2" for="mixed-breed">Mixed Breed</label>
										</div>
										<div class="mb-3">
											<label for="age" class="form-label">Age:</label>
											<select id="age" name="age" class="form-select">
												<option value="">Doesn\'t matter</option>
												<option value="0-1 year">0-1 year</option>
												<option value="1-2 years">1-2 years</option>
												<option value="2-5 years">2-5 years</option>
												<option value="5+ years">5+ years</option>
											</select>
										</div>
										<div class="mb-3">
											<label for="gender" class="form-label">Gender:</label>
											<select id="gender" name="gender" class="form-select">
												<option value="">Doesn\'t matter</option>
												<option value="male">Male</option>
												<option value="female">Female</option>
											</select>
										</div>
										<div class="mb-3">
											<label for="dogFriendly" class="form-label">Gets along with other dogs:</label>
											<select class="form-select" id="dogCompatibility" name="dogCompatibility" required>
												<option value="">Select Option</option>
												<option value="yes">Yes</option>
												<option value="no">No</option>
											</select>
										</div>
										<div class="mb-3">
											<label for="catFriendly" class="form-label">Gets along with other cats:</label>
											<select class="form-select" id="catCompatibility" name="catCompatibility" required>
												<option value="">Select Option</option>
												<option value="yes">Yes</option>
												<option value="no">No</option>
											</select>
										</div>
										<div class="mb-3">
											<label for="familyFriendly" class="form-label">Suitable for a family with small children:</label>
											<select class="form-select" id="kidCompatibility" name="kidCompatibility" required>
												<option value="">Select Option</option>
												<option value="yes">Yes</option>
												<option value="no">No</option>
											</select>
										</div>
										<div class="text-center">
											<button type="submit" class="btn btn-primary me-2">Submit</button>
											<button type="reset" class="btn btn-secondary">Clear</button>
										</div>
									</form>'; else {
								$filecontent = file_get_contents("availablepets.txt");
								$pets = explode("\n", $filecontent);
								echo '
									<div class="col-12">';
								$results_found = false;
								for ($i = 0; $i < sizeof($pets); $i++) {
									$pet = explode(":", $pets[$i]);
									if ((strlen($_POST["pet-type"]) === 0 || $_POST["pet-type"] === $pet[2]) &&
									(strlen($_POST["breed"]) === 0 || trim(strtolower($_POST["breed"])) === trim(strtolower($pet[3]))) &&
									(strlen($_POST["age"]) === 0 || $_POST["age"] === $pet[4]) &&
									(strlen($_POST["gender"]) === 0 || $_POST["gender"] === $pet[5]) &&
									(strlen($_POST["dogCompatibility"]) === 0 || $_POST["dogCompatibility"] === $pet[6]) &&
									(strlen($_POST["catCompatibility"]) === 0 || $_POST["catCompatibility"] === $pet[7]) &&
									(strlen($_POST["kidCompatibility"]) === 0 || $_POST["kidCompatibility"] === $pet[8]))
									{
									$results_found = true;
									echo '
											<div class="row my-2 mx-auto">
												<div class="card bg-secondary p-3">
													<img class="img-fluid rounded-1" src="./uploads/'; echo $pet[12]; echo '" class="card-img-top ratio ratio-16x9 img-fluid" alt="'; echo $pet[3]; echo '">
													<div class="card-body bg-light rounded-1">
														<h5 class="card-title">'; echo $pet[3]; echo'</h5>
														<p class="card-text">'; echo $pet[9]; echo '</p>
														<button class="btn btn-primary">Interested</button>
													</div>
												</div>
											</div>'; } } if (!$results_found) { echo '
											<p class="my-2 text-center">No results were found!</p>'; } } ?>
									</div>
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