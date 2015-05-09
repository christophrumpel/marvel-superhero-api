<?php

use Rumpel\MarvelUniverse;
require 'vendor/autoload.php';

// Get an Marvel account and your keys here https://developer.marvel.com/
$publicKey = "your_public_key";
$privateKey = "your_private_key";

$api = new MarvelUniverse\SuperheroApi($publicKey, $privateKey);

// Get all characters
$characters = $api->getAllCharacters(5, 7);

// Get 3-D Man
$threedman = $api->getCharacterById(1011334);

// Get comics from 3-D Man
$comics = $api->getCharacterComics(1011334, ['format' => 'comic']);

// Get comics from 3-D Man
$comics = $api->getCharacterComics(1011334, ['format' => 'comic']);

// Get events from 3-D Man
$events = $api->getCharacterEvents(1011334);

// Get series from 3-D Man
$series = $api->getCharacterSeries(1011334);

// Get stories from 3-D Man
$stories = $api->getCharacterStories(1011334);