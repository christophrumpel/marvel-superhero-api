<?php

use Rumpel\MarvelUniverse;
require 'vendor/autoload.php';

$api = new MarvelUniverse\SuperheroApi();

// Get all characters
$characters = $api->getAllCharacters(5, 7);

// Get 3-D Man
$threedman = $api->getCharacterById(1011334);

