<?php 

	// is er iemad ingelogged?
	session_start();
    isLoggedin();

    // is er iemand al ingelogd?
    function isLoggedin(){
        if(isset($_SESSION['username']) && !empty($_SESSION['username'])){
            echo "u bent ingelogd.";
        }
    }

    //klikken op knop voor in te loggen
    if(isset($_POST['btnSignup'])){
        if(validate()){
            $user = $_POST['email'];
            $_SESSION['user'] = $user;
            header('location: createpost.php');
            //echo "u bent al ingelogd.";
        };


    }

    //login functionaliteit 

    

    if (isset($_POST['btnLogin'])){
        
            header('Location: createpost.php');
      
        
    }
   
    //logout functionaliteit

    if($_POST['logout']){
        header('Location: logout.php');
    }

    // validatie voor inputvelden.
    function validate(){
        if(validateName() == true && validateEmail() == true && ValidatePassword() == true){
            return true;
        }
    }


    function validateName(){
        $name = $_POST['name'];
        if(!empty($name)){
            return true;
        }else{
            global $errName;
            $errNaam = "<span class='err'>Vul een Naam in.</span>";
        }
    }

    function validatePassword(){
        $password = $_POST['password'];
        if(!empty($password)){
            return true;
        }else{
            global $errPass;
            $errPass = "<span class='err'>Vul een Passwoord in</span>";
        }
    }

    function validateEmail(){
        $email = $_POST['email'];
        if(!empty($email)){
            if (preg_match("/([\w\-]+\@[\w\-]+\.[\w\-]+)/",$email)){
                return true;
            }else{
                global $errMail;
                $errMail = "<span class='err'>Vul een juiste Email in.</span>";
            }
        }else{
           global $errMail;
            $errMail = "<span class='err'>Vul een Email in.</span>";
        }
    }




?><!doctype html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>IMD Talks</title>
	<link rel="stylesheet" href="css/normalize.css">
	<link rel="stylesheet" href="css/twitter.css">
	
</head>
<body>
	<nav>
		<?php if(isset($_SESSION['loggedin'])): ?>
			<a class="logout" href="logout.php">Logout</a>
		<?php else: ?>
			<a href="index.php">Login</a>
		<?php endif; ?>
	</nav>

	<header>
		<h1>Welcome to IMD-Talks</h1>
		<h2>Find out what other IMD'ers are building around you.</h2>
	</header>
	
	<div id="rightside">	
	<section id="login">
		<form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post">
		<input type="text" name="username" placeholder="Email" />
		<input type="password" name="password" placeholder="Password" />
		<input type="checkbox" name="rememberme" value="yes" id="rememberme">
		<label for="rememberme">Remember me</label>

		<input type="submit" name="btnLogin" value="Sign in" />
		</form>
		
	</section>	
	
	<section id="signup">
	
		<h2>New to IMD-Talks? <span>Sign Up</span></h2>
		<form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post">
		<input type="text" name="name" placeholder="Full name" />
		<input type="email" name="email" placeholder="Email" />
		<input type="password" name="password" placeholder="Password" />
		<input type="submit" name="btnSignup" value="Sign up for IMD Talks" />
		</form>
		
	</section>
	</div>	
	
</body>
</html>