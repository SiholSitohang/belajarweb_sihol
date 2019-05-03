<?php
require 'functions.php';

// Cek Apakah Sudah Ditekan Tombol Login Di Form
if( isset($_POST["login"]) ) {

    $username = $_POST["username"];
    $email = $_POST["email"];
    $password = $_POST["password"];

    $result = mysqli_query($conn, "SELECT * FROM user WHERE username = '$username' OR email = '$email'");


    // Cek Usernamae ada gak di Database
    if( mysqli_num_rows($result) === 1) {

        // Cek Password apakah sesuai yang di masukkan di form sama di database;
        $row = mysqli_fetch_assoc($result);
        if( password_verify($password, $row["password"]) ) {
            echo "<script>
                alert('Login Sukses');
            </script>";
            header ("Location: index.html");
            exit;
        }
    }
}







?>




<!DOCTYPE html>
<html lang='en'>

<head>
	<meta class="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
	<title>FORM LOGIN</title>
	<link rel='stylesheet' href='css/style.min.css' />
</head>

<body>
	<!-- navbar -->
	<div class="navbar">
		<nav class="nav__mobile"></nav>
		<div class="container">
			<div class="navbar__inner">
				<a href="#" class="navbar__logo">Logo</a>
				<nav class="navbar__menu">
					<ul>
						<li><a href="registrasi.php">DAFTAR</a></li>
					</ul>
				</nav>
				<div class="navbar__menu-mob"><a href="" id='toggle'><svg role="img" xmlns="http://www.w3.org/2000/svg"
							viewBox="0 0 448 512">
							<path fill="currentColor"
								d="M16 132h416c8.837 0 16-7.163 16-16V76c0-8.837-7.163-16-16-16H16C7.163 60 0 67.163 0 76v40c0 8.837 7.163 16 16 16zm0 160h416c8.837 0 16-7.163 16-16v-40c0-8.837-7.163-16-16-16H16c-8.837 0-16 7.163-16 16v40c0 8.837 7.163 16 16 16zm0 160h416c8.837 0 16-7.163 16-16v-40c0-8.837-7.163-16-16-16H16c-8.837 0-16 7.163-16 16v40c0 8.837 7.163 16 16 16z"
								class=""></path>
						</svg></a></div>
			</div>
		</div>
	</div>
	<!-- Authentication pages -->
	<div class="auth">
		<div class="container">
			<div class="auth__inner">
				<div class="auth__media">
					<img src="./images/undraw_selfie.svg">
				</div>
				<div class="auth__auth">
					<h1 class="auth__title">HALAMAN LOGIN SISTEM</h1>
                    
                    <form method='post' action="" autocompelete="new-password" role="presentation" class="form">

                        <input name="username" class="fakefield">
						<label for="username">username</label>
                        <input type="text" name="username" id='username' placeholder="Masukkan Uernamen Atau Email" required>
                        
                        
						<label for="password">Password</label>
						<input type="password" name="password" id='password'
							placeholder="&#9679;&#9679;&#9679;&#9679;&#9679;&#9679;&#9679;&#9679;&#9679;"
                            autocomplete="off" required>
                            
                            

						<button type='submit' name="login" class="button button__accent">LOGIN</button>
					</form>
				</div>
			</div>
		</div>
	</div>
	<script src='js/app.min.js'></script>
</body>

</html>
