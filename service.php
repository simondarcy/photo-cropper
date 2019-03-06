<?php
/*
service.php
Service to add image to db
*/

//ini_set('display_errors',1);
//error_reporting(E_ALL);

/* output in necessary format */
header('Content-type: application/json');
header('Access-Control-Allow-Origin: *');
header('Access-Control-Allow-Methods: GET, POST, OPTIONS, PUT, DELETE');  
header('Access-Control-Allow-Headers: *');  

if ($_SERVER['REQUEST_METHOD'] === 'GET') {

	echo '{"message":"hey"}';
	return;
}

//POST
$postdata = file_get_contents("php://input");
$request = json_decode($postdata);

if ( !$request->img ) {
	echo '{"error":"missing info"}';
	return;
}

$uid = 1;
$img = $request->img;

require_once('connect.php');

// To protect MySQL injection (more detail about MySQL injection)
$img = $link->real_escape_string( stripslashes( $img ) );

//insert
$query = "INSERT INTO `images` (`id`, `uid`, `image`) VALUES (NULL, $uid, '$img')";
$result = $link->query($query) or die('Errant query:  '.$query);
$newid = $link->insert_id;
echo '{"message":"Image added successfully", "id":'.$newid.'}';

/* disconnect from the db */

$link->close();

?>