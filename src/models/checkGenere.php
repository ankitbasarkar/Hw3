<?php 

include "Genere.php";
use GenereClass\Genere;

$gen = new Genere();
$res = $gen->populateGenere();
foreach($res as $val){
	echo $val;
}
?>
