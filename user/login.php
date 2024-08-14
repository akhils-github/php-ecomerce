<?php

session_start();
include('../config/db.php');

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $username = $_POST['username'];
    $password = $_POST['password'];
    $action = $_POST['action'];
    if ($action == 'login') {
    $sql = "SELECT * FROM users WHERE username='$username' AND role='user'";
    $result = $conn->query($sql);

    if ($result->num_rows == 1) {
        $user = $result->fetch_assoc();
        if (password_verify($password, $user['password'])) {
            $_SESSION['username'] = $user['username'];
            $_SESSION['loggedin'] = true; // Set logged-in status
            header("Location: index.php");
            exit();
        } else {
            echo "Invalid password!";
        }
    } else {
        echo "Invalid username!";
    }
  } elseif ($action == 'register' ) {
    $password = password_hash($_POST['password'], PASSWORD_DEFAULT);
    $sql = "INSERT INTO users (username, password, role) VALUES ('$username', '$password', 'user')";
    if ($conn->query($sql) === TRUE) {
      $_SESSION['username'] = $user['username'];
      $_SESSION['loggedin'] = true; // Set logged-in status
      header("Location: index.php");
        // echo "Registration successful!";
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }
  }
}


?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>CANTEEN</title>
  <link rel="stylesheet" href="../assets/css/login.css">
</head>

<body>
<div class="container" id="container" >
	<div class="form-container sign-up-container">
		<form method="post">
			<h1>Create Account</h1>
	
			<span>or use your email for registration</span>
      <input type="hidden" name="action" value="register">
			<input type="text" name="username" placeholder="Username" required />
			<!-- <input type="email" placeholder="Email" /> -->
			<input type="password"  name="password" placeholder="Password" required />
			<button type="submit">Sign Up</button>
		</form>
	</div>
	<div class="form-container sign-in-container">
		<form method="post">
			<h1>Sign in</h1>
	
			<span>or use your account</span>
      <input type="hidden" name="action" value="login">
			<input type="text" name="username" placeholder="Username" required/>
			<input type="password"  name="password" placeholder="Password" required />
			<!-- <a href="#">Forgot your password?</a> -->
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
			<div class="overlay-panel overlay-right">
				<h1>Hello, Friend!</h1>
				<p>Enter your personal details and start journey with us</p>
				<button class="ghost" id="signUp">Sign Up</button>
			</div>
		</div>
	</div>
</div>


   <script src="../assets/js/login.js"></script> 
</body>
</html>