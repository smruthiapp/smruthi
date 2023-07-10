<?php
controller('Ramayanam');
$ramayanam = new Ramayanam;

$data = csv_decode('models/test.csv');

$sloka = $ramayanam->updateSlokas('models/test.csv');

print_r($sloka);