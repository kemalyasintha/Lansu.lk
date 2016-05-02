
<?php
include 'example.php';

$movies = new SimpleXMLElement($xmlst);

echo $movies->movie[0]->characters->character[0]->name;
?>
