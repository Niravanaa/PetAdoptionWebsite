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
		<title>Whiskers and Wags Adoption Co. - Cat Care</title>
	</head>
	<body>
		<div class="position-fixed" id="dog"></div>
		<div class="position-fixed" id="staring"></div>
		<div class="container rounded-1 p-2 mx-auto my-2" style="background-color: #e1f2fc">
			<?php	
				putHeader($user_is_logged_in);
					
				putNavbar($user_is_logged_in);
			?>
			<div class="container rounded-1 p-2 my-2" style="background-color: #98A8F8">
				<div class="container">
					<div class="row">
						<div class="col-lg-8 mx-auto">
							<div class="card shadow-sm">
								<div class="card-body">
									<div id="dog-care-info">
										<h2 class="mb-4 text-center">How to Care of Your Feline Friend</h2>
										<p class="lead mb-4">Cats make wonderful pets, and with proper care, they can live long and healthy lives. Here are some tips on how to take care of your feline friend:</p>
										<div class="care-element">
											<h3 class="mb-3">Food and Water</h3>
											<p>Cats need a balanced diet to stay healthy. Feed them high-quality cat food and make sure they have access to fresh water at all times. Wet food can also be added to their diet to help them stay hydrated.</p>
										</div>
										<div class="care-element">
											<h3 class="mb-3">Litter Box</h3>
											<p>Cats are clean animals and need a clean litter box. Make sure to scoop the litter box daily and change the litter and wash the box once a week.</p>
										</div>
										<div class="care-element">
											<h3 class="mb-3">Exercise and Play</h3>
											<p>Cats love to play and need daily exercise to stay healthy. Provide them with toys and spend time playing with them every day. You can also invest in a cat tree or scratching post to give them a place to play and exercise.</p>
										</div>
										<div class="care-element">
											<h3 class="mb-3">Grooming</h3>
											<p>Cats groom themselves, but they may need help with long hair. Brush your cat regularly to prevent mats and tangles, and trim their nails as needed.</p>
										</div>
										<div class="care-element">
											<h3 class="mb-3">Veterinary Care</h3>
											<p>Cats need regular check-ups with a vet. Make sure to keep their vaccinations up-to-date and schedule regular appointments for check-ups and any necessary treatments.</p>
										</div>
										<p>For more information on cat care, check out these resources:</p>
										<ul>
											<li>
												<a href="https://www.aspca.org/pet-care/cat-care" target="_blank">ASPCA Cat Care Guide</a>
											</li>
											<li>
												<a href="https://www.purina.com/cats" target="_blank">Purina Cat Care Guide</a>
											</li>
											<li>
												<a href="https://www.vet.cornell.edu/departments-centers-and-institutes/cornell-feline-health-center/health-information/feline-health-topics" target="_blank">Cornell Feline Health Center Cat Care Guide</a>
											</li>
										</ul>
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