[![Latest Version](https://img.shields.io/github/release/thephpleague/marvel-superhero-api.svg?style=flat-square)](https://github.com/christophrumpel/marvel-superhero-api/releases)
[![Software License](https://img.shields.io/badge/license-MIT-brightgreen.svg?style=flat-square)](LICENSE.md)

# Marvel Superhero API

This is a helper package for working with the [Marvel developer API](https://developer.marvel.com/).

# Examples

```php
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
```

# Covered

- [x] All character calls
- [x] All comic calls

# Roadmap

More to come: 

- [ ] Creators calls
- [ ] Events calls
- [ ] Series calls
- [ ] Stories calls
