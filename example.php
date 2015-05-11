<?php

use Rumpel\MarvelUniverse;
require 'vendor/autoload.php';

// Get an Marvel account and your keys here https://developer.marvel.com/
$publicKey = "your_public_key";
$privateKey = "your_private_key";

$api = new MarvelUniverse\SuperheroApi($publicKey, $privateKey);

// Get all characters
$characters = $api->characters()->getAll(['nameStartsWith' => 'Y']);

// Get 3-D Man
$threedman = $api->characters()->getById(1011334);

// Get comics from 3-D Man
$comics = $api->characters()->getComics(1011334, ['format' => 'comic']);

// Get events from 3-D Man
$events = $api->characters()->getEvents(1011334);

// Get series from 3-D Man
$series = $api->characters()->getSeries(1011334);

// Get stories from 3-D Man
$stories = $api->characters()->getStories(1011334);