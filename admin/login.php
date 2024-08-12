<?php
$pageTitle = "Admin Login";
ob_start(); // Start output buffering
$content = ob_get_clean(); // Get the buffered content
include('../index.php');
session_start();
include('../config/db.php');
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $username = $_POST['username'];
    $password = $_POST['password'];

    $sql = "SELECT * FROM users WHERE username='$username' AND role='admin'";
    $result = $conn->query($sql);

    if ($result->num_rows == 1) {
        $user = $result->fetch_assoc();
        if (password_verify($password, $user['password'])) {
            $_SESSION['admin'] = $user['username'];
            header("Location: manage_users.php");
        } else {
            echo "Invalid password!";
        }
    } else {
        echo "Invalid username!";
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Document</title>
  <link rel="stylesheet" href="../assets/css/login.css">
</head>

<body>
<div class="container" id="container" >
	<div class="form-container sign-up-container">
		<form method="post">
			<h1>Create Account</h1>
	
			<span>or use your email for registration</span>
			<input type="text" name="username" placeholder="Username" />
			<!-- <input type="email" placeholder="Email" /> -->
			<input type="password"  name="password" placeholder="Password" />
			<button type="submit">Sign Up</button>
		</form>
	</div>
	<div class="form-container sign-in-container">
		<form method="post">
			<h1>Sign in</h1>
	
			<span>or use your account</span>
			<input type="text" name="username" placeholder="Username" />
			<input type="password"  name="password" placeholder="Password" />
			<button type="submit">Sign In</button>
		</form>
	</div>
	<div class="overlay-container">
		<div class="overlay">
			<div class="overlay-panel overlay-left">
				<h1>Welcome Back!</h1>
				<p>To keep connected with us please login with your personal info</p>
				<button class="ghost" id="signIn">Sign In</button>
			</div>
		
		</div>
	</div>
</div>


   <script src="../assets/js/login.js"></script> 
</body>
</html>
