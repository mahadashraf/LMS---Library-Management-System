<?php
// Initialize the session
session_start();
 
// Check if the user is already logged in, if yes then redirect him to welcome page
if(isset($_SESSION["loggedin"]) && $_SESSION["loggedin"] === true){
    header("location: welcome.php");
    exit;
}
 
// Include config file
require_once "./config.php";
 
// Define variables and initialize with empty values
$username = $password = "";
$username_err = $password_err = $login_err = "";
 
// Processing form data when form is submitted
if($_SERVER["REQUEST_METHOD"] == "POST"){
 
    // Check if username is empty
    if(empty(trim($_POST["username"]))){
        $username_err = "Please enter username.";
    } else{
        $username = trim($_POST["username"]);
    }
    
    // Check if password is empty
    if(empty(trim($_POST["password"]))){
        $password_err = "Please enter your password.";
    } else{
        $password = trim($_POST["password"]);
    }
    
    // Validate credentials
    if(empty($username_err) && empty($password_err)){
        // Prepare a select statement
        $sql = "SELECT username,password FROM userr WHERE username = ?";
        
        if($stmt = mysqli_prepare($link, $sql)){
            // Bind variables to the prepared statement as parameters
            mysqli_stmt_bind_param($stmt, "s", $username);
            
            // Set parameters
            $username = $username;
            
            // Attempt to execute the prepared statement
            if(mysqli_stmt_execute($stmt)){
                // Store result
                mysqli_stmt_store_result($stmt);
                
                // Check if username exists, if yes then verify password
                if(mysqli_stmt_num_rows($stmt) == 1){                    
                    // Bind result variables
                    mysqli_stmt_bind_result($stmt,$username, $hashed_password);
                    if(mysqli_stmt_fetch($stmt)){
                        if(password_verify($password, $hashed_password)){
                            // Password is correct, so start a new session
                            session_start();
                            
                            // Store data in session variables
                            $_SESSION["loggedin"] = true;
                            $_SESSION["username"] = $username;                            
                            
                            // Redirect user to welcome page
                            header("location: welcome.php");
                        } else{
                            // Password is not valid, display a generic error message
                            $login_err = "Invalid username or password.";
                        }
                    }
                } else{
                    // Username doesn't exist, display a generic error message
                    $login_err = "Invalid username or password.";
                }
            } else{
                echo "Oops! Something went wrong. Please try again later.";
            }

            // Close statement
            mysqli_stmt_close($stmt);
        }
    }
    
    // Close connection
    mysqli_close($link);
	session_destroy();
}
?>
 



<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <title>Document</title>
<style>
    @import url("https://fonts.googleapis.com/css2?family=Poppins:wght@400;700&display=swap");

body {
	padding: 0;
	margin: 0;
	box-sizing: border-box;
	height: 100vh;
	overflow: hidden;
	background: url("https://wallpaperboat.com/wp-content/uploads/2020/11/13/60306/library-10.jpg")
		no-repeat center center;
	background-size: cover;
	backdrop-filter: blur(7px);
}

* {
	font-family: "Poppins", sans-serif;
	text-decoration: none;
	font-weight: bold;
	color: #363636;
}

.container {
	width: 106%;
	height: 100vh;
	display: flex;
	align-items: center;
}

.content {
	margin: 0 auto;
	width: 720px;
	height: 440px;
	display: flex;
}

.banner {
	height: 100%;
	width: 350px;
	background: rgb(0, 0, 0, 0.4);
	border-radius: 20px 0 0 20px;
}

.banner h3{
    font-size: 20px;
}

.banner * {
	
	color: #ccc;
    
}

.form {
	height: 100%;
	width: 300px;
	background: #fff;
	display: flex;
	flex-direction: column;
	align-items: center;
	border-radius: 0 20px 20px 0;
	position: relative;
}

.form img {
	margin: 45px 0 20px;
	height: 70px;
	border-radius: 50%;
}

