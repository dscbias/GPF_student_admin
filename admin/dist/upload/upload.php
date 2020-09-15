<?php

require '../auth/config_cms.php';
$json = array();

if(isset($_POST["image"])) {
	$data = $_POST["image"];
	$fac_id = $_POST['fac_id'];
	$fac_name = $_POST['fac_name'];


	$image_array_1 = explode(";", $data);
	$image_array_2 = explode(",", $image_array_1[1]);
	$data = base64_decode($image_array_2[1]);

	$imageName = $_SERVER["DOCUMENT_ROOT"] . "/" . "Pictures/" . $fac_name . '.jpg';

	unlink($imageName);

	file_put_contents($imageName, $data);
	$img_name_for_db = $fac_name . ".jpg";
	$sql = "UPDATE faculty SET image = '$img_name_for_db' WHERE id='$fac_id'";
	mysqli_query($link, $sql);

$jaon['img'] = '<img src="'.$imageName.'" class="img-thumbnail" />';
$json['link'] = $link;

$json['fac_id'] = $fac_id;
$json['sql'] = $sql;


header('Content-Type: application/json');
echo json_encode($json);
}
mysqli_close($link);
?>
