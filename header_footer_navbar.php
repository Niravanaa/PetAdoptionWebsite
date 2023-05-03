<?php
	function putHeader($user_is_logged_in)
	{
		echo '
		<div class="container rounded-1 px-2 py-2 my-2" style="background-color: #98A8F8">
        <div class="container-fluid px-2 py-2" style="background-color: #FAF7F0; border-radius: 5px">
          <div class="row d-flex align-items-center">
            <div class="col-2">
              <a href="index.php">
                <img src="./Images/Flaticon_Dog_Paw.png" alt="Paw Icon" class="img-fluid">
              </a>
            </div>
            <div class="col-8">
              <div class="row mt-3">
                <h1 class="text-center">
                  <a href="index.php" class="text-decoration-none fs-1">
                    <strong>Whiskers and Wags Adoption Co.</strong>
                  </a>
                </h1>
              </div>
              <div class="row mt-3">
                <p id="current-date" class="text-center"></p>
                <p id="current-time" class="text-center"></p>';
				if ($user_is_logged_in) { echo '<p class="text-center">Welcome <b>'; echo $_SESSION["username"]; echo '</b>!</p>'; }
              echo '
			  </div>
            </div>
            <div class="col-2">
              <a href="index.php">
                <img src="./Images/Flaticon_Dog_Paw.png" alt="Paw Icon" class="img-fluid">
              </a>
            </div>
          </div>
        </div>
      </div>';
	}
	
	function putFooter($user_is_logged_in)
	{
		echo '
		<div class="container rounded-1 px-2 py-2 my-2" style="background-color: #98A8F8">
        <div class="container py-2" style="background-color: #FAF7F0;">
          <p style="text-align: center; font-size: 1.5em; padding-top: 10px;">
            <strong>Privacy/Disclaimer Statement: </strong>
            <a href="#" data-bs-toggle="modal" data-bs-target="#privacy-modal">Click here</a>
          </p>
        </div>
        <div class="modal fade" id="privacy-modal" tabindex="-1" aria-labelledby="privacy-modal-label" aria-hidden="true">
          <div class="modal-dialog">
            <div class="modal-content">
              <div class="modal-header">
                <h5 class="modal-title" id="privacy-modal-label">Privacy Statement</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
              </div>
              <div class="modal-body">
                <p>Your information is safe with us. We take your privacy seriously and will not share your information with third parties without your consent.</p>
              </div>
              <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
              </div>
            </div>
          </div>
        </div>
      </div>';
	}
	
	function putNavbar($user_is_logged_in)
	{
		echo '<div class="container rounded-1 px-2 py-2 my-2" style="background-color: #98A8F8">
        <nav class="navbar navbar-expand-lg navbar-light py-5 text-center" style="background-color: #BBB6DF; border-radius: 5px;">
          <a class="navbar-brand" target="_blank" href="https://freepngimg.com/png/169061-domestic-kitten-free-hd-image">
            <img src="./Images/Kitty.png" alt="Kitty" class="img-fluid">
          </a>
          <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
          </button>
          <div class="collapse navbar-collapse justify-content-end" id="navbarNav">
            <ul class="navbar-nav px-2">
              <li class="nav-item mx-2 my-1 pt-3">
                <a class="nav-link" href="index.php">
                  <p>Home Page</p>
                </a>
              </li>
              <li class="nav-item mx-2 my-1 pt-3">
                <a class="nav-link" href="find.php">
                  <p>Find a Pet</p>
                </a>
              </li>
              <li class="nav-item mx-2 my-1 pt-3">
                <a class="nav-link" href="dog.php">
                  <p>Dog Care</p>
                </a>
              </li>
              <li class="nav-item mx-2 my-1 pt-3">
                <a class="nav-link" href="cat.php">
                  <p>Cat Care</p>
                </a>
              </li>
              <li class="nav-item mx-2 my-1 pt-3">
                <a class="nav-link" href="give.php">
                  <p>Give a Pet</p>
                </a>
              </li>
              <li class="nav-item mx-2 my-1 pt-3">
                <a class="nav-link" href="contact.php">
                  <p>Contact Us</p>
                </a>
              </li>';
				if ($user_is_logged_in) {
				echo '
			<li class="nav-item mx-2 my-1 pt-3">
				<a class="nav-link" href="logout.php">
					<p>Log Out</p>
				</a>
			</li>';
				} else {
					echo '
			<li class="nav-item mx-2 my-1 pt-3">
				<a class="nav-link" href="account.php">
					<p>Create Account</p>
				</a>
			</li>';	
				} echo '
            </ul>
          </div>
        </nav>
      </div>';
	}