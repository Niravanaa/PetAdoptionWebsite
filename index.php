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
		<title>Whiskers and Wags Adoption Co. - Home Page</title>
	</head>
	<body>
		<div class="position-fixed" id="dog"></div>
		<div class="position-fixed" id="staring"></div>
		<div class="container rounded-1 p-2 mx-auto my-2" style="z-index: 2; background-color: #e1f2fc">
			<?php	
				putHeader($user_is_logged_in);

				putNavbar($user_is_logged_in);
			?>
			<div class="container rounded-1 p-2 my-2" style="background-color: #98A8F8">
				<div class="container rounded-1 p-2" style="background-color: white">
					<a href="https://www.dreamstime.com/cats-dogs-peeking-over-white-web-banner-funny-happy-blank-social-media-cover-paws-hanging-image148475539" target="_blank">
						<img src="./Images/DogandCat_HomePage.jpeg" class="img-fluid" alt="Dog and Cat">
					</a>
					<div class="row my-2">
						<h1 class="col-12 text-center">Welcome to Whiskers and Wags Adoption Co.</h1>
					</div>
					<div class="row m-2 g-3 align-items-center">
						<div class="col-md-6 rounded-3" style="background-color: #FAF7F0; border: 5px solid gray;">
							<div class="text-center fs-4">
								<p>At our pet adoption service, we are dedicated to helping find loving homes for cats and dogs in need. Our mission is to connect animals in need with families who can provide them with the love, care, and attention they deserve. Whether you are looking to adopt your first pet, or are a seasoned pet owner, we are here to help make the adoption process as smooth and stress-free as possible.</p>
							</div>
						</div>
						<div class="col-md-6">
							<a href="https://www.science.org/do/10.1126/science.abi5787/full/main_puppies_1280p.jpg" target="_blank">
								<img src="./Images/group_of_dogs.jpg" class="img-fluid" alt="Group of Dogs">
							</a>
						</div>
					</div>
					<div class="row m-2 g-3 align-items-center">
						<div class="col-md-6">
							<a href="https://pixabay.com/photos/kittens-cats-group-group-of-kittens-5668624/" target="_blank">
								<img src="./Images/group_of_cats.jpg" class="img-fluid" alt="Group of Cats">
							</a>
						</div>
						<div class="col-md-6 rounded-3" style="background-color: #FAF7F0; border: 5px solid gray;">
							<div class="text-center fs-4">
								<p>Our team of experienced and compassionate pet adoption specialists work tirelessly to ensure that each and every animal in our care finds the perfect home. We understand that finding the right pet can be a big decision, and that's why we take the time to get to know each and every one of our animals, so that we can match them with the right family based on their individual personalities, needs, and lifestyles.</p>
							</div>
						</div>
					</div>
					<div class="row m-2 g-3 align-items-center">
						<div class="col-md-6 rounded-3" style="background-color: #FAF7F0; border: 5px solid gray;">
							<div class="text-center fs-4">
								<p>In addition to our adoption services, we also offer resources and support to help families ensure that their new pet is a happy and healthy member of their family. From training and behavior advice, to veterinary care and nutrition information, we are here to provide you with the tools and resources you need to give your new pet the best life possible.</p>
							</div>
						</div>
						<div class="col-md-6">
							<a href="https://pixabay.com/photos/dog-cat-animals-love-4830223/" target="_blank">
								<img src="./Images/CatandDog.jpg" class="img-fluid w-100" alt="Cat and Dog Friends">
							</a>
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