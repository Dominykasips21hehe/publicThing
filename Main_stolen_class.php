<?php
include 'class.php';
include 'Math.class.php';
use first\Multiply as Mult;
$fn=7;
$obj=new Mult($fn);

$obj-> arithmetic_progression ();

print ($obj-> get_answer());
print ("<br>");

$multiply = new second\Multiply(new second\Numbers(array(1,2,3,4,0.5,0.8)));
print ( $multiply->result );

print "<br>";
?>