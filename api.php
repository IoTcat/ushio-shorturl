<?php
include './functions.php';

header("Access-Control-Allow-Origin: *");
$url = $_REQUEST['url'];

$url = base64_decode($url);

if(!isset($url)) die();

$key = substr(md5($url.time()), 0, 6);
db__pushData(db__connect(), "reflect", array("keyword"=>$key, "type"=>"auto", "url"=>$url, "insert_at"=>date("Y-m-d H:i:s")));


echo json_encode(array("key"=>"http://eee.dog/".$key));
