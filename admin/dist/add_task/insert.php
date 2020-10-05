<?php

require $_SERVER['DOCUMENT_ROOT'] . "/.env.php";

/* Database credentials. Assuming you are running MySQL
server with default setting (user 'root' with no password) */
define('DB_SERVER', DB_SERVER);
define('DB_USERNAME', DB_USERNAME);
define('DB_PASSWORD', DB_PASSWORD);
define('DB_NAME', 'id14825970_gpf');

/* Attempt to connect to MySQL database */
$link = mysqli_connect(DB_SERVER, DB_USERNAME, DB_PASSWORD, DB_NAME);

// Check connection
if($link === false){
    die("ERROR: Could not connect. " . mysqli_connect_error());
}

$title=$_POST['title'];
$sql = "INSERT INTO task (Task_title) VALUES ('$title')";
mysqli_query($link, $sql);

mysqli_close($link);

// try {
//   $conn = new PDO("mysql:host=$servername;dbname=id14825970_gpf", $username, $password);
//   // set the PDO error mode to exception
//   $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
//   echo "Connected successfully";
// } catch(PDOException $e) {
//   echo "Connection failed: " . $e->getMessage();
// }
// $title=$_POST['title'];
// $sql="INSERT INTO task (Task_title) VALUES ('$title')";
// if(!mysqli_query($conn,$sql))
// {
//     echo'Not Inserted';
// }
// else
// {
//     echo'updated succesfully';
// }



//header("refresh:1; url=http://localhost/GPF_student_admin/admin/dist/add_task/index.php");
?>