p,
a {
	font-size: small;
}

a {
	color: #1663be;
}
#r {
	position: absolute;
	bottom: 20px;
}

input {
	margin-bottom: 10px;
}

.form #span1{
    text-align: center;
    margin-top: -5px;
    margin-bottom:9px;
    
}
.form #span2{
    text-align: center;
    margin-top: -5px;
    margin-bottom:9px;
    
}

input[type="text"],
input[type="password"] {
	width: 212px;
	height: 42px;
	border: 2px solid #ccc;
	color: #000;
	font-weight: bold;
	border-radius: 20px;
}

input:focus {
	outline: 0;
	transition: 0.8s;
	border: 2px solid #646464;
}

::placeholder {
	color: #181818;
	position: absolute;
	top: 7px;
	left: 10px;
}

input:focus ~ input[type="email"]::placeholder {
	color: black;
	position: absolute;
	top: 7px;
	left: 10px;
}

::-ms-reveal {
	filter: invert(100%);
}

button {
    font-family: "Titillium Web", sans-serif;
  font-size: 14px;
  font-weight: bold;
  letter-spacing: .1em;
  outline: 0;
  background: navy;
  width: 60%;
  border: 0;
border-radius:30px;
  margin: 0px 0px 8px;
  padding: 15px;
  color: #FFFFFF;
  -webkit-transition: all 0.3 ease;
  transition: all 0.3 ease;
  cursor: pointer;
  transition: all 0.2s;

}

button:hover,button:focus{
    background: navy;
    box-shadow: 0 5px 10px rgba(0, 0, 0, 0.2);
    transform: scale(1.1);
}

button:active {
    transform: translateY(2px);
  box-shadow: 0 2.5px 5px rgba(0, 0, 0, 0.2);
}

@media (max-width: 720px) {
	.banner {
		display: none;
	}
	.content {
		display: flex;
		justify-content: center;
	}

	.form {
		border-radius: 20px;
	}
}


span:hover{
	color: lightseagreen;
}

#spanuser{
	font-size: 25px;
	text-decoration: none;
	margin-left: 20px;
	text-transform: none;

}


#spanHome{
	font-size: 25px;
	text-decoration: none;
	margin-left: 5px;
	
}
#spann{
	margin-left: 5px;
}

.banner h3{
	margin-left: 20px;
}
.banner a{
	text-decoration: none;
}

</style>

</head>
<body>
<?php 
        if(!empty($login_err)){
            echo '<div class="alert alert-danger">' . $login_err . '</div>';
        }        
        ?>
<div class="container">
	<div class="content">
		<div class="banner">
			<br>
			<br>
		<a href="./userlogin.php">
			<span id="spanuser">User Login</span>
			</a>
			<span id="spann">/</span>
			<a href="./index.php">
			<span id="spanHome">HomePage</span></a>
			<br>
			<br>
			<br>
			<h3>This is the User Login Form  Users can login up from here if they dont have a account they can sign up.</h3>
			<br>
			<h3>Thank You</h3>
		</div>
       
        <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post">
		<div class="form">
			<img src="https://cdn-icons-png.flaticon.com/512/1674/1674454.png" alt="profile">
			<p>Need an Account? <a href="registerform.php"> Sign Up</a></p>
			<input type="text"  name="username" placeholder="Enter username" class="form-control <?php echo (!empty($username_err)) ? 'is-invalid' : ''; ?>" value="<?php echo $username; ?>">
			<span id="span1" class="invalid-feedback"><?php echo $username_err; ?></span>
            <input type="password"  name="password" placeholder="Enter Password" class="form-control <?php echo (!empty($password_err)) ? 'is-invalid' : ''; ?>">
			<span id="span2" class="invalid-feedback"><?php echo $password_err; ?></span>
			<br>
			
            <button type="submit" value="Login" >Sign In</button>
			<a href="" id="r">Forgot Your Password?</a>
		</div>
		</form>
	</div>
</div>
</body>
</html>