<?php
session_start();

$messages = [
    "",
    "<p class=\"text-center\"><b>Invalid username. Username can only contain letters (both upper and lower case) and digits.</b></p><br>",
    "<p class=\"text-center\"><b>Invalid password. Password must be at least 4 characters long (characters are to be letters and digits only), have at least one letter and at least one digit.</b></p><br>",
    "<p class=\"text-center\"><b>This username is already in use. Please choose a different username.</b></p><br>",
    "<p class=\"text-center\"><b>Account created successfully. You can now login!</b></p><br>",
];

$message_display = 0;

// Check if the form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Get the entered username and password
    $username = $_POST["username"];
    $password = $_POST["password"];

    $problem_encountered = false;

    // Validate the entered username
    if (preg_match('/^[a-zA-Z0-9]+$/', $username) === 0) {
        $problem_encountered = true;
        $message_display = 1;
    }

    // Validate the entered password
    if (
        !$problem_encountered &&
        (strlen($password) < 4 ||
            preg_match('/^[a-zA-Z0-9]+$/', $password) === 0 ||
            preg_match("/[a-zA-Z]/", $password) === 0 ||
            preg_match("/[0-9]/", $password) === 0)
    ) {
        $problem_encountered = true;
        $message_display = 2;
    }

    // Check if the username is already in use
    if (!$problem_encountered) {
        $file = fopen("login.txt", "r");
        while (($line = fgets($file)) !== false) {
            $fields = explode(":", $line);
            if ($fields[0] == $username) {
                fclose($file);
                $problem_encountered = true;
                $message_display = 3;
                break;
            }
        }
    }

    if (!$problem_encountered) {
        // If the username is available, create a new account
        $file = fopen("login.txt", "a");
        fwrite($file, $username . ":" . $password . "\n");
        fclose($file);
        $message_display = 4;
    }
}

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
		<title>Whiskers and Wags Adoption Co. - Login</title>
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
				<div class="container rounded-2 p-2 my-2 w-75" style="background-color: white">
					<h1 class="text-center mb-4">Create An Account</h1>
					<div class="row justify-content-center">
						<div class="col-lg-12 col-md-6"> 
							<?php echo "$messages[$message_display]"; ?> 
							<form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">
								<div class="mb-3">
									<label for="username" class="form-label">Username</label>
									<small> <b>(can only contain letters (both upper and lower case) and digits)</b> </small>
									<input type="text" id="username" name="username" class="form-control" required>
								</div>
								<div class="mb-3">
									<label for="password" class="form-label">Password</label>
									<small> <b>(must be at least 4 characters long (characters are to be letters and digits only), have at least one letter and at least one digit.)</b> </small>
									<input type="password" id="password" name="password" class="form-control" required>
								</div>
								<button type="submit" class="btn btn-primary">Log In</button>
							 </form>
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