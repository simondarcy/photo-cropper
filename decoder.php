<?php


header('Access-Control-Allow-Origin: *');
header('Access-Control-Allow-Methods: GET, POST, OPTIONS, PUT, DELETE');  
header('Access-Control-Allow-Headers: *');  

require_once('connect.php');

if(!$_GET['id']){
	echo '{"error":"no id"}';
	return;
}

$id=$_GET['id'];

$query = "SELECT * FROM images WHERE id = $id LIMIT 1";

$result = $link->query($query) or die('Errant query:  '.$query);

/* create one master array of the records */

$obj = $result->fetch_object();
$img = $obj->image;
$img = str_replace('data:image/png;base64,', '', $img);
$img = str_replace(' ', '+', $img);

$data = base64_decode($img);

$im = imagecreatefromstring($data);
if ($im !== false) {
    header('Content-Type: image/png');
    imagealphablending($im, false);
	imagesavealpha($im, true);
    imagepng($im);
    
    imagedestroy($im);
}
else {
    echo 'An error occurred.';
}

$link->close();

?> 
