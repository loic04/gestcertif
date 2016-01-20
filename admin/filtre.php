<?php
foreach ($_REQUEST as $key => $val)
{
$val = trim(stripslashes(htmlentities($val)));
$_REQUEST[$key] = $val;
}

?>