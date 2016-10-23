<?php 

include "Genere.php";
use GenereClass\Genere;

$Genere = new Genere();
//print_r($Genere->getGenere());
$result = $Genere->getGenere();
foreach($result as $val){
	echo $val;
}
?>
