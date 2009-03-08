<?php if (!defined('BASEPATH')) exit('No direct script access allowed.');

// Calls the getField method of the library
function getField($field = '') {
	$CI =& get_instance();
	return $CI->erkanaauth->getField($field);
}

// Calls the getRole method of the library
function getRole() {
	$CI =& get_instance();
	return $CI->erkanaauth->getRole();
}

?>