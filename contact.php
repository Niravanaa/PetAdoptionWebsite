<?php
session_start();

$user_is_logged_in = false;

if (isset($_SESSION["username"]) && isset($_SESSION["password"])) {
    $user_is_logged_in = true;
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
		<title>Whiskers and Wags Adoption Co. - Contact Us</title>
	</head>
	<body>
		<div class="position-fixed" id="dog"></div>
		<div class="position-fixed" id="staring"></div>
		<div class="container rounded-1 px-2 py-2 mx-auto my-2" style="background-color: #e1f2fc">
			<?php	
				putHeader($user_is_logged_in);

				putNavbar($user_is_logged_in);
			?>
			<div class="container rounded-1 px-2 py-2 my-2" style="background-color: #98A8F8">
				<div class="container">
					<div class="card p-4 w-100 mx-auto">
						<div class="card-body">
							<h2 class="card-title mb-4 text-center">Pet Adoption Center</h2>
							<p class="card-text">Contact us for more information on adopting a pet:</p>
							<p class="card-text">Phone: (514) 555-5555</p>
							<p class="card-text">Email: adoptioncenter@email.com</p>
							<p class="card-text">Address: 123 Main St, Anytown, Canada</p>
							<hr>
							<h3>Designed by:</h3>
							<br>
							<p>Name: Nirav Patel</p>
							<p>Student ID: 40248940</p>
							<p>Email: pa_nir@live.concordia.ca</p>
							<div class="row">
								<p class="col-6 text-center fs-3">
									<a target="_blank" href="https://www.linkedin.com/in/nirav-patel-3188821b4/" class="text-decoration-none">Linkedin</a>
								</p>
								<p class="col-6 text-center fs-3">
									<a target="_blank" href="https://github.com/Niravanaa" class="text-decoration-none">GitHub</a>
								</p>
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