<?php 

$db = new Mysqli;

$db->connect('localhost','root','','todoapp');

if(!$db){
	 echo "success";
}



 ?>