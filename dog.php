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
		<title>Whiskers and Wags Adoption Co. - Dog Care</title>
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
					<div class="row">
						<div class="col-lg-8 mx-auto">
							<div class="card shadow-sm">
								<div class="card-body">
									<div id="dog-care-info">
										<h2 class="mb-4 text-center">How to Care for Your Furry Friend</h2>
										<p class="lead mb-4">Taking care of a dog is a big responsibility, but with love and patience, you can give your furry friend the best life possible. Here are some essential elements of dog care:</p>
										<div class="care-element">
											<h3 class="mb-3">Nutrition</h3>
											<p>Feeding your dog a balanced diet that meets their nutritional needs is crucial for their health and happiness. Make sure to choose a high-quality dog food that is appropriate for your dog's age, breed, and activity level. You can also speak to your veterinarian for recommendations on the best diet for your dog.</p>
										</div>
										<div class="care-element">
											<h3 class="mb-3">Exercise</h3>
											<p>Exercise is essential for a dog's physical and mental well-being. Aim to provide at least 30 minutes of physical activity for your dog every day. This can include walks, runs, playing fetch, or any other activity that your dog enjoys.</p>
										</div>
										<div class="care-element">
											<h3 class="mb-3">Grooming</h3>
											<p>Regular grooming helps to keep your dog clean, comfortable, and free of skin irritations. This includes brushing their fur regularly to remove tangles and mats, trimming their nails, cleaning their ears, and brushing their teeth. You can also give your dog occasional baths to keep them fresh and clean.</p>
										</div>
										<div class="care-element">
											<h3 class="mb-3">Training</h3>
											<p>Consistent training is important for a dog's development and helps to establish a positive relationship between you and your furry friend. Basic commands, such as sit, stay, and come, can help to make your dog a well-behaved member of your family. You can attend obedience classes or work with a professional dog trainer for guidance.</p>
										</div>
										<div class="care-element">
											<h3 class="mb-3">Medical Care</h3>
											<p>Regular check-ups with a veterinarian are essential to ensure that your dog stays healthy. Vaccinations, flea and tick prevention, and early detection of any health issues can help to prevent serious health problems down the line. Make sure to keep your dog's appointments and follow any medical advice provided by your veterinarian.</p>
										</div>
										<p>For more information on dog care, check out these resources:</p>
										<ul>
											<li>
												<a href="https://www.akc.org/expert-advice/">AKC - Dog Care</a>
											</li>
											<li>
												<a href="https://www.aspca.org/pet-care/dog-care">ASPCA - Dog Care</a>
											</li>
											<li>
												<a href="https://www.purina.com/dogs">Purina - Dog Care</a>
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