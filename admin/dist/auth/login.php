

<?php
// Initialize the session
session_start();
 
// Check if the user is already logged in, if yes then redirect him to welcome page
if(isset($_SESSION["loggedin"]) && $_SESSION["loggedin"] === true){
    header("location: welcome.php");
    exit;
}
 
// Include config file
require_once "config.php";
 
// Define variables and initialize with empty values
$inputPassword = $inputEmailAddress = "";
$email_err = $password_err = "";
 
// Processing form data when form is submitted
if($_SERVER["REQUEST_METHOD"] == "POST"){
 
    // Check if username is empty
    if(empty(trim($_POST["inputEmailAddress"]))){
        $email_err = "Please enter email.";
    } else{
        $inputEmailAddress = trim($_POST["inputEmailAddress"]);
    }
    
    // Check if password is empty
    if(empty(trim($_POST["inputPassword"]))){
        $password_err = "Please enter your password.";
    } else{
        $inputPassword = trim($_POST["inputPassword"]);
    }
    `
    // Validate credentials
    if(empty($email_err) && empty($password_err)){
        // Prepare a select statement
        $sql = "SELECT  Email, Password FROM admin WHERE Email = ?";
        
        if($stmt = $mysqli->prepare($sql)){
            // Bind variables to the prepared statement as parameters
            $stmt->bind_param("s", $param_inputEmailAddress);
            
            // Set parameters
            $param_inputEmailAddress = $inputEmailAddress;
            
            // Attempt to execute the prepared statement
            if($stmt->execute()){
                // Store result
                $stmt->store_result();
                
                // Check if username exists, if yes then verify password
                if($stmt->num_rows == 1){                    
                    // Bind result variables
                    $stmt->bind_result( $inputEmailAddress, $hashed_password);
                    if($stmt->fetch()){
                        if(password_verify($inputPassword, $hashed_password)){
                            // Password is correct, so start a new session
                            session_start();
                            
                            // Store data in session variables
                            $_SESSION['loggedin'] =true;
							$_SESSION["Email"]=$Email;
                            
                            $_SESSION["inputEmailAddress"] = $inputEmailAddress;                            
                            
                            // Redirect user to welcome page
                            header("location: welcome.php");
                        } else{
                            // Display an error message if password is not valid
                            $password_err = "The password you entered was not valid.";
                        }
                    }
                } else{
                    // Display an error message if username doesn't exist
                    $email_err = "No account found with that username.";
                }
            } else{
                echo "Oops! Something went wrong. Please try again later.";
            }

            // Close statement
            $stmt->close();
        }
    }
    
    // Close connection
    $mysqli->close();
}
?>




<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8" />
        <meta http-equiv="X-UA-Compatible" content="IE=edge" />
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
        <meta name="description" content="" />
        <meta name="author" content="" />
        <title>Admin Panel | Supreme Ganesh</title>

        <!-- Favicons -->
        <link rel="apple-touch-icon" sizes="72x72" href="/favicons/apple-touch-icon.png">
        <link rel="icon" type="image/png" sizes="32x32" href="/favicons/favicon-32x32.png">
        <link rel="icon" type="image/png" sizes="16x16" href="/favicons/favicon-16x16.png">
        <link rel="icon" type="image/png" sizes="72x72" href="/favicons/apple-touch-icon.png">
        <link rel="manifest" href="/favicons/site.webmanifest">
        <link rel="mask-icon" href="/favicons/safari-pinned-tab.svg" color="#5bbad5">
        <link rel="shortcut icon" href="/favicons/favicon.ico">
        <meta name="msapplication-TileColor" content="#da532c">
        <meta name="msapplication-config" content="/favicons/browserconfig.xml">
        <meta name="theme-color" content="#ffffff">

        <link href="../css/styles.css" rel="stylesheet" />
        <style>
          body {
            background-image: linear-gradient(rgba(53, 175, 196, 0.39), rgba(0, 0, 0, 0.71)), url('../../../assets/img/creed-img.jpg');
          }
        </style>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.13.0/js/all.min.js" crossorigin="anonymous"></script>
    </head>
    <body>
        <div id="layoutAuthentication">
            <div id="layoutAuthentication_content">
                <main>
                    <div class="container">
                        <div class="row justify-content-center">
                            <div class="col-lg-5">
                                <div class="card shadow-lg border-0 rounded-lg mt-5">
                                    <div class="card-header"><h3 class="text-center font-weight-light my-4">Login</h3></div>
                                    <div class="card-body">
                                      <form>
									  <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post">	
                                          <div class="form-group"  <?php echo (!empty($email_err)) ? 'has-error' : ''; ?>">
                                              <label class="small mb-1" for="inputEmailAddress">Email</label>
                                              <input class="form-control py-4" id="inputEmailAddress" type="email" placeholder="Enter email address" value="<?php echo $inputEmailAddress; ?>" />
                                          </div>
                                          <div class="form-group" <?php echo (!empty($password_err)) ? 'has-error' : ''; ?>">
                                              <label class="small mb-1" for="inputPassword">Password</label>
                                              <input class="form-control py-4" id="inputPassword" type="password" placeholder="Enter password" />
											  <span class="help-block"><?php echo $password_err; ?></span>
                                          </div>
                                          <div class="form-group">
                                              <div class="custom-control custom-checkbox">
                                                  <input class="custom-control-input" id="rememberPasswordCheck" type="checkbox" />
                                                  <label class="custom-control-label" for="rememberPasswordCheck">Remember password</label>
                                              </div>
                                          </div>
                                          <div class="form-group d-flex align-items-center justify-content-between mt-4 mb-0">
                                              <a class="small" href="reset-password.php">Forgot Password?</a>
                                              <a class="btn btn-primary" href="/admin/dist/index.php">Login</a>
                                          </div>
                                      </form>
                                    </div>
                                    <div class="card-footer text-center">
                                        <div class="small"><a href="register.php">Need an account? Sign up!</a></div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </main>
            </div>
        </div>
        <script src="https://code.jquery.com/jquery-3.5.1.min.js" crossorigin="anonymous"></script>
        <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.bundle.min.js" crossorigin="anonymous"></script>
        <script src="../js/scripts.js"></script>
    </body>
</html>
