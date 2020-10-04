<?php
session_start();
$username = $_SESSION['username'];
include_once $_SERVER["DOCUMENT_ROOT"] . '/admin/dist/auth/config.php';
$post = $_POST;
$json = array();

if (!empty($post['action']) && $post['action']=="update_selection_status") {
    $id = $post['dtaskid'];
    $checkbox_value = $post['checkbox_value'];

    // Prepare an insert statement
    $sql  = "UPDATE users SET selection_status = '$checkbox_value' WHERE id = '$id'";
    mysqli_query($link, $sql);

    $json['msg'] = 'success';

    header('Content-Type: application/json');
    echo json_encode($json);
}

if (!empty($post['action']) && $post['action']=="update_alloted_branch") {
    $id = $post['dtaskid'];
    $selected_branch = $post['selected_branch'];

    // Prepare an insert statement
    $sql  = "UPDATE users SET alloted_branch = '$selected_branch' WHERE id = '$id'";
    mysqli_query($link, $sql);

    $json['msg'] = 'success';

    header('Content-Type: application/json');
    echo json_encode($json);
}

if (!empty($post['action']) && $post['action']=="verify_sem_fee_status") {
    $id = $post['dtaskid'];

    // Prepare an insert statement
    $sql  = "UPDATE users SET first_sem_fee_status = 'VERIFIED' WHERE id = '$id'";
    mysqli_query($link, $sql);

    $json['msg'] = 'success';

    header('Content-Type: application/json');
    echo json_encode($json);
}
