
<?php
// Include config file
require_once "config.php";
 
// Define variables and initialize with empty values
$inputFirstName =$inputLastName = $inputEmailAddress = $inputPassword = $inputConfirmPassword = "";
$email_err = $firstName_err = $lastName_err = $password_err = $confirm_password_err = "";
 
// Processing form data when form is submitted
if($_SERVER["REQUEST_METHOD"] == "POST"){
 
    
    if(empty(trim($_POST["inputFirstName"]))){
        $firstName_err = "Please enter first name.";
    } else{
        // Prepare a select statement
        $sql = "SELECT Email FROM admin WHERE Fname = ?";
        
        if($stmt = $mysqli->prepare($sql)){
            // Bind variables to the prepared statement as parameters
            $stmt->bind_param("s", $param_inputFirstName);
            
            // Set parameters
            $param_inputFirstName = trim($_POST["inputFirstName"]);
            
            // Attempt to execute the prepared statement
            if($stmt->execute()){
                // store result
                $stmt->store_result();
                
                if($stmt->num_rows == 1){
                    $firstName_err = "This username is already taken.";
                } else{
                    $inputFirstName = trim($_POST["inputFirstName"]);
                }
            } else{
                echo "Oops! Something went wrong. Please try again later.";
            }

            // Close statement
            $stmt->close();
        }
    }
	
	
	
	if(empty(trim($_POST["inputLastName"]))){
        $firstName_err = "Please enter last name.";
    } else{
        // Prepare a select statement
        $sql = "SELECT Email FROM admin WHERE Lname = ?";
        
        if($stmt = $mysqli->prepare($sql)){
            // Bind variables to the prepared statement as parameters
            $stmt->bind_param("s", $param_inputLastName);
            
            // Set parameters
            $param_inputLastName = trim($_POST["inputLastName"]);
            
            // Attempt to execute the prepared statement
            if($stmt->execute()){
                // store result
                $stmt->store_result();
                
                if($stmt->num_rows == 1){
                    $firstName_err = "This username is already taken.";
                } else{
                    $inputFirstName = trim($_POST["inputLastName"]);
                }
            } else{
                echo "Oops! Something went wrong. Please try again later.";
            }

            // Close statement
            $stmt->close();
        }
    }
    
	
	
	if(empty(trim($_POST["inputEmailAddress"]))){
        $email_err = "Please enter email address.";
    } else{
        // Prepare a select statement
        $sql = "SELECT Email FROM admin WHERE Email= ?";
        
        if($stmt = $mysqli->prepare($sql)){
            // Bind variables to the prepared statement as parameters
            $stmt->bind_param("s", $param_inputEmailAddress);
            
            // Set parameters
            $param_inputEmailAddress = trim($_POST["inputEmailAddress"]);
            
            // Attempt to execute the prepared statement
            if($stmt->execute()){
                // store result
                $stmt->store_result();
                
                if($stmt->num_rows == 1){
                    $email_err = "This username is already taken.";
                } else{
                    $inputFirstName = trim($_POST["inputEmailAddress"]);
                }
            } else{
                echo "Oops! Something went wrong. Please try again later.";
            }

            // Close statement
            $stmt->close();
        }
    }
    
	
	
	
    
    // Validate password
    if(empty(trim($_POST["inputPassword"]))){
        $password_err = "Please enter a password.";     
    } elseif(strlen(trim($_POST["inputPassword"])) < 6){
        $password_err = "Password must have atleast 6 characters.";
    } else{
        $inputPassword = trim($_POST["inputPassword"]);
    }
    
    // Validate confirm password
    if(empty(trim($_POST["inputConfirmPassword"]))){
        $confirm_password_err = "Please confirm password.";     
    } else{
        $confirm_password = trim($_POST["inputConfirmPassword"]);
        if(empty($password_err) && ($inputPassword != $inputConfirmPassword)){
            $confirm_password_err = "Password did not match.";
        }
    }
    
    // Check input errors before inserting in database
    if(empty($firstName_err_err) && empty($password_err) && empty($confirm_password_err) && empty($lastName_err) && empty($email_err)){
        
        // Prepare an insert statement
        $sql = "INSERT INTO admin (inputFirstName,inputLastName,inputPassword,inputEmailAddress) VALUES (?, ?,?,?)";
         
        if($stmt = $mysqli->prepare($sql)){
            // Bind variables to the prepared statement as parameters
            $stmt->bind_param("ss", $param_inputFirstName,$param_inputLastName , $param_inputPassword,$inputEmailAddress);
            
            // Set parameters
            $param_inputFirstName = $inputFirstName;
			$param_inputLastName = $inputLastName;
			$param_inputEmailAddress = $inputEmailAddress;
			
            $param_password = password_hash($inputPassword, PASSWORD_DEFAULT); // Creates a password hash
            
            // Attempt to execute the prepared statement
            if($stmt->execute()){
                // Redirect to login page
                header("location: login.php");
            } else{
                echo "Something went wrong. Please try again later.";
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
        <title>Page Title - SB Admin</title>
        <link href="/admin/dist/css/styles.css" rel="stylesheet" />
        <script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.13.0/js/all.min.js" crossorigin="anonymous"></script>
    </head>
    <body class="bg-primary">
        <div id="layoutAuthentication">
            <div id="layoutAuthentication_content">
                <main>
                    <div class="container">
                        <div class="row justify-content-center">
                            <div class="col-lg-7">
                                <div class="card shadow-lg border-0 rounded-lg mt-5">
                                    <div class="card-header"><h3 class="text-center font-weight-light my-4">Create Account</h3></div>
                                    <div class="card-body">
                                        <form>
										<form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post">
                                            <div class="form-row">
                                                <div class="col-md-6">
                                                    <div class="form-group" <?php echo (!empty($firstName_err)) ? 'has-error' : ''; ?>">
                                                        <label class="small mb-1" for="inputFirstName">First Name</label>
                                                        <input class="form-control py-4" id="inputFirstName" type="text" placeholder="Enter first name" value="<?php echo $inputFirstName ?>" />
                                                    </div>
                                                </div>
                                                <div class="col-md-6">
                                                    <div class="form-group" <?php echo (!empty($lastName_err)) ? 'has-error' : ''; ?>">
                                                        <label class="small mb-1" for="inputLastName">Last Name</label>
                                                        <input class="form-control py-4" id="inputLastName" type="text" placeholder="Enter last name" value="<?php echo $inputLastName; ?>"/>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="form-group" <?php echo (!empty($email_err)) ? 'has-error' : ''; ?>" >
                                                <label class="small mb-1" for="inputEmailAddress">Email</label>
                                                <input class="form-control py-4" id="inputEmailAddress" type="email" aria-describedby="emailHelp" placeholder="Enter email address" value="<?php echo $inputEmailAddress; ?>/>
                                            </div>
                                            <div class="form-row">
                                                <div class="col-md-6">
                                                    <div class="form-group" <?php echo (!empty($password_err)) ? 'has-error' : ''; ?>">
                                                        <label class="small mb-1" for="inputPassword">Password</label>
                                                        <input class="form-control py-4" id="inputPassword" type="password" placeholder="Enter password"value="<?php echo $inputPassword; ?>" />
														
                                                    </div>
                                                </div>
                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <label class="small mb-1" for="inputConfirmPassword">Confirm Password</label>
                                                        <input class="form-control py-4" id="inputConfirmPassword" type="password" placeholder="Confirm password" value="<?php echo $inputConfirmPassword; ?>"/>
														<span class="help-block"><?php echo $confirm_password_err; ?></span>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="form-group mt-4 mb-0"><a class="btn btn-primary btn-block" href="login.php">Create Account</a></div>
                                        </form>
                                    </div>
                                    <div class="card-footer text-center">
                                        <div class="small"><a href="login.php">Have an account? Go to login</a></div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </main>
            </div>
            <div id="layoutAuthentication_footer">
                <footer class="py-4 bg-light mt-auto">
                    <div class="container-fluid">
                        <div class="d-flex align-items-center justify-content-between small">
                            <div class="text-muted">Copyright &copy; Your Website 2020</div>
                            <div>
                                <a href="#">Privacy Policy</a>
                                &middot;
                                <a href="#">Terms &amp; Conditions</a>
                            </div>
                        </div>
                    </div>
                </footer>
            </div>
        </div>
        <script src="https://code.jquery.com/jquery-3.5.1.min.js" crossorigin="anonymous"></script>
        <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.bundle.min.js" crossorigin="anonymous"></script>
        <script src="/admin/dist/js/scripts.js"></script>
    </body>
</html>
