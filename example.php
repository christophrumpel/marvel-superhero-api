<?php

use Rumpel\MarvelUniverse;
require 'vendor/autoload.php';

$publicKey = "your_public_key";
$privateKey = "your_private_key";

$api = new MarvelUniverse\SuperheroApi($publicKey, $privateKey);

// Get all characters
$characters = $api->getAllCharacters(5, 7);

// Get 3-D Man
$threedman = $api->getCharacterById(1011334);

