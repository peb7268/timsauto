<?php

extract($_POST);
//$name
//$phone
//$reason
//$message should now be availible

if(strlen($name) > 0 && strlen($message) > 0){
	die('200');
} else {
	die('500');
}