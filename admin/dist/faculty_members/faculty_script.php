<?php
session_start();
$username = $_SESSION['username'];
include_once '../auth/config_cms.php';
$post = $_POST;
$json = array();

if (!empty($post['action']) && $post['action']=="add_new_faculty_member") {
    $username = $_SESSION['username'];
    $faculty_name = $post['faculty_name'];
    $dep = $post['dep'];
    // Prepare an insert statement
    $sql  = "INSERT INTO faculty (name) VALUES ('$faculty_name')";
    mysqli_query($link, $sql);
    $json['msg'] = "success";
    $json['link'] = $link;
    $json['post'] = $post;
    $json['sql'] = $sql;

    header('Content-Type: application/json');
    echo json_encode($json);
}

if (!empty($post['action']) && $post['action']=="update_faculty_data") {
    $username = $_SESSION['username'];
    $fac_id = $post['fac_id'];
    $name = $post['name'];
    $content = $post['content'];
    $qualifications = $post['qualifications'];
    $area_of_interest = $post['area_of_interest'];
    $mobile_no = $post['mobile_no'];
    $email_id = $post['email_id'];
    $designation = $post['designation'];
    $profile_file = "";

    // Prepare an insert statement
    $sql  = "UPDATE faculty SET name = ?, content = ?, qualifications = ?, area_of_interest = ?, mobile_no = ?, email_id = ?, profile_file = ?, designation = ? WHERE id = ?";

    if($stmt = mysqli_prepare($link, $sql)){
        // Bind variables to the prepared statement as parameters
        mysqli_stmt_bind_param($stmt, "sssssssss", $name, $content, $qualifications, $area_of_interest, $mobile_no, $email_id, $profile_file, $designation, $fac_id);

        // Attempt to execute the prepared statement
        if(mysqli_stmt_execute($stmt)){
        } else{
            die('prepare() failed: ' . htmlspecialchars(mysqli_error($link)));
        }

        // Close statement
        mysqli_stmt_close($stmt);
    }
    $json['msg'] = "success";
    $json['link'] = $link;
    $json['post'] = $post;
    $json['sql'] = $sql;

    header('Content-Type: application/json');
    echo json_encode($json);
}

if (!empty($post['action']) && $post['action']=="update_department") {
    $username = $_SESSION['username'];
    $fac_id = $post['fac_id'];
    $dep = $post['dep'];

    // Prepare an insert statement
    $sql  = "UPDATE faculty SET dep = '$dep' WHERE id = '$fac_id'";
    mysqli_query($link, $sql);
    $json['msg'] = "success";
    $json['link'] = $link;
    $json['post'] = $post;
    $json['sql'] = $sql;

    header('Content-Type: application/json');
    echo json_encode($json);
}

mysqli_close($link);
