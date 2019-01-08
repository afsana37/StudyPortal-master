<?php
function test_input($value, $con)
{
	 // Use this function on all those values where you want to check for both sql injection and cross site scripting
	 //Trim the value
	$value = trim($value);
	 
	// Stripslashes
	if (get_magic_quotes_gpc()) {
		$value = stripslashes($value);
	}
	
	 // Convert all &lt;, &gt; etc. to normal html and then strip these
	 $value = strtr($value,array_flip(get_html_translation_table(HTML_ENTITIES)));
	
	 // Strip HTML Tags
	 $value = strip_tags($value);
	
	// Quote the value
	$value = $con->real_escape_string($value);
	$value = htmlspecialchars ($value);
	return $value;
}
?>