<?php
function debug($string){
	echo "<pre>";
	var_dump($string);
	echo "</pre>";
	die;
}
