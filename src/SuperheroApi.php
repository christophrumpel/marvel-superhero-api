<?php
/**
 * Created by PhpStorm.
 * User: christophrumpel
 * Date: 09/05/15
 * Time: 16:16
 */

namespace Rumpel\MarvelUniverse;


use GuzzleHttp\Client;
use GuzzleHttp\Exception\RequestException;

class SuperheroApi
{

    /**
     * @var string
     */
    private $baseUrl = 'http://gateway.marvel.com/v1/public/';

    /**
     * @var Client
     */
    private $client;

    public function __construct($publicKey, $privateKey)
    {
        $ts = time();
        $hash = md5($ts . $privateKey . $publicKey);

        $this->client = new Client([
            'base_url' => $this->baseUrl,
            'defaults' => [
                'query' => [
                    'ts'     => $ts,
                    'apikey' => $publicKey,
                    'hash'   => $hash
                ]
            ]
        ]);
    }

    /**
     * Get all Marvel characters
     * @param array $filterAttributes
     * @return mixed
     */
    public function getAllCharacters(array $filterAttributes = [])
    {
        $filters = ['query' => [$filterAttributes]];

        try {
            $result = $this->client->get('characters', $filters);
        } catch (RequestException $e) {
            $return['request'] = $e->getRequest() . "\n";
            if ($e->hasResponse()) {
                return $return['response'] = $e->getResponse() . "\n";

            }
        }

        return $result->json();

    }

    /**
     * Get a Marvel character by id
     * @param $characterId
     * @return mixed|string
     */
    public function getCharacterById($characterId)
    {
        try {
            $result = $this->client->get('characters/' . $characterId);
        } catch (RequestException $e) {
            $return['request'] = $e->getRequest() . "\n";
            if ($e->hasResponse()) {
                return $return['response'] = $e->getResponse() . "\n";

            }
        }

        return $result->json();
    }

    /**
     * Get from a specific character all comics
     * @param $characterId
     * @param array $filterAttributes
     * @return mixed|string
     */
    public function getCharacterComics($characterId, array $filterAttributes = [])
    {
        $filters = ['query' => [$filterAttributes]];

        try {
            $result = $this->client->get('characters/' . $characterId . '/comics', $filters);
        } catch (RequestException $e) {
            $return['request'] = $e->getRequest() . "\n";
            if ($e->hasResponse()) {
                return $return['response'] = $e->getResponse() . "\n";

            }
        }

        return $result->json();
    }

    /**
     * Get from a specific character all events
     * @param $characterId
     * @param array $filterAttributes
     * @return mixed|string
     */
    public function getCharacterEvents($characterId, array $filterAttributes = [])
    {
        $filters = ['query' => [$filterAttributes]];

        try {
            $result = $this->client->get('characters/' . $characterId . '/events', $filters);
        } catch (RequestException $e) {
            $return['request'] = $e->getRequest() . "\n";
            if ($e->hasResponse()) {
                return $return['response'] = $e->getResponse() . "\n";

            }
        }

        return $result->json();
    }

    /**
     * Get from a specific character all series
     * @param $characterId
     * @param array $filterAttributes
     * @return mixed|string
     */
    public function getCharacterSeries($characterId, array $filterAttributes = [])
    {
        $filters = ['query' => [$filterAttributes]];

        try {
            $result = $this->client->get('characters/' . $characterId . '/series', $filters);
        } catch (RequestException $e) {
            $return['request'] = $e->getRequest() . "\n";
            if ($e->hasResponse()) {
                return $return['response'] = $e->getResponse() . "\n";

            }
        }

        return $result->json();
    }

    /**
     * Get from a specific character all stories
     * @param $characterId
     * @param array $filterAttributes
     * @return mixed|string
     */
    public function getCharacterStories($characterId, array $filterAttributes = [])
    {
        $filters = ['query' => [$filterAttributes]];

        try {
            $result = $this->client->get('characters/' . $characterId . '/stories', $filters);
        } catch (RequestException $e) {
            $return['request'] = $e->getRequest() . "\n";
            if ($e->hasResponse()) {
                return $return['response'] = $e->getResponse() . "\n";

            }
        }

        return $result->json();
    }

}