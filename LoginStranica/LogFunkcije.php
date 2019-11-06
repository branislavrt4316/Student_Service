<?php
function proveraStringa($string)
{
	if(strpos($string, "=")!==false) return false;
	if(strpos($string, " ")!==false) return false;
	if(strpos($string, "*")!==false) return false;
	if(strpos($string, "(")!==false) return false;
	if(strpos($string, ")")!==false) return false;
	return true;
}
?>